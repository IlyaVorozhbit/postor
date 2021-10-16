<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Route;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::with('user')->paginate(15),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
