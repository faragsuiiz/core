<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->id();
			$table->text('name');
			$table->text('description');
			$table->bigInteger('view_id')->unsigned();
			$table->text('image')->nullable();;
			$table->longText('text1')->nullable();
			$table->longText('text2')->nullable();
			$table->bigInteger('parent_id')->unsigned()->default('0');
			$table->integer('is_all')->default('0');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('category_recurring_id')->nullable()->unsigned();
			$table->unsignedBigInteger('position')->nullable();
			$table->longText('text3')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
