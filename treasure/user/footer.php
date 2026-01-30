<footer class="mt-40 border-t border-white/5 pt-20 pb-10 bg-black/20">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex flex-col items-center md:items-start">
                <div class="flex items-center gap-3 mb-4">
                    <img src="../assets/img/logo.png" alt="Logo" class="h-6 w-auto opacity-50">
                    <span class="text-lg font-black tracking-tighter uppercase italic opacity-50">
                        TREASURE<span class="text-sky-500">MUSIC</span>
                    </span>
                </div>
                <p class="text-slate-600 text-[10px] font-bold uppercase tracking-[0.3em]">
                    The ultimate destination for Teume.
                </p>
            </div>

            <div class="flex gap-10 text-[10px] font-black uppercase tracking-widest text-slate-500">
                <a href="#" class="hover:text-sky-500 transition">Privacy Policy</a>
                <a href="#" class="hover:text-sky-500 transition">Terms of Service</a>
                <a href="#" class="hover:text-sky-500 transition">Support</a>
            </div>
        </div>

        <div class="mt-20 text-center">
            <p class="text-[9px] font-black text-slate-800 uppercase tracking-[1em]">
                &copy; 2026 YG ENTERTAINMENT. ALL RIGHTS RESERVED. <br>
                PRODUCED BY <?= $_SESSION['username']; ?> FOR TEUME.
            </p>
        </div>
    </div>
</footer>