@extends('layouts.header')
@section('title', 'mypage')
    
@section('content')
    {{  Auth::user()->name }}
@endsection