<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statistics', function (Blueprint $table) {
			$table->id();
			$table->json('country');
			$table->string('code');
			$table->integer('confirmed');
			$table->integer('recovered');
			$table->integer('critical');
			$table->integer('deaths');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('statistics');
	}
};
