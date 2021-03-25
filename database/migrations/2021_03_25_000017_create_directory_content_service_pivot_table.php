<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoryContentServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('directory_content_service', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_3501157')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('directory_content_id');
            $table->foreign('directory_content_id', 'directory_content_id_fk_3501157')->references('id')->on('directory_contents')->onDelete('cascade');
        });
    }
}
