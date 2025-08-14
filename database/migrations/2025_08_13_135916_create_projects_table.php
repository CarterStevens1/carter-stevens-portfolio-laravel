<?php

use App\Models\User;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('url')->nullable();
            $table->string('title')->required();
            $table->string('company')->nullable();
            $table->string('description')->nullable();
            $table->string('image');
            $table->string('skills_used');
            $table->string('is_personal_project')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
