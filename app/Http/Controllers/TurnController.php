<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurnRequest;
use App\Repositories\TurnRepository;
use App\Http\Resources\TurnResource;
use App\Models\Turn;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class TurnController extends Controller
{
    protected $turn;
    public $turnRepository;

    public function __construct(TurnRepository $turnRepository, Turn $turn) 
    {
        $this->turnRepository = $turnRepository;
        $this->turn = $turn;
    }
    
    public function index()
    {
       return TurnResource::collection($this->turnRepository->getAll());
    }

    public function store(turnRequest $request)
    {
        return $this->turnRepository->create($request);
     }

    public function show(Turn $turn)
    {
        return TurnResource::collection($this->turnRepository->getById($turn));
    }

    public function update( $id, turnRequest $request)
    {
        try{
           return $this->turnRepository->update($id, $request);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> 'No se pudo actualizar el registro'
            ],404);
        }
    }

    public function destroy($id)
    {
        return $this->turnRepository->delete($id);
    }

    public function findName($name)
    {
       return TurnResource::collection($this->turnRepository->getByName($name));
    }

    
}
