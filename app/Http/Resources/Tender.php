<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tender extends JsonResource
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
            'data' => [
                'tender_id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'updated_at' => $this->updated_at,
            ], 
            'links' => [
                'self' => $this->path()
            ]
        ];
    }
}
