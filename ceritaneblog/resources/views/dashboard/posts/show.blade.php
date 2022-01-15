@extends('dashboard.main')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-3">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success fs-7"><span data-feather="arrow-left"></span> Back to all my posts</span></a>
                <a href="" class="btn btn-warning fs-7"><span data-feather="edit"></span> Edit</a>
                <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger fs-7 border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->slug }}"
                    class="card-img-top img-fluid my-3" alt="...">
                <article>
                    {!! $post->body !!}
                    <br>
                </article>
            </div>
        </div>
    </div>
@endsection
