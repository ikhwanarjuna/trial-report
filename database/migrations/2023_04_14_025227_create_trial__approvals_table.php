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
        Schema::create('trial__approvals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('trial_id');
            $table->foreignUuid('process_id');
            $table->date('transaction_date');
            $table->string('shift',20);
            $table->string('machine_number',30);
            $table->integer('duration');
            $table->foreignUuid('approve_by');
            $table->date('approve_date');
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
        Schema::dropIfExists('trial__approvals');
    }
};
