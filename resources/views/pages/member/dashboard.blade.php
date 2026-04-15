<x-layouts.app>
    <div class="max-w-7xl mx-auto space-y-6 px-2">

        {{-- HEADER --}}
        <div class="border-b border-ink pb-5">
            <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="text-muted mt-1 font-serif">Kelola peminjaman, lihat riwayat, dan jelajahi katalog perpustakaan digital.</p>
        </div>

        {{-- STATISTIK ANGGOTA --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {{-- Buku yang Dipinjam --}}
            <div class="bg-surface border border-ink p-6 rounded-lg">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Sedang Dipinjam</p>
                        <p class="text-3xl font-serif font-bold text-ink">{{ $borrowingStats['active'] }}</p>
                        <p class="text-xs text-muted font-serif mt-2">dari maksimal {{ $borrowingStats['limit'] }} buku</p>
                    </div>
                    <div class="w-12 h-12 bg-ink/10 rounded-lg flex items-center justify-center">
                        <x-lucide-bookmark class="w-6 h-6 text-ink" />
                    </div>
                </div>
                <div class="mt-4 w-full bg-ink/10 rounded-full h-2">
                    <div class="bg-ink h-2 rounded-full" style="width: {{ ($borrowingStats['active'] / $borrowingStats['limit']) * 100 }}%"></div>
                </div>
            </div>

            {{-- Permintaan Menunggu --}}
            <div class="bg-surface border border-ink p-6 rounded-lg">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Menunggu Persetujuan</p>
                        <p class="text-3xl font-serif font-bold text-yellow-600">{{ $borrowingStats['pending'] }}</p>
                        <p class="text-xs text-muted font-serif mt-2">Dalam antrian approval</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <x-lucide-clock class="w-6 h-6 text-yellow-600" />
                    </div>
                </div>
            </div>

            {{-- Sudah Dikembalikan --}}
            <div class="bg-surface border border-ink p-6 rounded-lg">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Sudah Dikembalikan</p>
                        <p class="text-3xl font-serif font-bold text-green-600">{{ $borrowingStats['returned'] }}</p>
                        <p class="text-xs text-muted font-serif mt-2">Total seumur hidup</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <x-lucide-check-circle class="w-6 h-6 text-green-600" />
                    </div>
                </div>
            </div>
        </div>

        {{-- BUKU YANG SEDANG DIPINJAM --}}
        @if($activeBorrowings->count() > 0)
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-ink pb-3">
                    <h2 class="text-xl font-serif font-bold text-ink">Buku Sedang Dipinjam</h2>
                    <a href="{{ route('member.transaksi') }}" class="text-sm font-serif text-coffee hover:text-ink">Lihat Semua →</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($activeBorrowings as $item)
                        <div class="bg-surface border border-ink rounded-lg p-5 hover:shadow-[var(--elevation-1)] transition-all">
                            <div class="flex gap-4">
                                {{-- Book Cover --}}
                                <div class="w-20 h-32 bg-ink/5 border border-ink rounded overflow-hidden flex-shrink-0">
                                    @if($item->book->cover_image)
                                        <img src="{{ $item->book->cover_url }}" alt="{{ $item->book->title }}" 
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <x-lucide-book class="w-6 h-6 text-ink/40" />
                                        </div>
                                    @endif
                                </div>

                                {{-- Content --}}
                                <div class="flex-1 flex flex-col">
                                    <h3 class="font-serif font-bold text-ink line-clamp-2">{{ $item->book->title }}</h3>
                                    <p class="font-serif text-sm text-coffee mt-0.5">{{ $item->book->author }}</p>

                                    <div class="mt-auto space-y-2">
                                        <div class="flex justify-between text-xs font-mono text-muted">
                                            <span>Kode:</span>
                                            <span class="text-ink font-semibold">{{ $item->booking_code }}</span>
                                        </div>
                                        <div class="flex justify-between text-xs font-mono text-muted">
                                            <span>Batas Kembali:</span>
                                            <span class="text-ink font-semibold">{{ $item->due_date->format('d M Y') }}</span>
                                        </div>
                                        @if($item->is_overdue)
                                            <div class="bg-red-100 border border-red-300 rounded px-2 py-1">
                                                <p class="text-xs font-semibold text-red-700">⚠️ Terlambat {{ $item->due_date->diffInDays(now()) }} hari</p>
                                            </div>
                                        @else
                                            <div class="text-xs font-semibold @if($item->due_date->diffInDays(now()) <= 3) text-orange-600 @else text-green-600 @endif">
                                                {{ $item->due_date->diffInDays(now()) }} hari tersisa
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- PERMINTAAN PENDING --}}
        @if($pendingBorrowings->count() > 0)
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-ink pb-3">
                    <h2 class="text-xl font-serif font-bold text-ink">Menunggu Persetujuan</h2>
                    <span class="text-sm font-serif text-yellow-600 font-semibold">{{ $pendingBorrowings->count() }} permintaan</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($pendingBorrowings as $item)
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex gap-3">
                                {{-- Book Cover --}}
                                <div class="w-16 h-24 bg-white border border-yellow-200 rounded overflow-hidden flex-shrink-0">
                                    @if($item->book->cover_image)
                                        <img src="{{ $item->book->cover_url }}" alt="{{ $item->book->title }}" 
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-yellow-100">
                                            <x-lucide-book class="w-4 h-4 text-yellow-600/40" />
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <h3 class="font-serif font-bold text-ink text-sm line-clamp-2">{{ $item->book->title }}</h3>
                                    <p class="font-serif text-xs text-coffee mt-0.5">{{ $item->book->author }}</p>
                                    
                                    <div class="mt-2 flex items-center gap-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                            ⏳ Menunggu Approval
                                        </span>
                                    </div>

                                    <p class="text-xs text-yellow-700 font-serif mt-2">
                                        Diminta: {{ $item->created_at->format('d M Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- QUICK ACTIONS --}}
        <div class="bg-ink/5 border border-ink rounded-lg p-6">
            <h3 class="font-serif font-bold text-ink mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <a href="{{ route('books.index') }}" 
                    class="px-4 py-3 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-book-open class="w-4 h-4" /> Jelajahi Katalog
                </a>
                <a href="{{ route('member.transaksi') }}" 
                    class="px-4 py-3 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-history class="w-4 h-4" /> Riwayat Peminjaman
                </a>
            </div>
        </div>

        {{-- TIPS & INFO --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-surface border border-ink/50 rounded-lg p-5">
                <h3 class="font-serif font-bold text-ink flex items-center gap-2 mb-2">
                    <x-lucide-lightbulb class="w-5 h-5 text-coffee" />
                    Tips Peminjaman
                </h3>
                <ul class="text-sm font-serif text-muted space-y-1">
                    <li>• Batas peminjaman: {{ $borrowingStats['limit'] }} buku aktif</li>
                    <li>• Jangka waktu: 7 hari dari persetujuan</li>
                    <li>• Denda: Rp 1.000/hari untuk keterlambatan</li>
                    <li>• Perpanjangan: Hubungi admin untuk permohonan</li>
                </ul>
            </div>

            <div class="bg-surface border border-ink/50 rounded-lg p-5">
                <h3 class="font-serif font-bold text-ink flex items-center gap-2 mb-2">
                    <x-lucide-help-circle class="w-5 h-5 text-coffee" />
                    Butuh Bantuan?
                </h3>
                <p class="text-sm font-serif text-muted mb-3">Hubungi petugas perpustakaan untuk:</p>
                <ul class="text-xs font-serif text-muted space-y-1">
                    <li>✓ Pertanyaan tentang buku</li>
                    <li>✓ Masalah teknis</li>
                    <li>✓ Perpanjangan peminjaman</li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>
