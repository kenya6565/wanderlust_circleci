@extends('layouts.header')
@section('title', 'followings')
    
@section('content')
    @foreach(Auth::user()->followings() as $following_user)
      {{ $following_user }}
    @endforeach
@endsection