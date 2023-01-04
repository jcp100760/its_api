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

    public function getAllByProffessors()                                       //probado funciona
    {
        return $this->getModel()->with(['proffessors'])->get();
    }

    public function getMatterByDescription($description)
    {
        return $this->getModel()->where('description', 'like',  '%' . $description. '%' )->get();
    }

    public function getMatterByNameDescription($search)
    {
        $matterNameDescription = $this->getModel()
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc')->get();
        return $matterNameDescription;
    }

    public function matterProffessorRelation($id, $request)
    {
        $proffessorId = $request->proffessorId; 
        $matter = $this->getModel()->find($id);
        $matter->proffessors()->attach($proffessorId);
        return response()->json([
                'message' => 'Registro relacionado exitosamente', 
                'code' => 200
            ]); 
    }

    public function matterDetachRelation($id, $request)
    {
        $proffessorId = $request->proffessorId; 
         $matter = $this->getModel()->find($id);
        $matter->proffessors()->detach($proffessorId);
        return response()->json([
                'message' => 'Relacion borrada exitosamente', 
                'code' => 200
            ]); 
    }

}