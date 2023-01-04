<?php

namespace App\Repositories;

use App\Models\Proffessor;
use App\Repositories\BaseRepository;

class ProffessorRepository extends BaseRepository
{
    public function getModel()
    {
        return new Proffessor();
    }

    public function getAllByMatters()                                       //probado funciona
    {
        return $this->getModel()->with(['matters'])->get();
    }

    public function getByCi($ci)                                            //probado funciona
    {
        $data = $this->getModel()->where('ci', '=', $ci)->get(); 
        return $data;           
    }

    public function getProffessorByLastName($lastname)
    {
        return $this->getModel()->where('lastname', 'like', '%' .$lastname. '%')->get();
    }

    public function getProffessorByNameLastname($search)
    {
        $proffessorNameLastname = $this->getModel()
            ->where('name', 'like',  '%' .$search. '%')
            ->orWhere('lastname', 'like',  '%' .$search. '%')
            ->orderBy('name', 'asc')->get();
        return $proffessorNameLastname;
    }

    public function proffessorMatterRelation($id, $request)
    {
        $matterId = $request->matterId; 
        $proffessor = $this->getModel()->find($id);
        $proffessor->matters()->attach($matterId);
        return response()->json([
                'message' => 'Registro relacionado exitosamente', 
                'code' => 200
            ]); 
    }

    public function proffessorDetachRelation($id, $request)
    {
        $matter_id = $request->matterId; 
         $proffessor = $this->getModel()->find($id);
        $proffessor->matters()->detach($matter_id);
        return response()->json([
                'message' => 'Relacion borrada exitosamente', 
                'code' => 200
            ]); 
    }

}