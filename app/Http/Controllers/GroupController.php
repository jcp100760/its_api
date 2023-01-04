<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Repositories\GroupRepository;
use App\Models\Group;
use App\Models\Matter;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class GroupController extends Controller
{
    protected $group;
    public $groupRepository;

    public function __construct(GroupRepository $groupRepository, Group $group) 
    {
        $this->groupRepository = $groupRepository;
        $this->group = $group;
    }

    public function index()
    {
       return $this->groupRepository->getAll();
    }
    
    // public function profmat()
    // {
    //     return $this->groupRepository->getAllByMatters();
        
    // }

    public function store(groupRequest $request)
    {
        return $this->groupRepository->create($request);
     }

    public function show(Group $group)
    {
       return $this->groupRepository->getById($group);
    }

    public function update( $id, Request $request)
    {
        try{
           return $this->groupRepository->update($id, $request);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> 'No se pudo actualizar el registro'
            ],404);
        }
    }

    public function destroy($id)
    {
        return $this->groupRepository->delete($id);
    }

    // public function getCi($ci)
    // {
    //     return $this->groupRepository->getByCi($ci);
    // }

    public function findName($name)
    {
       return $this->groupRepository->getByName($name);
    }

    public function findLastName($lastname)
    {
        return $this->groupRepository->getGroupByDescription($lastname);
    }

    public function findNameDescription($search)
    {
        return $this->groupRepository->getGroupByNameDescription($search);
    }

    public function addRelation($id, Request $request)
    {
        return $this->groupRepository->groupMatterRelation($id, $request);
    }

    public function delRelation($id, Request $request)
    {
        return $this->groupRepository->groupDetachRelation($id, $request);
    }
}