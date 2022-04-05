<?php

namespace App\Http\Controllers\UserPanel\Report;

use App\Models\Reports\Add;
use App\Models\Reports\Comment;
use App\Models\Reports\Report;
use App\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportShowController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $take_my_report = Report::with('IdUserReports')->orderBy('created_at', 'desc')->get();

        return view('panel.staff.report.myreports', compact([
            'take_my_report',
            'take_carbon'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //определение формат времени (часы)
        $carbon = Carbon::now('Europe/Kiev')->format('H:i');
        // отформатирование даты + добавление часов и минут
        $change_time = date('Y-m-d '.$carbon, strtotime($request->input('time')));
        // добавление часов к основному времени
        $carbon_plus = Carbon::make($change_time)->addHours(4);

        $massage  = [
            'time.required'        => 'Поле обязательно',
            'report_text.required' => 'Введите правильній текст',
        ];
        $rules    = [
            'time'        => ['required'],
            'report_text' => ['required'],
        ];
        $makeRule = Validator::make($request->all(), $rules, $massage)->validate();

        if (Report::where('created_at', $change_time)->exists()) {
            $request->session()->flash('info', 'Дата вже є у базі даних! Змініть дату на актуальну.');
        }
        else {
            $request->session()->flash('add', 'Звіт додано, у Вас є 4 часа на <b>можливість</b> редагувати.');
            $ReportBase           = new Report();
            $ReportBase->id_user  = Auth::id();
            $ReportBase->report   = $request->input('report_text');
            $ReportBase->timeplus = $carbon_plus;
            //$ReportBase->created_at = $change_time;
            $ReportBase->save();

        }

        return back();
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
     * показывает отображение отчета (комментарий)
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    // delet (clear function)
    public function show($date)
    {
        $id = Report::where('created_at', $date)->first();

        $TakeShowReport = Report::with('TakeUserReportComment')
            ->where('id', $id->id)
            ->get();

        return view('panel.staff.report.view', compact([
            'TakeShowReport',
            'id'
        ]));
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
        $take_my_report = Report::where('id', $id)->first();

        return view('panel.staff.report.editor', compact(['take_my_report']));
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
        Report::where('id', $id)->update([
            'report' => $request->input('report_text')
        ]);

        return redirect()->route('spanel.report.myreports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $request->session()->flash('info','Видалено');

        Report::where('id', $id)->delete();

        return back();
    }
}
