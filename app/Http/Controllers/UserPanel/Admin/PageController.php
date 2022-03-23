<?php

namespace App\Http\Controllers\UserPanel\Admin;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $session_page_on = session(['page_on' => $request->input('page_on')]);

        $pages = Pages::paginate(8);

        if ($request->query('show') == 'edit') {

            $page_edit = Pages::where('id_page', $request->query('id'))->first();
        }

        return view('panel.admin.addpages', compact([
            'pages',
            'page_edit'
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

        Pages::create([
            'page'       => $request->input('page'),
            'page_group' => $request->input('group_page'),
            'title_page' => $request->input('title_page'),
        ]);

        return redirect()->route('panel.admin.page_index');
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
        session()->flash('update', 'Інформація сторінки оновлено!');

        Pages::where('id_page', $id)->update([
            'page'       => $request->page,
            'page_group' => $request->group_page,
            'title_page' => $request->title_page,
        ]);

        return back();
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
