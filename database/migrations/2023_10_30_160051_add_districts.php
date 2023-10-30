<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::table('add_five_day_forecasts', function (Blueprint $table) {
            //
            $table->text('district')->nullable();
            $table->text('randomid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_five_day_forecasts', function (Blueprint $table) {
            //
        });
    }
};
