<?php
session_start();
require_once __DIR__ . '/../config/db.php'; 


if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

$username_session = $_SESSION['username'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username_session'");
$u = mysqli_fetch_assoc($query);


if (isset($_POST['update'])) {
    $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);

    $sql = "UPDATE users SET 
            nama = '$nama', 
            email = '$email', 
            no_hp = '$no_hp' 
            WHERE username = '$username_session'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Data Teume berhasil diupdate!');
                window.location='profile.php';
              </script>";
    } else {
        $error = "Gagal update: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            background: radial-gradient(circle at 50% 30%, #10192d 0%, #030509 100%); 
            color: white; 
            min-height: 100vh; 
        }
    </style>
</head>
<body class="flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-xl shadow-2xl relative">
        
        <header class="flex justify-between items-center mb-10">
            <h1 class="text-2xl font-black uppercase italic tracking-tighter">Edit <span class="text-sky-500">Profile</span></h1>
            <a href="profile.php" class="text-slate-500 hover:text-white transition uppercase text-[10px] font-bold tracking-widest">Batal</a>
        </header>

        <?php if(isset($error)): ?>
            <p class="text-red-500 text-xs mb-4 italic"><?= $error; ?></p>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-6">
            <div>
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Username (Locked)</label>
                <input type="text" value="<?= $u['username']; ?>" readonly 
                    class="w-full bg-slate-900/30 border border-white/5 rounded-2xl px-6 py-4 mt-2 text-slate-500 outline-none cursor-not-allowed text-sm">
            </div>

            <div>
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Nama Lengkap</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($u['nama']); ?>" required 
                    class="w-full bg-slate-800/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($u['email']); ?>" required 
                        class="w-full bg-slate-800/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">No. Handphone</label>
                    <input type="text" name="no_hp" value="<?= htmlspecialchars($u['no_hp']); ?>" required 
                        class="w-full bg-slate-800/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
                </div>
            </div>

            <button type="submit" name="update" 
                class="w-full bg-sky-600 hover:bg-sky-500 text-white font-black py-5 rounded-2xl shadow-lg shadow-sky-500/20 transition-all transform hover:scale-[1.01] mt-4 text-xs tracking-widest uppercase">
                Simpan Perubahan
            </button>
        </form>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>