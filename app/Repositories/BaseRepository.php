<?php

namespace App\Repositories;

abstract class BaseRepository
{
    
    abstract public function getModel();

    public function getAll()                         //probado funciona
    {
        return $this->getModel()->all();
    }

    public function getById($id)
    {
        return $this->getModel()->find($id);            //probado funciona
    }

    public function delete($id)
    {
        $result = $this->getModel()->find($id);         //probado funciona
        $result->delete();
        return response()->json(
            [
                'message' => 'Registro eliminado exitosamente', 
                'code' => 200
            ]); 
    }

    public function create($request)                    //probado funciona
    {
        $this->getModel()->create($request->all());
        return response()->json([
            'message' => 'Registro creado exitosamente', 
            'code' => 200]);
    }

    public function update($id, $request)               //probado funciona
    {
        $data = $request->all();
        $result = $this->getModel()->find($id);
        $result->update($data);
        return response()->json([
            'message' => 'Registro modificado exitosamente', 
            'code' => 200]);
    }

    public function getByName($name)
    {
        // $data = $this->getModel()->where('name', 'like',  '%' . $name. '%' )->get();
        // return $data;
        return $this->getModel()->where('name', 'like',  '%' . $name. '%' )->get();
    }


}
