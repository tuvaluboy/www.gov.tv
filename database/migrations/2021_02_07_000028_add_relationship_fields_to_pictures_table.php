<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPicturesTable extends Migration
{
    public function up()
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->nullable();
            $table->foreign('page_id', 'page_fk_3142408')->references('id')->on('pages');
        });
    }
}
