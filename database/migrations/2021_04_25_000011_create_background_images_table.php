<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundImagesTable extends Migration
{
    public function up()
    {
        Schema::create('background_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
