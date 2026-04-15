<div class="w-full max-w-4xl mx-auto py-12 px-4">
    <div class="mb-8">
        <a href="#">
            <span class="text-xs font-mono uppercase tracking-widest text-ink font-bold flex items-center gap-2 group">
                <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali ke Rak Utama
            </span>
        </a>
    </div>

    <div class="relative bg-white p-2 border-2 border-ink/20 shadow-2xl">
        <div class="border-[3px] border-ink p-10 md:p-14 relative bg-[#fdfbf7]">

            <!-- Header -->
            <div class="text-center mb-16 border-b-2 border-ink/10 pb-10">
                <h2 class="text-4xl font-serif italic text-ink font-black mb-3">Edit Informasi Buku</h2>
                <span class="text-[11px] font-mono uppercase tracking-[0.4em] text-ink font-bold py-1 px-4 bg-ink/5 border border-ink/10">
                    Lembar Inventaris Digital
                </span>
            </div>

            <!-- Form mock - onclick alert -->
            <form class="space-y-12" onclick="event.preventDefault(); alert('Mock save book data!')">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-12">

                    <!-- Kolom Kiri -->
                    <div class="space-y-10">
                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">01. Judul Utama</label>
                            <input name="title" value="Harry Potter and the Philosopher's Stone" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/20 transition-all duration-300" />
                        </div>

                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">02. Pengarang</label>
                            <input name="author" value="J.K. Rowling" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/20 transition-all duration-300" placeholder="Nama pengarang..." />
                        </div>

                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">03. ISBN</label>
                                <input name="isbn" value="978-0-7475-3269-9" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink" />
                            </div>
                            <div>
                                <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">04. Stok</label>
                                <input name="total_stock" type="number" value="15" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink" />
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-10">
                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">05. Penempatan Rak</label>
                            <select class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink cursor-pointer">
                                <option selected>Fiksi - Novel Fantasi</option>
                                <option>Sains - Filsafat</option>
                                <option>Sejarah - Biografi</option>
                                <option>Pendidikan - Kamus</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-4">06. Sampul Depan</label>
                            <div class="flex items-center gap-8">
                                <div class="relative group w-32 h-44 border-2 border-ink bg-white overflow-hidden shadow-md cursor-pointer transition-all duration-200 hover:ring-2 hover:ring-ink hover:scale-[1.02]">
                                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=128&h=180&fit=crop" class="w-full h-full object-cover" loading="lazy" alt="Sampul Buku">
                                    <div class="absolute inset-0 bg-ink/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                        <div class="flex flex-col items-center text-white">
                                            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16l4 4m0 0l-4-4m4 4L8 12m12-8h-4v4h-4v12H4V4h4V0h8v4z"></path>
                                            </svg>
                                            <span class="text-[9px] font-mono uppercase tracking-widest">tambah sampul</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-[10px] font-mono font-bold text-ink/40 italic leading-tight">
                                        * Klik sampul untuk mengganti.<br>
                                        Format JPG/PNG, Maks 2MB.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-3">07. Ikhtisar Pustakawan</label>
                        <textarea rows="4" class="w-full bg-white border-2 border-ink focus:ring-0 p-5 font-serif text-xl italic text-ink shadow-inner">Buku klasik fantasi tentang petualangan Harry Potter di Hogwarts. Cocok untuk semua umur, mengajarkan nilai persahabatan dan keberanian.</textarea>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between pt-10 border-t-2 border-ink/10 gap-8">
                    <div class="max-w-xs">
                        <p class="text-[11px] font-mono uppercase font-bold text-ink leading-relaxed">
                            Pastikan seluruh data telah diverifikasi sesuai dengan fisik buku.
                        </p>
                    </div>
                    <button class="px-8 py-3 text-sm tracking-[0.25em] font-mono font-black uppercase border-2 border-ink shadow-[6px_6px_0px_rgba(44,36,32,1)] hover:translate-y-[2px] hover:shadow-[4px_4px_0px_rgba(44,36,32,1)] active:translate-y-[6px] active:shadow-none transition-all duration-150 bg-[#fcfaf5] text-ink" onclick="alert('Book saved!')">
                        Simpan Koleksi →
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
