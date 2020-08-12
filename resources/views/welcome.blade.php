@extends('layouts.app')

  
@section('content')
   
    <div class="container-fluid"  style="padding:0px">
      <div class="row">
        
       
        <div class="col no-gutters text-image">
          <img class=" img-fluid w-100" style="width:100px" src="{{ asset('images/'.$random) }}">
             
        <!--  <div class="text">-->
      		<!--	<p>テキスト</p>-->
      		<!--</div>-->
      	
           
        </div>
       
      </div>
    </div>
@endsection