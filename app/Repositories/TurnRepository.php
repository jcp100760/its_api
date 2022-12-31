<?php

namespace App\Repositories;

use App\Models\Turn;
use App\Http\Resources\TurnResource;
use App\Repositories\BaseRepository;

class TurnRepository extends BaseRepository
{
    public function getModel()
    {
        return new Turn();
    }

}

