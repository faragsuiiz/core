<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesRecurringTable extends Migration {

	public function up()
	{
		Schema::create('categories_recurring', function(Blueprint $table) {
			$table->id();
			$table->longText('name');
			$table->bigInteger('parent_id');
			$table->longText('description')->nullable();
			$table->BigInteger('view_id')->unsigned()->nullable();
			$table->text('image')->nullable();
			$table->longText('text1')->nullable();
			$table->longText('text2')->nullable();
            $table->bigInteger('position')->nullable();
			$table->integer('is_all')->default('0');
			$table->bigInteger('category_type_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});

	}

	public function down()
	{
		Schema::drop('categories_recurring');
	}
}
