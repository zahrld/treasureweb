<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM albums WHERE id = $id");
$a = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $tahun = $_POST['tahun'];
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $cover_lama = $_POST['cover_lama'];

    if ($_FILES['cover']['error'] === 4) {
        $cover = $cover_lama;
    } else {
        $cover = $_FILES['cover']['name'];
        $tmp_name = $_FILES['cover']['tmp_name'];
        move_uploaded_file($tmp_name, '../assets/img/' . $cover);
    }

    $query = "UPDATE albums SET 
                judul = '$judul', 
                tahun = '$tahun', 
                tipe = '$tipe', 
                deskripsi = '$deskripsi', 
                cover = '$cover' 
              WHERE id = $id";

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
    <title>Edit Album | Admin TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; }
        .glass-card { background: rgba(15, 23, 42, 0.4); border: 1px solid rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); }
    </style>
</head>
<body class="p-10">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl font-black uppercase mb-10 text-center">Edit <span class="text-sky-500">Album.</span></h1>
        
        <form action="" method="POST" enctype="multipart/form-data" class="glass-card p-10 rounded-[3rem] space-y-6 shadow-2xl">
            <input type="hidden" name="cover_lama" value="<?= $a['cover']; ?>">

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Album Title</label>
                <input type="text" name="judul" value="<?= htmlspecialchars($a['judul']); ?>" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Release Year</label>
                    <input type="number" name="tahun" value="<?= $a['tahun']; ?>" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Album Type</label>
                    <select name="tipe" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm text-slate-400">
                        <option value="Full Album" <?= $a['tipe'] == 'Full Album' ? 'selected' : ''; ?>>Full Album</option>
                        <option value="Mini Album" <?= $a['tipe'] == 'Mini Album' ? 'selected' : ''; ?>>Mini Album</option>
                        <option value="Single Album" <?= $a['tipe'] == 'Single Album' ? 'selected' : ''; ?>>Single Album</option>
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Album Description</label>
                <textarea name="deskripsi" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm h-32"><?= htmlspecialchars($a['deskripsi']); ?></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Cover Artwork (Kosongkan jika tidak ganti)</label>
                <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl">
                    <img src="../assets/img/<?= $a['cover']; ?>" class="w-16 h-16 rounded-xl object-cover border border-white/10">
                    <input type="file" name="cover" class="text-xs text-slate-500">
                </div>
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" name="update" class="flex-1 bg-sky-500 hover:bg-sky-400 text-black py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition shadow-lg shadow-sky-500/20">Update Album</button>
                <a href="manage_albums.php" class="px-8 py-4 bg-white/5 border border-white/10 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-white/10 transition flex items-center">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>