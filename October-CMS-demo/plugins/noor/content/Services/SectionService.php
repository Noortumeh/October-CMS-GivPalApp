<?php

namespace Noor\Content\Services;

use Illuminate\Http\Request;
use Noor\Content\Models\Section;
// use Noor\Content\Resources\ContentResources;

class SectionService
{
    /**
     * Get all active sections with translations and children
     *
     * @param string|null $locale
     * @return \Illuminate\Support\Collection
     */
    public function getHomeSections(Request $request)
    {
        // $locale = $request?->locale;

        // app()->setLocale($locale);

        $sections = Section::where('active', 1)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->with(['translations', 'childrenRecursive'])
            ->get();

        return $sections;
    }
}
