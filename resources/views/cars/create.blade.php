@extends('layouts.app')

@section('content')

<h1>Create a Cars</h2> <hr>
<div class="row" style="background-color: #fff; height:100%;">


<div class="col-md-6 col-md-offset-3" >
@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
            <p> {{ $error }}</p>
        </div>
        @endforeach
    @endif
    <form action="/cars" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <input type="file" name="image" class="form-control" style="border: 2px solid gray;"  >
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" style="border: 2px solid gray;" placeholder="Brand Name..">
        </div>
        <div class="form-group">
            <input type="text" name="founded" class="form-control" style="border: 2px solid gray;" placeholder="Founded Name..">
        </div>
        <div class="form-group">
          <textarea  class="form-control" name="description" rows="3" style="border: 2px solid gray;"  ></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </form>
      

       

       
</div>


</div>

 

@endsection