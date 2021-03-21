<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNewsandUpdatesTable extends Migration
{
    public function up()
    {
        Schema::table('newsand_updates', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id', 'author_fk_2180193')->references('id')->on('users');
        });
    }
}
