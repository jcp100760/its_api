<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use App\Repositories\BaseRepository;

class ProfileRepository extends BaseRepository
{
    public function getModel()
    {
        return new Profile();
    }

    public function getProfileByDescription($description)
    {
        $profileDescription = $this->getModel()->where('description', 'like',  '%' . $description. '%' )->get();
        return ProfileResource::collection($profileDescription);
    }

    public function getProfileByNameDescription($search)
    {
        $profileNameDescription = $this->getModel()
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc');
        return ProfileResource::collection($profileNameDescription);
    }

}