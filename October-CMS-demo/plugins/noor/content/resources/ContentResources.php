<?php

namespace Noor\Content\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'section' => $this->section,
            'type' => $this->type,

            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => strip_tags($this->description),
            'address' => $this->address,
            'date' => $this->date,

            'file_path' => $this->file ? $this->file->path : null,
            'file_type' => $this->file ? explode('/', $this->file->content_type)[0] : null,
            'order' => $this->order,

            'children' => ContentResources::collection(
                $this->whenLoaded('childrenRecursive')
            ),
        ];
    }
}
