<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

$members_manual = [
    ['nama' => 'Choi Hyunsuk', 'lahir' => '1999', 'foto' => 'Hyunsuk.jpg', 'fact' => 'Leader & Rapper'],
    ['nama' => 'Park Jihoon', 'lahir' => '2000', 'foto' => 'Jihoon.jpg', 'fact' => 'Leader & Vocalist'],
    ['nama' => 'Kim Junkyu', 'lahir' => '2000', 'foto' => 'Junkyu.jpg', 'fact' => 'Vocalist & Mood Maker'],
    ['nama' => 'Yoshi', 'lahir' => '2000', 'foto' => 'Yoshi.jpg', 'fact' => 'High Tone Rapper'],
    ['nama' => 'Yoon Jaehyuk', 'lahir' => '2001', 'foto' => 'Jaehyuk.jpg', 'fact' => 'Vocalist & Visual'],
    ['nama' => 'Asahi', 'lahir' => '2001', 'foto' => 'Asahi.jpg', 'fact' => 'Producer & Vocalist'],
    ['nama' => 'Kim Doyoung', 'lahir' => '2003', 'foto' => 'Doyoung.jpg', 'fact' => 'Main Dancer'],
    ['nama' => 'Haruto', 'lahir' => '2004', 'foto' => 'Haruto.jpg', 'fact' => 'Low Tone Rapper'],
    ['nama' => 'Park Jeongwoo', 'lahir' => '2004', 'foto' => 'Jeongwoo.jpg', 'fact' => 'Main Vocalist'],
    ['nama' => 'Seo Junghwan', 'lahir' => '2005', 'foto' => 'Junghwan.jpg', 'fact' => 'Maknae & Dancer']
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: radial-gradient(circle at 50% 30%, #10192d 0%, #030509 100%); color: white; min-height: 100vh; }
        .text-gradient { background: linear-gradient(to right, #38bdf8, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="selection:bg-sky-500 pb-20 overflow-x-hidden">

    <?php include 'navbar.php'; ?>

    <main class="max-w-7xl mx-auto px-8 pt-12">
        <div class="grid lg:grid-cols-2 gap-12 items-center mb-32">
            <div class="space-y-8">
                <h1 class="text-7xl md:text-8xl font-black leading-[0.85] tracking-tighter uppercase">
                    Find Your <br> <span class="text-gradient italic">TREASURE.</span>
                </h1>
                <p class="text-slate-400 text-lg max-w-md leading-relaxed">Platform streaming masa depan untuk Teume. Nikmati suara jernih dan fitur cerdas untuk setiap momenmu.</p>
                <div class="flex gap-10">
                    <div class="flex flex-col"><span class="flex items-center gap-2 text-sky-400 font-bold text-xl"><i data-lucide="music" class="w-5 h-5"></i> 100+</span><span class="text-slate-500 text-xs uppercase tracking-widest mt-1 font-bold">Songs</span></div>
                    <div class="flex flex-col"><span class="flex items-center gap-2 text-purple-400 font-bold text-xl"><i data-lucide="users" class="w-5 h-5"></i> 10</span><span class="text-slate-500 text-xs uppercase tracking-widest mt-1 font-bold">Members</span></div>
                </div>
            </div>
            <div class="relative flex justify-center items-center group">
                <div class="absolute w-[130%] h-[130%] bg-[radial-gradient(circle,rgba(56,189,248,0.1)_0%,transparent_70%)] -z-10"></div>
                <img src="../assets/img/fotogrup.png" alt="Group" class="w-full h-auto object-cover opacity-90 [mask-image:radial-gradient(ellipse_at_center,black_50%,transparent_90%)] transition-opacity duration-700 group-hover:opacity-100">
            </div>
        </div>

        <div class="flex items-center gap-6 mb-12">
            <h2 class="text-3xl font-black uppercase tracking-widest">Artist <span class="text-sky-500">LINEUP</span></h2>
            <div class="h-[1px] flex-1 bg-gradient-to-r from-white/10 to-transparent"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-5 gap-6 mb-40">
            <?php foreach($members_manual as $m): ?>
            <div class="group relative bg-slate-900/30 border border-white/5 rounded-[2rem] p-4 hover:-translate-y-2 hover:bg-slate-800/30 transition-all">
                <div class="relative aspect-square rounded-2xl overflow-hidden bg-slate-800 mb-4 border border-white/5">
                    <img src="../assets/img/<?= $m['foto']; ?>" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                </div>
                <div class="text-center">
                    <h4 class="text-lg font-black tracking-tight uppercase"><?= $m['nama']; ?></h4>
                    <p class="text-sky-400 text-[9px] font-bold uppercase tracking-widest"><?= $m['fact']; ?> • <?= $m['lahir']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-40 mb-20">
            <div class="flex flex-col items-center justify-center text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black uppercase tracking-tighter leading-tight">Lagu <span class="text-gradient italic">Terpanas</span></h2>
                <div class="mt-6 w-24 h-1 bg-sky-500 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php
                $hot_tracks = [
                    ['title' => 'KING KONG', 'artist' => 'LOVE PULSE', 'img' => 'newalbum.jpg', 'glow' => 'rgba(239, 68, 68, 0.2)'],
                    ['title' => 'BONA BONA', 'artist' => 'REBOOT', 'img' => 'reboot.jpg', 'glow' => 'rgba(56, 189, 248, 0.2)'],
                    ['title' => 'HELLO', 'artist' => 'HELLO ALBUM', 'img' => 'hello.jpg', 'glow' => 'rgba(249, 115, 22, 0.2)'],
                ];
                foreach($hot_tracks as $song):
                ?>
                <div class="group relative w-full bg-slate-900/40 border border-white/5 rounded-[3rem] p-7 hover:-translate-y-3 transition-all duration-500">
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 rounded-[3rem]" style="background: radial-gradient(circle at top right, <?= $song['glow']; ?>, transparent 70%);"></div>
                    <div class="relative aspect-square rounded-[2rem] overflow-hidden mb-8 border border-white/10">
                        <img src="../assets/img/<?= $song['img']; ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-all duration-500">
                            <button class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center hover:scale-110 shadow-2xl transition"><i data-lucide="play" class="fill-current w-8 h-8 ml-1"></i></button>
                        </div>
                    </div>
                    <div class="relative">
                        <h3 class="text-2xl font-black uppercase tracking-tight"><?= $song['title']; ?></h3>
                        <p class="text-sky-400 text-[10px] font-bold uppercase tracking-widest mt-1"><?= $song['artist']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script>lucide.createIcons();</script>
    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
</body>
</html>