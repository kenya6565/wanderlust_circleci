@extends('layouts.app')
@section('title', 'edit')
    
@section('content')
    {{ $edit_post->title }}
    {{ $edit_post->post }}


@endsection