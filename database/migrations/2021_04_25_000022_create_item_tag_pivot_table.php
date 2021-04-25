<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('item_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id', 'item_id_fk_3521901')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_3521901')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
