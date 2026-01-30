<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$members = [
    ['id' => 1, 'name' => 'Choi Hyunsuk', 'role' => 'Leader, Rapper', 'photo' => 'Hyunsuk.jpg'],
    ['id' => 2, 'name' => 'Park Jihoon', 'role' => 'Leader, Vocalist', 'photo' => 'jihoon.jpg'],
    ['id' => 3, 'name' => 'Kim Junkyu', 'role' => 'Vocalist', 'photo' => 'Junkyu.jpg'],
    ['id' => 4, 'name' => 'Yoshi', 'role' => 'Rapper', 'photo' => 'Yoshi.jpg'],
    ['id' => 5, 'name' => 'Yoon Jaehyuk', 'role' => 'Vocalist', 'photo' => 'Jaehyuk.jpg'],
    ['id' => 6, 'name' => 'Asahi', 'role' => 'Vocalist, Producer', 'photo' => 'asahi.jpg'],
    ['id' => 7, 'name' => 'Kim Doyoung', 'role' => 'Dancer, Vocalist', 'photo' => 'Doyoung.jpg'],
    ['id' => 8, 'name' => 'Haruto', 'role' => 'Rapper', 'photo' => 'haruto.jpg'],
    ['id' => 9, 'name' => 'Park Jeongwoo', 'role' => 'Main Vocalist', 'photo' => 'jeongwoo.jpg'],
    ['id' => 10, 'name' => 'Seo Junghwan', 'role' => 'Dancer, Maknae', 'photo' => 'junghwan.jpg'],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Members | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; }
    </style>
</head>
<body class="pb-20">
    <?php include 'navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-6 pt-12">
        <h2 class="text-4xl font-black italic border-b-4 border-sky-500 inline-block pb-2 uppercase tracking-tighter mb-12">Treasure Members</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
            <?php foreach($members as $m): ?>
            <a href="detail_member.php?id=<?= $m['id'] ?>" class="group block text-center">
                <div class="relative overflow-hidden rounded-full aspect-square border-4 border-white/5 group-hover:border-sky-500 transition-all duration-500 mb-4">
                    <img src="../assets/img/<?= $m['photo'] ?>" alt="<?= $m['name'] ?>" 
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="font-black uppercase text-sm tracking-widest"><?= $m['name'] ?></h3>
                <p class="text-[10px] text-slate-500 font-bold uppercase mt-1"><?= $m['role'] ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </main>
    <script>lucide.createIcons();</script>
    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
</body>
</html>