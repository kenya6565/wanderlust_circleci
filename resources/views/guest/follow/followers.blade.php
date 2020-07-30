@extends('layouts.app')
@section('title', 'followers')
    
@section('content')
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
    @foreach($followers as $follower)
        <div class="card">
            <div class="card-haeder p-3 w-100 d-flex">
                <img src="{{ $follower->user_icon_image }}" class="rounded-circle" width="50" height="50">
                <div class="ml-2 d-flex flex-column">
                    <a href="{{ action('Guest\PagesController@show', ['id' => $follower->id] )}}" class="text-secondary">{{ $follower->id }}</a>
                    <p class="mb-0">{{ $follower->name }}</p>
                </div>
            </div>
        </div>
    @endforeach
     <div class="d-flex justify-content-center mt40">
     {{ $followers->links() }}
     </div>
@endsection