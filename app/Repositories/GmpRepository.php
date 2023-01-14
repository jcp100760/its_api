<?php

namespace App\Repositories;

use App\Models\Gmp;
use App\Http\Resources\GmpResource;
use App\Repositories\BaseRepository;

class GmpRepository extends BaseRepository
{
    public function getModel()
    {
        return new Gmp();
    }

    public function getGmpByDescription($description)
    {
        $gmpDescription = $this->getModel()->where('description', 'like',  '%' . $description. '%' )->get();
        return GmpResource::collection($gmpDescription);
    }

    public function getGmpByNameDescription($search)
    {
        $gmpNameDescription = $this->getModel()
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc');
        return GmpResource::collection($gmpNameDescription);
    }

}