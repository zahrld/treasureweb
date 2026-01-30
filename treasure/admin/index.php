<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$count_albums = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM albums"));
$count_members = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM members"));
$count_users = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE role = 'user'"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; min-height: 100vh; }
        .stat-card { background: rgba(15, 23, 42, 0.4); border: 1px border rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); }
    </style>
</head>
<body class="pb-20">

    <?php include 'navbar.php'; ?>

    <main class="max-w-7xl mx-auto px-8 pt-16">
        <div class="mb-16">
            <h1 class="text-5xl font-black tracking-tighter uppercase mb-2">Admin <span class="text-sky-500 italic">Panel.</span></h1>
            <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.5em]">Manage your treasure empire</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <div class="stat-card p-10 rounded-[3rem] transition hover:-translate-y-2">
                <div class="flex justify-between items-start mb-8">
                    <div class="p-4 bg-sky-500/10 rounded-2xl text-sky-500"><i data-lucide="disc" class="w-8 h-8"></i></div>
                    <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Total Albums</span>
                </div>
                <h3 class="text-6xl font-black leading-none mb-2"><?= $count_albums; ?></h3>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Released Albums</p>
            </div>

            <div class="stat-card p-10 rounded-[3rem] transition hover:-translate-y-2 border-t-4 border-t-purple-500/50">
                <div class="flex justify-between items-start mb-8">
                    <div class="p-4 bg-purple-500/10 rounded-2xl text-purple-500"><i data-lucide="users" class="w-8 h-8"></i></div>
                    <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Active Members</span>
                </div>
                <h3 class="text-6xl font-black leading-none mb-2"><?= $count_members; ?></h3>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Treasure Lineup</p>
            </div>

            <div class="stat-card p-10 rounded-[3rem] transition hover:-translate-y-2">
                <div class="flex justify-between items-start mb-8">
                    <div class="p-4 bg-emerald-500/10 rounded-2xl text-emerald-500"><i data-lucide="user-check" class="w-8 h-8"></i></div>
                    <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Registered User</span>
                </div>
                <h3 class="text-6xl font-black leading-none mb-2"><?= $count_users; ?></h3>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Global Teume</p>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            <a href="manage_albums.php" class="group bg-white/5 p-12 rounded-[3.5rem] border border-white/5 hover:bg-white/10 transition flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-black uppercase mb-2">Manage Music</h4>
                    <p class="text-slate-500 text-sm">Add or update your album collection</p>
                </div>
                <i data-lucide="arrow-right" class="w-10 h-10 text-slate-700 group-hover:text-sky-500 transition"></i>
            </a>
            <a href="manage_members.php" class="group bg-white/5 p-12 rounded-[3.5rem] border border-white/5 hover:bg-white/10 transition flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-black uppercase mb-2">Update Members</h4>
                    <p class="text-slate-500 text-sm">Keep member profile up to date</p>
                </div>
                <i data-lucide="arrow-right" class="w-10 h-10 text-slate-700 group-hover:text-purple-500 transition"></i>
            </a>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
</body>
</html>