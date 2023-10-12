<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone', 9)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('reception_id')->nullable();
            $table->tinyInteger('is_payment')->nullable()->default(0);
            $table->tinyInteger('status')->nullable()->comment('0 -> arxive, 1->waiting, 2->active');
            $table->bigInteger('salary')->nullable();
            $table->bigInteger('kpi')->nullable();
            $table->bigInteger('hourly')->nullable();
            $table->bigInteger('add_student')->nullable();
            $table->bigInteger('active_student')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
