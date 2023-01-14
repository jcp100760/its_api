<?php

namespace App\Repositories;

use App\Models\Absence;
use App\Http\Resources\AbsenceResource;
use App\Repositories\BaseRepository;

class AbsenceRepository extends BaseRepository
{
    public function getModel()
    {
        return new Absence();
    }

    public function getAbsenceByDescription($description)
    {
        $absenceDescription = $this->model->where('description', 'like',  '%' . $description. '%' )->get();
        return AbsenceResource::collection($absenceDescription);
    }

    public function getAbsenceByNameDescription($search)
    {
        $absenceNameDescription = $this->model
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc');
        return AbsenceResource::collection($absenceNameDescription);
    }

}