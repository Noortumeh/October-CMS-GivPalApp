<?php

namespace Flynsarmy\Menu\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinksResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'id_attrib' => $this->id_attrib,
            'class_attrib' => $this->class_attrib,
            'short_desc' => $this->short_desc,
            'items' => LinksItemResources::collection(
                $this->whenLoaded('items')
            ),
        ];
    }
}
