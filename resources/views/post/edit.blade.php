@extends('layouts.layout')
@section('content')
<h1>Editar Post</h1>
    {!! Form::model([
        'name'=>$post->name,
        'url'=>$post->image->url,
        'tags_name'=> $tags ,
        'category_id'=>$post->category->toArray(),
        ],['route'=>['post.update',$post->id],'method'=>'PUT']) !!}
        @include('post.fragment.form')
    {!! FORM::close() !!}
@endsection