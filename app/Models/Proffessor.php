<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proffessor extends Model
{
    use HasFactory;
    //protected $with = ['matters'];
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
        //Matter::class, 'specialty','matterId','proffessorId'
        return $this->belongsToMany(Matter::class,'specialty', 'proffessorId','matterId' );
    }
}
