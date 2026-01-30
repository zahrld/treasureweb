<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$u = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Teume | TREASURE MUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: radial-gradient(circle at 50% 30%, #10192d 0%, #030509 100%); color: white; min-height: 100vh; }
    </style>
</head>
<body class="flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-xl shadow-2xl relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-sky-500/10 blur-[100px] rounded-full"></div>

        <div class="relative">
            <header class="flex justify-between items-center mb-12">
                <a href="dashboard.php" class="flex items-center gap-2 text-slate-400 hover:text-white transition">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    <span class="text-xs font-bold uppercase tracking-widest">Back</span>
                </a>
                <h1 class="text-xl font-black uppercase italic tracking-tighter">My <span class="text-sky-500">Profile</span></h1>
            </header>

            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="w-32 h-32 bg-sky-500 rounded-full flex items-center justify-center shadow-2xl shadow-sky-500/20 border-4 border-white/10">
                    <span class="text-4xl font-black text-white"><?= strtoupper(substr($u['username'], 0, 1)); ?></span>
                </div>

                <div class="flex-1 space-y-6 w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Nama Lengkap</label>
                            <p class="text-lg font-bold text-white"><?= htmlspecialchars($u['nama']); ?></p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Username</label>
                            <p class="text-lg font-bold text-sky-400">@<?= htmlspecialchars($u['username']); ?></p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Email Address</label>
                            <p class="text-lg font-bold text-white"><?= htmlspecialchars($u['email']); ?></p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">No. Handphone</label>
                            <p class="text-lg font-bold text-white"><?= htmlspecialchars($u['no_hp']); ?></p>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5">
                        <a href="edit_profile.php" class="w-full block text-center bg-white/5 hover:bg-white/10 border border-white/10 py-4 rounded-2xl text-xs font-black tracking-widest transition uppercase">
                            Edit Profile Info
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>