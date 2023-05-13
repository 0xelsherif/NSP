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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('invoice_number', 20);
            $table->date('invoice_Date')->nullable();
            $table->date('collect_date')->nullable();
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('project_id');
            $table->decimal('price',8,2);
            $table->decimal('vat',8,2);
            $table->decimal('total',8,2);
            $table->integer('status')->default(1);
            $table->integer('value_Status')->default(1);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
