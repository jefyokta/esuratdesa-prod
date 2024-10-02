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
        Schema::create("sub_village", function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

        });
        Schema::create("village_manager", function (Blueprint $table) {

            $table->id();
            $table->string("name");
            $table->string("role");
            $table->longText("sign");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("sub_village");
    }
};
