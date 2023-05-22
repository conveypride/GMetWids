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
        Schema::create('evening_polygons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('add_daily_forecast_id');
            $table->longText('eveningDate');
            $table->longText('polygonId');
            $table->longText('color');
            $table->json('cordinate');
            $table->timestamps();
 // Define foreign key constraint
 $table->foreign('add_daily_forecast_id')->references('id')->on('add_daily_forecasts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evening_polygons');
    }
};
