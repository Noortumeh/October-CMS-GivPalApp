<?php

namespace Noor\Content\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResources extends JsonResource
{
    public function toArray($request)
    {
        $modelData = parent::toArray($request);
        $locale = app()->getLocale();

        if ($locale !== 'en' && $this->relationLoaded('translations')) {
            $translation = $this->translations
                ->where('locale', $locale)
                ->first();
            
            if ($translation && $translation->attribute_data) {
                $translatedData = json_decode($translation->attribute_data, true);
                foreach ($this->resource->translatable ?? [] as $field) {
                    if (isset($translatedData[$field])) {
                        $modelData[$field] = $translatedData[$field];
                    }
                }
            }
        }

        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'section' => $this->section,
            'type' => $this->type,

            'title' => $modelData['title'] ?? $this->title,
            'subtitle' => $modelData['subtitle'] ?? $this->subtitle,
            'description' => $modelData['description'] ?? $this->description,
            'address' => $modelData['address'] ?? $this->address,
            'date' => $modelData['date'] ?? $this->date,

            'file_path' => $this->file_path,
            'file_type' => $this->file_type,
            'order' => $this->order,

            'children' => ContentResources::collection(
                $this->whenLoaded('childrenRecursive')
            ),
        ];
    }
}
