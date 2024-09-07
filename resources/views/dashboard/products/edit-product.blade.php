@extends('dashboard.master')

@section('title', 'Edit Brand')


@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-5">Edit Product</h4>
            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('dashboard.edit-product', $product->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                        value="{{ $product->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="price">Price</label>
                            <input type="number" id="price" step="0.01" min="0" name="price" class="form-control"
                                placeholder="price" value="{{ $product->price }}" />
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="col-form-label" for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control"
                                placeholder="quantity" value="{{ $product->quantity }}"/>
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="weight_unit">Weight unit</label>
                    <input type="text" class="form-control" name="weight_unit" id="weight_unit"
                        placeholder="weight unit" value={{ $product->weight_unit }}>
                    @error('weight_unit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description">{{ $product->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        <option> Select category</option>
                        @foreach ($categories as $category)
                            @include('dashboard.partials.categories-option', [
                                'category' => $category,
                                'level' => 0,
                                'selectedCategoryId' => $product->category_id ?? null,
                            ])
                        @endforeach

                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
                <div class="form-group">
                    <label for="brands">Brand</label>
                    <select class="form-control" id="brands" name="brand_id">
                        <option></option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @selected(optional($product->brand)->id === $brand->id)>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value=""> Select Status</option>
                        <option value="available" @selected($product->status === 'available')>Available</option>
                        <option value="unavailable" @selected($product->status === 'unavailable')>Not Available</option>
                        <option value="sold out" @selected($product->status === 'sold out' )>Sold Out</option>
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
                    <img id ="imgPreview" src="{{ asset('assets/images/products/' . $product->image) }}"
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
