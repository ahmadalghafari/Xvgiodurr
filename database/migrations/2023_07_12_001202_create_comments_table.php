<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void{
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('posts_id')->constrained()->cascadeOnDelete();
            $table->text('text')->nullable($value = true);
            $table->string('file_path')->nullable($value = true);
            $table->string('photo_path')->nullable($value = true);
            $table->string('video_path')->nullable($value = true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
