<?php

namespace App\Http\Controllers;

use App\Http\Requests\matterRequest;
use App\Repositories\MatterRepository;
use App\Models\Matter;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class MatterController extends Controller
{
    protected $matter;
    public $matterRepository;

    public function __construct(MatterRepository $matterRepository, Matter $matter) 
    {
        $this->matterRepository = $matterRepository;
        $this->matter = $matter;
    }
    
    public function index()
    {
       return $this->matterRepository->getAll();
    }

    public function store(Request $request)
    {
        return $this->matterRepository->create($request);
     }

    public function show(Matter $matter)
    {
        return $this->matterRepository->getById($matter);
    }

    public function update($id, Request $request)
    {
        try{
           return $this->matterRepository->update($id, $request);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> 'No se pudo actualizar el registro'
            ],404);
        }
    }

    public function destroy($id)
    {
        return $this->matterRepository->delete($id);
    }

    public function findName($name)
    {
       return $this->matterRepository->getByName($name);
    }

    public function findDescription($description)
    {
        return $this->matterRepository->getMatterByDescription($description);
    }

    public function findNameDescription($search)
    {
        return $this->matterRepository->getMatterByNameDescription($search);
    }

    public function addRelation($id, Request $request)
    {
        return $this->matterRepository->matterProffessorRelation($id, $request);
    }

    public function delRelation($id, Request $request)
    {
        return $this->matterRepository->matterDetachRelation($id, $request);
    }

}