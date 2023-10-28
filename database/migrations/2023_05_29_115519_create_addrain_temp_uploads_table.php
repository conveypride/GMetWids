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
        Schema::create('addrain_temp_uploads', function (Blueprint $table) {
            $table->id();
            $table->text('imagId');
            $table->text('filename');
            $table->text('url');
            $table->text('forecaster');
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
        Schema::dropIfExists('addrain_temp_uploads');
    }
};
