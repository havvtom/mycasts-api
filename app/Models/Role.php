<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Role extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany( Role::class );
    }
}