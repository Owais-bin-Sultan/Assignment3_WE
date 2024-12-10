<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('service_sub_service', function (Blueprint $table) {
            $table->foreignId('ServiceID')->constrained('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('SubServiceID')->constrained('sub_services')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['ServiceID', 'SubServiceID']); // Composite primary key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sub_service');
    }
};
