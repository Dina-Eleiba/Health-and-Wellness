@extends('dashboard.master')

@section('title', 'All users')

@section('content')

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">All Users</h4>
                <div class="my-5 text-end">
                    <a href="{{ route('dashboard.create-user') }}">
                        <button type="button" class="btn btn-gradient-danger btn-fw">Add User</button>
                    </a>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif


                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th> # </th>
                            <th> name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Gender </th>
                            <th> Status </th>
                            <th> Role </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($users->count() > 0)
                            @foreach ($users as $user)
                                <tr class="">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $user->first_name . ' ' . $user->last_name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->phone }} </td>
                                    <td> {{ $user->gender }} </td>
                                    <td> {{ $user->status }} </td>
                                    <td> {{ $user->role }} </td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('dashboard.edit-user', $user->id) }}">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                            </a>
                                            <form method="POST" class="delete-form"
                                                action="{{ route('dashboard.delete-user', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">
                                                    <i class="mdi mdi-delete text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No users added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
