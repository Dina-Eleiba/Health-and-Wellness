@extends('dashboard.master')

@section('title', 'All Brands')

@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">All Products</h4>
                <div class="my-5 text-end">
                    <a href="{{ route('dashboard.create-product') }}">
                        <button type="button" class="btn btn-gradient-danger btn-fw">Add product</button>
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
                            <th> quantity </th>
                            <th> price </th>
                            <th> Category </th>
                            <th> Brand </th>
                            <th> Status </th>
                            <th> actions </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <tr class="">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('assets/images/products/' . $product->image) }}"
                                            alt="{{ $product->slug }}" style="width: 100px; height: 90px;">
                                    </td>
                                    <td> {{ $product->name }} </td>
                                    <td>{{ $product->quantity }} {{ $product->weight_unit }}</td>
                                    <td> {{ $product->price }} LE</td>
                                    <td> {{ $product->category->name }} </td>
                                    <td> {{ $product->brand ? $product->brand->name : 'N/A' }} </td>
                                    <td> {{ $product->status }} </td>

                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('dashboard.edit-product', $product->id) }}">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                            </a>
                                            <form method="POST" class="delete-form"
                                                action="{{ route('dashboard.delete-product', $product->id) }}">
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
                                <td colspan="8">No Products added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
