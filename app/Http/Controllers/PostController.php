<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create', [
            'posts' => Post::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());
        return back();
    }
}
