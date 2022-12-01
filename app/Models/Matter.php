<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Builder;

class Matter extends Model
{
    use HasFactory;

    public function scopeSearchName($query, $name)
    {
        return $query->where('name', 'like',  '%' . $name. '%' );
    }

    public function scopeSearchDescription($query, $description){
        return $query->where('description', 'like',  '%' . $description . '%');
    }

    public function scopeSearchNameDescription($query, $search){
        return $query->where('name', 'like',  '%' . $search . '%')
        ->orWhere('description', 'like',  '%' . $search . '%')
        ->orderBy('name', 'asc');
    }

}
