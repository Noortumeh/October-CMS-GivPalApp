<?php

namespace Flynsarmy\Menu\Controllers;

use Exception;
use Flynsarmy\Menu\Models\Menu;
use Flynsarmy\Menu\Resources\LinksResources;
use Illuminate\Routing\Controller;
use Lang;

/**
 * API controller for retrieving menus with nested items and translations.
 */
class ApiMenusController extends Controller
{
    public function getLinks()
    {
        try {
            $menus = Menu::with(['items', 'items.translations'])->get();

            return response()->json([
                'success' => true,
                'message' => Lang::get('flynsarmy.menu::lang.menus_retrieved_successfully'),
                'data'    => LinksResources::collection($menus),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?? Lang::get('flynsarmy.menu::lang.server_error'),
                'data'    => null,
            ], 500);
        }
    }
}
