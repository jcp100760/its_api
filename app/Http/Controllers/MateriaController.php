<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Resources\MateriaResource;

class MateriaController extends Controller
{  
     public function index()
    {
        return MateriaResource::collection(Materia::all());
    }

    public function store(Request $request)
    {
        $materia = new Materia();
        $materia->description = $request->description;
        $materia->active = $request->active;
        $materia->save();
    }
  
    public function show($id)
    {
        return MateriaResource::make($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function findName($materia)
    {
        //$materiaActive = Materia::where('active', '=', $active)->get();
        $materiaActive = Materia::SearchMateria($materia)->get();
        return MateriaResource::collection($materiaActive);
    }

    public function findDescription($description)
    {
        $materiaDescription = Materia::where('description', 'like',  '%' . $description . '%')->get();
        return MateriaResource::collection($materiaDescription);
    }

    
}