@extends('dashboard.master')

@section('title', 'Edit User')


@section('content')
    {{-- {{ dd($subcategory) }} --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Edit Subcategory</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('dashboard.edit-subcategory', $subcategory->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            value={{ $subcategory->name }}>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Description">
                            {{ $subcategory->description }}
                        </textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="{{ $subcategory->parent->id }}">{{ $subcategory->parent->name }}</option>
                            @foreach ($categories as $category)
                                    @include('dashboard.partials.categories-option', [
                                        'category' => $category,
                                        'level' => 0,
                                    ])
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group position-relative">
                        <label for="image">Image</label>
                        <div class="input-group col-12">
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="Upload Image" value="">
                        </div>
                        <img id ="imgPreview" src="{{ asset('assets/images/subcategories/' . $subcategory->image) }}"
                            alt="" width="300px" height="200px">

                        @error('image')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option> Select Status</option>
                            <option @selected($subcategory->status === 'Available')>Available</option>
                            <option @selected($subcategory->status === 'Not available')>Not available</option>
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
