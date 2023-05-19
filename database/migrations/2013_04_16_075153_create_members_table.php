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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 255)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('type', 9)->nullable();
            $table->boolean('is_board')->default(0);
            $table->boolean('is_company')->default(0);
            $table->dateTime('last_reminder_sent_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
