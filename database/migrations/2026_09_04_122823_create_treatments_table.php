<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('risk_id')
                ->constrained('risks')
                ->cascadeOnDelete();

            $table->text('solution');

            $table->string('responsable')->nullable();

            $table->date('date_limite')->nullable();

            $table->string('statut')->default('En attente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
