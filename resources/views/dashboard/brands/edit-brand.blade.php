@extends('dashboard.master')

@section('title', 'Edit Brand')


@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Edit Brand</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('dashboard.edit-brand', $brand->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            value={{ $brand->name }}>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group position-relative">
                        <label for="image">Image</label>
                        <div class="input-group col-12">
                            <input type="file" name="logo" id="image" class="form-control"
                                placeholder="Upload Image" value="">
                        </div>
                        <img id ="imgPreview" src="{{ asset('assets/images/brands/' . $brand->logo) }}"
                            alt="" width="300px" height="200px">

                        @error('logo')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option> Select Status</option>
                            <option @selected($brand->status === 'available')>Available</option>
                            <option @selected($brand->status === 'not available')>Not available</option>
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


@push('js')
    <script>
        $(document).ready(function() {
            $("#image").change(function() {
                if (this.files && this.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imgPreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
