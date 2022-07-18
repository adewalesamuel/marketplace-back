<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('souscription_pack_id')
			->constrained()
			->onDelete('cascade');
			$table->foreignId('artisan_id')
			->constrained()
			->onDelete('cascade');
			$table->enum('payment_status', ['pending', 'paid', 'canceled'])->nullable();
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
        Schema::dropIfExists('souscriptions');

}}
