@extends('dashboard.layout')

@section('title', 'Edit Product')

@section('content')
    <div class="mb-3 card card-body text-center">
        <h3>User</h3>
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
                            <label for="first_name">
                                <span class="text-danger">*</span> Name
                            </label>
                            <input name="first_name" id="first_name" type="text" class="form-control"
                                   value="{{ $product->name }}" required>
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
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email">
                                <span class="text-danger">*</span> Email
                            </label>
                            <input name="email" id="email" type="email" class="form-control"
                                   value="{{ $product->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="data" method="post" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT')
                <input name="part" type="hidden" value="pass">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password">
                                <span class="text-danger">*</span> Password
                            </label>
                            <input name="password" id="password" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password_confirmation">
                                <span class="text-danger">*</span> Confirm Password
                            </label>
                            <input name="password_confirmation" id="password_confirmation"
                                   type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary
                                            btn-lg">Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
