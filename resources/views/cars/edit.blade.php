@extends('layouts.app')

@section('content')

<h1>Update a Cars</h2> <hr>
<div class="row" style="background-color: #fff; height:100%;">


<div class="col-md-6 col-md-offset-3" >
    <form action="/cars/{{ $car->id }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" name="name" class="form-control" style="border: 2px solid gray;" value="{{ $car->name }}" placeholder="Brand Name..">
        </div>
        <div class="form-group">
            <input type="text" name="founded" class="form-control" style="border: 2px solid gray;" value="{{ $car->founded }}" placeholder="Founded Name..">
        </div>
        <div class="form-group">
          <textarea  class="form-control" name="description" rows="3" style="border: 2px solid gray;"  >{{ $car->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </form>

</div>


</div>

 

@endsection