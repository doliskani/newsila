<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('domain');
            $table->string('source');
            $table->string('lang');
            $table->string('urls');
            $table->string('images');
            $table->string('allowed');
            $table->string('domain_added');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_addresses');
    }
}
