<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boost_packs', function (Blueprint $table) {
            $table->id();
			$table->string('name')->unique();
			$table->text('description')->nullable();
			$table->integer('price');
			$table->integer('discount')->nullable();
			$table->string('img_url')->nullable();
			$table->integer('period');
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
        Schema::dropIfExists('boost_packs');

}}
