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
        Schema::create('salaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->foreignId('assurance_id')->constrained()->onDelete('cascade');
            $table->decimal('salaire_brut', 10, 2);
            $table->decimal('salaire_net', 10, 2);
            $table->decimal('cotisations_employe', 10, 2)->default(0);
            $table->decimal('cotisations_employeur', 10, 2)->default(0);
            $table->date('mois');
            $table->date('date_paiement');
            $table->string('mode_paiement');
            $table->string('reference_paiement')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaires');
    }
};
