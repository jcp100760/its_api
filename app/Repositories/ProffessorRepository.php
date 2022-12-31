<?php

namespace App\Repositories;

use App\Models\Proffessor;
use App\Http\Resources\ProffessorResource;
use App\Repositories\BaseRepository;

class ProffessorRepository extends BaseRepository
{
    public function getModel()
    {
        return new Proffessor();
    }

    public function getAllByMatters()                         //probado funciona
    {
         return ProffessorResource::collection(Proffessor::with(['matters'])->get());
    }

    public function getByCi($ci)
    {
        $data = $this->getModel()->where('ci', '=', $ci)->get(); 
        return $data;           //probado funciona
    }

    public function getProffessorByLastName($lastname)
    {
        $proffessorLastname = $this->getModel()->where('lastname', 'like', '%' .$lastname. '%')->get();
        return ProffessorResource::collection($proffessorLastname);
    }

    public function getProffessorByNameLastname($search)
    {
        $proffessorNameLastname = $this->getModel()
            ->where('name', 'like',  '%' .$search. '%')
            ->orWhere('lastname', 'like',  '%' .$search. '%')
            ->orderBy('name', 'asc')->get();
        return ProffessorResource::collection($proffessorNameLastname);
    }

    public function ProffessorMatterRelation()
    {
        return true;
    }

}