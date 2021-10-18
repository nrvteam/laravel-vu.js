<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $isAdmin = $this->isAdmin($user);
        $movies = $user->movies()->paginate(10);
        return view('home', [
            'is_admin' => $isAdmin,
            'movies' => $movies
        ]);
    }

    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
     * @return bool
     */
    private function isAdmin(?\Illuminate\Contracts\Auth\Authenticatable $user): bool
    {
        $isAdmin = false;
        foreach ($user->role as $role) {
            if ($role->name == 'admin') {
                $isAdmin = true;
            }
        }
        return $isAdmin;
    }
}
