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
        Schema::table('users', function (Blueprint $table) {

            $table->renameColumn('id', 'user_id');
            $table->renameColumn('password', 'password_hash');

            $table->unsignedBigInteger('role_id')->after('password_hash');
            $table->foreign('role_id')->references('role_id')->on('roles');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->renameColumn('password_hash', 'password');
            $table->renameColumn('user_id', 'id');

        });
    }
};
