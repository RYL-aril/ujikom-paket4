<x-layouts.app>
    <div class="max-w-6xl mx-auto space-y-6 px-2">

        {{-- HEADER --}}
        <div class="border-b border-ink pb-5">
            <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Riwayat Peminjaman</h1>
            <p class="text-muted mt-1 font-serif">Kelola semua permintaan dan status peminjaman buku Anda.</p>
        </div>

        {{-- TABS/FILTERS --}}
        <div class="flex gap-2 border-b border-ink">
            <a href="{{ route('member.transaksi') }}" 
                class="px-4 py-3 border-b-2 font-serif text-sm font-semibold transition-colors {{ request('status') === null ? 'border-ink text-ink' : 'border-transparent text-coffee hover:text-ink' }}">
                Semua
            </a>
            <a href="{{ route('member.transaksi', ['status' => 'pending']) }}" 
                class="px-4 py-3 border-b-2 font-serif text-sm font-semibold transition-colors {{ request('status') === 'pending' ? 'border-yellow-500 text-ink' : 'border-transparent text-coffee hover:text-ink' }}">
                ⏳ Menunggu Persetujuan
            </a>
            <a href="{{ route('member.transaksi', ['status' => 'dipinjam']) }}" 
                class="px-4 py-3 border-b-2 font-serif text-sm font-semibold transition-colors {{ request('status') === 'dipinjam' ? 'border-blue-500 text-ink' : 'border-transparent text-coffee hover:text-ink' }}">
                📖 Sedang Dipinjam
            </a>
            <a href="{{ route('member.transaksi', ['status' => 'dikembalikan']) }}" 
                class="px-4 py-3 border-b-2 font-serif text-sm font-semibold transition-colors {{ request('status') === 'dikembalikan' ? 'border-green-500 text-ink' : 'border-transparent text-coffee hover:text-ink' }}">
                ✓ Sudah Dikembalikan
            </a>
        </div>

        {{-- TRANSACTIONS LIST --}}
        @if($transaksi->count() > 0)
            <div class="space-y-4">
                @foreach($transaksi as $item)
                    <div class="bg-surface border border-ink rounded-lg p-6 hover:shadow-[var(--elevation-1)] transition-all">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            {{-- Left: Book Info --}}
                            <div class="lg:col-span-2">
                                <div class="flex gap-4">
                                    {{-- Book Cover Thumbnail --}}
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

                                    {{-- Book Details --}}
                                    <div class="flex-1">
                                        <h3 class="font-serif font-bold text-ink text-lg line-clamp-2">{{ $item->book->title }}</h3>
                                        <p class="font-serif text-coffee text-sm mt-0.5">{{ $item->book->author }}</p>

                                        {{-- Status Badge --}}
                                        <div class="mt-3 flex items-center gap-2">
                                            @php
                                                $statusConfig = match($item->status) {
                                                    'pending' => ['icon' => 'clock', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'label' => 'Menunggu Persetujuan'],
                                                    'dipinjam' => ['icon' => 'bookmark', 'bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'label' => 'Sedang Dipinjam'],
                                                    'dikembalikan' => ['icon' => 'check-circle', 'bg' => 'bg-green-100', 'text' => 'text-green-700', 'label' => 'Sudah Dikembalikan'],
                                                    'ditolak' => ['icon' => 'x-circle', 'bg' => 'bg-red-100', 'text' => 'text-red-700', 'label' => 'Ditolak'],
                                                    'expired' => ['icon' => 'alert-circle', 'bg' => 'bg-orange-100', 'text' => 'text-orange-700', 'label' => 'Expired'],
                                                    'terlambat' => ['icon' => 'alert-triangle', 'bg' => 'bg-red-100', 'text' => 'text-red-700', 'label' => 'Terlambat Dikembalikan'],
                                                    default => ['icon' => 'help-circle', 'bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'label' => ucfirst($item->status)],
                                                };
                                            @endphp
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                                                {{ $statusConfig['label'] }}
                                            </span>
                                        </div>

                                        {{-- Info Details --}}
                                        <div class="mt-4 grid grid-cols-2 gap-3">
                                            <div>
                                                <p class="font-mono text-xs uppercase tracking-wider text-muted">Booking Code</p>
                                                <p class="font-serif font-semibold text-ink">{{ $item->booking_code ?? '-' }}</p>
                                            </div>
                                            @if($item->borrowed_date)
                                                <div>
                                                    <p class="font-mono text-xs uppercase tracking-wider text-muted">Tanggal Pinjam</p>
                                                    <p class="font-serif text-ink">{{ $item->borrowed_date->format('d M Y') }}</p>
                                                </div>
                                            @endif
                                            @if($item->due_date)
                                                <div>
                                                    <p class="font-mono text-xs uppercase tracking-wider text-muted">Batas Kembali</p>
                                                    <p class="font-serif text-ink">{{ $item->due_date->format('d M Y') }}</p>
                                                </div>
                                            @endif
                                            @if($item->status === 'pending' && $item->pickup_deadline)
                                                <div>
                                                    <p class="font-mono text-xs uppercase tracking-wider text-muted">Batas Pengambilan</p>
                                                    <p class="font-serif text-yellow-700 font-semibold">{{ $item->pickup_deadline->format('d M Y H:i') }}</p>
                                                </div>
                                            @endif
                                        </div>

                                        @if($item->rejection_reason && $item->status === 'ditolak')
                                            <div class="mt-4 bg-red-50 border border-red-200 rounded p-3">
                                                <p class="font-mono text-xs uppercase tracking-wider text-red-700 mb-1">Alasan Penolakan</p>
                                                <p class="font-serif text-red-700">{{ $item->rejection_reason }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Right: Actions --}}
                            <div class="flex flex-col gap-2">
                                {{-- Receipt Button (for approved borrowings) --}}
                                @if($item->status === 'dipinjam' || $item->status === 'dikembalikan' || $item->status === 'terlambat')
                                    <a href="{{ route('transaksi.receipt', $item->booking_code) }}" 
                                        target="_blank"
                                        class="px-4 py-2 bg-ink text-surface border border-ink text-xs font-serif text-center hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                                        <x-lucide-file-text class="w-3.5 h-3.5" /> Lihat Bukti
                                    </a>
                                @endif

                                {{-- View Details --}}
                                <a href="{{ route('books.show', $item->book) }}" 
                                    class="px-4 py-2 border border-ink bg-surface text-xs font-serif text-coffee text-center hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center justify-center gap-2">
                                    <x-lucide-eye class="w-3.5 h-3.5" /> Lihat Buku
                                </a>

                                {{-- Status Timeline --}}
                                <div class="mt-4 space-y-2 text-xs">
                                    <div class="flex items-start gap-2">
                                        <div class="w-2 h-2 bg-ink rounded-full mt-1.5 flex-shrink-0"></div>
                                        <div>
                                            <p class="font-semibold text-ink">Permintaan Dibuat</p>
                                            <p class="text-muted">{{ $item->created_at->format('d M Y H:i') }}</p>
                                        </div>
                                    </div>
                                    @if($item->verified_at)
                                        <div class="flex items-start gap-2">
                                            <div class="w-2 h-2 {{ $item->status === 'ditolak' ? 'bg-red-500' : 'bg-green-500' }} rounded-full mt-1.5 flex-shrink-0"></div>
                                            <div>
                                                <p class="font-semibold {{ $item->status === 'ditolak' ? 'text-red-700' : 'text-green-700' }}">
                                                    {{ $item->status === 'ditolak' ? 'Permintaan Ditolak' : 'Permintaan Disetujui' }}
                                                </p>
                                                <p class="text-muted">{{ $item->verified_at->format('d M Y H:i') }} oleh {{ $item->verifiedBy?->name ?? 'Sistem' }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($item->returned_date)
                                        <div class="flex items-start gap-2">
                                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-1.5 flex-shrink-0"></div>
                                            <div>
                                                <p class="font-semibold text-blue-700">Buku Dikembalikan</p>
                                                <p class="text-muted">{{ $item->returned_date->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if($item->fine_amount > 0)
                                    <div class="mt-4 bg-red-50 border border-red-200 rounded p-3">
                                        <p class="font-mono text-xs uppercase tracking-wider text-red-700 mb-1">Denda</p>
                                        <p class="font-serif text-lg font-bold text-red-700">Rp {{ number_format($item->fine_amount) }}</p>
                                        <p class="font-serif text-xs text-red-600 mt-1">{{ $item->fine_paid ? '✓ Sudah Dibayar' : 'Belum Dibayar' }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="mt-6">
                {{ $transaksi->links('pagination::tailwind') }}
            </div>
        @else
            <div class="py-12 text-center bg-surface border border-dashed border-ink rounded">
                <x-lucide-inbox class="w-12 h-12 text-muted/40 mx-auto mb-3" />
                <p class="text-coffee/60 font-serif mb-2">Belum ada riwayat peminjaman</p>
                <p class="text-xs text-muted font-serif">Mulai dengan mengunjungi katalog dan memilih buku favorit Anda</p>
                <a href="{{ route('books.index') }}" 
                    class="mt-4 inline-block px-4 py-2 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md">
                    Jelajahi Katalog
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>
