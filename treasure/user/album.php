<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}


$other_albums = [
    ['id' => 6, 'title' => 'PLEASURE', 'year' => '2025', 'type' => 'Special Mini Album', 'cover' => 'pleasure.jpg'],
    ['id' => 1, 'title' => 'REBOOT', 'year' => '2023', 'type' => 'Full Album', 'cover' => 'reboot.jpg'],
    ['id' => 2, 'title' => 'THE SECOND STEP:Chapter Two', 'year' => '2022', 'type' => 'Mini Album', 'cover' => 'hello.jpg'],
    ['id' => 3, 'title' => 'THE FIRST STEP:Chapter One', 'year' => '2021', 'type' => 'Full Album', 'cover' => 'jikjin.jpeg'],
    ['id' => 4, 'title' => 'The First Step:Chapter Two', 'year' => '2021', 'type' => 'The 1st Album', 'cover' => 'album1.jpg'],
    ['id' => 5, 'title' => 'The First Step:Treasure Effect', 'year' => '2020', 'type' => 'The 2nd Single Album', 'cover' => 'album2.jpg'],

];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums | TREASUREMUSIC</title>
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
        .pulse-red { animation: pulse-red 2s infinite; }
        @keyframes pulse-red {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
    </style>
</head>
<body class="pb-20 overflow-x-hidden">

    <?php include 'navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-6 pt-10">
        <header class="mb-10">
            <h2 class="text-3xl font-black italic border-b-4 border-sky-500 inline-block pb-2 uppercase tracking-tighter">Album Terbaru</h2>
        </header>

        <div class="relative group bg-slate-900/40 border border-white/10 rounded-[3rem] p-8 md:p-12 overflow-hidden shadow-2xl mb-24">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-red-600/10 blur-[120px] rounded-full -z-10"></div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center relative z-10">
                <div class="relative flex justify-center">
                    <div class="absolute inset-0 bg-red-600/20 blur-[80px] rounded-full opacity-50"></div>
                    <img src="../assets/img/newalbum.jpg" alt="Love Pulse" 
                         class="w-full max-w-[400px] aspect-square object-cover rounded-[2.5rem] shadow-2xl pulse-red border border-red-500/30">
                </div>

                <div class="space-y-6">
                    <span class="bg-sky-500 text-black text-[10px] font-black px-4 py-1 rounded-full uppercase tracking-widest">Hot Release</span>
                    <h1 class="text-6xl md:text-8xl font-black tracking-tighter uppercase leading-none">LOVE <span class="italic text-red-500">PULSE.</span></h1>
                    <p class="text-slate-400 text-lg leading-relaxed max-w-md">Experience the electric beat of TREASURE's most awaited masterpiece. Feel the rhythm, catch the pulse.</p>
                    <div class="flex gap-4 pt-4">
                        <button class="bg-sky-500 hover:bg-sky-400 text-black px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-sky-500/20 transition-all transform hover:scale-105">Dengarkan Sekarang</button>
                        <a href="detail_album.php?id=0" class="bg-white/5 hover:bg-white/10 border border-white/10 px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition">Detail Album</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mb-10">
            <i data-lucide="list-music" class="text-sky-400 w-6 h-6"></i>
            <h2 class="text-2xl font-black uppercase tracking-tight">Album Lainnya</h2>
            <div class="h-[1px] flex-1 bg-white/10 ml-4"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <?php foreach($other_albums as $alb): ?>
            <a href="detail_album.php?id=<?= $alb['id'] ?>" class="group cursor-pointer block">
                <div class="aspect-square bg-slate-800 rounded-3xl mb-4 overflow-hidden border border-white/5 group-hover:border-sky-500/50 transition-all shadow-lg">
                    <img src="../assets/img/<?= $alb['cover'] ?>" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-500">
                </div>
                <h4 class="font-bold text-sm truncate uppercase tracking-tight text-white"><?= $alb['title'] ?></h4>
                <p class="text-[10px] text-slate-500 font-medium uppercase mt-1"><?= $alb['year'] ?> • <?= $alb['type'] ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </main>
    <script>lucide.createIcons();</script>
    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
</body>
</html>