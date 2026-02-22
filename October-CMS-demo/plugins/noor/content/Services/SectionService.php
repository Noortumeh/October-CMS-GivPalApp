<?php

namespace Noor\Content\Services;

use Illuminate\Http\Request;
use Noor\Content\Models\Section;

class SectionService
{
    /**
     * Get all active sections with translations and children
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getHomeSections()
    {
        $sections = Section::where('active', 1)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->with(['childrenRecursive'])
            ->get();

        return $sections;
    }
}
