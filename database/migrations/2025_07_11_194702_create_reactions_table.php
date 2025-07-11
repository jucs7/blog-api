<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TargetType;
use App\Enums\ReactionType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reactions', function (Blueprint $table) {

            $table->id('reaction_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->unsignedBigInteger('target_id');
            $table->enum('target_type', array_column(TargetType::cases(), 'value'));
            $table->enum('reaction_type', array_column(ReactionType::cases(), 'value'));
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
