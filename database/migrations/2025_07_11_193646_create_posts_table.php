<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PostStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->id('post_id');
            $table->foreignId('author_id')->constrained('users', 'user_id');
            $table->string('title');
            $table->string('url_alias')->unique();
            $table->text('content');
            $table->enum('status', array_column(PostStatus::cases(), 'value'))
                ->default(PostStatus::UNPUBLISHED->value);
            $table->timestamp('published_at');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
