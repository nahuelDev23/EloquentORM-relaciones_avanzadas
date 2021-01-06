<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::pluck('name','id');
        return view('post.create',[
            'categories' => $categories,
            
        ]);
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
         * implode(', ',$post->tags); dice que esperea un array 
         * y recibe Illuminate\Database\Eloquent\Collection (por la relacion)
         * que tiene post con tags, entonces creo un array limpio y a ese nuevo
         * array le puedo hacer el implode, que despues mando a la vista.
         */
        if(!empty($post->tags))
        {
            foreach($post->tags as $tag)
            {
                $tags[] = $tag->name;
              
            };
    
            $tags = implode(', ',$tags);
        }else {
            $tags[]='';
        }
        $categories = $post->category::pluck('name','id');
        return view('post.edit',[
            'post' => $post,
            'tags' => $tags,

            /**
             * Le mando categories a edit.blade.php
             * entonces $categories en el form incluido no es null
             * y a su vez le paso la referencia de 'category_id'
             * desde Form:model() $post->category->toArray();
             */
            'categories' => $categories,
            
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->name = $request->name;
        $post->category_id = empty($request->category_id) ? $post->category_id : $request->category_id;
        $post->update($request->except(['url','tags_name']));

    }

  
    public function destroy($id)
    {
        //
    }
}
