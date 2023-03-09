<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function create(): View
    {

        $posts = posts::all();

        return view('dashboard',[
            'posts' => $posts
        ]);
    }
}
