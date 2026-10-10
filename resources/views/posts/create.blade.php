@extends('layouts.master')

@section('content')
    @component('components.card')
        <h2 class="text-2xl font-bold mb-4">Tambah Post</h2>
        
        <form action="{{ route('posts.store') }}" method="POST">
            {{-- Syarat #7: @csrf --}}
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul</label>
                {{-- Syarat #5: old input --}}
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                
                {{-- Syarat #5: Error per field --}}
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Konten (Body)</label>
                <textarea name="body" rows="5" class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500">{{ old('body') }}</textarea>
                
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    @endcomponent
@endsection
