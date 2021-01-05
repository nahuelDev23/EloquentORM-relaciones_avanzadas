<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Models\Tag;

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
        $tags_name = explode(',',$request->tags_name); # creo un array por cada elemento que esta separado por una ","
       
        $post = Post::create($request->except(['url'])); # agrego todos los datos, menos la url, ya que la tabla post no tiene una columna con el capo 'url' y daria error

        foreach($tags_name as $tag_name)
        {
            $post->tags()->save(Tag::make(['name'=>$tag_name]));
        }
        
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

        /**
         * Tengo que hacer esto porque 
         * $post->tags devuelve collective instance en implode(', ',tags)
         */
        foreach($post->tags as $tag)
        {
            $tags[] = $tag->name;
          
        };

        $tags = implode(', ',$tags);

        return view('post.edit',[
            'post' => $post,
            'tags' => $tags
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
