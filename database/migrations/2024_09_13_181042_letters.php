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
        Schema::create("letters", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("resident_id");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("issued_by")->nullable();
            $table->string("needed_for");
            $table->string("number")->nullable();
            $table->string("details")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
