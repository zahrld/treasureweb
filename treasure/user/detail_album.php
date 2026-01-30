<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;


switch ($id) {
    case '1':
        $album_title = "REBOOT";
        $album_info = "Full Album • 2023";
        $cover_img = "reboot.jpg";
        $tracks = [
            ['no' => '01', 'title' => 'BONA BONA', 'duration' => '3:32'],
            ['no' => '02', 'title' => 'I WANT YOUR LOVE', 'duration' => '3:07'],
            ['no' => '03', 'title' => 'RUN', 'duration' => '3:29'],
            ['no' => '04', 'title' => 'MOVE (T5)', 'duration' => '3:20'],
            ['no' => '05', 'title' => 'G.O.A.T (feat Lee Young Hyun)', 'duration' => '3:02'],
            ['no' => '06', 'title' => 'STUPID', 'duration' => '3:00'],
            ['no' => '07', 'title' => 'THE WAY TO', 'duration' => '3:28'],
            ['no' => '08', 'title' => 'WONDERLAND', 'duration' => '2:58'],
            ['no' => '09', 'title' => 'B.O.M.B', 'duration' => '3:21'],
            ['no' => '10', 'title' => 'LOVESICK', 'duration' => '3:24']
        ];
        break;
    case '2':
        $album_title = "THE SECOND STEP: CHAPTER TWO";
        $album_info = "Mini Album • 2022";
        $cover_img = "hello.jpg";
        $tracks = [
            ['no' => '01', 'title' => 'HELLO', 'duration' => '3:01'],
            ['no' => '02', 'title' => 'VOLKNO', 'duration' => '3:15'],
            ['no' => '03', 'title' => 'CLAP!', 'duration' => '3:04'],
            ['no' => '04', 'title' => 'THANK YOU (ASAHI X HARUTO)', 'duration' => '3:15'],
            ['no' => '05', 'title' => 'HOLD IT IN', 'duration' => '3:18']
        ];
        break;
    case '3':
        $album_title = "THE FIRST STEP: CHAPTER ONE";
        $album_info = "Full Album • 2021";
        $cover_img = "jikjin.jpeg";
        $tracks = [
            ['no' => '01', 'title' => 'BOY', 'duration' => '3:16'],
            ['no' => '02', 'title' => 'COME TO ME', 'duration' => '3:24']
        ];
        break;
    case '4':
        $album_title = "THE FIRST STEP: CHAPTER TWO";
        $album_info = "The 1st Album • 2021";
        $cover_img = "album1.jpg";
        $tracks = [
            ['no' => '01', 'title' => 'I LOVE YOU', 'duration' => '3:01'],
            ['no' => '02', 'title' => 'B.L.T', 'duration' => '3:21']
        ];
        break;
    case '5':
        $album_title = "THE FIRST STEP: TREASURE EFFECT";
        $album_info = "The 2nd Single Album • 2020";
        $cover_img = "album2.jpg";
        $tracks = [
            ['no' => '01', 'title' => 'MY TREASURE', 'duration' => '3:15'],
            ['no' => '02', 'title' => 'BE WITH ME', 'duration' => '3:39'],
            ['no' => '03', 'title' => 'SLOWMOTION', 'duration' => '3:10']
        ];
    case '6':
        $album_title = "PLEASURE";
        $album_info = "Special Mini Album • 2025";
        $cover_img = "pleasure.jpg";
        $tracks = [
            ['no' => '01', 'title' => 'YELLOW', 'duration' => '3:11'],
            ['no' => '02', 'title' => 'SARURU', 'duration' => '3:02'],
            ['no' => '03', 'title' => 'WHATEVER, WHENEVER', 'duration' => '3:32'],
            ['no' => '04', 'title' => 'LAST NIGHT', 'duration' => '2:58']
        ];
        break;
    default: 
        $album_title = "LOVE PULSE";
        $album_info = "Full Album • 2026";
        $cover_img = "newalbum.jpg";
        $tracks = [
            ['no' => '01', 'title' => 'EVERYTHING', 'duration' => '2:52'],
            ['no' => '02', 'title' => 'PARADISE', 'duration' => '2:50'],
            ['no' => '03', 'title' => 'NOW FOREVER', 'duration' => '3:04'],
            ['no' => '04', 'title' => 'BETTER THAN ME', 'duration' => '2:56']
        ];
        break;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $album_title ?> | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; min-height: 100vh; }
        .glass-nav { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(20px); }
        .row-hover:hover { background: rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="pb-20">

    <?php include 'navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-6 mt-12">
        <a href="album.php" class="flex items-center gap-2 text-slate-500 hover:text-white mb-10 transition group text-sm font-bold uppercase tracking-widest">
            <i data-lucide="chevron-left" class="w-4 h-4 group-hover:-translate-x-1 transition"></i> Kembali ke Album
        </a>

        <div class="flex flex-col md:flex-row gap-16 items-start">
            <div class="w-full md:w-1/3 sticky top-32">
                <img src="../assets/img/<?= $cover_img ?>" class="w-full aspect-square object-cover rounded-[2.5rem] shadow-2xl border border-white/5 mb-10">
                <h1 class="text-5xl font-black tracking-tighter mb-2 uppercase"><?= $album_title ?></h1>
                <p class="text-sky-400 font-bold text-sm uppercase tracking-[0.2em] mb-10"><?= $album_info ?></p>
                <button class="w-full bg-white text-black py-4 rounded-full font-black text-xs uppercase tracking-widest flex items-center justify-center gap-3 hover:scale-105 transition">
                    <i data-lucide="play" class="fill-current w-4 h-4"></i> PLAY ALL
                </button>
            </div>

            <div class="flex-1 w-full space-y-1">
                <?php foreach($tracks as $t): ?>
                <div class="row-hover flex items-center justify-between px-8 py-6 rounded-3xl transition-all group cursor-pointer border-b border-white/[0.03]">
                    <div class="flex items-center gap-10">
                        <span class="text-slate-600 font-bold text-sm w-4 italic group-hover:text-sky-400"><?= $t['no'] ?></span>
                        <div class="flex flex-col">
                            <span class="font-black text-xl tracking-tight group-hover:text-white transition"><?= $t['title'] ?></span>
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.3em]">Treasure</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-10">
                        <button class="opacity-0 group-hover:opacity-100 transition-all p-2 bg-white/10 rounded-full hover:bg-sky-500 hover:text-black">
                            <i data-lucide="play" class="w-4 h-4 fill-current"></i>
                        </button>
                        <span class="text-slate-500 font-mono text-sm"><?= $t['duration'] ?></span>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-800 group-hover:text-white transition"></i>
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