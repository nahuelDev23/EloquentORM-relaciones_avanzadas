<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;

class PostController extends Controller
{
   
    public function index()
    {
        //
    }

   
    public function create()
    {
        return view('post.create');
    }

   
    public function store(Request $request)
    {
        $post = Post::create($request->except(['url']));
        $post->image()->save(Image::make(['url'=>$request->url]));
        return back()->with('success','Post Agregado con exito');
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $post = Post::find($id);
        $concat = $post;
        return view('post.edit',[
            'post' => $concat,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
