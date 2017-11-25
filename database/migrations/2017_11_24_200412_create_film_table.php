<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('guid')->unique();
            $table->string('url_slug', 250)->unique();
            $table->string('name', 200);
            $table->text('description');
            $table->date('release_date');
            $table->integer('rating')->unsigned()->default(0)->nullable();
            $table->double('ticket_price')->default(0.0)->nullable();
            $table->string('country', 250);
            $table->text('genre');
            $table->string('photo', 250)->nullable()->default(null);
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
        Schema::dropIfExists('films');
    }
}
