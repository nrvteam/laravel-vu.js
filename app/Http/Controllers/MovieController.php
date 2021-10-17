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

    public function home(Request $request) : Response{
        $result = Movie::paginate(10);
        $validator = Validator::make($request->all(), [
            'query' => 'required|min:3|max:250'
        ]);
        if(!$validator->fails()){
            $searchTerm = $request->get('query');
            $result = Movie::where('name', 'like', "%{$searchTerm}%")
                ->orWhere('genre', 'like', "%{$searchTerm}%")
                ->paginate(10);
        }

        return response()->view('movies.index',['movies' => $result]);
    }

    public function search(Request $request): JsonResponse {
        $result = [];
        $validator = Validator::make($request->all(), [
            'query' => 'required|min:3|max:250'
        ]);
        if(!$validator->fails()){
            $searchTerm = $request->get('query');
            $result = Movie::where('name', 'like', "%{$searchTerm}%")
                ->orWhere('genre', 'like', "%{$searchTerm}%")
                ->get()
                ->toArray();
        }
        return response()->json($result);
    }
}
