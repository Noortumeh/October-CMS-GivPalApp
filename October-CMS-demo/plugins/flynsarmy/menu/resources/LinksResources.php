<?php

namespace Flynsarmy\Menu\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinksResources extends JsonResource
{
    public function toArray($request)
    {
        // Load all items for this menu as a collection
        $allItems = $this->whenLoaded('items');

        // Only show top-level items (parent_id is null or 0)
        // Each top-level item will receive the full $allItems collection
        // so it can find and nest its own children without extra DB queries
        $topLevelItems = collect($allItems)
            ->filter(fn($item) => is_null($item->parent_id) || $item->parent_id == 0)
            ->values();

        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'id_attrib'    => $this->id_attrib,
            'class_attrib' => $this->class_attrib,
            'short_desc'   => $this->short_desc,
            'items'        => $topLevelItems->map(
                fn($item) => (new LinksItemResources($item))->withAllItems($allItems)->toArray($request)
            )->values(),
        ];
    }
}
