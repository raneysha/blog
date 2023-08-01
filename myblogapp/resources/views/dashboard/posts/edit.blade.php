@extends('dashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts/{{ $post->slug }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <input autofocus type="text" class="form-control" id="Title" name="title"
                value="{{ old('title', $post->title) }}">
            @error('title')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
            @error('slug')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div> --}}
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $item)
                @if ($post->category_id == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                @else
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            @error('body')
            <div class="text-danger mb-1">
                {{ $message }}
            </div>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            <input id="slug" type="hidden" name="slug" value="kosong">
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
<script>
    const title = document.querySelector('#Title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function(){
        console.log(title.value)
    })
</script>
<script>
    document.addEventListener('trix-file-accept', function(e) {e.preventDefault();})
</script>
@endsection