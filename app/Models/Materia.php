<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    public function scopeSearchActive($query, $active)
    {
        return $query->where('active', $active);
    }
    public function scopeSearchDescription($query, $description){
        return $query->where('description', 'like',  '%' . $description . '%');
    }
}
