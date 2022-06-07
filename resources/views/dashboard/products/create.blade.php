@extends('dashboard.layout')

@section('title', 'Products | create')

@section('content')
    <div class="mb-3 card card-body text-center">
        <h3>Create Product</h3>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="form_data" method="post" enctype="multipart/form-data" action="{{ route('products.store') }}">
                @csrf
                <input name="part" type="hidden" value="data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name">
                                <span class="text-danger">*</span> Name
                            </label>
                            <input name="name" id="name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="gender">
                                <span class="text-danger">*</span> Gender
                            </label>
                            <select name="gender" id="gender" type="text" class="form-control" required>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="stock">
                                <span class="text-danger">*</span> Stock
                            </label>
                            <input name="stock" id="stock" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email">
                                <span class="text-danger">*</span> Uploaded  by
                            </label>
                            <input name="email" id="email" type="email" class="form-control" value="{{ Auth::user()->first_name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="role">
                                <span class="text-danger">*</span> Main Image
                            </label>
                            <input name="main_image" id="main_image" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="status">
                                <span class="text-danger">*</span> Other Images
                            </label>
                            <input name="other_images[]" id="other_images" type="file" class="form-control" multiple>
                        </div>
                    </div>
                </div>

                <div class="row mt-5"><div class="col-12"><h5 class="text-center">Measurements</h5></div></div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="shirt_sleeve">Sleeve Length</label>
                            <input name="shirt_sleeve" id="first_name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="chest">Chest width</label>
                            <input name="chest" id="last_name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="thigh">Thigh</label>
                            <input name="thigh" id="thigh" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="waist">Waist</label>
                            <input name="waist" id="waist" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="trouser_length">Trouser Length</label>
                            <input name="trouser_length" id="trouser_length" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
