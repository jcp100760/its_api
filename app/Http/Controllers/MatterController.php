<?php

namespace App\Http\Controllers;

use App\Http\Requests\matterRequest;
use App\Repositories\MatterRepository;
use App\Http\Resources\MatterResource;
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
       return MatterResource::collection($this->matterRepository->getAll());
    }

    public function store(matterRequest $request)
    {
        return $this->matterRepository->create($request);
     }

    public function show(Matter $matter)
    {
        return MatterResource::collection($this->matterRepository->getById($matter));
    }

    public function update( $id, matterRequest $request)
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
       return MatterResource::collection($this->matterRepository->getByName($name));
    }

    public function findDescription($description)
    {
        $matterDescription = Matter::searchDescription($description)->get();
        return MatterResource::collection($matterDescription);
    }

    public function findNameDescription($search)
    {
        $matterNameDescription = Matter::searchNameDescription($search)->get();
        return MatterResource::collection($matterNameDescription);
    }

}