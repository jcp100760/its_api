<?php

namespace App\Http\Controllers;

use App\Http\Requests\personRequest;
use App\Repositories\PersonRepository;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PersonController extends Controller
{
    protected $person;
    public $personRepository;

    public function __construct(PersonRepository $personRepository, Person $person) 
    {
        $this->personRepository = $personRepository;
        $this->person = $person;
    }
    
    public function index()
    {
       return PersonResource::collection($this->personRepository->getAll());
    }

    public function store(personRequest $request)
    {
        return $this->personRepository->create($request);
     }

    public function show(Person $person)
    {
        return PersonResource::collection($this->personRepository->getById($person));
    }

    public function update( $id, personRequest $request)
    {
        try{
           return $this->personRepository->update($id, $request);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> 'No se pudo actualizar el registro'
            ],404);
        }
    }

    public function destroy($id)
    {
        return $this->personRepository->delete($id);
    }

    public function findName($name)
    {
       return PersonResource::collection($this->personRepository->getByName($name));
    }

    public function findLastName($lastname)
    {
        $personLastname = Person::searchDescription($lastname)->get();
        return PersonResource::collection($personLastname);
    }

    public function findNameLastname($search)
    {
        $personNameLastname = Person::searchNameDescription($search)->get();
        return PersonResource::collection($personNameLastname);
    }

    
}
