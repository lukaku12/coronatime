<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CoronaStatistics extends Model
{
	use HasFactory, HasTranslations;

	protected $guarded = [];

	public $translatable = ['name'];

	public function covidCountry()
	{
		return $this->hasOne(CovidCountry::class);
	}
}
