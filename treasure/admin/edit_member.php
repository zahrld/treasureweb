<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM members WHERE id = $id");
$m = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $funfact = mysqli_real_escape_string($conn, $_POST['funfact']);
    
    $foto_lama = $_POST['foto_lama'];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    } else {
        $foto = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp_name, '../assets/img/' . $foto);
    }

    $query = "UPDATE members SET 
                nama = '$nama', 
                tempat_lahir = '$tempat_lahir', 
                tanggal_lahir = '$tanggal_lahir', 
                funfact = '$funfact', 
                foto = '$foto' 
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: manage_members.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Member | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; }
        .glass-card { background: rgba(15, 23, 42, 0.4); border: 1px solid rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); }
    </style>
</head>
<body class="p-10">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl font-black uppercase mb-10 text-center">Edit <span class="text-purple-500">Member</span></h1>
        
        <form action="" method="POST" enctype="multipart/form-data" class="glass-card p-10 rounded-[3rem] space-y-6">
            <input type="hidden" name="foto_lama" value="<?= $m['foto']; ?>">

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Nama Member</label>
                <input type="text" name="nama" value="<?= $m['nama']; ?>" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-purple-500 transition text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="<?= $m['tempat_lahir']; ?>" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-purple-500 transition text-sm">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?= $m['tanggal_lahir']; ?>" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-purple-500 transition text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Fun Fact</label>
                <textarea name="funfact" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-purple-500 transition text-sm h-32"><?= $m['funfact']; ?></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Foto Profile (Kosongkan jika tidak ganti)</label>
                <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl">
                    <img src="../assets/img/<?= $m['foto']; ?>" class="w-16 h-16 rounded-xl object-cover">
                    <input type="file" name="foto" class="text-xs text-slate-500">
                </div>
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" name="update" class="flex-1 bg-purple-600 hover:bg-purple-500 text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition shadow-lg shadow-purple-500/20">Save Changes</button>
                <a href="manage_members.php" class="px-8 py-4 bg-white/5 border border-white/10 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-white/10 transition flex items-center">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>