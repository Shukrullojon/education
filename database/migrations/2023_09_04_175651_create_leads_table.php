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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('secondName');
            $table->string('surname')->nullable();
            $table->tinyInteger('gender');
            $table->timestamp('birthDate')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',9);
            $table->unsignedBigInteger('user_id');
            $table->text('comment');
            $table->unsignedBigInteger('level_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
