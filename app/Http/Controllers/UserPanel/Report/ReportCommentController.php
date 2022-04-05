<?php

namespace App\Http\Controllers\UserPanel\Report;

use App\Models\Reports\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportCommentController extends Controller
{
    public function create(Request $request)
    {
        $idUser   = $request->input('iduser');
        $idReport = $request->input('idreport');
        $textarea = $request->input('textcomment');

        Comment::create([
            'id_report' => $idReport,
            'id_user'   => $idUser,
            'comment'   => $textarea
        ]);

        return back();
    }

    public function destroy($idcomment, Request $req)
    {
        $req->session()->flash('info', 'Коментар видалено');

        Comment::where('id_comment', $idcomment)->delete();

        return back();
    }
}
