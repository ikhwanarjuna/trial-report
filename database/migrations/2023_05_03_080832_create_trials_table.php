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
        Schema::create('trials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('document_number',30)->unique();
            $table->date('document_date')->default(now());
            $table->integer('trial_type');
            $table->string('trial_note',100)->nullable();
            $table->string('item_code',60)->nullable();
            $table->string('family_product',60)->nullable();
            $table->string('item_name',100)->nullable();
            $table->string('size',60)->nullable();
            $table->string('note',255)->nullable();
            $table->string('approval_created_by',60);
            $table->date('approval_created_date');
            $table->string('approval_plant_head_name',60);
            $table->date('approval_plant_head_date');
            $table->string('approval_ppic_name',60);
            $table->date('approval_ppic_date');
            $table->string('approval_gm_name',60);
            $table->date('approval_gm_date');
            $table->boolean('costing_approved')->default(false);
            $table->string('costing_staff_name',60);
            $table->string('costing_approval_name',60);
            $table->date('costing_approval_date');
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
        Schema::dropIfExists('trials');
    }
};
