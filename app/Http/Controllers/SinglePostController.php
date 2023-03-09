<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SinglePostController extends Controller
{

    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function show($id):View
    {
        $singlePost = posts::find($id);

        return view('singlePost', [
            'post' => $singlePost
        ]);
    }


    public function destroy($id)
    {
        $post = posts::find($id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'votre post a bien été supprimé');
    }
}
