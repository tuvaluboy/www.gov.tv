<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
