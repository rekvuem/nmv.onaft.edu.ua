<?php

namespace App\Http\Controllers\UserPanel;

use App\Models\User\Information;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingUserController extends Controller
{
    /**
     * Отобразить страницу настройки
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('UserFirstInformation')->where('id', Auth::id())->first();

        return view('panel.setting', compact('user'));
    }

    /**
     * Изменение пароля
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $old_password = $request->input('truepass');
        $take_true_password = User::where('id', Auth::id())->first();

        if(Hash::check($request->input('truepass'),$take_true_password->password))
        {
            User::where('id', Auth::id())->update([
                'password' => Hash::make($request->input('newpass')),
            ]);
        }
        $request->session()->flash('update', 'Парол змінено!');
        Auth::logout();
        return back();
    }

    /**
     * Обновление данных о пользователе
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $messages = [
            'changefam.regex'   => 'Вибачте, :input але такий вид даних не підтримується',
            'changeim.regex'    => 'Вибачте, :input але такий вид даних не підтримується',
            'changeotch.regex'  => 'Вибачте, :input але такий вид даних не підтримується',
            'changebirth.regex' => 'Вибачте, :input але такий вид даних не підтримується',
            'changemob.regex'   => 'Вибачте, :input але такий вид даних не підтримується',
        ];

        $rules = [
            'changefam'   => [
                'required',
                'string',
                'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'
            ],
            'changeim'    => [
                'required',
                'string',
                'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'
            ],
            'changeotch'  => [
                'required',
                'string',
                'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'
            ],
            'changebirth' => [
                'required',
                'date_format:d.m.Y'
            ],
            'changemob'   => ['required'],
        ];
        //Проверка правил на ввод данных
        $validate = Validator::make($request->all(), $rules, $messages)->validate();

        //Смена формата даты рождения
        $date_change_formate= date('Y-m-d', strtotime($request->input('changebirth')));

        //Id пользователя
        $input_user = $request->input('user');

        //сообщение об успешном обновлении
        $request->session()->flash('update', 'Інформація об користувачі оновлена!');

        Information::where('user_id', $input_user)->update([
            'familia'       => $request->input('changefam'),
            'imya'          => $request->input('changeim'),
            'otchestvo'     => $request->input('changeotch'),
            'happy_birth'   => $date_change_formate,
            'number_mobile' => $request->input('changemob'),
            'updated_at'    => now(),
        ]);

        return redirect()->route('spanel.setting');
    }

    /**
     * Удаление пользователя полностью ?
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //удаление пользователя (самостоятельно)
    }
}
