<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawlers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title' , 400);
            $table->string('description');
            $table->string('date');
            $table->string('source');
            $table->string('url');
            $table->string('prefix');
            $table->string('image');
            $table->string('alt');
            $table->string('category');
            $table->string('links_pattern');
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
        Schema::dropIfExists('crawlers');
    }
}
