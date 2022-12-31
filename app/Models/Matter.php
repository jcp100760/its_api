<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Matter extends Model
{
    use HasFactory;
    protected $table = 'matter';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function Proffessors()
    {
        return $this->belongsToMany(Proffessor::class,'specialty', 'matterId','proffessorId' );
    }

}
