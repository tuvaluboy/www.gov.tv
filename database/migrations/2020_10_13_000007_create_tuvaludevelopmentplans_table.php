<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuvaludevelopmentplansTable extends Migration
{
    public function up()
    {
        Schema::create('tuvaludevelopmentplans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
