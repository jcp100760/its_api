<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proffessor extends Model
{
    use HasFactory;

    protected $table = 'proffessor';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'lastname',
        'ci',
        'active'
    ];

    public function matters()
    {
        return $this->belongsToMany(Matter::class,'specialty', 'proffessorId','matterId' );
    }
}
