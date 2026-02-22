<?php

namespace Noor\Content\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lang;
use Noor\Content\Resources\ContentResources;
use Noor\Content\Services\SectionService;

class SectionController extends Controller
{
    protected SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    /**
     * Get home sections
     */
    public function homeContents(Request $request)
    {
        $sections = $this->sectionService->getHomeSections($request);

        if ($sections->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => Lang::get('noor.content::lang.no_sections_found') ?? 'No sections found',
                'data' => null
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => Lang::get('noor.content::lang.sections_retrieved_successfully'),
            'data' => ContentResources::collection($sections)
        ]);
    }
}
