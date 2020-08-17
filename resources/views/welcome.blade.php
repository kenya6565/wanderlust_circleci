@extends('layouts.app')
   <style type="text/css">
      .text-image {
        position: relative;
        width: 500px;
      }
      
      .text-image img {
        width: 100%;
      }
      
      .text-image p {
        position: absolute;
        top: 30%;
        left: 24%;
        font-size: 60px;
        color: #ffffff;
        font-family: 'Creepster', cursive;
        font-family: 'Kosugi Maru', sans-serif;
      }
      
      .text-image h1 {
        position: absolute;
        top: 40%;
        left: 13%;
        color: #ffffff;
        font-family: 'Kosugi Maru', sans-serif;
      } 
        
      .btn-shine {
        color: #FFF;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        line-height: 45px;
        width: 200px;
        text-decoration: none;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: 1px solid;
        outline-color: rgba(255, 255, 255, 0.5);
        outline-offset: 0px;
        text-shadow: none;
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
        position: absolute;
        top: 58%;
        left: 43%;
        font-family: 'Kosugi Maru', sans-serif;
        text-align: center;
      }
    
      .btn-shine:hover {
        border-color: #FFF;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
        outline-color: transparent;
        outline-offset: 12px;
        text-shadow: 2px 2px 3px #000;
       
      }
    </style>
@section('content')
    <div class="container-fluid" >
      　<div class="row" style="padding:0px">
            <div class="col no-gutters text-image" style="padding:0px">
              　<img class=" img-fluid w-100" style="width:100px height:100px" src="{{ asset('images/'.$random) }}">
              　<div class="text1">
          			<h6><p>Wanderlustで世界を観光しよう</p></h6>
          		</div>
          		<h1>あなたのお気に入りの世界の名所を投稿して共有するアプリです。</h1>
              　<a href="{{ route('login') }}" class="btn-shine  text-white">ログインして始める</a>
            </div>
      　</div>
    </div>
@endsection