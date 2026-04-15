<div class="w-full max-w-4xl mx-auto py-12 px-4">
    <!-- Navigasi -->
    <div class="mb-8">
        <a href="#" class="text-xs font-mono uppercase tracking-widest text-ink font-bold flex items-center gap-2 group">
            <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali ke Daftar Personalia
        </a>
    </div>

    <div class="relative bg-white p-2 border-2 border-ink/20 shadow-2xl">
        <div class="border-[3px] border-ink p-10 md:p-14 relative bg-[#fdfbf7]">

            <!-- Header Form -->
            <div class="text-center mb-16 border-b-2 border-ink/10 pb-10">
                <h2 class="text-4xl font-serif italic text-ink font-black mb-3">Edit Pengguna</h2>
                <span class="text-[11px] font-mono uppercase tracking-[0.4em] text-ink font-bold py-1 px-4 bg-ink/5 border border-ink/10">
                    Otoritas & Identitas Keanggotaan
                </span>
            </div>

            <!-- Form mock -->
            <form class="space-y-12" onclick="event.preventDefault(); alert('Mock user update!')">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-12">

                    <div class="space-y-10">
                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">01. Nama Lengkap Sesuai Identitas</label>
                            <input value="John Doe" placeholder="Masukkan nama..." class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/20 transition-all duration-300" />
                        </div>

                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">02. Alamat Surat Elektronik (Email)</label>
                            <input type="email" value="john.doe@example.com" placeholder="example@mail.com" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/20 transition-all duration-300" />
                        </div>

                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">03. Password (abaikan jika tidak diubah)</label>
                            <input type="password" placeholder="••••••••" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/20 transition-all duration-300" />
                        </div>
                    </div>

                    <!-- Sisi Kanan: Detail & Otoritas -->
                    <div class="space-y-10">
                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">04. Peran / Otoritas Sistem</label>
                            <select class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink cursor-pointer">
                                <option selected>Administrator</option>
                                <option>Petugas Scriptoria</option>
                                <option>Anggota Terdaftar</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">05. Nomor Telepon Aktif</label>
                            <input value="08123456789" placeholder="08xxxxxxxxxx" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:outline-none focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/20 transition-all duration-300" />
                        </div>

                        <!-- Textarea Alamat -->
                        <div>
                            <label class="block text-[12px] font-mono uppercase font-black tracking-widest text-ink mb-2">06. Domisili / Alamat Lengkap</label>
                            <textarea rows="2" class="w-full bg-transparent border-0 border-b-2 border-ink/30 focus:border-ink focus:ring-0 px-0 py-2 font-serif text-xl italic text-ink placeholder:text-ink/10" placeholder="Tuliskan alamat...">
Jl. Contoh No.123, Jakarta Barat
                            </textarea>
                        </div>
                    </div>
                </div>

                <!-- Bagian Bawah Form -->
                <div class="flex flex-col md:flex-row items-center justify-between pt-10 border-t-2 border-ink/10 gap-8">
                    <div class="max-w-xs text-left">
                        <p class="text-[11px] font-mono uppercase font-bold text-ink leading-relaxed">
                            Peringatan: Pastikan peran yang diberikan sesuai dengan tanggung jawab pengguna.
                        </p>
                    </div>

                    <button class="px-8 py-3 text-sm tracking-[0.25em] font-mono font-black uppercase border-2 border-ink shadow-[6px_6px_0px_rgba(44,36,32,1)] hover:translate-y-[2px] hover:shadow-[4px_4px_0px_rgba(44,36,32,1)] active:translate-y-[6px] active:shadow-none transition-all duration-150 bg-[#fcfaf5] text-ink" onclick="alert('User updated!')">
                        Perbarui →
                    </button>
                </div>
            </form>

            <div class="absolute bottom-4 right-8 text-[40px] font-serif italic text-ink/[0.03] pointer-events-none select-none">
                Authorized Personnel Only
            </div>
        </div>
    </div>
</div>
