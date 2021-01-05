@extends('layouts.layout')
@section('content')
{{$post}}
<h1>Editar Post</h1>
    {!! Form::model([
        'name'=>$post->name,
        'url'=>$post->image->url,
        'category_id'=>$post->category_id,
        ],['route'=>['post.update',$post->id],'method'=>'PUT']) !!}
        @include('post.fragment.form')
    {!! FORM::close() !!}
@endsection