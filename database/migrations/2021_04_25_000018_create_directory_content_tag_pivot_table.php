<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoryContentTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('directory_content_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('directory_content_id');
            $table->foreign('directory_content_id', 'directory_content_id_fk_3521897')->references('id')->on('directory_contents')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_3521897')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
