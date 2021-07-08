@extends('layouts.app')

@section('content')

<h1> {{ $car->name }} </h2> <hr>
<!-- <div class="pull-left">
<a href="cars/create" class="btn btn-primary"> Add a new car</a>
</div> -->
    <img src="{{ asset('images/'.$car->image_path.'') }}" alt="car image" width="200">
<br>

<p>FOUNDED: {{ $car->founded }}</p>
       <h3>{{  $car->name  }}</h3>
      
       <div class="col-md-6 col-md-offset-3">
       <h5> {{ $car->description }} .</h6>
       <div class="row">
           <table class="table table-bordered">
                <thead>
                    <th>Model</th>
                    <th>Engines</th>
                    <th>Production Date</th>
                </thead>
                <tbody>

                   @forelse($car->carModels as $model)
                    <tr>
                        <td> {{ $model->model_name }}  </td> 
                        <td> 
                            @foreach($car->engines as $engine)
                                @if($model->id == $engine->model_id)
                                {{ $engine->engine_name }} --
                                @endif
                            @endforeach
                       </td> 
                        <td>
                            @if(!empty($car->productionDate->created_at))
                            {{ date('d-m-Y',strtotime($car->productionDate->created_at))  }}
                             @endif
                        </td>
                        </tr>
                    @empty
                        <p>No CAr Model Found</p>
                    @endforelse
                </tbody>
           </table>
           <div>
                <p>Product Types:
                    @forelse($car->products as $product)
                        {{ $product->name }} ,
                    @empty
                            <span> NO Types </span>
                    @endforelse
                
                 </p>
           </div>
    </div>
       </div>
   
      
  

@endsection