<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('service_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_3521902')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_3521902')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
