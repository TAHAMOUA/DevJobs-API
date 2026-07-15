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
    Schema::create('candidatures', function (Blueprint $table) {
        $table->id();

        $table->enum('statut', [
            'En attente',
            'Acceptee',
            'Refusee'
        ])->default('En attente');

        $table->date('date_candidature');

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('offre_id')
              ->constrained()
              ->onDelete('cascade');

        $table->unique(['user_id', 'offre_id']);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
