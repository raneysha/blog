@extends('dashboard.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts, {{ auth()->user()->name }}</h1>
    </div>
    @if (session()->has('Success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('Success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
    <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-primary">Create new post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $item->slug }}"><span data-feather="eye"></a>
                            <a href="/dashboard/posts/{{ $item->slug }}/edit"><span data-feather="edit"></a>
                                <form class="d-inline" action="/dashboard/posts/{{ $item->slug }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
