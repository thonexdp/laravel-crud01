@extends('layouts.app')

@section('content')

<h1>CARS</h2> <hr>
<div class="pull-left">
@if(Auth::user())
<a href="cars/create" class="btn btn-primary"> Add a new car</a>
@endif
</div>

<br>
  @foreach($data as $car)
   <div class="row" style="background-color: #fff; border:  3px solid #000; margin-top:20px; ">
   @if(Auth::user())
   <div class="pull-right">
     <a href="cars/{{ $car->id}}/edit" class="pull-right btn btn-info"> edit </a>
     <form action="/cars/{{ $car->id }} " method="POST">
     @csrf
     @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
   </div>
   @endif
        <img class="pull-left m-2" src="{{ asset('images/'.$car->image_path.' ') }}" alt="no image" width="200">
       <p>FOUNDED: {{ $car->founded }}</p>
       <a href="/cars/{{ $car->id }}">  <h3>{{  $car->name  }}</h3></a>
      
       <div class="col-md-6 col-md-offset-3">
       <h5> {{ $car->description }} .</h6>
       </div>
   </div>
   <hr>
   @endforeach

@endsection