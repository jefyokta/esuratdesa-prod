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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger("nik")->unique();
            $table->string("born_in");
            $table->date("birthday");
            $table->enum("gender", ["male", 'female']);
            $table->string("religion");
            $table->string("dusun");
            $table->string("rt");
            $table->string("rw");
            $table->bigInteger("no_kk");
            $table->string("status");
            $table->string("status_in_family");
            $table->string("father_name");
            $table->string("father_job");
            $table->date("father_birthday");
            $table->string("mother_name");
            $table->string("job");
            $table->string("last_study");
            $table->string("current_study")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
