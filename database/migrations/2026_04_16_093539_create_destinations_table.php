<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->string('cover_image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price_person', 8, 2)->nullable();
            $table->integer('duration')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
