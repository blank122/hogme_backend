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
        Schema::create('livestocks_record', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->enum('status',['Release', 'Monitoring']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('livestock_type_id');
            $table->foreign('livestock_type_id')->references('id')->on('livestock_types');
            $table->dateTime('date_release');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks_record');
    }
};
