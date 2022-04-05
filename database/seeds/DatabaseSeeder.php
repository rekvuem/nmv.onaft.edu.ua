<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //удалить таблицу "отсавить заявку на одобрению"
        //Schema::drop('users_leave_form');
        //sleep(5);
        //Schema::drop('migrations');
        //DB::statement('ALTER TABLE confer_home MODIFY title_conference mediumtext');
    }

}
