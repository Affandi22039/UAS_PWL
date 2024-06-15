@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>Berita Utama</h1>
    <div class="row">
        @foreach ($mainPosts as $post)
            <div class="col-md-4">
                <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post->id) }}">Baca Selengkapnya</a>
            </div>
        @endforeach
    </div>
    <h1>Berita Lainnya</h1>
    <div class="row">
        @foreach ($otherPosts as $post)
            <div class="col-md-4">
                <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post->id) }}">Baca Selengkapnya</a>
            </div>
        @endforeach
    </div>
    <a href="{{ route('posts.all') }}" class="btn btn-primary mt-3">Semua Berita</a>
</div>
@endsection
