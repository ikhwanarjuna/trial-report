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
        Schema::create('acceptance__results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('criteria_id');
            $table->foreignUuid('trial_id');
            $table->string('standart',255);
            $table->string('actual',255);
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('acceptance__results');
    }
};
