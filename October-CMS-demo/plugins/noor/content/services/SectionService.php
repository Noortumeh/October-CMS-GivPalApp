<?php

namespace Noor\Content\Services;

use Exception;
use Illuminate\Http\Request;
use Lang;
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
        try {
            $sections = Section::where('active', 1)
                ->whereNull('parent_id')
                ->orderBy('order')
                ->with(['childrenRecursive'])
                ->get();

            return $sections;
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?? Lang::get('noor.content::lang.server_error'),
                'data' => null
            ], 500);
        }
    }
}
