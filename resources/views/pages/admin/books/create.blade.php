<x-layouts.app>
    <div class="max-w-5xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Tambah Buku Baru</h1>
                <p class="text-muted mt-1 font-serif text-sm">Input data katalog lengkap dengan metadata, klasifikasi,
                    dan berkas sampul.</p>
            </div>
            <a href="{{ route('books.index') }}"
                class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-arrow-left class="w-4 h-4" /> Kembali
            </a>
        </div>

        {{-- 2. FORM UTAMA --}}
        <form method="POST" action="#" class="bg-surface border border-ink">
            @csrf
            <div class="p-6 md:p-8 space-y-8">

                {{-- Seksi I: Metadata Dasar --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-book-open-text class="w-4 h-4 text-coffee" /> I. Metadata Dasar
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Judul Buku
                                <span class="text-red-700">*</span></label>
                            <input type="text" placeholder="Masukkan judul lengkap buku"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Pengarang /
                                Penulis <span class="text-red-700">*</span></label>
                            <input type="text" placeholder="Nama lengkap penulis"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label
                                class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Penerbit</label>
                            <input type="text" placeholder="Nama penerbit atau lembaga"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Tahun
                                Terbit <span class="text-red-700">*</span></label>
                            <input type="number" placeholder="Contoh: 2023"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">ISBN /
                                ISSN</label>
                            <input type="text" placeholder="978-xxx-xxx-xxx-x"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                    </div>
                </div>

                {{-- Seksi II: Klasifikasi & Lokasi --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-layers class="w-4 h-4 text-coffee" /> II. Klasifikasi & Lokasi
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Kategori
                                Utama <span class="text-red-700">*</span></label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="fiksi">Fiksi & Sastra</option>
                                <option value="sejarah">Sejarah & Arkeologi</option>
                                <option value="sains">Sains & Teknologi</option>
                                <option value="filsafat">Filsafat & Sosial</option>
                                <option value="arsip">Dokumen Arsip</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Klasifikasi
                                DDC / LCC</label>
                            <input type="text" placeholder="Contoh: 899.214 IND"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Lokasi Rak
                                / Gudang</label>
                            <input type="text" placeholder="Contoh: Rak A3 / Gudang B2"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Status
                                Ketersediaan <span class="text-red-700">*</span></label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="tersedia">Tersedia</option>
                                <option value="dipinjam">Sedang Dipinjam</option>
                                <option value="reservasi">Hanya Reservasi</option>
                                <option value="arsip">Arsip Internal</option>
                                <option value="perbaikan">Perbaikan / Konservasi</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Seksi III: Sampul & Deskripsi --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-image-plus class="w-4 h-4 text-coffee" /> III. Sampul & Deskripsi
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Upload Area --}}
                        <div class="md:col-span-1">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Sampul
                                Buku</label>
                            <div
                                class="border-2 border-dashed border-ink bg-background p-6 flex flex-col items-center justify-center text-center hover:bg-ink/5 transition-colors cursor-pointer group">
                                {{-- Placeholder Preview --}}
                                <div
                                    class="w-24 h-36 bg-muted/20 border border-ink mb-3 flex items-center justify-center">
                                    <x-lucide-book-image class="w-8 h-8 text-muted/50" />
                                </div>
                                <span class="text-xs font-serif text-muted group-hover:text-ink">Klik atau seret
                                    file</span>
                                <span class="text-[10px] font-mono text-coffee/50 mt-1">JPG/PNG, Max 4MB (Rasio
                                    2:3)</span>
                            </div>
                        </div>

                        {{-- Text Fields --}}
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label
                                    class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Sinopsis /
                                    Abstrak</label>
                                <textarea rows="5" placeholder="Tulis ringkasan isi buku atau deskripsi arsip..."
                                    class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all resize-y"></textarea>
                            </div>
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Catatan
                                    Kurator / Admin</label>
                                <textarea rows="3" placeholder="Catatan internal terkait kondisi fisik, edisi, atau hak cipta..."
                                    class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all resize-y"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER ACTIONS --}}
            <div
                class="bg-[#f4f1eb] border-t border-ink px-6 md:px-8 py-5 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                <a href="{{ route('books.index') }}"
                    class="w-full sm:w-auto px-6 py-2.5 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md text-center">
                    Batal
                </a>
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                    <x-lucide-check class="w-4 h-4" /> Simpan Katalog
                </button>
            </div>
        </form>

        {{-- INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-bookmark class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Panduan Input:</span> Pastikan ISBN sesuai dengan halaman hak
                cipta. Buku berstatus <span class="text-coffee">Arsip Internal</span> tidak akan tampil di pencarian
                publik. Sampul harus berformat <span class="text-ink font-semibold">JPG/PNG</span> dengan rasio aspek
                <span class="text-ink font-semibold">2:3</span> untuk konsistensi katalog.
            </div>
        </div>
    </div>
</x-layouts.app>
