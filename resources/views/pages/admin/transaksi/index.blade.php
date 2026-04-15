<x-layouts.app>
    <div class="max-w-7xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Transaksi Peminjaman</h1>
                <p class="text-muted mt-1 font-serif">Riwayat peminjaman, pengembalian, dan status keterlambatan koleksi.
                </p>
            </div>
            <a href="{{ route('admin.transaksi.create') }}"
                class="px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-plus-circle class="w-4 h-4" /> Buat Peminjaman
            </a>
        </div>

        {{-- 2. FILTER & PENCARIAN --}}
        <div class="bg-surface border border-ink p-4 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <div class="relative flex-1 sm:w-64">
                    <x-lucide-search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-coffee/60" />
                    <input type="text" placeholder="Cari ID, nama, atau judul..."
                        class="w-full pl-9 pr-4 py-2 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/60 focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                </div>
                <select
                    class="px-3 py-2 bg-background border border-ink text-sm font-serif text-coffee focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                    <option value="">Semua Status</option>
                    <option value="pending">Menunggu</option>
                    <option value="dipinjam">Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                    <option value="terlambat">Terlambat</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <button
                class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-download class="w-4 h-4" /> Ekspor Data
            </button>
        </div>

        {{-- 3. TABEL TRANSAKSI --}}
        <div class="bg-surface border border-ink overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-ink bg-ink/5">
                        <th class="text-left px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">ID</th>
                        <th class="text-left px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Anggota
                        </th>
                        <th class="text-left px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Judul
                            Buku</th>
                        <th class="text-center px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">Pinjam
                        </th>
                        <th class="text-center px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">Kembali
                        </th>
                        <th class="text-center px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Status
                        </th>
                        <th class="text-right px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-ink">
                    @forelse ($transaksi as $txn)
                        <tr class="hover:bg-ink/5 transition-colors">
                            <td class="px-6 py-4 font-mono text-coffee">{{ $txn->id }}</td>
                            <td class="px-6 py-4 font-serif text-ink">{{ $txn->user->name }}</td>
                            <td class="px-6 py-4 font-serif text-muted">{{ $txn->book->title }}</td>
                            <td class="px-6 py-4 text-center font-mono text-muted">{{ $txn->borrowed_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center font-mono text-muted">{{ $txn->due_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">
                                @php
                                    $badge = match ($txn->status) {
                                        'pending' => [
                                            'text' => 'text-coffee',
                                            'bg' => 'bg-surface',
                                            'label' => 'Menunggu',
                                        ],
                                        'dipinjam' => ['text' => 'text-ink', 'bg' => 'bg-ink/5', 'label' => 'Dipinjam'],
                                        'dikembalikan' => [
                                            'text' => 'text-coffee',
                                            'bg' => 'bg-surface',
                                            'label' => 'Dikembalikan',
                                        ],
                                        'terlambat' => [
                                            'text' => 'text-red-700',
                                            'bg' => 'bg-surface',
                                            'label' => 'Terlambat',
                                        ],
                                        'ditolak' => [
                                            'text' => 'text-muted',
                                            'bg' => 'bg-surface',
                                            'label' => 'Ditolak',
                                        ],
                                        default => [
                                            'text' => 'text-muted',
                                            'bg' => 'bg-surface',
                                            'label' => $txn->status,
                                        ],
                                    };
                                @endphp
                                <span
                                    class="px-2 py-0.5 text-xs font-mono border border-ink rounded uppercase tracking-wider {{ $badge['text'] }} {{ $badge['bg'] }}">
                                    {{ $badge['label'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if ($txn->status === 'pending')
                                        <button
                                            class="px-3 py-1.5 border border-ink bg-ink/5 text-xs font-serif text-ink hover:bg-ink hover:text-surface transition-colors rounded">
                                            Setujui
                                        </button>
                                        <button
                                            class="px-3 py-1.5 border border-ink text-xs font-serif text-coffee hover:bg-background hover:text-red-800 hover:border-red-800 transition-colors rounded">
                                            Tolak
                                        </button>
                                    @elseif($txn->status === 'dipinjam')
                                        <button
                                            class="px-3 py-1.5 border border-ink text-xs font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-colors rounded">
                                            Kembalikan
                                        </button>
                                    @elseif($txn->status === 'terlambat')
                                        <button
                                            class="px-3 py-1.5 border border-ink bg-ink/5 text-xs font-serif text-ink hover:bg-ink hover:text-surface transition-colors rounded">
                                            Proses Denda
                                        </button>
                                    @endif
                                    <a href="{{ route('admin.transaksi.show', $txn->id) }}"
                                        class="p-1.5 border border-ink rounded hover:bg-ink/5 transition-colors group">
                                        <x-lucide-eye class="w-4 h-4 text-coffee/70 group-hover:text-ink" />
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-muted font-serif">
                                Belum ada transaksi terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 4. PAGINATION --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border border-ink bg-surface p-4">
            <span class="text-xs font-mono text-muted">Menampilkan halaman 1 dari 24</span>
            <nav class="flex items-center gap-2">
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-muted hover:bg-ink/5 hover:text-ink transition-colors rounded disabled:opacity-50"
                    disabled>← Prev</button>
                <button class="px-3 py-1.5 border border-ink bg-ink text-surface text-xs font-mono rounded">1</button>
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">2</button>
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">3</button>
                <span class="text-muted">...</span>
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">24</button>
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">Next
                    →</button>
            </nav>
        </div>

        {{-- 5. INFO PANEL --}}
        <div class="bg-surface border border-ink p-5">
            <div class="flex items-center gap-2 mb-3">
                <x-lucide-alert-circle class="w-4 h-4 text-coffee" />
                <h3 class="font-serif font-semibold text-ink text-sm">Catatan Sistem</h3>
            </div>
            <ul class="space-y-2 font-serif text-sm text-muted">
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>Peminjaman maksimal <span class="text-ink font-semibold">7 hari</span>. Keterlambatan
                        dikenakan denda administrasi sesuai kebijakan perpustakaan.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>Transaksi dengan status <span class="text-coffee font-semibold">Menunggu</span>
                        akan otomatis hangus jika tidak diambil dalam <span class="text-ink font-semibold">24
                            jam</span>.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>Tombol <span class="text-ink font-semibold">Setujui</span> hanya muncul untuk transaksi
                        pending. Pastikan kode booking cocok dengan bukti yang ditunjukkan anggota.</span>
                </li>
            </ul>
        </div>
    </div>
</x-layouts.app>
