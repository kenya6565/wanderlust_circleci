@extends('layouts.app')

@section('content')
   
    <div class="container-fluid"  style="padding:0px">
      <div class="row">
        <div class="col no-gutters">
          <img class="img-fluid w-100" style="width:100px" src="{{ asset('images/'.$random) }}">
        </div>
      </div>
    </div>
@endsection