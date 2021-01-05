@extends('layouts.layout')
@section('content')
<h1>Editar Post</h1>
    {!! Form::model([
        'name'=>$post->name,
        'url'=>$post->image->url,
        'category_id'=>$post->category_id,
        'tags_name'=> $tags ,
        ],['route'=>['post.update',$post->id],'method'=>'PUT']) !!}
        @include('post.fragment.form')
    {!! FORM::close() !!}
@endsection