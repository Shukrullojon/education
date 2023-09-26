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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('type')->default(0)->comment('1 -> every day, 2 - odd days, 3 - even days');
            $table->timestamp('start_time');
            $table->unsignedBigInteger('cource_id');
            $table->unsignedBigInteger('filial_id');
            $table->tinyInteger('max_student')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 -> new group, 2 -> open group, 3 -> close group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
