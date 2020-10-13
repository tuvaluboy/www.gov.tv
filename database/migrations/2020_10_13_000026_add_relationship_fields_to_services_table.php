<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedInteger('servicessubcategory_id')->nullable();
            $table->foreign('servicessubcategory_id', 'servicessubcategory_fk_2384531')->references('id')->on('services_sub_categories');
        });
    }
}
