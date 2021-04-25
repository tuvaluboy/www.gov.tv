<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoryContentDirectorySubCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('directory_content_directory_sub_category', function (Blueprint $table) {
            $table->unsignedBigInteger('directory_content_id');
            $table->foreign('directory_content_id', 'directory_content_id_fk_3766143')->references('id')->on('directory_contents')->onDelete('cascade');
            $table->unsignedBigInteger('directory_sub_category_id');
            $table->foreign('directory_sub_category_id', 'directory_sub_category_id_fk_3766143')->references('id')->on('directory_sub_categories')->onDelete('cascade');
        });
    }
}
