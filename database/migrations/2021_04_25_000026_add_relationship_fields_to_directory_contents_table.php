<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDirectoryContentsTable extends Migration
{
    public function up()
    {
        Schema::table('directory_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('ministry_id')->nullable();
            $table->foreign('ministry_id', 'ministry_fk_3518322')->references('id')->on('ministry_contents');
        });
    }
}
