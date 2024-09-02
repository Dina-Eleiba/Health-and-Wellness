@extends('dashboard.master')

@section('title', 'All Categories')

@section('content')

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">All Subcategories</h4>
                <div class="my-5 text-end">
                    <a href="{{ route('dashboard.create-subcategory') }}">
                        <button type="button" class="btn btn-gradient-danger btn-fw">Add Subcategory</button>
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
                            <th> Image </th>
                            <th> name </th>
                            <th> description </th>
                            <th> Status </th>
                            <th> category </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($subcategories->count() > 0)
                            @foreach ($subcategories as $subcategory)
                                <tr class="">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('assets/images/subcategories/' . $subcategory->image) }}"
                                        alt="Subcategory Image"
                                        style="width: 100px; height: 90px;">
                                    </td>
                                    <td> {{ $subcategory->name }} </td>
                                    <td> {{ $subcategory->description }} </td>
                                    <td> {{ $subcategory->status }} </td>
                                    <td> {{ $subcategory->category->name }} </td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('dashboard.edit-subcategory', $subcategory->id) }}">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                            </a>
                                            <form method="POST" class="delete-form"
                                                action="{{ route('dashboard.delete-subcategory', $subcategory->id) }}">
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
                                <td colspan="8">No Subcategories added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
