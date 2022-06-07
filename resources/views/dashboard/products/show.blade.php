@extends('dashboard.layout')

@section('title', 'Product')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>Product</h3>
            </div>
            <form>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="found_in">Main Image</label> <br>
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('items/' . $product->main_image) }}" style="max-height: 200px; max-width: 100%;" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label> Other Images</label> <br>
                        @foreach(explode(',', $product->other_images) as $other_image)
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <img src="{{ asset('items/' . $other_image) }}" style="max-height: 200px; background-color: #eee; border: 3px solid #dee2e6; border-radius: 0.25rem;" />
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name">Name</label>
                            <input name="name" id="name" type="text" class="form-control"
                                   value="{{ $product->name }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="gender">Gender</label>
                            <input name="gender" id="gender" type="text" class="form-control"
                                   value="{{ $product->gender }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="stock">Stock</label>
                            <input name="stock" id="stock" type="text" class="form-control" value="{{ $product->stock }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="user">Uploaded by</label>
                            <input name="user" id="user" type="text" class="form-control" value="{{ $product->user->first_name }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    {{--<div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="role">Role</label>
                            <input name="role" id="role" type="text" class="form-control" value="{{ $product->role }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="status">Status</label>
                            <input name="status" id="status" type="text" class="form-control" value="{{ $product->status }}"
                                   disabled="disabled">
                        </div>
                    </div>--}}
                </div>

                <div class="row"><div class="col-12"><h5 class="text-center">Measurements</h5></div></div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="shirt_sleeve">Sleeve Length</label>
                            <input name="shirt_sleeve" id="name" type="text" class="form-control"
                                   value="{{ $product->shirt_sleeve }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="chest">Chest width</label>
                            <input name="chest" id="gender" type="text" class="form-control"
                                   value="{{ $product->chest }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="thigh">Thigh</label>
                            <input name="thigh" id="thigh" type="text" class="form-control" value="{{ $product->thigh }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="waist">Waist</label>
                            <input name="waist" id="waist" type="number" class="form-control" value="{{ $product->waist }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="trouser_length">Trouser Length</label>
                            <input name="trouser_length" id="trouser_length" type="text" class="form-control" value="{{ $product->trouser_length }}"
                                   disabled="disabled">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
