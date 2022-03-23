<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\User\Information;
use Illuminate\Support\Facades\DB;

class UserTableTrunced extends Seeder {

  public function run() {
    
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('role_user_departament')->truncate();
    DB::table('role_user_position')->truncate();

    Information::truncate();
    User::truncate();
 
    User::create([
      'email'    => 'rekvuem@gmail.com',
      'password' => Hash::make('adminadmin')
    ]);

    Information::create([
      'user_id'         => 1,
      'familia'         => 'Кириченко',
      'imya'            => 'Віктор',
      'otchestvo'       => 'Іванович',
      'number_mobile'   => '+38 063 854 43 75',
      'department'      => 'Відділ',
      'position'        => 'Адміністратор',
      'happy_birth'     => '1988-05-16',
      'registration_ip' => '193.28.64.203',
    ]);

    DB::table('role_user_position')->insert([
      'user_id'          => 1,
      'user_position_id' => 1,
    ]);
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  }

}
