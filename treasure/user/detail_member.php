<?php
session_start();

require_once __DIR__ . '/../config/db.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$biographies = [
    1 => [
        'name' => 'Choi Hyunsuk', 'birth' => '21 April 1999', 'pos' => 'Leader, Rapper',
        'fact' => 'Leader karismatik yang sangat sayang Teume. Fashionista grup!',
        'photo' => 'Hyunsuk.jpg'
    ],
    2 => [
        'name' => 'Park Jihoon', 'birth' => '14 Maret 2000', 'pos' => 'Leader, Vocalist',
        'fact' => 'Pilar kekuatan grup dengan kemampuan MC yang luar biasa.',
        'photo' => 'Jihoon.jpg'
    ],
    3 => [
        'name' => 'Kim Junkyu', 'birth' => '9 September 2000', 'pos' => 'Vocalist',
        'fact' => 'Dikenal dengan suara khasnya dan senyum koalanya.',
        'photo' => 'Junkyu.jpg'
    ],
    4 => [
        'name' => 'Yoshi', 'birth' => '15 Mei 2000', 'pos' => 'Rapper',
        'fact' => 'Rapper yang lembut dan sangat jago membuat lagu.',
        'photo' => 'Yoshi.jpg'
    ],
    5 => [
        'name' => 'Yoon Jaehyuk', 'birth' => '23 Juli 2001', 'pos' => 'Vocalist',
        'fact' => 'Visual yang manis dan selalu ceria menyapa semua orang.',
        'photo' => 'Jaehyuk.jpg'
    ],
    6 => [
        'name' => 'Asahi', 'birth' => '20 Agustus 2001', 'pos' => 'Vocalist, Producer',
        'fact' => 'Jenius musik yang artistik. Sangat jago memproduksi lagu hits.',
        'photo' => 'Asahi.jpg'
    ],
    7 => [
        'name' => 'Kim Doyoung', 'birth' => '4 Desember 2003', 'pos' => 'Dancer, Vocalist',
        'fact' => 'Dancer utama yang gerakannya sangat lincah dan berpower.',
        'photo' => 'Doyoung.jpg'
    ],
    8 => [
        'name' => 'Haruto', 'birth' => '5 April 2004', 'pos' => 'Rapper',
        'fact' => 'Rapper berdarah Jepang dengan suara low-tone yang ikonik.',
        'photo' => 'Haruto.jpg'
    ],
    9 => [
        'name' => 'Park Jeongwoo', 'birth' => '28 September 2004', 'pos' => 'Main Vocalist',
        'fact' => 'Vokalis utama dengan teknik vokal yang sangat kuat dan emosional.',
        'photo' => 'Jeongwoo.jpg'
    ],
    10 => [
        'name' => 'Seo Junghwan', 'birth' => '18 Februari 2005', 'pos' => 'Dancer, Maknae',
        'fact' => 'Maknae kesayangan yang sangat jago akrobatik dan menari.',
        'photo' => 'Junghwan.jpg'
    ],
];

$m = isset($biographies[$id]) ? $biographies[$id] : $biographies[1];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $m['name'] ?> | TREASURE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { background: #030509; color: white; font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <?php include 'navbar.php'; ?>

    <main class="flex-1 flex items-center justify-center p-10">
        <div class="max-w-4xl w-full p-10 bg-slate-900/50 rounded-[3rem] border border-white/10 flex flex-col md:flex-row gap-12 items-center shadow-2xl">
            <img src="../assets/img/<?= $m['photo'] ?>" class="w-64 h-64 rounded-full object-cover border-8 border-sky-500/20 shadow-2xl">
            
            <div class="flex-1">
                <a href="member.php" class="text-sky-500 font-bold text-xs uppercase mb-4 inline-block tracking-widest hover:translate-x-[-4px] transition-transform">
                    ← Back to Members
                </a>
                <h1 class="text-6xl font-black uppercase tracking-tighter mb-4 leading-none"><?= $m['name'] ?></h1>
                <div class="space-y-4 text-slate-300">
                    <p class="text-sm"><strong class="text-white uppercase tracking-widest text-[10px]">Tanggal Lahir:</strong><br> <?= $m['birth'] ?></p>
                    <p class="text-sm"><strong class="text-white uppercase tracking-widest text-[10px]">Posisi:</strong><br> <?= $m['pos'] ?></p>
                    <div class="h-[1px] w-12 bg-sky-500 my-4"></div>
                    <p class="leading-relaxed italic text-slate-400">"<?= $m['fact'] ?>"</p>
                </div>
            </div>
        </div>
    </main>

    <script>lucide.createIcons();</script>
    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
</body>
</html>