<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArchivedProductSubPropertiesTable extends Migration {

	public function up()
	{
		Schema::create('archived_product_sub_properties', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('sub_property_id')->unsigned();
			$table->bigInteger('product_id');
            $table->double('price');
			$table->timestamps();
			$table->softDeletes();
		});


	}

	public function down()
	{
		Schema::drop('archived_product_sub_properties');
	}
}
