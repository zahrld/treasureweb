<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (isset($_SESSION['login']) && $_SESSION['role'] === 'admin') {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND role = 'admin'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (md5($password) === $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'admin';
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | TREASUREMUSIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #030509; color: white; }
        .glass { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="glass max-w-md w-full p-12 rounded-[3rem] border-t-4 border-t-sky-500">
        <h1 class="text-3xl font-black text-center uppercase mb-8">Admin <span class="text-sky-500 italic">Access</span></h1>
        <?php if (isset($error)) : ?>
            <p class="text-red-500 text-center text-xs font-bold mb-6 italic uppercase tracking-widest">Login Gagal! Akun Admin Tidak Ditemukan.</p>
        <?php endif; ?>
        <form action="" method="POST" class="space-y-6">
            <input type="text" name="username" placeholder="Admin Username" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm">
            <input type="password" name="password" placeholder="Admin Password" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-sky-500 transition text-sm">
            <button type="submit" name="login" class="w-full bg-sky-500 hover:bg-sky-400 text-black py-5 rounded-2xl font-black text-xs uppercase tracking-widest transition shadow-lg shadow-sky-500/20">Authorize</button>
        </form>
    </div>
</body>
</html>