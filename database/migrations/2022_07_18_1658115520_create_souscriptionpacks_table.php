<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriptionPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscription_packs', function (Blueprint $table) {
            $table->id();
			$table->string('name')->unique();
			$table->text('description')->nullable();
			$table->integer('price');
			$table->integer('discount')->nullable();
			$table->string('attributes')->nullable();
			$table->integer('period');
			$table->string('img_url')->nullable();
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
        Schema::dropIfExists('souscription_packs');
    }
}
