@extends('layouts.app')

@section('content')
<style>
    .products .card .card-body {

   background-color: ##fff; /* Light red background */
   color: #136626; /* Dark red text */
   }
   .products .card-header {
   background-color: #c3e6cb; /* Red header background */
   color: #28a745; /* White text */
   }


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Producte:</div>

                <div class="card-body">

                    <div class="row products">
                        @foreach($products as $product)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                  <div class="card-header">
                                  {{ $product->name }}
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">${{ $product->price }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>

                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success pull-right">Buy Now</a>

                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection