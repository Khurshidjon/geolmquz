<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_galleries', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('slug');
	        $table->unsignedInteger('object_id');
	        $table->unsignedInteger('status');
	        $table->string('photo_filename');
            $table->string('title_uz');
            $table->string('title_en');
            $table->string('title_ru');
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
        Schema::dropIfExists('object_galleries');
    }
}
