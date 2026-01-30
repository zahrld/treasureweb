<?php
// Pastikan koneksi database benar
require_once __DIR__ . '/../config/db.php'; 

$query_member = mysqli_query($conn, "SELECT * FROM members ORDER BY nama ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure Music | Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background: radial-gradient(circle at 50% 30%, #10192d 0%, #070b14 60%, #030509 100%);
            color: white; 
            min-height: 100vh;
        }

        .text-gradient {
            background: linear-gradient(to right, #38bdf8, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .ambient-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.05) 0px, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>
<body class="selection:bg-sky-500 pb-20 overflow-x-hidden">

    <div class="ambient-glow"></div>

    <?php include 'navbar.php'; ?>

    <main class="max-w-7xl mx-auto px-8 pt-12">
        <div class="grid lg:grid-cols-2 gap-12 items-center mb-32">
            <div class="space-y-8">
                <h1 class="text-7xl md:text-8xl font-black leading-[0.85] tracking-tighter">
                    Find Your <br>
                    <span class="text-gradient italic uppercase">TREASURE.</span>
                </h1>
                <p class="text-slate-400 text-lg max-w-md leading-relaxed">
                    Platform streaming masa depan untuk Teume. Nikmati suara jernih dan fitur cerdas untuk setiap momenmu.
                </p>
                
                <div class="flex gap-10">
                    <div class="flex flex-col">
                        <span class="flex items-center gap-2 text-sky-400 font-bold text-xl">
                            <i data-lucide="music" class="w-5 h-5"></i> 100+
                        </span>
                        <span class="text-slate-500 text-xs uppercase tracking-widest mt-1 font-bold">Songs</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="flex items-center gap-2 text-purple-400 font-bold text-xl">
                            <i data-lucide="users" class="w-5 h-5"></i> 10
                        </span>
                        <span class="text-slate-500 text-xs uppercase tracking-widest mt-1 font-bold">Members</span>
                    </div>
                </div>
            </div>

            <div class="relative flex justify-center items-center">
                <div class="absolute w-[130%] h-[130%] bg-[radial-gradient(circle,rgba(255,255,255,0.08)_0%,rgba(16,25,45,0)_70%)] -z-10"></div>
                
                <div class="relative">
                    <img src="../assets/img/foto.png" 
                        alt="Treasure Group" 
                        class="w-full h-auto object-cover opacity-90 [mask-image:radial-gradient(ellipse_at_center,black_50%,transparent_90%)]">
                </div>
            </div>
        </div>

        <div class="flex items-center gap-6 mb-12">
            <h2 class="text-3xl font-black uppercase tracking-widest"> Artist <span class="text-sky-500 font-black">LINEUP</span></h2>
            <div class="h-[1px] flex-1 bg-gradient-to-r from-white/10 to-transparent"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php while($m = mysqli_fetch_assoc($query_member)): ?>
            <div class="group relative bg-slate-900/30 border border-white/5 rounded-[2.5rem] p-5 hover:-translate-y-2 hover:bg-slate-800/30 transition-all duration-300">
                <div class="relative aspect-square rounded-2xl overflow-hidden bg-slate-800 mb-5">
                    <img src="../assets/img/members/<?= htmlspecialchars($m['foto']); ?>" 
                         alt="<?= htmlspecialchars($m['nama']); ?>" 
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                </div>

                <div class="space-y-1">
                    <h4 class="text-2xl font-black tracking-tight"><?= htmlspecialchars($m['nama']); ?></h4>
                    <p class="text-sky-400 text-xs font-semibold uppercase tracking-widest">
                        <?= htmlspecialchars($m['tempat_lahir']); ?>, <?= date('Y', strtotime($m['tanggal_lahir'])); ?>
                    </p>
                    <div class="mt-4 p-4 bg-slate-950/40 rounded-2xl border border-white/5">
                        <p class="text-[11px] text-slate-400 leading-relaxed italic">"<?= htmlspecialchars($m['funfact']); ?>"</p>
                    </div>
                </div>
                
                <a href="edit.php?id=<?= $m['id']; ?>" class="absolute top-8 right-8 p-2 bg-white/5 backdrop-blur-md rounded-lg opacity-0 group-hover:opacity-100 transition-all hover:bg-sky-500 hover:text-black">
                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
       <div class="mt-40 mb-20 max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-center mb-12">
                <h2 class="text-5xl font-black uppercase tracking-tighter leading-none">
                    Lagu <span class="text-gradient italic">    Terpanas         </span> Minggu Ini
                </h2>
                
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 justify-items-center">
                <?php
                $hot_tracks = [
                    ['title' => 'KING KONG', 'artist' => 'TREASURE', 'glow' => 'rgba(239, 68, 68, 0.15)'],
                    ['title' => 'BONA BONA', 'artist' => 'TREASURE', 'glow' => 'rgba(56, 189, 248, 0.15)'],
                    ['title' => 'HELLO', 'artist' => 'TREASURE', 'glow' => 'rgba(249, 115, 22, 0.15)'],
                ];

                foreach($hot_tracks as $song):
                ?>
                <div class="group relative w-full bg-slate-900/40 border border-white/5 rounded-[3rem] p-7 hover:-translate-y-3 transition-all duration-500 shadow-2xl">
                    
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700" 
                         style="background: radial-gradient(circle at top right, <?= $song['glow']; ?>, transparent 70%);"></div>
                    
                    <div class="relative aspect-[3/4] bg-slate-950 rounded-[2rem] overflow-hidden mb-8 flex items-center justify-center border border-white/5 shadow-inner">
                        <span class="text-slate-800 font-black tracking-[0.2em] text-xs uppercase opacity-30 select-none">Visual Preview</span>
                        
                        <div class="absolute inset-0 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-6 group-hover:translate-y-0">
                            <button class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition active:scale-95">
                                <i data-lucide="play" class="fill-current w-7 h-7 ml-1 text-black"></i>
                            </button>
                            <button class="w-14 h-14 bg-white/10 backdrop-blur-xl text-white border border-white/20 rounded-full flex items-center justify-center hover:bg-white/20 transition">
                                <i data-lucide="sparkles" class="w-6 h-6"></i>
                            </button>
                        </div>
                    </div>

                    <div class="relative space-y-2">
                        <h3 class="text-3xl font-black tracking-tight leading-tight"><?= $song['title']; ?></h3>
                        <p class="text-sky-400 text-sm font-bold uppercase tracking-[0.15em]"><?= $song['artist']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
    <?php include 'footer.php'; ?>

    <script>lucide.createIcons();</script>
    
</body>


</html>