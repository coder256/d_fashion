@extends('dashboard.layout')

@section('title', 'Products')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>Products</h3>
            </div>
            @if(!$products->isEmpty())
                {{--<p>
                    <button id="download-button" class="btn btn-info">Download CSV</button>
                </p>--}}
                <table style="width: 100%;" id="example"
                       class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Stock</th>
                        <th>Saved on</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset("items/".$product->main_image) }}" alt="product_image" class="img-table"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->gender }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ date('m/d/Y', strtotime($product->created_at)) }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i></a>
                                    @if (in_array(Auth::user()->role, array('admin')))
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Stock</th>
                        <th>Saved on</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                <a href="{{ route('products.create') }}" class="mb-2 mr-2 btn btn-success">Create</a>
            @endif
        </div>
    </div>
@endsection


