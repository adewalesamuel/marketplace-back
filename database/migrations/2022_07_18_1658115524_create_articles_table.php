<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('description')->nullable();
			$table->enum('type', ['product', 'service']);
			$table->integer('quantity')->nullable()->default(1);
			$table->integer('price');
			$table->integer('discount')->nullable();
			$table->foreignId('artisan_id')
			->constrained()
			->onDelete('cascade');
			$table->foreignId('category_id')
			->constrained()
			->onDelete('cascade');
			$table->string('attributes')->nullable();
			$table->json('img_urls')->nullable();
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
        Schema::dropIfExists('articles');

}}
