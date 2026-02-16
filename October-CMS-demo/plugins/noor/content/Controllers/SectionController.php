<?php
namespace Noor\Content\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        return ContentResources::collection($sections);
    }
}
