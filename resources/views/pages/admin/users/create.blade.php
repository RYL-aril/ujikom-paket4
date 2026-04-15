<x-layouts.app>
    <div class="max-w-4xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Tambah Anggota Baru</h1>
                <p class="text-muted mt-1 font-serif text-sm">Lengkapi formulir berikut untuk mendaftarkan pengguna ke
                    dalam arsip perpustakaan.</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-arrow-left class="w-4 h-4" /> Kembali
            </a>
        </div>

        {{-- 2. FORM UTAMA --}}
        <form method="POST" action="#" class="bg-surface border border-ink">
            @csrf
            <div class="p-6 md:p-8 space-y-8">

                {{-- Seksi I: Identitas --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-id-card class="w-4 h-4 text-coffee" /> I. Identitas Pengguna
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Nama
                                Lengkap <span class="text-red-700">*</span></label>
                            <input type="text" placeholder="Masukkan nama lengkap"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Alamat
                                Email <span class="text-red-700">*</span></label>
                            <input type="email" placeholder="contoh@domain.com"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">ID / NIM /
                                NIP</label>
                            <input type="text" placeholder="Kosongkan jika akan digenerate otomatis"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Tipe
                                Keanggotaan <span class="text-red-700">*</span></label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="">-- Role --</option>
                                <option value="anggota">Anggota</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Seksi II: Kontak & Status --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-phone class="w-4 h-4 text-coffee" /> II. Kontak & Status
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Nomor
                                Telepon</label>
                            <input type="tel" placeholder="08xxxxxxxxxx"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Status Awal
                                <span class="text-red-700">*</span></label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="aktif">Aktif</option>
                                <option value="pending">Pending (Verifikasi)</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Alamat
                                Lengkap</label>
                            <textarea rows="3" placeholder="Masukkan alamat domisili lengkap"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all resize-y"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Seksi III: Dokumen & Catatan --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-image class="w-4 h-4 text-coffee" /> III. Dokumen & Catatan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Foto
                                Profil</label>
                            <div
                                class="border-2 border-dashed border-ink bg-background p-6 flex flex-col items-center justify-center text-center hover:bg-ink/5 transition-colors cursor-pointer group">
                                <x-lucide-upload-cloud
                                    class="w-8 h-8 text-coffee/60 group-hover:text-ink mb-2 transition-colors" />
                                <span class="text-xs font-serif text-muted group-hover:text-ink">Klik atau seret
                                    file</span>
                                <span class="text-[10px] font-mono text-coffee/50 mt-1">JPG, PNG (Maks. 2MB)</span>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Catatan
                                Admin</label>
                            <textarea rows="5" placeholder="Tulis catatan internal terkait pendaftaran ini (opsional)..."
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all resize-y"></textarea>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER ACTIONS --}}
            <div
                class="bg-[#f4f1eb] border-t border-ink px-6 md:px-8 py-5 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                <a href="{{ route('admin.users.index') }}"
                    class="w-full sm:w-auto px-6 py-2.5 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md text-center">
                    Batal
                </a>
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                    <x-lucide-check class="w-4 h-4" /> Simpan Data
                </button>
            </div>
        </form>

        {{-- INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-info class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Catatan Sistem:</span> Setelah disimpan, anggota akan menerima
                email verifikasi otomatis (jika status <span class="text-coffee">Pending</span>). Data identitas tidak
                dapat diubah oleh pengguna tanpa persetujuan admin kurator.
            </div>
        </div>
    </div>
</x-layouts.app>
