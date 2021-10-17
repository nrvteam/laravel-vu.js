<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use \App\Models\Movie;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class MovieController extends Controller
{
    /**
     * @var string
     */
    protected $table = 'movies';

    /**
     * @var int
     */
    protected $primaryKey = 'id';

    public function home() : Response{
        return response()->view('movies.index',['movies' => []]);
    }

    public function search(): JsonResponse {
        return response()->json([]);
    }
}
