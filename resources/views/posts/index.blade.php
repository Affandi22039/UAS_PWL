@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Berita Utama</h1>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Berita Baru</a>
        @endif
    </div>
    <div class="row">
        @foreach ($mainPosts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        @if (Auth::user()->role == 'admin')
                            <div class="mt-2">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h1>Berita Lainnya</h1>
    <div class="row">
        @foreach ($otherPosts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        @if (Auth::user()->role == 'admin')
                            <div class="mt-2">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('posts.all') }}" class="btn btn-primary mt-3">Semua Berita</a>
</div>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@endsection
