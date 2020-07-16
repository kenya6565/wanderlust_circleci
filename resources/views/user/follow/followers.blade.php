@extends('layouts.header')
@section('title', 'followers')
    
@section('content')
    @foreach(Auth::user()->followers() as $follower)
      {{ $follower }}
    @endforeach
@endsection