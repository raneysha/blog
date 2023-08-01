<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::with(['user', 'category'])->latest();
        if (request('search')){
            $posts->where('title', 'like', '%' . request('search') . '%');
        }
        return view('posts', [
            "title" => "Timeline",
            "posts" => $posts->paginate(7)->withQueryString(),
            "header1" => "All Posts"
        ]);
    }
    public function show(post $post)
    {
        return view('post', [
            "title" => "Timeline",
            "post" => $post
        ]);
    }
}
