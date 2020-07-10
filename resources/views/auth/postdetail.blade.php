@extends('layouts.header')
@section('title', 'postdetail')
    
@section('content')
    {{ $post->post }}
@endsection
