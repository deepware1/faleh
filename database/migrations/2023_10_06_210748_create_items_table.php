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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("title");
            $table->string('slug');
            $table->text("description");
            $table->decimal("price", 12, 2);
            $table->string('featured_image')->nullable();
            $table->string('status')->default('publish');
            $table->dateTime('published_at')->nullable();
            $table->foreignId("category_id");
            $table->foreignId("subcategory_id")->nullable();
            $table->foreignId("currency_id");
            $table->foreignId("country_id");
            $table->foreignId("city_id");
            $table->string("contact_number")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete();
            $table->foreign("subcategory_id")->references("id")->on("categories")->cascadeOnDelete();
            $table->foreign("currency_id")->references("id")->on("currencies")->cascadeOnDelete();
            $table->foreign("country_id")->references("id")->on("countries")->cascadeOnDelete();
            $table->foreign("city_id")->references("id")->on("cities")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
