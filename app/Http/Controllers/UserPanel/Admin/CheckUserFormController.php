<?php

namespace App\Http\Controllers\UserPanel\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\User\Information;

//use Illuminate\Support\Facades\Input;

class CheckUserFormController extends BaseController {
  /*
   * Класс отвечающий за проверку и одобрения пользователей оставленных заявок
   * 
   */

  public function status_accept($formleave, Request $req) {
    $Select_user = DB::table('users_leave_form')->where('id', $formleave)->first();
    $req->session()->flash('add', 'Користувач додан! ' . $Select_user->email . ' ');

    $email = $Select_user->email;
    $pass  = Hash::make($req['password']);

    $user = User::create([
          'email'      => $email,
          'password'   => $pass,
          'created_at' => now(),
    ]);

    Information::create([
      'user_id'         => $user->id,
      'familia'         => $Select_user->familia,
      'imya'            => $Select_user->imya,
      'otchestvo'       => $Select_user->otchestvo,
      'department'      => $Select_user->department,
      'position'        => $Select_user->position,
      'happy_birth'     => null,
      'number_mobile'   => $Select_user->number_mobile,
      'registration_ip' => $Select_user->ip_form_send,
      'created_at'      => $Select_user->creeate_at
    ]);


    define('HOSTNAME_API', 'extra.onaft.edu.ua'); // Host name REST API
    define('KEY_API', 'Ezn3lFoeTthLXCVlFdHAKalt3AaI34lAk7CYAU9'); // REST API key индивидуальный
// Формируем сообщение в формате HTML
    $message   = "<html><head></head>";
    $message   .= " <body>";
    $message   .= "<div style='background-color: #FBF4E1; text-align: center; width:100%; padding-top:10px; padding-bottom:10px'><img src='" . asset('images/logo.png') . "' width='250'></div>";
    $message   .= "<div style='background-color: #00897B; text-align: center; font-size: 1.2em; width:100%; padding-top:15px; padding-bottom:15px'> <a style='color:white; text-decoration:none; text-transform:uppercase;' href='https://onaft.edu.ua/'>ОНАХТ</a> |  <a style='color:white; text-transform:uppercase; text-decoration:none; text-transform:uppercase;' href='https://rozklad.onaft.edu.ua/'>Розклад</a>  | <a href='https://rozklad.onaft.edu.ua/spr' style='color:white; text-decoration:none; text-transform:uppercase;'>Довідник тел.</a> | <a href='http://nmv.onaft.edu.ua' style='color:white; text-decoration:none; text-transform:uppercase;'>НЦООП</a></div>";
    $message   .= "<div style='padding-left: 20px; padding-right:15px; padding-top:25px; padding-bottom:30px; font-size: 1.2em '>";
    $message   .= "<div>Логін: " . $email . " </div>";
    $message   .= "<div>Парол: " . $req['password'] . " </div>";
    $message   .= "</div>";
    $message   .= "<div style='background-color: #455A64; color:white; font-size: 1em; height:80px; padding: 10px 10px 10px 10px'>підвал (тут буде скоро важливі посилання)</div>";
    $message   .= "<em>ОНАХТ</em>";
    $message   .= "</body>";
    $message   .= "</html>";
// Формируем тему письма
    $subject   = "Лист з повідомленням! Навчальний центр організації освітнього процесу";
// Формируем массив данных и преобразуем его в JSON
    $data      = array("message" => $message, "subject" => $subject, "email" => $email);
    $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
// Формируем POST запрос
    $post_data = "key=" . KEY_API . "&fn=mail_nmv&json=" . $data_json;
// Адрес хоста, где реализован REST API
    $hostname  = HOSTNAME_API;
// Устанавливаем соединение с REST API для передачи данных
    $fsocket   = fsockopen($hostname, 80, $errno, $errstr, 30);
// Если отсутсвует соединение с хостом в $info_message формируем строку сообщения, для страницы Вашего сайта
    if (!$fsocket)
    {
      $info_message = "API connection error, please contact the administrator...<br />";
    } else
    {
      // Заголовок HTTP запроса
      $headers  = "POST /api/ HTTP/1.1\r\n";
      $headers  .= "Host: $hostname\r\n";
      $headers  .= "Content-Type: application/x-www-form-urlencoded\r\n";
      $headers  .= "Content-length: " . strlen($post_data) . "\r\n";
      $headers  .= "Connection: close\r\n\r\n";
      $headers  .= $post_data . "\r\n\r\n";
      // Отправляем HTTP-запрос серверу
      fwrite($fsocket, $headers);
      $response = "";
      while (!feof($fsocket))
      {
        $response .= fgets($fsocket, 4096);
      }
      fclose($fsocket);
      list($other, $responseBody) = explode("\r\n\r\n", $response, 2);
      // удалить все символы до {
      $responseBody = stristr($responseBody, '{');
      // удалить все символы после {
      $responseBody = strtok($responseBody, '}') . '}';
      $obj          = json_decode($responseBody);
      // Проверяем статус отправки почты
      if (!empty($obj->status) && $obj->status)
      {
        $info_message = "Ваше сообщение отправлено на email: " . $email . ". Спасибо что Вы с нами.";
      } else
      {
        $info_message = "Error send mail, please contact the administrator...<br />";
      }
    }
    $req->session()->flash('info', $info_message);
    return redirect()->route('spanel.admin.users.index');
  }

  public function status_denied($formemail) {
    return redirect()->route('mail.cancelMSG', [$formemail]);
  }

  public function status_delete($formleave, Request $req) {
    $req->session()->flash('delete', 'Запис форми видалено!');
    $UserDelete = DB::table('users_leave_form')->where('id', $formleave)->delete();
    return redirect()->route('spanel.admin.users.index');
  }

}
