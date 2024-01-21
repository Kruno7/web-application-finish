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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('contact');
            $table->float('price', 8, 2);
            $table->integer('square_meter');
            $table->text('description');
            $table->integer('floor');
            $table->integer('year_of_construction');
            $table->enum('type', ['garsonjera', 'jednosoban', 'dvosoban', 'trosoban']);
            $table->enum('state', ['novogradnja', 'starogradnja', 'renoviran']);
            $table->boolean('balcony')->default(0);
            $table->boolean('internet')->default(0);
            $table->boolean('climate')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean('cable_tv')->default(0);
            $table->boolean('furnished')->default(0);
            $table->boolean('pets')->default(0);
            $table->boolean('parking')->default(0);
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities'); //->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); //->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
