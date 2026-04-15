<x-layouts.app>
    <div class="max-w-6xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div class="flex items-center gap-4">
                <a href="{{ route('books.index') }}"
                    class="p-2 border border-ink rounded hover:bg-ink/5 transition-colors">
                    <x-lucide-arrow-left class="w-5 h-5 text-coffee" />
                </a>
                <div>
                    <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Detail Buku</h1>
                    <p class="text-muted mt-1 font-serif text-sm">Informasi lengkap koleksi dan riwayat peminjaman.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="#"
                    class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-pencil class="w-4 h-4" /> Edit
                </a>
                <button
                    class="px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-book-plus class="w-4 h-4" /> Pinjamkan
                </button>
            </div>
        </div>

        {{-- 2. MAIN CONTENT GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT: Cover & Quick Info --}}
            <div class="space-y-6">
                {{-- Book Cover --}}
                <div class="bg-surface border border-ink p-4">
                    <div class="aspect-[2/3] bg-ink/5 border border-ink overflow-hidden">
                        <img src="https://picsum.photos/seed/filosofi/600/900" alt="Filosofi Teras"
                            class="w-full h-full object-cover opacity-90">
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span
                            class="px-3 py-1.5 border border-ink bg-ink/5 text-xs font-mono uppercase tracking-wider text-ink rounded">
                            Tersedia
                        </span>
                        <span class="font-mono text-xs text-muted">3 eksemplar</span>
                    </div>
                </div>

                {{-- Quick Stats --}}
                <div class="bg-surface border border-ink p-5">
                    <h3 class="font-serif font-semibold text-ink mb-4 border-b border-ink pb-2">Statistik</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Total Peminjaman</span>
                            <span class="font-serif text-ink font-semibold">24 kali</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Peminjam Aktif</span>
                            <span class="font-serif text-ink font-semibold">2 orang</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Rating</span>
                            <span class="font-serif text-ink font-semibold">4.8/5.0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Terakhir Dipinjam</span>
                            <span class="font-serif text-coffee text-sm">01 Jun 2024</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Metadata & History --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Basic Info --}}
                <div class="bg-surface border border-ink p-6">
                    <h2 class="text-xl font-serif font-bold text-ink mb-1">Filosofi Teras</h2>
                    <p class="font-serif text-lg text-coffee mb-4">Henry Manampiring</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-ink">
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Penerbit</p>
                            <p class="font-serif text-ink">Gramedia Pustaka Utama</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Tahun Terbit</p>
                            <p class="font-serif text-ink">2018</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">ISBN</p>
                            <p class="font-serif text-ink">978-602-291-578-0</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Kategori</p>
                            <p class="font-serif text-ink">Filsafat & Psikologi</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Klasifikasi DDC</p>
                            <p class="font-serif text-ink">188.043 MAN-f</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Lokasi</p>
                            <p class="font-serif text-ink">Rak A3, Baris 2</p>
                        </div>
                    </div>
                </div>

                {{-- Synopsis --}}
                <div class="bg-surface border border-ink p-6">
                    <h3 class="font-serif font-semibold text-ink mb-3 border-b border-ink pb-2">Sinopsis</h3>
                    <p class="font-serif text-muted leading-relaxed">
                        Buku ini membahas filsafat Stoisisme yang diterapkan dalam konteks kehidupan modern.
                        Penulis mengupas bagaimana prinsip-prinsip filsafat kuno dari tokoh seperti Marcus Aurelius,
                        Seneca, dan Epictetus dapat membantu kita menghadapi kecemasan, stres, dan tantangan
                        di era digital. Ditulis dengan bahasa yang ringan dan contoh-contoh relevan dengan
                        kehidupan sehari-hari masyarakat Indonesia.
                    </p>
                </div>

                {{-- Borrowing History --}}
                <div class="bg-surface border border-ink">
                    <div class="px-6 py-4 border-b border-ink flex items-center justify-between">
                        <h3 class="font-serif font-semibold text-ink">Riwayat Peminjaman</h3>
                        <a href="#"
                            class="text-xs font-mono uppercase tracking-widest text-coffee hover:text-ink transition-colors">Lihat
                            Semua ›</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-ink bg-ink/5">
                                    <th
                                        class="text-left px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">
                                        ID</th>
                                    <th
                                        class="text-left px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">
                                        Peminjam</th>
                                    <th
                                        class="text-center px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">
                                        Pinjam</th>
                                    <th
                                        class="text-center px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">
                                        Kembali</th>
                                    <th
                                        class="text-center px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-ink">
                                @php
                                    $history = [
                                        [
                                            'id' => 'TXN-8842',
                                            'member' => 'Alya Rahmawati',
                                            'borrowed' => '01 Jun 2024',
                                            'due' => '08 Jun 2024',
                                            'status' => 'dipinjam',
                                        ],
                                        [
                                            'id' => 'TXN-8721',
                                            'member' => 'Budi Santoso',
                                            'borrowed' => '10 Mei 2024',
                                            'due' => '17 Mei 2024',
                                            'status' => 'dikembalikan',
                                        ],
                                        [
                                            'id' => 'TXN-8654',
                                            'member' => 'Citra Dewi',
                                            'borrowed' => '15 Apr 2024',
                                            'due' => '22 Apr 2024',
                                            'status' => 'dikembalikan',
                                        ],
                                    ];
                                @endphp

                                @foreach ($history as $item)
                                    <tr class="hover:bg-ink/5 transition-colors">
                                        <td class="px-6 py-4 font-mono text-coffee text-xs">{{ $item['id'] }}</td>
                                        <td class="px-6 py-4 font-serif text-ink">{{ $item['member'] }}</td>
                                        <td class="px-6 py-4 text-center font-mono text-muted text-xs">
                                            {{ $item['borrowed'] }}</td>
                                        <td class="px-6 py-4 text-center font-mono text-muted text-xs">
                                            {{ $item['due'] }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $badgeText = match ($item['status']) {
                                                    'dipinjam' => 'text-ink',
                                                    'dikembalikan' => 'text-coffee',
                                                    'terlambat' => 'text-red-700',
                                                };
                                            @endphp
                                            {{-- Semua badge menggunakan border-ink solid --}}
                                            <span
                                                class="px-2 py-0.5 text-xs font-mono border border-ink rounded uppercase tracking-wider {{ $badgeText }} bg-surface">
                                                {{ $item['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Internal Notes --}}
                <div class="bg-surface border border-ink p-5">
                    <h3 class="font-serif font-semibold text-ink mb-3 flex items-center gap-2">
                        <x-lucide-file-text class="w-4 h-4 text-coffee" />
                        Catatan Kurator
                    </h3>
                    <p class="font-serif text-sm text-muted leading-relaxed">
                        Buku dalam kondisi sangat baik. Sampul masih utuh tanpa lipatan. Halaman 47-48
                        pernah difotokopi untuk keperluan penelitian (tercatat di log). Rekomendasi:
                        prioritas untuk digitalisasi karena sering diminta.
                    </p>
                    <p class="text-xs font-mono text-coffee/60 mt-3">— Diperbarui: 05 Jun 2024</p>
                </div>
            </div>
        </div>

        {{-- 3. INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-info class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Akses Cepat:</span> Gunakan tombol <span
                    class="text-coffee">Pinjamkan</span> untuk membuat transaksi baru. Tombol <span
                    class="text-coffee">Edit</span> untuk mengubah metadata atau status ketersediaan buku.
            </div>
        </div>
    </div>
</x-layouts.app>
