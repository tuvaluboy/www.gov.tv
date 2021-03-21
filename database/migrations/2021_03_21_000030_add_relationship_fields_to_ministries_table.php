<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMinistriesTable extends Migration
{
    public function up()
    {
        Schema::table('ministries', function (Blueprint $table) {
            $table->unsignedBigInteger('authority_id')->nullable();
            $table->foreign('authority_id', 'authority_fk_2164519')->references('id')->on('roles');
        });
    }
}
