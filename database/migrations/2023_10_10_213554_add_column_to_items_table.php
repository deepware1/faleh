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
        Schema::table('items', function (Blueprint $table) {
            $table->string('type')->after('status'); 
            $table->string('stock')->after('type');
            $table->string('condition')->after('stock');
            $table->string('section')->after('condition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn("type");
            $table->dropColumn("stock");
            $table->dropColumn("condition");
            $table->dropColumn("section");
        });
    }
};
