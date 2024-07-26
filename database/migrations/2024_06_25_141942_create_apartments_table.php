<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug');
            $table->boolean('visibility')->default(0);
            $table->string('thumb');
            $table->text('description');
            $table->decimal('price', total: 7, places: 2 );
            $table->integer('number_of_room')->unsigned();
            $table->integer('number_of_bed')->unsigned();
            $table->integer('number_of_bath')->unsigned();
            $table->integer('square_meters')->unsigned();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('address');
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
        Schema::dropIfExists('apartments');
    }
};
