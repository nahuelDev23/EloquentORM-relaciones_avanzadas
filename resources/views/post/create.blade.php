@extends('layouts.layout')
@section('content')
<h1>Nuevo Post</h1>
@if (session()->has('success'))
    {{ session('success') }}
@endif
    {!! Form::open(['route' => 'post.store']) !!}
        @include('post.fragment.form')
    {!! Form::close() !!}
@endsection