<?php

namespace Flynsarmy\Menu\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinksItemResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'url' => $this->url,
            'data' => $this->data,
            'title_attrib' => $this->title_attrib,
            'id_attrib' => $this->id_attrib,
            'class_attrib' => $this->class_attrib,
            'selected_item_id' => $this->selected_item_id,
        ];
    }
}
