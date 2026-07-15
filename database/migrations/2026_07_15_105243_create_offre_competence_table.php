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
        Schema::create('offre_competence', function (Blueprint $table) {
    $table->id();

    $table->foreignId('offre_id')
          ->constrained('offres')
          ->cascadeOnDelete();

    $table->foreignId('competence_id')
          ->constrained('competences')
          ->cascadeOnDelete();

    $table->unique(['offre_id', 'competence_id']);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offre_competence');
    }
};
