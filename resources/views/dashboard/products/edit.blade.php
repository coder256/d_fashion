@extends('dashboard.layout')

@section('title', 'Edit Product')

@section('content')
    <div class="mb-3 card card-body text-center">
        <h3>Edit Product</h3>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="form_data" method="post" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT')
                <input name="part" type="hidden" value="data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name"><span class="text-danger">*</span> Name</label>
                            <input name="name" id="name" type="text" class="form-control" value="{{ $product->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="gender">
                                <span class="text-danger">*</span> Gender
                            </label>
                            <input name="gender" id="gender" type="text" class="form-control"
                                   value="{{ $product->gender }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="stock">
                                <span class="text-danger">*</span> Stock
                            </label>
                            <input name="stock" id="stock" type="text" class="form-control" value="{{ $product->stock }}" required>
                        </div>
                    </div>
                </div>

                <div class="row"><div class="col-12"><h5 class="text-center">Measurements</h5></div></div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="shirt_sleeve">Sleeve Length</label>
                            <input name="shirt_sleeve" id="name" type="text" class="form-control"
                                   value="{{ $product->shirt_sleeve }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="chest">Chest width</label>
                            <input name="chest" id="gender" type="text" class="form-control"
                                   value="{{ $product->chest }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="thigh">Thigh</label>
                            <input name="thigh" id="thigh" type="text" class="form-control" value="{{ $product->thigh }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="waist">Waist</label>
                            <input name="waist" id="waist" type="number" class="form-control" value="{{ $product->waist }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="trouser_length">Trouser Length</label>
                            <input name="trouser_length" id="trouser_length" type="text" class="form-control" value="{{ $product->trouser_length }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
