<nav class="sticky top-0 z-50 p-6 flex justify-center">
    <div class="bg-slate-900/30 backdrop-blur-xl border border-white/5 w-full max-w-6xl rounded-2xl px-8 py-4 flex items-center justify-between shadow-2xl">
        <div class="flex items-center gap-3">
            <img src="../assets/img/logo.png" alt="Logo" class="h-8 w-auto">
            <span class="text-xl font-black tracking-tighter uppercase italic">TREASURE<span class="text-sky-400">MUSIC</span></span>
        </div>
        
        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-400">
            <a href="dashboard.php" class="hover:text-white transition">Home</a>
            <a href="album.php" class="hover:text-white transition">Album</a>
            <a href="member.php" class="hover:text-white transition">Member</a>
        </div>

        <div class="flex items-center gap-6 border-l border-white/10 pl-6">
            <a href="profile.php" class="text-sm font-bold text-white uppercase tracking-widest hover:text-sky-400 transition">
                Hi, <span class="text-sky-400"><?= $_SESSION['username']; ?></span>
            </a>
            <a href="logout.php" class="bg-sky-500 hover:bg-sky-400 text-black px-6 py-2 rounded-full text-xs font-black transition-all shadow-lg shadow-sky-500/20">
                LOGOUT
            </a>
        </div>
    </div>
</nav>