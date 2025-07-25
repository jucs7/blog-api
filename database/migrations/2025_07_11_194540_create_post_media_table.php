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
        Schema::create('post_media', function (Blueprint $table) {

            $table->foreignId('post_id')->constrained('posts', 'post_id');
            $table->foreignId('media_id')->constrained('media', 'media_id');
            $table->integer('order')->default(0);
            $table->primary(['post_id', 'media_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_media');
    }
};
