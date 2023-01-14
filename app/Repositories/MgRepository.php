<?php

namespace App\Repositories;

use App\Models\Mg;
use App\Http\Resources\MgResource;
use App\Repositories\BaseRepository;

class MgRepository extends BaseRepository
{
    public function getModel()
    {
        return new Mg();
    }

    public function getMgByDescription($description)
    {
        $mgDescription = $this->getModel()->where('description', 'like',  '%' . $description. '%' )->get();
        return MgResource::collection($mgDescription);
    }

    public function getMgByNameDescription($search)
    {
        $mgNameDescription = $this->getModel()
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc');
        return MgResource::collection($mgNameDescription);
    }

}