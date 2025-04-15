php artisan make:migration create_response_progress
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
        Schema::create('response_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->text('description');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_progress');
    }
};

