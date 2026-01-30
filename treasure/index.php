<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            background: radial-gradient(circle at 50% 30%, #10192d 0%, #030509 100%); 
            color: white; 
            min-height: 100vh;
        }
        .text-gradient { 
            background: linear-gradient(to right, #38bdf8, #3b82f6); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }
    </style>
</head>
<body class="overflow-x-hidden">

    <main class="min-h-screen flex flex-col items-center justify-center px-6 text-center">
        <div class="mb-12">
            <img src="assets/img/logo.png" alt="Logo" class="h-20 w-auto mx-auto mb-8 animate-bounce">
            <h1 class="text-7xl md:text-9xl font-black tracking-tighter leading-none uppercase">
                TREASURE<br><span class="text-gradient italic">MUSIC.</span>
            </h1>
            <p class="mt-8 text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Platform musik eksklusif untuk Teume. Temukan koleksi album lengkap dan biografi member favoritmu dalam satu genggaman.
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <a href="user/login.php" class="bg-sky-500 hover:bg-sky-400 text-black px-12 py-5 rounded-2xl font-black text-sm uppercase tracking-[0.2em] shadow-2xl shadow-sky-500/20 transition-all transform hover:scale-105">
                Mulai Mendengarkan
            </a>
        </div>
    </main>

    <footer class="py-20 border-t border-white/5 bg-black/40">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p class="text-[10px] font-black text-slate-700 uppercase tracking-[1em] mb-12">
                &copy; 2026 YG ENTERTAINMENT. ALL RIGHTS RESERVED.
            </p>
            
            <div class="pt-10 border-t border-white/5">
                <a href="admin/login.php" class="text-slate-800 hover:text-sky-500 transition-colors text-[9px] font-bold uppercase tracking-widest flex items-center justify-center gap-2">
                    <i data-lucide="lock" class="w-3 h-3"></i> Administrator Access
                </a>
            </div>
        </div>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>