@extends('dashboard.master')

@section('title', 'Edit Meal')


@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Edit Meal</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('dashboard.edit-meal', $meal->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            value="{{ $meal->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label class="col-form-label" for="price">Price</label>
                        <input type="number" id="price" step="0.01" min="0" name="price"
                            class="form-control" placeholder="price" value="{{ $meal->price }}" />
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description">{{ $meal->description }}</textarea>
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
                                    'selectedCategoryId' => $meal->category_id ?? null,
                                ])
                            @endforeach

                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="days">Day</label>
                        <select class="form-control" id="days" name="day_of_week">
                            <option></option>
                            @foreach ($weekdays as $day)
                                <option value="{{ $day }}" @selected(old('day_of_week', $meal->day_of_week ?? '') == $day)>{{ $day }}
                                </option>
                            @endforeach
                        </select>
                        @error('day_of_week')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_vegetarian">Is Vegetarian</label>
                        <div class="mt-2">
                            <input type="radio" id="is_vegetarian_yes" name="is_vegetarian" value="1"
                            {{ old('is_vegetarian', $meal->is_vegetarian ?? '') == '1' ? 'checked' : '' }}>
                            <label for="is_vegetarian_yes">Yes</label>
                        </div>
                        <div class="mt-2">
                            <input type="radio" id="is_vegetarian_no" name="is_vegetarian" value="0"
                            {{ old('is_vegetarian', $meal->is_vegetarian ?? '') == '0' ? 'checked' : '' }}>
                            <label for="is_vegetarian_no">No</label>
                        </div>
                        @error('is_vegetarian')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="is_daily_special">Daily Special</label>
                        <div class="mt-2">
                            <input type="radio" id="is_daily_special_yes" name="is_daily_special" value="1"
                                {{ old('is_daily_special', $meal->is_daily_special ?? '') == '1' ? 'checked' : '' }}>
                            <label for="is_daily_special_yes">Yes</label>
                        </div>
                        <div class="mt-2">
                            <input type="radio" id="is_daily_special_no" name="is_daily_special" value="0"
                                {{ old('is_daily_special', $meal->is_daily_special ?? '') == '0' ? 'checked' : '' }}>
                            <label for="is_daily_special_no">No</label>
                        </div>
                        @error('is_daily_special')
                            <div class="alert alert-danger">{{ $message }}</div>
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
