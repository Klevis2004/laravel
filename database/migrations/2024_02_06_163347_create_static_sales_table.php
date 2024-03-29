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
        Schema::create('static_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->nullable()
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('book_id')
            ->nullable()
            ->references('id')->on('librat_posts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('sasia');
            $table->integer('payment_status')->default(0);
            $table->integer('bill')->default(0);
            $table->dateTime('data_blerjes')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_sales');
    }
};
