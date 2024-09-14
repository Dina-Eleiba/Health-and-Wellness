@extends('dashboard.master')

@section('title', 'All Brands')

@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">All posts</h4>
                <div class="my-5 text-end">
                    <a href="{{ route('dashboard.create-post') }}">
                        <button type="button" class="btn btn-gradient-danger btn-fw">Add post</button>
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
                            <th style="width: 20%;"> title </th>
                            <th style="width: 25%;"> description </th>
                            <th> created by </th>
                            <th> status </th>
                            <th> actions </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <tr class="">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="td-format"> {{ $post->title}} </td>
                                    <td class="td-format">{{strip_tags($post->description)}}</td>
                                    <td> {{ $post->created_by }}</td>
                                    <td> {{ $post->status }} </td>

                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="{{ route('dashboard.edit-post', $post->id) }}">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                            </a>
                                            <form method="POST" class="delete-form"
                                                action="{{ route('dashboard.delete-post', $post->id) }}">
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
                                <td colspan="8">No posts added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
