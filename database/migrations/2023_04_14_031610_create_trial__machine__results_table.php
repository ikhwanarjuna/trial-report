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
        Schema::create('trial__machine__results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('trial_machine_id');
            $table->decimal('result_per_shift_in_kg',10,2);
            $table->decimal('waste_in_kg',10,2);
            $table->decimal('waste_target_in_percent',10,2);
            $table->decimal('ampere',10,2);
            $table->string('operator_number',255);
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
        Schema::dropIfExists('trial__machine__results');
    }
};
