<?php
require_once __DIR__ . '/../config/db.php'; 

if (isset($_POST['register'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = 'user'; 


    $check_user = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($check_user) > 0) {
        $error = "Username atau Email sudah digunakan, cari identitas Teume lain!";
    } else {
        if ($password !== $confirm_password) {
            $error = "Konfirmasi password tidak sesuai!";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $query = "INSERT INTO users (nama, username, email, no_hp, password, role) 
                      VALUES ('$nama', '$username', '$email', '$no_hp', '$hashed_password', '$role')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script>
                        alert('Registrasi Berhasil! Silakan Login.');
                        window.location='login.php';
                      </script>";
            } else {
                $error = "Terjadi kesalahan sistem: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Teume | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            background: radial-gradient(circle at 50% 30%, #10192d 0%, #030509 100%); 
            min-height: 100vh; 
            color: white; 
        }
    </style>
</head>
<body class="flex items-center justify-center p-6">

    <div class="fixed top-0 left-0 w-[400px] h-[400px] bg-sky-600/10 blur-[120px] rounded-full -z-10 animate-pulse"></div>

    <div class="w-full max-w-lg bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-xl shadow-2xl my-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black uppercase tracking-tighter italic">TREASURE<span class="text-sky-500 font-black">MUSIC</span></h1>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-2">Create New Teume Account</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-500 text-[11px] font-bold py-3 px-4 rounded-xl mb-6 text-center italic">
                ⚠️ <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>
            <div>
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Username</label>
                <input type="text" name="username" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>
            <div>
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">No. HP</label>
                <input type="text" name="no_hp" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>
            <div class="md:col-span-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Email</label>
                <input type="email" name="email" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>
            <div>
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Password</label>
                <input type="password" name="password" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>
            <div>
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Confirm Password</label>
                <input type="password" name="confirm_password" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 mt-2 focus:border-sky-500 outline-none transition text-sm">
            </div>

            <button type="submit" name="register" class="md:col-span-2 bg-sky-600 hover:bg-sky-500 text-white font-black py-5 rounded-2xl shadow-lg shadow-sky-500/20 transition-all transform hover:scale-[1.02] mt-4 text-xs tracking-widest">
                DAFTAR SEKARANG
            </button>
        </form>

        <p class="text-center text-slate-500 text-xs mt-10 font-medium">
            Sudah punya akun? <a href="login.php" class="text-sky-400 font-bold hover:underline transition-all">Masuk ke Sini</a>
        </p>
    </div>
</body>
</html>