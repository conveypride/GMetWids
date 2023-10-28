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
        Schema::create('inland__evening_polygons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inland_forecast_id');
            $table->longText('eveningDate');
            $table->longText('polygonId');
            $table->longText('color');
            $table->json('cordinate');
            $table->timestamps();
            
              // Define foreign key constraint
 $table->foreign('inland_forecast_id')->references('id')->on('inland_forecasts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inland__evening_polygons');
    }
};
