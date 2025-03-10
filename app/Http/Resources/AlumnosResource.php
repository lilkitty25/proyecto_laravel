<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumnosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>(string)$this->id,
            "type"=>"Alumno",
            "attributes"=>[
                "id"=>$this->id,
                "nombre"=>$this->nombre,
                "dni"=>$this->dni,
                "email"=>$this->email,
            ]


        ];
    }
}
