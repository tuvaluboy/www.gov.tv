<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToImageslidesTable extends Migration
{
    public function up()
    {
        Schema::table('imageslides', function (Blueprint $table) {
            $table->unsignedInteger('page_id')->nullable();
            $table->foreign('page_id', 'page_fk_2180059')->references('id')->on('pages');
        });
    }
}
