<?php

namespace App\Http\Resources;
use App\Models\Proffessor;
use Illuminate\Http\Resources\Json\JsonResource;

class ProffessorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'ci' => $this->ci,
            'active' => $this->active,
            'matters' => MatterProfResource::collection($this->whenLoaded('matters')),            
         ];
    }
}
