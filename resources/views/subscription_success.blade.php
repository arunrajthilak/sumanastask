@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <div class="alert alert-success">
                         ordered successfully!
                    </div>
                    <a href="{{ route('products') }}" class="btn btn-warning pull-right">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection