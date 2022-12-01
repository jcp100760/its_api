<?php

namespace App\Repositories;

use App\Interfaces\MatterRepositoryInterface;
use App\Http\Resources\MatterResource;
use App\Models\Matter;

class MatterRepository implements MatterRepositoryInterface 

{
    public function getAllMatters()
    {
        return MatterResource::collection(Matter::all());
    }

    public function getMatterById($matterId)
    {

        return MatterResource::make($matterId); 
    }

    public function getMatterByName($name)
    {
        $matterName = Matter::searchName($name)->get();
        return MatterResource::collection($matterName);
    }

}