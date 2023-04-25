<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreignId('user_id')
            //     ->constrained('users')
            //     ->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->string('client_number')->unique();
            $table->string('client_name');
            $table->unsignedBigInteger('country_id');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            // $table->foreignId('country_id')
            //     ->nullable()
            //     ->constrained('countries')
            //     ->onDelete('SET NULL');
            $table->unsignedBigInteger('categories_id');
            // $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->longText('notes')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
