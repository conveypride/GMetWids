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
        Schema::table('inland_forecasts', function (Blueprint $table) {
            //
            $table->text('i24hoursurfacewind');
            $table->text('i24hourvisibility');
            $table->text('i24hourtemp');
            $table->text('i48hoursurfacewind');
            $table->text('i48hourvisibility');
            $table->text('i48hourtemp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inland_forecasts', function (Blueprint $table) {
            //
        });
    }
};
