<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $tahun = $_POST['tahun'];
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $cover = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];

    move_uploaded_file($tmp_name, '../assets/img/' . $cover);

    $query = "INSERT INTO albums (judul, tahun, cover, tipe, deskripsi) 
              VALUES ('$judul', '$tahun', '$cover', '$tipe', '$deskripsi')";

    if (mysqli_query($conn, $query)) {
        header("Location: manage_albums.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Add New Album | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; }
        .glass-card { background: rgba(15, 23, 42, 0.4); border: 1px solid rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); }
    </style>
</head>
<body class="p-10">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl font-black uppercase mb-10 text-center">Add New <span class="text-sky-500 italic">Album.</span></h1>
        
        <form action="" method="POST" enctype="multipart/form-data" class="glass-card p-10 rounded-[3rem] space-y-6 shadow-2xl">
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Album Title</label>
                <input type="text" name="judul" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Release Year</label>
                    <input type="number" name="tahun" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Album Type</label>
                    <select name="tipe" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm text-slate-400">
                        <option value="Full Album">Full Album</option>
                        <option value="Mini Album">Mini Album</option>
                        <option value="Single Album">Single Album</option>
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Description</label>
                <textarea name="deskripsi" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm h-32"></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Cover Artwork</label>
                <input type="file" name="cover" required class="w-full bg-white/5 border border-dashed border-white/20 rounded-2xl px-6 py-10 outline-none text-xs text-slate-500">
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" name="submit" class="flex-1 bg-sky-500 hover:bg-sky-400 text-black py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition shadow-lg shadow-sky-500/20">Add Album</button>
                <a href="manage_albums.php" class="px-8 py-4 bg-white/5 border border-white/10 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-white/10 transition flex items-center">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>