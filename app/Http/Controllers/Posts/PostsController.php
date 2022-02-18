<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller{
    public function index (){
        return view('posts.index', [
            'posts' => Post::get()
        ]);
    }
    public function create (){
        return view('posts.create');
    }
    public function save (Request $request){
        try{
            Post::create($request->except(['_token']));
            return redirect()->route('posts.index')->with('success', 'You have created new Post !');
        }catch (\Exception $e){
            return back()->with('error', 'An error occurred, please try again !');
        }
    }
    public function preview($id){
        return view('posts.create', [
            'post' => Post::find($id),
            'preview' => true
        ]);
    }
}
