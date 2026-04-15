<x-layouts.app>
    <div class="max-w-6xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.transaksi.index') }}"
                    class="p-2 border border-ink rounded hover:bg-ink/5 transition-colors">
                    <x-lucide-arrow-left class="w-5 h-5 text-coffee" />
                </a>
                <div>
                    <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Detail Transaksi #TXN-8842</h1>
                    <p class="text-muted mt-1 font-serif text-sm">Riwayat lengkap, log status, dan aksi peminjaman.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <span
                    class="px-3 py-1.5 border border-ink bg-ink/5 text-xs font-mono uppercase tracking-wider text-ink rounded">Dipinjam</span>
                <button
                    class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-printer class="w-4 h-4" /> Cetak Struk
                </button>
            </div>
        </div>

        {{-- 2. GRID CONTENT --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT COLUMN: Info & Timeline --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Transaction Details --}}
                <div class="bg-surface border border-ink p-6">
                    <h2 class="text-lg font-serif font-semibold text-ink border-b border-ink pb-3 mb-4">Informasi
                        Peminjaman</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Tanggal Pinjam</p>
                            <p class="font-serif text-ink text-lg">07 Juni 2024</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Jatuh Tempo</p>
                            <p class="font-serif text-red-700 font-semibold text-lg">14 Juni 2024</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Buku Dipinjam</p>
                            <p class="font-serif text-ink">Filosofi Teras</p>
                            <p class="font-mono text-xs text-muted mt-1">ISBN: 978-602-291-578-0 | Rak A3</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Petugas Pencatat</p>
                            <p class="font-serif text-ink">Admin Scriptoria</p>
                        </div>
                    </div>
                </div>

                {{-- Member Info --}}
                <div class="bg-surface border border-ink p-6">
                    <h2 class="text-lg font-serif font-semibold text-ink border-b border-ink pb-3 mb-4">Data Peminjam
                    </h2>
                    <div class="flex items-start gap-4">
                        <div
                            class="w-16 h-16 bg-surface border border-ink rounded-full flex items-center justify-center">
                            <x-lucide-user class="w-6 h-6 text-muted" />
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-bold text-ink">Alya Rahmawati</h3>
                            <p class="font-mono text-sm text-coffee mt-1">ID: USR-001 | Anggota | Aktif</p>
                            <p class="font-serif text-sm text-muted mt-2">alya.r@univ.ac.id | +62 812-3456-7890</p>
                        </div>
                    </div>
                </div>

                {{-- Activity Timeline --}}
                <div class="bg-surface border border-ink p-6">
                    <h2 class="text-lg font-serif font-semibold text-ink border-b border-ink pb-3 mb-4">Log Aktivitas
                    </h2>
                    <div class="space-y-6 pl-4 border-l-2 border-ink">
                        <div class="relative">
                            <span
                                class="absolute -left-[25px] top-1.5 w-4 h-4 bg-ink rounded-full border-4 border-surface"></span>
                            <p class="font-mono text-xs text-muted">07 Jun 2024, 09:15 WIB</p>
                            <p class="font-serif text-ink mt-1">Transaksi dibuat & buku diserahkan ke peminjam.</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[25px] top-1.5 w-4 h-4 bg-surface rounded-full border-4 border-ink opacity-40"></span>
                            <p class="font-mono text-xs text-muted">Menunggu pengembalian...</p>
                            <p class="font-serif text-muted mt-1">Batas waktu: 14 Jun 2024</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: Actions & Notes --}}
            <div class="space-y-6">
                {{-- Quick Actions --}}
                <div class="bg-surface border border-ink p-5">
                    <h3 class="font-serif font-semibold text-ink mb-4">Aksi Tersedia</h3>
                    <div class="space-y-3">
                        <button
                            class="w-full px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                            <x-lucide-rotate-ccw class="w-4 h-4" /> Proses Pengembalian
                        </button>
                        <button
                            class="w-full px-4 py-2.5 bg-surface border border-ink text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center justify-center gap-2">
                            <x-lucide-calendar-plus class="w-4 h-4" /> Perpanjang 3 Hari
                        </button>
                        <button
                            class="w-full px-4 py-2.5 bg-surface border border-ink text-sm font-serif text-muted hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center justify-center gap-2">
                            <x-lucide-flag class="w-4 h-4" /> Laporkan Masalah
                        </button>
                    </div>
                </div>

                {{-- Internal Notes --}}
                <div class="bg-surface border border-ink p-5">
                    <h3 class="font-serif font-semibold text-ink mb-3">Catatan Transaksi</h3>
                    <textarea
                        class="w-full px-3 py-2 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink resize-y"
                        rows="4" placeholder="Tambahkan catatan internal...">Buku dalam kondisi baik. Pembaca meminta perpanjangan jika memungkinkan.</textarea>
                    <button
                        class="mt-3 w-full px-3 py-2 bg-surface border border-ink text-xs font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded">Simpan
                        Catatan</button>
                </div>
            </div>
        </div>

        {{-- 3. INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-info class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Perhatian:</span> Pengembalian melebihi jatuh tempo akan otomatis
                memicu perhitungan denda. Gunakan tombol <span class="text-coffee">Perpanjang</span> hanya jika anggota
                tidak memiliki tunggakan aktif.
            </div>
        </div>
    </div>
</x-layouts.app>
