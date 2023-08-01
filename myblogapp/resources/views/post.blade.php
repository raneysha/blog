@extends('layout.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <p class="fs-5">
                    By <a href="/authors/{{ $post->user->username }}"
                        class="text-decoration-none">{{ $post->user->name }}</a> in
                    <a href="/categories/{{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                <p>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"
                    class="card-img-top img-fluid my-3" alt="...">
                <article>
                    {!! $post->body !!}
                    <br>
                    <a href="/posts" class="text-decoration-none mb-4">Kembali ke Posts</a>
                </article>
            </div>
        </div>
    </div>


@endsection
