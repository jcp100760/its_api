<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProffessorRequest;
use App\Repositories\ProffessorRepository;
//use App\Http\Resources\ProffessorResource;
use App\Models\Proffessor;
//use App\Models\Matter;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProffessorController extends Controller
{
    protected $proffessor;
    public $proffessorRepository;

    public function __construct(ProffessorRepository $proffessorRepository, Proffessor $proffessor) 
    {
        $this->proffessorRepository = $proffessorRepository;
        $this->proffessor = $proffessor;
    }

    public function index()
    {
       //return ProffessorResource::collection($this->proffessorRepository->getAll());
       return $this->proffessorRepository->getAll();
    }
    
    public function profmat()
    {
        return $this->proffessorRepository->getAllByMatters();
        
    }

    public function store(proffessorRequest $request)
    {
        return $this->proffessorRepository->create($request);
     }

    public function show(Proffessor $proffessor)
    {
       return $this->proffessorRepository->getById($proffessor);
    }

    public function update( $id, Request $request)
    {
        try{
           return $this->proffessorRepository->update($id, $request);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> 'No se pudo actualizar el registro'
            ],404);
        }
    }

    public function destroy($id)
    {
        return $this->proffessorRepository->delete($id);
    }

    public function getCi($ci)
    {
        return $this->proffessorRepository->getByCi($ci);
    }

    public function findName($name)
    {
       return $this->proffessorRepository->getByName($name);
    }

    public function findLastName($lastname)
    {
        return $this->proffessorRepository->getProffessorByLastName($lastname);
    }

    public function findNameLastname($search)
    {
        return $this->proffessorRepository->getProffessorByNameLastname($search);
    }

    
}
