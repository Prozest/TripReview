<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPosts extends Migration
{

    public function up()
    {
        Schema::table('posts', function ($table) {
            $table ->integer('user_id');
        });
    }


    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table ->dropColumn('user_id');
        });
    }
}
