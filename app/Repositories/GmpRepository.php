<?php

namespace App\Repositories\Matter;

use App\Models\Matter;
use App\Http\Resources\MatterResource;
use App\Repositories\BaseRepository;

class MatterRepository extends BaseRepository
{
    public function getModel()
    {
        return new Matter();
    }

    public function getMatterByDescription($description)
    {
        $matterDescription = $this->model->where('description', 'like',  '%' . $description. '%' )->get();
        return MatterResource::collection($matterDescription);
    }

    public function getMatterByNameDescription($search)
    {
        $matterNameDescription = $this->model
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc');
        return MatterResource::collection($matterNameDescription);
    }

}