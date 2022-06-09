@extends('home.layout')

@section('title', 'Search')

@section('content')
    <div class="container pt-3">
        @if(!$products->isEmpty())
            @foreach($products as $product)
                <div class="row mb-3 bg-gray-light pt-2 pb-2">
                    <div class="col-2">
                        <img src="{{ asset('items/' . $product->main_image) }}" width="100px" />
                    </div>
                    <div class="col-4">
                        <span>{{$product->name}}</span> <br>
                        <span>Found In: {{ $product->found_in }}</span> <br>
                        <span class="text-muted font-size-sm">Date Found: {{ date('d-M-Y', strtotime($product->created_at)) }}</span>
                    </div>
                    <div class="col-4">
                        <span>Sleeve length: {{$product->sleeve_length}}</span> <br>
                        <span>Chest: {{$product->chest}}</span> <br>
                        <span>Thigh: {{$product->thigh}}</span> <br>
                        <span>Waist: {{$product->waist}}</span> <br>
                        <span>Trouser length: {{$product->trouser_length}}</span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                <h4 class="text-center"><span class="fa fa-box-open"></span> No Results</h4>
            </div>
        @endif
    </div>
@endsection