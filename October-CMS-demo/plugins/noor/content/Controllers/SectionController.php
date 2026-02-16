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
        // $locale = $request->locale;
        // return $locale;
        $sections = $this->sectionService->getHomeSections($request);
        // echo(ContentResources::collection($sections));
        return ContentResources::collection($sections);
    }
}
