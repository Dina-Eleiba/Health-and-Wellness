@extends('dashboard.master')

@section('title', 'Edit User')


@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Edit User</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{route('dashboard.edit-user', $user->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                            placeholder="First Name" value={{ $user->first_name }}>
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"
                            value={{ $user->last_name }}>
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                            value={{ $user->email }}>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" class="form-control" name= "phone" id="phone" placeholder="Phone"
                            value={{ $user->phone }}>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option></option>
                            <option @selected($user->gender === 'male')>Male</option>
                            <option @selected($user->gender === 'female')>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option @selected($user->status === 'active')>Active</option>
                            <option @selected($user->role === 'inactive')>Inactive</option>
                            <option @selected($user->role === 'suspended')>Suspended</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option @selected($user->role === 'admin') value="admin">Admin</option>
                            <option @selected($user->role === 'user') value="user">User</option>
                        </select>
                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-gradient-danger btn-fw me-2">Update</button>
                        <button class="btn btn-gradient-success btn-fw">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
