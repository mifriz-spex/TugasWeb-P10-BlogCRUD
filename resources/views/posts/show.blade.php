@extends('layouts.master')

@section('form-content')
    <div class="bg-[#101216] border border-[#1f2833] rounded-2xl p-6 custom-glow">
        <h3 class="text-white font-bold mb-4">Kembali Ke Dashboard</h3>
        <a href="{{ route('posts.index') }}" class="w-full inline-block text-center bg-gradient-to-r from-green-500 to-emerald-600 text-black font-extrabold py-3.5 px-4 rounded-xl hover:shadow-lg transition-all">
            ← Kembali
        </a>
    </div>
@endsection

@section('post-content')
    <div class="bg-[#101216] border border-[#1f2833] rounded-2xl p-7">
        <span class="text-xs text-green-400 font-semibold uppercase tracking-wider mb-3 inline-block">DETAIL POST</span>
        <h2 class="text-2xl font-bold text-white mb-3">{{ $post->title }}</h2>
        <span class="text-xs text-gray-500 block mb-6">Diposting pada • {{ $post->created_at->format('d M Y, H:i') }}</span>
        
        <p class="text-gray-300 leading-relaxed text-base border-t border-[#1a1f26] pt-6 whitespace-pre-line">{{ $post->body }}</p>
    </div>
@endsection 