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
		Schema::create('covid_countries', function (Blueprint $table) {
			$table->id();
			$table->text('country')->nullable();
			$table->text('code')->nullable();
			$table->integer('confirmed')->nullable();
			$table->integer('recovered')->nullable();
			$table->integer('critical')->nullable();
			$table->integer('deaths')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('covid_countries');
	}
};
