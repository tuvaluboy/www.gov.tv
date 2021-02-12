<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDirectorySubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('directory_sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('directorycategory_id')->nullable();
            $table->foreign('directorycategory_id', 'directorycategory_fk_3176934')->references('id')->on('directory_categories');
        });
    }
}
