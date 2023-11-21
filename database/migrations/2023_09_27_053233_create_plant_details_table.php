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
        Schema::create('plant_details', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->integer("nooftrees");
            $table->string("name");
            $table->string("occasion");
            $table->unsignedBigInteger("location_id");
            $table->timestamps();
            $table->foreign("location_id")->references("id")->on("locations");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_details');
    }
};
