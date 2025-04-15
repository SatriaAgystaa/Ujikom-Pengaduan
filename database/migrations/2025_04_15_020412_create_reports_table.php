<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->enum('type', ['KEJAHATAN', 'PEMBANGUNAN', 'SOSIAL']);
            $table->string('province');
            $table->string('regency');
            $table->string('subdistrict');
            $table->string('village');
            $table->text('image')->nullable();
            $table->json('voting')->nullable(); // untuk like dari user_id
            $table->enum('status', ['PROSES', 'DITOLAK', 'SELESAI'])->default('PROSES');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
