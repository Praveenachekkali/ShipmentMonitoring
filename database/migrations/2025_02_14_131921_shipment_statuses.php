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
        //
        Schema::table('shipment_statuses', function (Blueprint $table) {
            $table->dropColumn('shipment_id');
        });

        Schema::table('shipment_statuses', function (Blueprint $table) {
            $table->string('device_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('shipment_statuses', function (Blueprint $table) {
            $table->string('shipment_id')->nullable();
        });

        Schema::table('shipment_statuses', function (Blueprint $table) {
            $table->dropColumn('device_id');
        });
    }
};
