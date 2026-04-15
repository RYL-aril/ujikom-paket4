<x-layouts.app>
    <div class="max-w-5xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Buat Peminjaman Baru</h1>
                <p class="text-muted mt-1 font-serif text-sm">Catat transaksi peminjaman koleksi dengan data anggota dan
                    buku.</p>
            </div>
            <a href="{{ route('admin.transaksi.index') }}"
                class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-arrow-left class="w-4 h-4" /> Kembali
            </a>
        </div>

        {{-- 2. FORM UTAMA --}}
        <form method="POST" action="#" class="bg-surface border border-ink">
            @csrf
            <div class="p-6 md:p-8 space-y-8">

                {{-- Seksi I: Data Anggota --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-user class="w-4 h-4 text-coffee" /> I. Data Anggota
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Cari /
                                Pilih Anggota <span class="text-red-700">*</span></label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="">-- Ketik nama atau ID anggota --</option>
                                <option value="USR-001">USR-001 | Alya Rahmawati</option>
                                <option value="USR-002">USR-002 | Budi Santoso</option>
                                <option value="USR-005">USR-005 | Eka Salsabila</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Status
                                Keanggotaan</label>
                            <input type="text" value="Aktif (Anggota)" disabled
                                class="w-full px-4 py-2.5 bg-ink/5 border border-ink text-sm font-serif text-muted cursor-not-allowed">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Batas
                                Peminjaman Tersisa</label>
                            <div class="flex items-center gap-4">
                                <div class="flex-1 h-2 bg-ink/10 border border-ink rounded-full overflow-hidden">
                                    <div class="h-full w-1/2 bg-coffee"></div>
                                </div>
                                <span class="text-xs font-mono text-muted">2 / 4 buku</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Seksi II: Data Koleksi --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-book class="w-4 h-4 text-coffee" /> II. Data Koleksi
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Cari /
                                Pilih Buku <span class="text-red-700">*</span></label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="">-- Ketik judul, ISBN, atau ID buku --</option>
                                <option value="BK-0892">BK-0892 | Filosofi Teras</option>
                                <option value="BK-1024">BK-1024 | Sapiens: Riwayat Singkat</option>
                                <option value="BK-0077">BK-0077 | Atomic Habits</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Status
                                Ketersediaan</label>
                            <input type="text" value="Tersedia (3 eksemplar)" disabled
                                class="w-full px-4 py-2.5 bg-ink/5 border border-ink text-sm font-serif text-muted cursor-not-allowed">
                        </div>
                    </div>
                </div>

                {{-- Seksi III: Detail Peminjaman --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-calendar-check class="w-4 h-4 text-coffee" /> III. Detail Peminjaman
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Tanggal
                                Peminjaman <span class="text-red-700">*</span></label>
                            <input type="date" value="2024-06-07"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Tanggal
                                Jatuh Tempo <span class="text-red-700">*</span></label>
                            <input type="date" value="2024-06-14"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Catatan
                                Internal</label>
                            <textarea rows="3" placeholder="Kondisi fisik buku, permintaan khusus, atau catatan kurator..."
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all resize-y"></textarea>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER ACTIONS --}}
            <div
                class="bg-[#f4f1eb] border-t border-ink px-6 md:px-8 py-5 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                <a href="{{ route('admin.transaksi.index') }}"
                    class="w-full sm:w-auto px-6 py-2.5 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md text-center">
                    Batal
                </a>
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                    <x-lucide-check class="w-4 h-4" /> Simpan Transaksi
                </button>
            </div>
        </form>

        {{-- INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-alert-circle class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Aturan Sistem:</span> Batas peminjaman standar adalah <span
                    class="text-ink font-semibold">7 hari</span>. Sistem akan otomatis menandai status <span
                    class="text-coffee">Terlambat</span> jika melewati tanggal jatuh tempo. Pastikan anggota tidak
                melebihi kuota peminjaman sebelum menyimpan.
            </div>
        </div>
    </div>
</x-layouts.app>
