<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToServicesSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('services_sub_categories', function (Blueprint $table) {
            $table->unsignedInteger('servicescategory_id')->nullable();
            $table->foreign('servicescategory_id', 'servicescategory_fk_2384426')->references('id')->on('service_categories');
        });
    }
}
