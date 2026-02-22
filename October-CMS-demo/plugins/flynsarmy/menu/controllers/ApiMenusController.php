<?php

namespace Flynsarmy\Menu\Controllers;

use Backend\Classes\Controller;
use Flynsarmy\Menu\Models\Menu;
use Flynsarmy\Menu\Resources\LinksResources;

/**
 * Channels Back-end Controller
 */
class ApiMenusController extends Controller
{
    public function getLinks()
    {
        $menus = Menu::with('items')->get();

        return response()->json([
            'success' => true,
            'message' => 'Menus retrieved successfully',
            'data' => LinksResources::collection($menus)
        ]);
    }
}
