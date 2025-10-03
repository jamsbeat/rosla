<?php

use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Consultation;
use App\Models\UserType;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('service_id')->constrained('services');
            $table->unsignedInteger('user_id')->nullable()->constrained('users');
            $table->string('address')->nullable();
            $table->string('info')->nullable();
            $table->dateTime('scheduled_at')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
