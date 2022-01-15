@extends('layout.main')
@section('container')
    <h1 class="mb-4">{{ $header1 }}</h1>
    <div class="row">
        <div class="col">
            <form action="/posts">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Title" name="search" value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit" >Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->slug }}" class="card-img-top"
                alt="...">
            <div class="card-body">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                        class="text-decoration-none">{{ $posts[0]->title }}</a></h3>
                <small class="text-muted">
                    By <a href="/authors/{{ $posts[0]->user->username }}"
                        class="text-decoration-none">{{ $posts[0]->user->name }}</a> in
                    <a href="/categories/{{ $posts[0]->category->slug }}"
                        class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                </small>
                <p class="card-text"><small
                        class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
        <div class="">
            <div class="row">
                @foreach ($posts->skip(1) as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 text-white">
                                {{ $item->category->name }}
                            </div>
                            <img src="https://source.unsplash.com/500x400/?{{ $item->category->slug }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <small class="text-muted">
                                    By <a href="/authors/{{ $item->user->username }}"
                                        class="text-decoration-none">{{ $item->user->name }}</a>
                                </small>
                                <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                <p class="card-text">{{ $item->excerpt }}</p>
                                <a href="/posts/{{ $item->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h3>nothing here lmao</h3>
    @endif
    <?php
        try{
            echo $posts->links();
        } catch (Exception $e){

        }
    ?>
@endsection
