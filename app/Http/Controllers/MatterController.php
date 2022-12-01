<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatterResource;
use App\Interfaces\MatterRepositoryInterface;   //
use App\Models\Matter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatterController extends Controller
{
    //
    public $matterRepository;

    public function __construct(MatterRepositoryInterface $matterRepository) 
    {
        $this->matterRepository = $matterRepository;
    }
    //
    public function index()
    {
       return $this->matterRepository->getAllMatters();
    }

    public function store(Request $request)
    {
        $matter = new Matter();
        $matter->description = $request->description;
        $matter->name = $request->name;
        $matter->save();
    }

    public function show(Matter $matter)
    {

        return $this->matterRepository->getMatterById($matter);
    }

    public function update(Request $request, Matter $matter)
    {
        //
    }

    public function destroy(Matter $matter)
    {
        //
    }

    public function findName($name)
    {
       return $this->matterRepository->getMatterByName($name);
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