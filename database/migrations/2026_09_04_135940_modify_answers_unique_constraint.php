<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'question_id']);

            $table->unique([
                'user_id',
                'question_id',
                'evaluation_id'
            ]);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

            $table->dropUnique([
                'user_id',
                'question_id',
                'evaluation_id'
            ]);

            $table->unique([
                'user_id',
                'question_id'
            ]);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }
};
