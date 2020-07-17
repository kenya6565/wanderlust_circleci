@extends('layouts.header')
@section('title', 'followings')
    
@section('content')
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
    @foreach($following_users as $following_user)
        <div class="card">
            <div class="card-haeder p-3 w-100 d-flex">
                <img src="{{ $following_user->user_icon_image }}" class="rounded-circle" width="50" height="50">
                <div class="ml-2 d-flex flex-column">
                    <a href="" class="text-secondary">{{ $following_user->id }}</a>
                    <p class="mb-0">{{ $following_user->name }}</p>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection