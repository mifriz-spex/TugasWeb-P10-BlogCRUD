@extends('layouts.master')

@section('content')
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tambah Post Baru
        </a>
    </div>

    {{-- Memanggil komponen alert --}}
    @include('components.alert')

    @foreach($posts as $post)
        {{-- Memanggil komponen card --}}
        @component('components.card')
            <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700 mb-4">{{ Str::limit($post->body, 100) }}</p>
            
            <div class="flex space-x-2">
                <a href="{{ route('posts.show', $post->id) }}" class="bg-gray-500 text-white px-3 py-1 rounded text-sm">Lihat</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                
                {{-- Syarat #7: @csrf dan @method('DELETE') pada form --}}
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                </form>
            </div>
        @endcomponent
    @endforeach

    {{-- Syarat #8: Pagination Links --}}
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection