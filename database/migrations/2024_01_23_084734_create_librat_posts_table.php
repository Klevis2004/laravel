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
        Schema::create('librat_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('photo');
            $table->foreignId('category_id')
                ->nullable()
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('sasia');
            $table->timestamps();
            $table->text('summary');
            $table->integer('price');
            $table->integer('rent_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('librat_posts');
    }
};
