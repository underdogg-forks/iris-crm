<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateservicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name');
            $table->boolean('is_active');
            $table->string('category');
            $table->string('sale_unit');
            $table->decimal('ht_price');
            $table->decimal('ttc_price');
            $table->timestamp('sale_datestart');
            $table->timestamp('sale_dateend');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
