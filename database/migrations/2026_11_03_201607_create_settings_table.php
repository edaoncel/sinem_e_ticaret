<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('gender')->nullable(); // or whatever data type you need
    });
}

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
