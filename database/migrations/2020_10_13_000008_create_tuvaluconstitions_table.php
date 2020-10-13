<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuvaluconstitionsTable extends Migration
{
    public function up()
    {
        Schema::create('tuvaluconstitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tittle')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
