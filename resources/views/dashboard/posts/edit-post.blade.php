@extends('dashboard.master')

@section('title', 'Edit Brand')


@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-5">Edit Post</h4>
            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('dashboard.edit-post', $post->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ $post->title }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $post->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="content">content</label>
                    <textarea class="form-control" id="content" name="content" rows="4" >{{ $post->content }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug"
                        value="{{ $post->slug }}">
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" class="form-control" name="created_by" id="created_by" placeholder="created by"
                        value="{{ $post->created_by }}">
                    @error('created_by')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value=""> Select Status</option>
                        <option value="published" @selected($post->status === 'published')>published</option>
                        <option value="pending" @selected($post->status === 'pending')>pending</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group position-relative">
                    <label for="image">Image</label>
                    <div class="input-group col-12">
                        <input type="file" name="image" id="image" class="form-control"
                            placeholder="Upload Image">
                    </div>
                    <img id ="imgPreview" src="{{ asset('assets/images/posts/' . $post->image) }}"
                    alt="" width="300px" height="200px">
                    @error('image')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
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
