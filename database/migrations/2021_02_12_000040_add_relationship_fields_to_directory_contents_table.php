<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDirectoryContentsTable extends Migration
{
    public function up()
    {
        Schema::table('directory_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('directorysubcategory_id')->nullable();
            $table->foreign('directorysubcategory_id', 'directorysubcategory_fk_3176972')->references('id')->on('directory_sub_categories');
        });
    }
}
