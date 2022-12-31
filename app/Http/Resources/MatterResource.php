<?php

namespace App\Http\Resources;
use App\Models\Matter;
use Illuminate\Http\Resources\Json\JsonResource;

class MatterResource extends JsonResource{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description, 
            'proffessors' => MatterProfResource::collection($this->whenLoaded('proffessors')),           
         ];
    }
}
