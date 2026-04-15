<x-layouts.app>
    <div class="flex flex-col items-center justify-center min-h-[calc(100vh-8rem)] px-4 py-8">
        <div class="w-full max-w-2xl bg-surface border border-ink p-6 md:p-10 relative">

            {{-- Header Bukti --}}
            <div class="text-center border-b border-ink pb-5 mb-6">
                <x-lucide-receipt class="w-8 h-8 text-coffee mx-auto mb-2" />
                <h1 class="text-lg font-serif font-bold text-ink uppercase tracking-wide">Bukti Pengajuan Peminjaman</h1>
                <p class="font-mono text-xs text-muted mt-1">Simpan halaman ini sebagai bukti pengambilan buku</p>
            </div>

            {{-- Data Utama --}}
            <div class="space-y-5">
                {{-- Kode Verifikasi --}}
                <div class="bg-background border border-ink p-5 text-center">
                    <p class="font-mono text-[10px] uppercase tracking-[0.2em] text-coffee mb-2">Kode Booking</p>
                    <p class="text-2xl md:text-3xl font-mono font-bold text-ink tracking-[0.15em]">SCR-8F3A92X</p>
                </div>

                {{-- Info Buku & Peminjam --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border border-ink p-4">
                        <p class="font-mono text-[10px] uppercase tracking-wider text-muted mb-1">Judul Buku</p>
                        <p class="font-serif text-ink font-semibold text-base">Filosofi Teras</p>
                        <p class="font-mono text-xs text-coffee mt-1">ID: BK-0892 | Penulis: Henry Manampiring</p>
                    </div>
                    <div class="border border-ink p-4">
                        <p class="font-mono text-[10px] uppercase tracking-wider text-muted mb-1">Peminjam</p>
                        <p class="font-serif text-ink font-semibold text-base">Alya Rahmawati</p>
                        <p class="font-mono text-xs text-coffee mt-1">ID: USR-001 | Mahasiswa</p>
                    </div>
                </div>

                {{-- Waktu & Deadline --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border border-ink p-4">
                        <p class="font-mono text-[10px] uppercase tracking-wider text-muted mb-1">Waktu Pengajuan</p>
                        <p class="font-serif text-ink">07 Juni 2024, 09:30 WIB</p>
                    </div>
                    <div class="border border-ink p-4">
                        <p class="font-mono text-[10px] uppercase tracking-wider text-muted mb-1">Batas Pengambilan</p>
                        <p class="font-serif text-red-700 font-semibold">08 Juni 2024, 09:30 WIB</p>
                        <p class="font-mono text-[10px] text-muted mt-1">Maksimal 24 Jam</p>
                    </div>
                </div>

                {{-- Status --}}
                <div class="border border-ink p-3 bg-background flex items-center justify-center gap-2">
                    <x-lucide-clock class="w-4 h-4 text-coffee" />
                    <span
                        class="px-2 py-0.5 text-xs font-mono border border-ink bg-surface text-coffee uppercase tracking-wider rounded">
                        Menunggu
                    </span>
                </div>
            </div>

            {{-- Instruksi & Aksi --}}
            <div class="mt-6 pt-5 border-t border-ink space-y-4">
                <div class="bg-background border border-ink p-4">
                    <p class="font-serif text-sm text-muted leading-relaxed">
                        <span class="text-ink font-semibold">Langkah Selanjutnya:</span>
                        Tunjukkan kode di atas ke petugas perpustakaan dalam waktu <span
                            class="text-ink font-semibold">24 jam</span>.
                        Petugas akan memverifikasi data secara fisik dan menyerahkan buku. Kode akan otomatis hangus
                        jika melebihi batas waktu.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row justify-center gap-3">
                    <button
                        class="w-full sm:w-auto px-5 py-2.5 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-background transition-colors rounded flex items-center justify-center gap-2">
                        <x-lucide-printer class="w-4 h-4" /> Cetak / Simpan
                    </button>
                    <a href="{{ route('books.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-colors rounded flex items-center justify-center gap-2">
                        <x-lucide-arrow-left class="w-4 h-4" /> Kembali ke Katalog
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
