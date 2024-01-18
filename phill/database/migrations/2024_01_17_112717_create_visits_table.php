<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('arrival');
            $table->string('input');
            $table->string('output');
            $table->unsignedBigInteger('enterprise_client_id');
            $table->unsignedBigInteger('enterprise_partner_id');
            $table->unsignedBigInteger('operation_id');
            $table->string('nfs');
            $table->string('comment');
            $table->timestamps();
        });

        Schema::table('visits', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('enterprise_client_id')->references('id')->on('enterprises');
            $table->foreign('enterprise_partner_id')->references('id')->on('enterprises');
            $table->foreign('operation_id')->references('id')->on('operations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
