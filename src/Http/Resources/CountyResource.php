<?php

namespace Mortezaa97\Regions\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'province_id'=>$this->whenLoaded('province', ProvinceResource::make($this->province)),
            'lat'=>$this->lat,
            'long'=>$this->long,
            'image'=>$this->image,
        ];
    }
}
