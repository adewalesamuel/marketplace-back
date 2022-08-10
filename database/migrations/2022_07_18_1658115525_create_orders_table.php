<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
			$table->foreignId('article_id')
			->constrained()
			->onDelete('cascade');
			$table->foreignId('client_id')
			->constrained()
			->onDelete('cascade');
			$table->integer('quantity')->nullable()->default(1);
			$table->integer('price');
			$table->enum('payment_status', ['paid', 'pending', 'canceled'])
            ->nullable()->default('pending');
			$table->string('payment_method');
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
        Schema::dropIfExists('orders');

}}
