<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use User as UserRessource;
class Job extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titre' => $this->titre,
            'typeoffre' => $this->typeoffre,
            'secteuractivite' => $this->secteuractivite,
            'niveauetude' => $this->niveauetude,
            'lieu' => $this->lieu,
            'datelimite' => $this->datelimite,
            'description'=> $this->description,
            'nombreposte' => $this->nombreposte,
            'user'=> $this->user,
        ];
    }
}
