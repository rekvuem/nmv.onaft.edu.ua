<?php

namespace App\Http\Controllers\UserPanel;

use App\User;
use App\Models\User\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
//use App\Models\PhoneBook\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class WelcomeController extends BaseController {

  public function dashboard() {

    $user         = User::where('id', Auth::id())->first();
    $UserInformer = $user->UserFirstInformation()->first();

    $userShortPIB = $UserInformer->familia . " "
        . "" . mb_substr($UserInformer->imya, 0, 1, "UTF-8") . ". "
        . "" . mb_substr($UserInformer->otchestvo, 0, 1, "UTF-8") . ".";
    $userFullPIB  = $UserInformer->familia . " "
        . "" . $UserInformer->imya . " "
        . "" . $UserInformer->otchestvo . "";

    Cookie::queue(Cookie::forever('userShortPIB', $userShortPIB));
    Cookie::queue(Cookie::forever('userFullPIB', $userFullPIB));

    return view('panel.dashboard');
  }

}
