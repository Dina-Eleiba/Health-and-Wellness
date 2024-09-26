@extends('dashboard.master')

@section('title', 'All meals')

@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">All Meals</h4>
                <div class="my-5 text-end">
                    <a href="{{ route('dashboard.create-meal') }}">
                        <button type="button" class="btn btn-gradient-danger btn-fw">Add Meal</button>
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
                            <th> day </th>
                            <th> name </th>
                            <th> Description </th>
                            <th> price </th>
                            <th> Category </th>
                            <th> actions </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($meals->count() > 0)
                            @foreach ($meals as $meal)
                                <tr class="">
                                    <td>
                                        {{ ($meals->currentPage() - 1) * $meals->perPage() + $loop->iteration }}
                                    </td>
                                    <td> {{ $meal->day_of_week }} </td>
                                    <td class="td-format"> {{ $meal->name }} </td>
                                    <td>{{ $meal->description }} </td>
                                    <td> {{ $meal->price }} LE</td>
                                    <td> {{ $meal->category->name }} </td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('dashboard.edit-meal', $meal->id) }}">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                            </a>
                                            <form method="POST" class="delete-form"
                                                action="{{ route('dashboard.delete-meal', $meal->id) }}">
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
                                <td colspan="8">No Meals added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- Custom Pagination Links -->
                <div class="d-flex justify-content-end mt-4">
                    @if ($meals->onFirstPage())
                        <span class="btn btn-gradient-danger btn-fw disabled ">Previous</span>
                    @else
                        <a href="{{ $meals->previousPageUrl() }}" class="btn btn-gradient-danger btn-fw ">Previous</a>
                    @endif

                    @for ($i = 1; $i <= $meals->lastPage(); $i++)
                        <a href="{{ $meals->url($i) }}" class="btn {{ $meals->currentPage() == $i ? 'btn-link' : 'btn-light' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($meals->hasMorePages())
                        <a href="{{ $meals->nextPageUrl() }}" class="btn btn-gradient-danger btn-fw">Next</a>
                    @else
                        <span class="btn btn-gradient-danger btn-fw disabled">Next</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
