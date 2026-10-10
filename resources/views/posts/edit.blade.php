@extends('layouts.master')

@section('content')
    @component('components.card')
        <h2 class="text-2xl font-bold mb-4">Edit Post</h2>
        
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            {{-- Syarat #7: @csrf & @method PUT/DELETE --}}
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul</label>
                {{-- Prioritaskan old input, kalau tidak ada pakai data dari database --}}
                <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Konten (Body)</label>
                <textarea name="body" rows="5" class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500">{{ old('body', $post->body) }}</textarea>
                
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    @endcomponent
@endsection
