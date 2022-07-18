<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewss', function (Blueprint $table) {
            $table->id();
			$table->foreignId('client_id')
			->constrained()
			->onDelete('cascade');
			$table->foreignId('artisan_id')
			->constrained()
			->onDelete('cascade');
			$table->text('message')->nullable();
			$table->integer('score');
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
        Schema::dropIfExists('reviewss');

}}
