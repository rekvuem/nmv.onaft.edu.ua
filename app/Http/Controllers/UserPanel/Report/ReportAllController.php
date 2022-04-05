<?php

namespace App\Http\Controllers\UserPanel\Report;

use App\Models\Reports\Comment;
use App\Models\Reports\Report;
use App\Models\User\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('user')) {

            $allReport = Report::with('InformationUser')->where('id_user', $request->query('user'))->orderBy('created_at', 'DESC')->get();
        }
        else {
            $allReport = Report::with('InformationUser')->orderBy('created_at', 'DESC')->get();
        }

        $listUserDepart = Information::with('UserSelectDepart')->get();

        return view('panel.staff.report.all', compact([
            'allReport',
            'listUserDepart'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
