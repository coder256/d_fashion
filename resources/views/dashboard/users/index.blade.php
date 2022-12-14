@extends('dashboard.layout')

@section('title', 'Users')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>Users</h3>
            </div>
            @if(!$users->isEmpty())
                <p>
                    <button id="download-button" class="btn btn-info">Download CSV</button>
                </p>
                <table style="width: 100%;" id="example"
                       class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Registered on</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->tel }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ date('m/d/Y', strtotime($user->created_at)) }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i></a>
                                    @if (in_array(Auth::user()->role, array('admin')))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Registered on</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                <a href="{{ route('users.create') }}" class="mb-2 mr-2 btn btn-success">Create</a>
            @endif
        </div>
    </div>
@endsection

