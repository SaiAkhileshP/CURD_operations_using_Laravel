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
        Schema::create('samples', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->integer('age')->default(null);
            $table->string('email')->unique();
            $table->text(column: 'description');
            $table->boolean('is_active');
            $table->enum('gender',['male','female','other']);
            $table->set('role',['admin','user','guest'])->default('user');
            $table->string('profile_picture',500)->nullable();
            $table->json('preferences')->nullable(); #for checkbox
            $table->enum('status',['active','inactive','suspended'])->default('active'); #radio buttons
            $table->foreignId('user_id')->nullable()->constrained('users');
            // $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
