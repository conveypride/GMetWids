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
        Schema::create('cafowarningmarkers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cafowarnings_id');
            $table->longText('date');
            $table->longText('markerId');
            $table->longText('icontype');
            $table->longText('lat');
            $table->longText('lng');
            $table->timestamps();
             // Define foreign key constraint
 $table->foreign('cafowarnings_id')->references('id')->on('cafowarnings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafowarningmarkers');
    }
};
