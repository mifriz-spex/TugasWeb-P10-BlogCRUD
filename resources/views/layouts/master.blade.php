<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Rutin 10 - Blog CRUD</title>
    <!-- Tailwind CSS & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-glow { box-shadow: 0 0 15px rgba(34, 197, 94, 0.15); }
        .divider-line { background: linear-gradient(180deg, rgba(34,197,94,0) 0%, rgba(34,197,94,0.3) 50%, rgba(34,197,94,0) 100%); }
    </style>
</head>
<body class="bg-[#0b0c10] text-[#c5c6c7] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        
        <!-- Header Section -->
        <header class="flex justify-between items-center border-b border-[#1f2833] pb-6 mb-8">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-tr from-green-500 to-emerald-700 p-2.5 rounded-xl text-black font-extrabold shadow-lg shadow-green-500/20">
                    <svg class="w-6 h-6 text-[#0b0c10]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-white tracking-wider">BLOG <span class="text-[#45f3ff] bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">CRUD</span></h1>
                    <p class="text-xs text-gray-500 font-medium">Tugas Rutin 10 - Web Dev</p>
                </div>
            </div>
            <div class="text-xs font-semibold bg-[#121c18] border border-green-500/30 text-green-400 px-4 py-2 rounded-full tracking-wide">
                ACTIVE ENV • LARAVEL
            </div>
        </header>

        <!-- Flash Alert Component (Syarat #6) -->
        @if(session('success'))
            <div class="bg-[#0c1a14] border-l-4 border-green-500 text-green-300 p-4 mb-6 rounded-r-lg flex items-center justify-between custom-glow">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Layout Grid Pemisah CRUD (Kiri) dan POST (Kanan) -->
        <main class="grid grid-cols-1 lg:grid-cols-12 gap-8 relative">
            
            <!-- LEFT PANEL: CRUD Forms & Actions (Syarat #2, #5, #7) -->
            <section class="lg:col-span-5 space-y-6">
                @yield('form-content')
            </section>

            <!-- VERTIKAL DIVIDER (Visual Pemisah Glowing) -->
            <div class="hidden lg:block lg:col-span-1 flex justify-center py-4 relative">
                <div class="w-px h-full divider-line opacity-50"></div>
                <div class="absolute top-1/4 -translate-y-1/2 w-4 h-4 rounded-full bg-green-500/10 border border-green-500/40 flex items-center justify-center">
                    <div class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></div>
                </div>
            </div>

            <!-- RIGHT PANEL: Daftar & Detail Blog (Syarat #2, #8) -->
            <section class="lg:col-span-6 space-y-6">
                @yield('post-content')
            </section>

        </main>

    </div>
</body>
</html>