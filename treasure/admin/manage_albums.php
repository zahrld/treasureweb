<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM albums ORDER BY tahun DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Albums | Admin</title>
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
                <h1 class="text-5xl font-black tracking-tighter uppercase mb-2">Manage <span class="text-sky-500 italic">Albums.</span></h1>
                <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.5em]">View and manage your music description</p>
            </div>
            <a href="add_album.php" class="bg-sky-500 hover:bg-sky-400 text-black px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-sky-500/20 flex items-center gap-3">
                <i data-lucide="plus" class="w-4 h-4"></i> Add New Album
            </a>
        </div>

        <div class="table-glass rounded-[3rem] overflow-hidden p-8 shadow-2xl">
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b border-white/5 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-6">Cover</th>
                        <th class="px-6 py-6">Album info</th>
                        <th class="px-6 py-6">Description</th>
                        <th class="px-6 py-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.03]">
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr class="group hover:bg-white/[0.02] transition-colors">
                        <td class="px-6 py-6">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden border border-white/10 group-hover:border-sky-500/50 transition-all">
                                <img src="../assets/img/<?= $row['cover']; ?>" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex flex-col">
                                <span class="text-xl font-black uppercase tracking-tight group-hover:text-sky-400 transition"><?= $row['judul']; ?></span>
                                <span class="text-[10px] text-slate-500 font-bold italic mt-1"><?= $row['tahun']; ?> • <?= $row['tipe']; ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs text-slate-400 leading-relaxed max-w-xs line-clamp-2">
                                <?= $row['deskripsi']; ?>
                            </p>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <div class="flex justify-end gap-3">
                                <a href="edit_album.php?id=<?= $row['id']; ?>" class="p-3 bg-white/5 hover:bg-sky-500 hover:text-black rounded-xl transition-all">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <a href="delete_album.php?id=<?= $row['id']; ?>" 
                                   class="p-3 bg-white/5 hover:bg-red-500 hover:text-white rounded-xl transition-all"
                                   onclick="return confirm('Hapus album <?= $row['judul']; ?>?')">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
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