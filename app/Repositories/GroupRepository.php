<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\BaseRepository;

class GroupRepository extends BaseRepository
{
    public function getModel()
    {
        return new Group();
    }

    public function getAllByProffessors()                                       //probado funciona
    {
        return $this->getModel()->with(['proffessors'])->get();
    }

    public function getGroupByDescription($description)
    {
        return $this->getModel()->where('description', 'like',  '%' . $description. '%' )->get();
    }

    public function getGroupByNameDescription($search)
    {
        $groupNameDescription = $this->getModel()
            ->where('name', 'like',  '%' . $search . '%')
            ->orWhere('description', 'like',  '%' . $search . '%')
            ->orderBy('name', 'asc')->get();
        return $groupNameDescription;
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