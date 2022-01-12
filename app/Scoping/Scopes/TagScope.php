<?php 

namespace App\Scoping\Scopes;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class TagScope implements Scope
{
	public function apply( Builder $builder, $value )
	{
		return $builder->whereHas('tags', function ($builder) use ($value){
			$builder->where('slug', $value);
		});
	}

}