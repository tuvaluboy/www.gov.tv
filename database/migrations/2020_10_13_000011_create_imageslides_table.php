<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageslidesTable extends Migration
{
    public function up()
    {
        Schema::create('imageslides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('firstbutton')->nullable();
            $table->string('secondbutton')->nullable();
            $table->string('firstbutton_link')->nullable();
            $table->string('secondbutton_link')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
