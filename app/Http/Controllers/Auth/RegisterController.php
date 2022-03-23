<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\Information;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Нужен ли этот раздел с проверкой вводных данных
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     * date_format:d.m.Y */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'familia'       => [
                'required',
                'string',
                'min:3',
                'max:35'
            ],
            'imya'          => [
                'required',
                'string',
                'min:3',
                'max:35'
            ],
            'otchestvo'     => [
                'required',
                'string',
                'min:3',
                'max:35'
            ],
            'num_mobile'    => [
                'required',
                'string',
                'min:3',
                'max:35'
            ],
            'email'         => [
                'required',
                'string',
                'email',
                'max:100',
                'unique:users'
            ],
            'password'      => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
            'department'    => [
                'required',
                'string'
            ],
            'position'      => [
                'required',
                'string',
            ],
            'happy'         => ['required'],
            'accept_terms'  => ['required'],
            'cookie_policy' => ['required'],

        ]);

        return $validator;
    }

    /**
     * Регистрация данных
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {

        User::create([
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $select_true_id = User::where('email', $data['email'])->first();

        Information::create([
            'user_id'         => $select_true_id->id,
            'familia'         => $data['familia'],
            'imya'            => $data['imya'],
            'otchestvo'       => $data['otchestvo'],
            'number_mobile'   => $data['num_mobile'],
            'department'      => $data['department'],
            'position'        => $data['position'],
            'happy_birth'     => date('Y-m-d', strtotime($data['happy'])),
            'registration_ip' => Request::ip(),
        ]);

        DB::table('role_user_position')->insert([
            'user_id'          => $select_true_id->id,
            'user_position_id' => 2,
        ]);


        define('HOSTNAME_API', 'extra.onaft.edu.ua'); // Host name REST API
        define('KEY_API', 'Ezn3lFoeTthLXCVlFdHAKalt3AaI34lAk7CYAU9'); // REST API key индивидуальный
// Формируем сообщение в формате HTML
        $message   = "<html><head></head>";
        $message   .= " <body>";
        $message   .= "<div style='background-color: #FBF4E1; text-align: center; width:100%; padding-top:10px; padding-bottom:10px'><img src='" . asset('images/logo.png') . "' width='250'></div>";
        $message   .= "<div style='background-color: #00897B; text-align: center; font-size: 1.2em; width:100%; padding-top:15px; padding-bottom:15px'> <a style='color:white; text-decoration:none; text-transform:uppercase;' href='https://onaft.edu.ua/'>ОНАХТ</a> |  <a style='color:white; text-transform:uppercase; text-decoration:none; text-transform:uppercase;' href='https://rozklad.onaft.edu.ua/'>Розклад</a>  | <a href='https://rozklad.onaft.edu.ua/spr' style='color:white; text-decoration:none; text-transform:uppercase;'>Довідник тел.</a> | <a href='http://nmv.onaft.edu.ua' style='color:white; text-decoration:none; text-transform:uppercase;'>НЦООП</a></div>";
        $message   .= "<div style='padding-left: 20px; padding-right:15px; padding-top:25px; padding-bottom:30px; font-size: 1.2em '>";
        $message   .= "Дякуюємо що реєструвалися в особистому кабінеті НЦООП.";
        $message   .= "</div>";
        $message   .= "<div style='background-color: #455A64; color:white; font-size: 1em; height:80px; padding: 10px 10px 10px 10px'>підвал (тут буде скоро важливі посилання)</div>";
        $message   .= "<em>ОНАХТ</em>";
        $message   .= "</body>";
        $message   .= "</html>";
// Формируем тему письма
        $subject   = "Вітальний лист! Навчальний центр організації освітнього процесу";
// Формируем массив данных и преобразуем его в JSON
        $data      = array("message" => $message, "subject" => $subject, "email" => $data['email']);
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
                $info_message = "Ваше сообщение отправлено<br /><br />на email: <strong>" . $email . "</strong><br /><br />Спасибо что Вы с нами.";
            } else
            {
                $info_message = "Error send mail, please contact the administrator...<br />";
            }
        }
        $request->session()->flash('info', $info_message);
        return $user;
    }

}
