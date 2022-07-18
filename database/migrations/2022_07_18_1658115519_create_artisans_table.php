<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisans', function (Blueprint $table) {
            $table->id();
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('phone')->unique();
			$table->string('country')->nullable();
			$table->string('city')->nullable();
			$table->string('postal_code')->nullable();
			$table->string('address')->nullable();
			$table->boolean('is_active')->nullable()->default(true);
			$table->string('img_url')->nullable();
			$table->string('api_token');
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
        Schema::dropIfExists('artisans');

}}
