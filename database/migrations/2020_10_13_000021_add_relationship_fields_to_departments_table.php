<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedInteger('ministry_id')->nullable();
            $table->foreign('ministry_id', 'ministry_fk_2164705')->references('id')->on('ministries');
        });
    }
}
