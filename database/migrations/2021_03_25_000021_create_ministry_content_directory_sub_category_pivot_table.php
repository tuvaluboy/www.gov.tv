<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinistryContentDirectorySubCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ministry_content_directory_sub_categor', function (Blueprint $table) {
            $table->unsignedBigInteger('ministry_content_id');
            $table->foreign('ministry_content_id', 'ministry_content_id_fk_3522657')->references('id')->on('ministry_contents')->onDelete('cascade');
            $table->unsignedBigInteger('directory_sub_category_id');
            $table->foreign('directory_sub_category_id', 'directory_sub_category_id_fk_3522657')->references('id')->on('directory_sub_categories')->onDelete('cascade');
        });
    }
}
