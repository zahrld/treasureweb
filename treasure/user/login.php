<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            if ($row['role'] !== 'user') {
                $error = "Akses ditolak! Ini halaman khusus Teume.";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                header("Location: dashboard.php");
                exit;
            }
        }
    }
    $error = "Username atau Password salah!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: radial-gradient(circle at 50% 30%, #10192d 0%, #030509 100%); min-height: 100vh; color: white; font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-xl shadow-2xl">
        <div class="text-center mb-10">
            <img src="../assets/img/logo.png" class="h-10 mx-auto mb-4">
            <h1 class="text-3xl font-black uppercase tracking-tighter italic">TREASURE<span class="text-sky-500">MUSIC</span></h1>
            <p class="text-slate-400 text-sm mt-2 font-bold uppercase tracking-widest">Teume Login</p>
        </div>

        <?php if(isset($error)): ?>
            <p class="bg-red-500/20 border border-red-500/50 text-red-500 text-xs py-3 rounded-xl mb-6 text-center"><?= $error; ?></p>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-6">
            <input type="text" name="username" placeholder="Username" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-5 py-4 focus:border-sky-500 outline-none transition text-white">
            <input type="password" name="password" placeholder="Password" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-5 py-4 focus:border-sky-500 outline-none transition text-white">
            <button type="submit" name="login" class="w-full bg-sky-600 hover:bg-sky-500 text-white font-black py-4 rounded-2xl shadow-lg shadow-sky-500/20 transition-all transform hover:scale-[1.02]">
                MASUK SEKARANG
            </button>
        </form>
        <p class="text-center text-slate-500 text-sm mt-8">
            Belum punya akun? <a href="register.php" class="text-sky-400 font-bold hover:underline">Daftar Teume</a>
        </p>
    </div>

</body>
</html>