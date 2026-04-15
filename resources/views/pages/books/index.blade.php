<x-layouts.app>
    <div class="max-w-7xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Katalog Perpustakaan</h1>
                <p class="text-muted mt-1 font-serif">Arsip koleksi buku fisik, digital, dan referensi langka.</p>
            </div>
            {{-- Admin/Petugas Actions --}}
            @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'petugas']))
                <a href="{{ route('admin.books.create') }}"
                    class="px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center gap-2 w-max">
                    <x-lucide-book-plus class="w-4 h-4" /> Tambah Buku
                </a>
            @endif
        </div>

        {{-- 2. FILTER & PENCARIAN --}}
        <form method="GET" action="{{ route('books.index') }}" class="bg-surface border border-ink p-4">
            <div class="flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1">
                    <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Pencarian</label>
                    <div class="relative">
                        <x-lucide-search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-coffee/60" />
                        <input type="text" name="search" placeholder="Cari judul, ISBN, atau pengarang..."
                            class="w-full pl-9 pr-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/60 focus:outline-none focus:ring-1 focus:ring-ink rounded-md"
                            value="{{ request('search') }}">
                    </div>
                </div>
                <div>
                    <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Kategori</label>
                    <select name="category"
                        class="px-4 py-2.5 bg-background border border-ink text-sm font-serif text-coffee focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                        <option value="">Semua Kategori</option>
                        <option value="Fiksi - Sastra Indonesia" @selected(request('category') === 'Fiksi - Sastra Indonesia')>Fiksi & Sastra Indonesia</option>
                        <option value="Filosofi & Spiritualitas" @selected(request('category') === 'Filosofi & Spiritualitas')>Filosofi & Spiritualitas</option>
                        <option value="Pengembangan Diri & Bisnis" @selected(request('category') === 'Pengembangan Diri & Bisnis')>Pengembangan Diri</option>
                        <option value="Sejarah & Antropologi" @selected(request('category') === 'Sejarah & Antropologi')>Sejarah & Antropologi</option>
                        <option value="Psikologi & Sains Kognitif" @selected(request('category') === 'Psikologi & Sains Kognitif')>Psikologi</option>
                    </select>
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <button type="submit"
                        class="flex-1 md:flex-none px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                        <x-lucide-search class="w-4 h-4" /> Cari
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('books.index') }}"
                            class="flex-1 md:flex-none px-4 py-2.5 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md text-center">
                            Reset
                        </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- 3. GRID KATALOG BUKU --}}
        @if ($books->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                @foreach ($books as $book)
                    <div class="bg-surface border border-ink flex flex-col group hover:shadow-[var(--elevation-1)] transition-all">
                        {{-- Cover Image --}}
                        <div class="aspect-[2/3] bg-ink/5 border-b border-ink overflow-hidden relative">
                            @if ($book->cover_image)
                                <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" loading="lazy"
                                    class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-b from-ink/20 to-ink/5">
                                    <x-lucide-book class="w-12 h-12 text-ink/40" />
                                </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                @php
                                    $status = $book->is_public ? 'tersedia' : 'nonaktif';
                                    $badgeText = match ($status) {
                                        'tersedia' => 'text-ink',
                                        'nonaktif' => 'text-muted',
                                    };
                                    $badgeBg = match ($status) {
                                        'tersedia' => 'bg-surface',
                                        'nonaktif' => 'bg-muted/10',
                                    };
                                @endphp
                                <span class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider border border-ink rounded shadow-sm {{ $badgeText }} {{ $badgeBg }}">
                                    {{ $status }}
                                </span>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-4 flex-1 flex flex-col">
                            <div class="flex-1">
                                <h3 class="font-serif font-semibold text-ink text-base leading-tight line-clamp-2">
                                    {{ $book->title }}</h3>
                                <p class="font-serif text-sm text-muted mt-1">{{ $book->author }}</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <span class="text-[10px] font-mono border border-ink px-2 py-0.5 rounded bg-ink/5 text-coffee">{{ $book->category }}</span>
                                    <span class="text-[10px] font-mono text-muted">{{ $book->published_year }}</span>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-ink flex items-center justify-between">
                                <span class="text-[10px] font-mono text-muted">ID: {{ $book->formatted_id ?? 'BK-' . str_pad($book->id, 4, '0', STR_PAD_LEFT) }}</span>
                                <div class="flex gap-2">
                                    {{-- View Button (Semua Role) --}}
                                    <a href="{{ route('admin.books.show', $book) }}"
                                        class="p-1.5 border border-ink rounded hover:bg-ink/5 transition-colors"
                                        title="Lihat Detail">
                                        <x-lucide-eye class="w-3.5 h-3.5 text-coffee/70 hover:text-ink" />
                                    </a>

                                    {{-- Edit & Delete Buttons (Admin & Petugas) --}}
                                    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'petugas']))
                                        <a href="{{ route('admin.books.edit', $book) }}"
                                            class="p-1.5 border border-ink rounded hover:bg-ink/5 transition-colors"
                                            title="Edit Buku">
                                            <x-lucide-pencil class="w-3.5 h-3.5 text-coffee/70 hover:text-ink" />
                                        </a>
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 border border-ink rounded hover:bg-red-500/10 transition-colors"
                                                title="Hapus Buku">
                                                <x-lucide-trash-2 class="w-3.5 h-3.5 text-coffee/70 hover:text-red-500" />
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="mt-6 border-t border-ink pt-4 flex justify-center">
                {{ $books->links('pagination::tailwind') }}
            </div>
        @else
            <div class="py-12 text-center bg-surface border border-dashed border-ink rounded">
                <x-lucide-inbox class="w-12 h-12 text-muted/40 mx-auto mb-3" />
                <p class="text-coffee/60 font-serif">Tidak ada buku ditemukan</p>
                @if(request('search') || request('category'))
                    <a href="{{ route('books.index') }}"
                        class="text-sm text-ink underline hover:no-underline mt-2 inline-block font-serif">
                        Bersihkan filter
                    </a>
                @endif
            </div>
        @endif

        {{-- 4. PAGINATION --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border border-ink bg-surface p-4">
            <span class="text-xs font-mono text-muted">Menampilkan halaman 1 dari 156</span>
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
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">156</button>
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">Next
                    →</button>
            </nav>
        </div>

        {{-- 5. INFO PANEL --}}
        <div class="bg-surface border border-ink p-5">
            <div class="flex items-center gap-2 mb-3">
                <x-lucide-bookmark class="w-4 h-4 text-coffee" />
                <h3 class="font-serif font-semibold text-ink text-sm">Panduan Katalogisasi</h3>
            </div>
            <ul class="space-y-2 font-serif text-sm text-muted">
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>Pastikan ISBN dan tahun terbit sesuai dengan halaman hak cipta sebelum menyimpan entri.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>Buku dengan status <span class="text-ink font-semibold">Nonaktif</span> akan otomatis
                        disembunyikan dari pencarian publik.</span>
                </li>
            </ul>
        </div>
    </div>
</x-layouts.app>
