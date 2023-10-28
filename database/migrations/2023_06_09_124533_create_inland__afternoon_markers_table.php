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
        Schema::create('inland__afternoon_markers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inland_forecast_id');
            $table->longText('afternoonDate');
            $table->longText('markerId');
            $table->longText('icontype');
            $table->longText('lat');
            $table->longText('lng');
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
        Schema::dropIfExists('inland__afternoon_markers');
    }
};
