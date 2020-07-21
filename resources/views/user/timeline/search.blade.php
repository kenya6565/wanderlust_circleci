@extends('layouts.header')
@section('title', 'search')
    
@section('content')
    <div class="container">
            @if(!empty($searched_users))
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                   
                </tr>
                @foreach ($searched_users as $searched_user)
                <tr>
                    <td>{{ $searched_user->id }}</td>
                    <td>{{ $searched_user->name }}</td>
                 
                </tr>
                @endforeach
               
            </table>
            @elseif(!empty($searched_posts))
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Post</th>
                   
                </tr>
                @foreach ($searched_posts as $searched_post)
                <tr>
                    <td>{{ $searched_post->id }}</td>
                    <td>{{ $searched_post->post }}</td>
                 
                </tr>
                @endforeach
               
            </table>
            @else
            <p> {{ $keyword }} は見つかりませんでした。</p>
            @endif
          
    </div>
@endsection
