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
        Schema::create('trial__materials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('trial_id');
            $table->string('item_code',60);
            $table->string('item_name',60);
            $table->float('qty_zack',10,2);
            $table->float('qty_kg',10,1);
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
        Schema::dropIfExists('trial__materials');
    }
};
