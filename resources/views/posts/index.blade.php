@extends('layouts.master')

<!-- Bagian Form/Aksi Kiri -->
@section('form-content')
    <div class="bg-[#101216] border border-[#1f2833] rounded-2xl p-6 custom-glow">
        <div class="flex items-center space-x-2.5 mb-6">
            <span class="w-3 h-3 bg-green-400 rounded-full shadow-lg shadow-green-500/50"></span>
            <h2 class="text-lg font-bold text-white tracking-wide">Aksi & Form CRUD</h2>
        </div>

        @if(isset($post_edit))
            <!-- Form Edit Post (Syarat #5, #7) -->
            <form action="{{ route('posts.update', $post_edit->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Edit Judul</label>
                    <input type="text" name="title" value="{{ old('title', $post_edit->title) }}" class="w-full bg-[#0b0c10] border border-[#1f2833] focus:border-green-500 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none transition-all duration-150">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Edit Konten (Body)</label>
                    <textarea name="body" rows="6" class="w-full bg-[#0b0c10] border border-[#1f2833] focus:border-green-500 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none transition-all duration-150 resize-none">{{ old('body', $post_edit->body) }}</textarea>
                    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-green-500 to-emerald-600 text-black font-extrabold py-3 px-4 rounded-xl hover:shadow-lg hover:shadow-green-500/10 active:scale-95 transition-all">Selesai Edit</button>
                    <a href="{{ route('posts.index') }}" class="px-5 py-3 bg-[#161a1d] text-gray-400 font-semibold rounded-xl border border-[#1f2833] hover:text-white transition">Batal</a>
                </div>
            </form>
        @else
            <!-- Form Tambah Baru (Syarat #5, #7) -->
            <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Judul Post</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Ketikkan judul di sini..." class="w-full bg-[#0b0c10] border border-[#1f2833] focus:border-green-400 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none transition-all duration-150">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Konten (Body)</label>
                    <textarea name="body" rows="6" placeholder="Ketikkan konten blog..." class="w-full bg-[#0b0c10] border border-[#1f2833] focus:border-green-400 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none transition-all duration-150 resize-none">{{ old('body') }}</textarea>
                    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-[#0b0c10] font-extrabold py-3.5 px-4 rounded-xl hover:brightness-110 active:scale-[0.98] transition-all">
                    + Tambah Post Baru
                </button>
            </form>
        @endif
    </div>
@endsection

<!-- Bagian List Post Kanan (Syarat #8) -->
@section('post-content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-white tracking-wide">Daftar Post Blog <span class="bg-[#121c18] border border-green-500/20 text-green-400 text-xs px-2.5 py-0.5 rounded-full ml-1">{{ $posts->total() }}</span></h2>
    </div>

    <div class="space-y-4">
        @forelse($posts as $post)
            <!-- Card Post (Syarat #4) -->
            <div class="bg-[#101216] border border-[#1f2833] hover:border-green-500/40 rounded-2xl p-5 hover:bg-[#121519] transition-all duration-200">
                <div class="flex justify-between items-start gap-4 mb-2">
                    <h3 class="text-lg font-bold text-white leading-snug">{{ $post->title }}</h3>
                    <span class="text-[10px] bg-[#1a1f26] text-gray-400 px-2 py-1 rounded-md shrink-0">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4 line-clamp-3">{{ $post->body }}</p>
                
                <div class="flex justify-between items-center pt-3 border-t border-[#1a1f26]">
                    <!-- Navigasi & Action (Syarat #7) -->
                    <div class="flex space-x-1.5">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-xs bg-[#121c18] border border-green-500/20 hover:border-green-500/50 hover:bg-[#0c1a14] text-green-400 px-3.5 py-2 rounded-xl transition">Lihat</a>
                        <a href="{{ route('posts.index', ['edit' => $post->id]) }}" class="text-xs bg-[#241c0f] border border-yellow-500/10 hover:border-yellow-500/30 hover:bg-[#1a140b] text-yellow-500 px-3.5 py-2 rounded-xl transition">Edit</a>
                    </div>
                    
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs bg-[#240e11] border border-red-500/10 hover:border-red-500/30 hover:bg-[#1a0b0d] text-red-500 px-3.5 py-2 rounded-xl transition">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-[#101216] border border-dashed border-[#1f2833] p-10 text-center rounded-2xl">
                <p class="text-gray-500 text-sm">Belum ada post blog yang dibuat.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagiantion (Syarat #8) -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection