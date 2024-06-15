<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')) {
                return $next($request);
            } else {
                abort(403, 'Unauthorized action.');
            }
        })->except(['index', 'show', 'all']);
    }

    public function index()
    {
        // Mengambil 3 berita terbaru sebagai berita utama
        $mainPosts = Post::orderBy('created_at', 'desc')->take(3)->get();

        // Mengambil berita lainnya
        $otherPosts = Post::orderBy('created_at', 'desc')->skip(3)->take(10)->get();

        return view('posts.index', compact('mainPosts', 'otherPosts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function all()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.all', compact('posts'));
    }
    public function create()
{
    return view('posts.create');
}
public function store(Request $request)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:publish,draft',
    ]);

    // Mengambil data dari request
    $data = $request->only(['title', 'seotitle', 'content', 'status']);
    $data['user_id'] = auth()->id();

    // Mengunggah gambar jika ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads/posts', 'public');
        $data['image'] = $imagePath;
    } else {
        $data['image'] = 'noimage.jpg';
    }

    // Menyimpan data ke dalam database
    Post::create($data);

    // Redirect dengan pesan sukses
    return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
}
public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('posts.edit', compact('post'));
}
public function update(Request $request, $id)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:publish,draft',
    ]);

    // Mengambil data post yang akan diupdate
    $post = Post::findOrFail($id);
    $data = $request->only(['title', 'seotitle', 'content', 'status']);

    // Mengunggah gambar baru jika ada
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika bukan default
        if ($post->image && $post->image != 'noimage.jpg') {
            Storage::disk('public')->delete($post->image);
        }

        // Upload gambar baru
        $imagePath = $request->file('image')->store('uploads/posts', 'public');
        $data['image'] = $imagePath;
    }

    // Update data post
    $post->update($data);

    // Redirect dengan pesan sukses
    return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
}
public function destroy($id)
{
    // Mengambil data post yang akan dihapus
    $post = Post::findOrFail($id);

    // Hapus gambar jika bukan default
    if ($post->image && $post->image != 'noimage.jpg') {
        Storage::disk('public')->delete($post->image);
    }

    // Hapus post dari database
    $post->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
}

}
