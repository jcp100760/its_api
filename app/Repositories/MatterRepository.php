<?php

namespace App\Repositories;

use App\Models\Matter;
use App\Http\Resources\MatterResource;
use App\Repositories\BaseRepository;

class MatterRepository extends BaseRepository
{
    public function getModel()
    {
        return new Matter();
    }

    public function getAll()                         //probado funciona
    {
         return MatterResource::collection(Matter::with(['proffessors'])->get());
    }

    public function getMatterByDescription($description)
    {
        $matterDescription = $this->getModel()->where('description', 'like',  '%' . $description. '%' )->get();
        return MatterResource::collection($matterDescription);
    }

    public function getMatterByNameDescription($search)
    {
        $matterNameDescription = $this->getModel()
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc')->get();
        return MatterResource::collection($matterNameDescription);
    }

}