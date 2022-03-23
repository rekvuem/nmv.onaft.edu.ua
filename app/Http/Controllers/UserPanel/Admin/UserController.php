<?php

namespace App\Http\Controllers\UserPanel\Admin;

use App\Http\Controllers\UserPanel\BaseController;
use App\User;
use App\Models\User\Information;
use App\Models\User\Departament;
use App\Models\User\Position;
use App\Models\User\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userslistInfo = User::with('UserFirstInformation')
                             ->get();
        $SendUserInfo  = DB::table('users_leave_form')
                           ->get();
        $Departament   = Departament::get();
        $Position      = Position::get();

        return view('panel.admin.users.users', compact([
            'userslistInfo',
            'SendUserInfo',
            'Departament',
            'Position',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()
                ->flash('add', 'Новий користувач додан');
        $this->validate($request, [
            'familia'    => [
                'required',
                'string',
                'max:25'
            ],
            'imya'       => [
                'required',
                'string',
                'max:25'
            ],
            'otchestvo'  => [
                'required',
                'string',
                'max:25'
            ],
            'num_mobile' => [
                'required',
                'string',
                'max:255'
            ],
            'email'      => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password'   => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ]);

        $user = User::create([
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        Information::create([
            'user_id'         => $user->id,
            'familia'         => $request['familia'],
            'imya'            => $request['imya'],
            'otchestvo'       => $request['otchestvo'],
            'number_mobile'   => $request['num_mobile'],
            'happy_birth'     => $request['date_happy'],
            'registration_ip' => \Request::ip(),
        ]);

        return redirect()->route('spanel.admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $userInfoEdit     = User::with('UserFirstInformation', 'SlugDepart', 'SlugPosition', 'RoleSuccess')
                                ->findOrFail($user->id);
        $departament_role = Departament::get();
        $position_role    = Position::get();
        $function_role    = Functions::get();

        return view('panel.admin.users.edit', compact([
            'userInfoEdit',
            'departament_role',
            'position_role',
            'function_role'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     *
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request, $user)
    {


        $request->session()
                ->flash('update', 'Оновлено!');
        $userUpdate                  = Information::where('user_id', $user)
                                                  ->first();
        $userUpdate->familia         = $request->input('familia');
        $userUpdate->imya            = $request->input('imya');
        $userUpdate->otchestvo       = $request->input('otchestvo');
        $userUpdate->happy_birth     = date('Y-m-d',strtotime($request->input('happy_birth')));
        $userUpdate->number_mobile   = $request->input('number_mobile');
        $userUpdate->registration_ip = $request->input('registration_ip');
        $userUpdate->save();
        $SelectUser        = User::where('id', $user)
                                 ->first();
        $SelectUser->email = $request->input('email');
        if ( ! empty($request->password)) {
            $password_new         = Hash::make($request->input('password'));
            $SelectUser->password = $password_new;
        }
        $SelectUser->save();
        $SelectUser->SlugDepart()
                   ->sync($request->roles_departament);
        $SelectUser->SlugPosition()
                   ->sync($request->roles_position);
        $SelectUser->RoleSuccess()
                   ->sync($request->roles_function);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $request->session()
                ->flash('delete', 'Користувач заблоковано.');
        DB::table("role_user_departament")
          ->where('user_id', $user->id)
          ->delete();
        DB::table('role_user_position')
          ->where('user_id', $user->id)
          ->delete();
        Information::where('id', $user->id)
                   ->delete();
        User::where('id', $user->id)
            ->delete();

        return redirect()->route('spanel.admin.users.index');
    }
}
