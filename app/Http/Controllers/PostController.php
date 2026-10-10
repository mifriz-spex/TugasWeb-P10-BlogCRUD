<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 1. index
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(5);
        
        // Fitur Inline Edit: Deteksi kalau ada parameter edit
        $post_edit = null;
        if ($request->has('edit')) {
            $post_edit = Post::find($request->edit);
        }

        return view('posts.index', compact('posts', 'post_edit'));
    }

    // 2. create
    public function create()
    {
        return view('posts.create');
    }

    // 3. store
    public function store(Request $request)
    {
        // Syarat #5: Validasi
        $validated = $request->validate([
            'title' => 'required|max:200',
            'body' => 'required',
        ]);

        Post::create($validated);

        // Syarat #6: Flash message sukses
        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');
    }

    // 4. show (Syarat #8: Route Model Binding)
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 5. edit (Syarat #8: Route Model Binding)
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 6. update
    public function update(Request $request, Post $post)
    {
        // Syarat #5: Validasi
        $validated = $request->validate([
            'title' => 'required|max:200',
            'body' => 'required',
        ]);

        $post->update($validated);

        // Syarat #6: Flash message sukses
        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    // 7. destroy
    public function destroy(Post $post)
    {
        $post->delete();

        // Syarat #6: Flash message sukses
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
