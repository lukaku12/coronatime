<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidCountry extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function coronaStatistics()
	{
		return $this->hasOne(CoronaStatistics::class);
	}
}
