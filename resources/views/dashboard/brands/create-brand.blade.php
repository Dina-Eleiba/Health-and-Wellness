@extends('dashboard.master')

@section('title', 'Add User')


@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Add Brand</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('dashboard.store-brand') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            value={{ old('name') }}>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative">
                        <label for="image">Image</label>
                        <div class="input-group col-12">
                            <input type="file" name="logo" id="image" class="form-control"
                                placeholder="Upload Image">
                        </div>
                        @error('logo')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option> Select Status</option>
                            <option>Available</option>
                            <option>Not available</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-gradient-danger btn-fw me-2">Submit</button>
                        <button class="btn btn-gradient-success btn-fw">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
