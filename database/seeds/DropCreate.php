<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class UserTableTrunced extends Seeder {

  public function run() {
  Schema::dropIfExists('confer_files');
    
    Schema::create('confer_files', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('name');
            $table->mediumText('discribtion');
            $table->string('file',160);
            $table->enum('page', ['prog_academy','zbirnik_academy','archiv','prog_koledj','zbirnik_koledj']);
            $table->enum('active', ['0','1']);
            $table->string('type',160);
        });
  }

}