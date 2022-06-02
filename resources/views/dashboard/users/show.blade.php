@extends('dashboard.layout')

@section('title', 'Users')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>User</h3>
            </div>
            <form>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="first_name">First Name</label>
                            <input name="first_name" id="first_name" type="text" class="form-control"
                                   value="{{ $user->first_name }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="last_name">Last Name</label>
                            <input name="last_name" id="last_name" type="text" class="form-control"
                                   value="{{ $user->last_name }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tel">Phone</label>
                            <input name="tel" id="tel" type="text" class="form-control" value="{{ $user->phone }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" class="form-control" value="{{ $user->email }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="role">Role</label>
                            <input name="role" id="role" type="text" class="form-control" value="{{ $user->role }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="status">Status</label>
                            <input name="status" id="status" type="text" class="form-control" value="{{ $user->status }}"
                                   disabled="disabled">
                        </div>
                    </div>
                </div>

                <div class="row"><div class="col-12"><h5 class="text-center">Measurements</h5></div></div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="shirt_sleeve">Sleeve Length</label>
                            <input name="shirt_sleeve" id="first_name" type="text" class="form-control"
                                   value="{{ $user->shirt_sleeve }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="chest">Chest width</label>
                            <input name="chest" id="last_name" type="text" class="form-control"
                                   value="{{ $user->chest }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="thigh">Thigh</label>
                            <input name="thigh" id="thigh" type="text" class="form-control" value="{{ $user->thigh }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="waist">Waist</label>
                            <input name="waist" id="waist" type="number" class="form-control" value="{{ $user->waist }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="trouser_length">Trouser Length</label>
                            <input name="trouser_length" id="trouser_length" type="text" class="form-control" value="{{ $user->trouser_length }}"
                                   disabled="disabled">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
