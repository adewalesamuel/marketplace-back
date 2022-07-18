<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('phone')->unique();
			$table->string('country')->nullable();
			$table->string('city')->nullable();
			$table->string('address')->nullable();
			$table->boolean('is_active')->nullable()->default(true);
			$table->string('img_url')->nullable();
			$table->string('api_token');
            $table->timestamp('email_verified_at')->nullable();
			$table->rememberToken();
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

}}
