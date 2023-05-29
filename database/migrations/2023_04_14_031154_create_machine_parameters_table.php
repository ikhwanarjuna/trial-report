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
        Schema::create('machine_parameters', function (Blueprint $table) {
            $table->uuid('id')->primary();;
            $table->string('name',100);
            $table->decimal('parameter',10,2);
            $table->decimal('ampere',10,2);
            $table->foreignUuid('trial_machine_id');
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
        Schema::dropIfExists('machine_parameters');
    }
};
