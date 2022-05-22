<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['country'];

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['search'] ?? false,
			fn ($query, $search) => $query
			->where(
				fn ($query) => $query
				->where('country', 'like', '%' . ucwords($search) . '%')
			)
		);
	}
}
