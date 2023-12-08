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
        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->decimal("cost");
            $table->foreignId('developer_id')->constrained()->cascadeOnDelete();
            $table->decimal("commission");
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            $table->decimal("tax");
            $table->decimal("netprofit");
            $table->string("notes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};
