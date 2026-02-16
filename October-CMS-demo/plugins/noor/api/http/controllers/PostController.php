<?php namespace Noor\Api\Http\Controllers;

use Illuminate\Routing\Controller;
use Noor\Movies\Models\Movie;

class PostController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Movie::all()
        ]);
    }
}