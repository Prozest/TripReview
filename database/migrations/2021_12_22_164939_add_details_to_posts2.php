<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToPosts2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->mediumText('summary');
            $table->longText('body');
            $table->float('rating');
            $table->string('country');
            $table->string('state');
            $table->mediumText('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('body');
            $table->dropColumn('summary');
            $table->dropColumn('rating');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('services');
        });
    }
}
