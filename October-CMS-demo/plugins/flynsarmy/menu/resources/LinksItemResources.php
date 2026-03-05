<?php

namespace Flynsarmy\Menu\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class LinksItemResources extends JsonResource
{
    /**
     * The full flat list of all items in the menu.
     * Used to find children without extra DB queries.
     *
     * @var Collection|null
     */
    protected ?Collection $allItems = null;

    /**
     * Pass the full item collection for child resolution.
     */
    public function withAllItems($allItems): static
    {
        $this->allItems = collect($allItems);
        return $this;
    }

    public function toArray($request)
    {
        // Find direct children of this item from the already-loaded collection
        $children = $this->allItems
            ? $this->allItems
                ->filter(fn($item) => (int) $item->parent_id === (int) $this->id)
                ->values()
                ->map(fn($child) => (new self($child))->withAllItems($this->allItems)->toArray($request))
                ->values()
            : collect();

        return [
            'id'               => $this->id,
            'label'            => $this->label,
            'url'              => $this->url,
            'title_attrib'     => $this->title_attrib,
            'id_attrib'        => $this->id_attrib,
            'class_attrib'     => $this->class_attrib,
            'target_attrib'    => $this->target_attrib,
            'selected_item_id' => $this->selected_item_id,
            'data'             => $this->data,
            'children'         => $children,
        ];
    }
}
