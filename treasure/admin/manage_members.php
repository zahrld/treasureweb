<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM members ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members | Admin TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; min-height: 100vh; }
        .table-glass { background: rgba(15, 23, 42, 0.4); border: 1px solid rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); }
    </style>
</head>
<body class="pb-20">

    <?php include 'navbar.php'; ?>

    <main class="max-w-7xl mx-auto px-8 pt-16">
        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12">
            <div>
                <h1 class="text-5xl font-black tracking-tighter uppercase mb-2">Manage <span class="text-purple-500 italic">Members.</span></h1>
                <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.5em]">Keep your artist profiles updated</p>
            </div>
        </div>

        <div class="table-glass rounded-[3rem] overflow-hidden p-8 shadow-2xl">
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b border-white/5 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-6 italic">Profile</th>
                        <th class="px-6 py-6">Member Name</th>
                        <th class="px-6 py-6">Birth Details</th>
                        <th class="px-6 py-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.03]">
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr class="group hover:bg-white/[0.02] transition-colors">
                        <td class="px-6 py-6">
                            <div class="w-14 h-14 rounded-full overflow-hidden border-2 border-white/10 group-hover:border-purple-500 transition-all shadow-xl">
                                <img src="../assets/img/<?= htmlspecialchars($row['foto']); ?>" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex flex-col">
                                <span class="text-xl font-black uppercase tracking-tight group-hover:text-purple-400 transition"><?= htmlspecialchars($row['nama']); ?></span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1"><?= htmlspecialchars($row['funfact']); ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex flex-col text-sm">
                                <span class="text-slate-300 font-medium"><?= htmlspecialchars($row['tempat_lahir']); ?></span>
                                <span class="text-slate-500 text-xs italic font-bold"><?= date('d F Y', strtotime($row['tanggal_lahir'])); ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <div class="flex justify-end gap-3">
                                <a href="edit_member.php?id=<?= $row['id']; ?>" class="p-3 bg-white/5 hover:bg-purple-500 hover:text-white rounded-xl transition-all shadow-lg">
                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
</body>
</html>