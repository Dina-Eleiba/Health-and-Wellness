@extends('dashboard.master')

@section('title', 'All Categories')

@section('content')

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">All Categories</h4>
                <div class="my-5 text-end">
                    <a href="{{ route('dashboard.create-category') }}">
                        <button type="button" class="btn btn-gradient-danger btn-fw">Add Category</button>
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
                            <th> description </th>
                            <th> actions </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <tr class="">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $category->name}} </td>
                                    <td> {{ $category->description ? $category->description : 'N/A' }} </td>

                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('dashboard.edit-category', $category->id) }}">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                            </a>
                                            <form method="POST" class="delete-form"
                                                action="{{ route('dashboard.delete-category', $category->id) }}">
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
                                <td colspan="8">No Categories added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
