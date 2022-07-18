<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boosts', function (Blueprint $table) {
            $table->id();
			$table->foreignId('boost_pack_id')
			->constrained()
			->onDelete('cascade');
			$table->foreignId('artisan_id')
			->constrained()
			->onDelete('cascade');
			$table->enum('payment_status', ['paid', 'pending', 'canceled'])->nullable()->default('pending');
			$table->string('payment_method')->nullable();
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
        Schema::dropIfExists('boosts');

}}
