<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function show(): View
    {
        return view('post');
    }

    public function create(Request $request) 
    {
        // dd('samut');
        $title = $request->input('title');
        $content = $request->input('content');
        
        $post = new posts();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route("dashboard")->with('success', 'votre post a bien été posté');


    }
}
