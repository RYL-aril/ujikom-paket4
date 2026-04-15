<x-layouts.app>
    <div class="max-w-7xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Katalog Perpustakaan</h1>
                <p class="text-muted mt-1 font-serif">Arsip koleksi buku fisik, digital, dan referensi langka.</p>
            </div>
            <a href="{{ route('admin.books.create') }}"
                class="px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-book-plus class="w-4 h-4" /> Tambah Buku
            </a>
        </div>

        {{-- 2. FILTER & PENCARIAN --}}
        <form method="GET" action="{{ route('books.index') }}"
            class="bg-surface border border-ink p-4 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <div class="relative flex-1 sm:w-72">
                    <x-lucide-search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-coffee/60" />
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari judul, ISBN, atau pengarang..."
                        class="w-full pl-9 pr-4 py-2 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/60 focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                </div>
                <select name="category"
                    class="px-3 py-2 bg-background border border-ink text-sm font-serif text-coffee focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                    <option value="">Semua Kategori</option>
                    @foreach (['fiksi' => 'Fiksi & Sastra', 'sejarah' => 'Sejarah & Arkeologi', 'sains' => 'Sains & Teknologi', 'arsip' => 'Dokumen Arsip'] as $value => $label)
                        <option value="{{ $value }}" {{ request('category') === $value ? 'selected' : '' }}>
                            {{ $label }}</option>
                    @endforeach
                </select>
                <select name="status"
                    class="px-3 py-2 bg-background border border-ink text-sm font-serif text-coffee focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                    <option value="">Semua Status</option>
                    @foreach (['tersedia', 'dipinjam', 'reservasi', 'nonaktif'] as $status)
                        <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs font-mono text-muted">
                    Menampilkan {{ $books->firstItem() ?? 0 }}-{{ $books->lastItem() ?? 0 }} dari
                    {{ $books->total() }} entri
                </span>
                @if (request()->anyFilled(['search', 'category', 'status']))
                    <a href="{{ route('admin.books.index') }}"
                        class="text-xs text-coffee hover:text-ink underline">Reset Filter</a>
                @endif
            </div>
        </form>

        {{-- 3. GRID KATALOG BUKU --}}
        @forelse($books as $book)
            <div
                class="bg-surface border border-ink flex flex-col group hover:shadow-[var(--elevation-1)] transition-all">
                {{-- Cover Image --}}
                <div class="aspect-[2/3] bg-ink/5 border-b border-ink overflow-hidden relative">
                    <img src="{{ $book->cover_url ?? 'https://picsum.photos/seed/' . $book->id . '/400/600' }}"
                        alt="{{ $book->title }}" loading="lazy"
                        class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                    <div class="absolute top-3 left-3">
                        @php($badge = $book->status_badge)
                        <span
                            class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider border border-ink rounded shadow-sm {{ $badge['class'] }}">
                            {{ $badge['label'] }}
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
                            <span
                                class="text-[10px] font-mono border border-ink px-2 py-0.5 rounded bg-ink/5 text-coffee">
                                {{ $book->category }}
                            </span>
                            <span class="text-[10px] font-mono text-muted">{{ $book->year }}</span>
                            @if ($book->stock !== null)
                                <span class="text-[10px] font-mono text-coffee">Stok: {{ $book->stock }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-t border-ink flex items-center justify-between">
                        <span class="text-[10px] font-mono text-muted">ID: {{ $book->id }}</span>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.books.show', $book) }}"
                                class="p-1.5 border border-ink rounded hover:bg-ink/5 transition-colors"
                                title="Lihat Detail">
                                <x-lucide-eye class="w-3.5 h-3.5 text-coffee/70 hover:text-ink" />
                            </a>
                            <a href="{{ route('admin.books.edit', $book) }}"
                                class="p-1.5 border border-ink rounded hover:bg-ink/5 transition-colors" title="Edit">
                                <x-lucide-pencil class="w-3.5 h-3.5 text-coffee/70 hover:text-ink" />
                            </a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline"
                                onsubmit="return confirm('Hapus buku ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="p-1.5 border border-ink rounded hover:bg-red-500/10 transition-colors"
                                    title="Hapus">
                                    <x-lucide-trash class="w-3.5 h-3.5 text-coffee/70 hover:text-red-500" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-surface border border-ink rounded-lg">
                <x-lucide-book-dashed class="w-12 h-12 text-muted mx-auto mb-3" />
                <p class="text-muted font-serif">Tidak ada buku yang ditemukan.</p>
                <a href="{{ route('admin.books.create') }}" class="text-ink hover:underline text-sm mt-2 inline-block">
                    Tambah buku pertama Anda →
                </a>
            </div>
        @endforelse

        {{-- 4. PAGINATION --}}
        @if ($books->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border border-ink bg-surface p-4">
                <span class="text-xs font-mono text-muted">
                    Halaman {{ $books->currentPage() }} dari {{ $books->lastPage() }}
                </span>
                <nav class="flex items-center gap-2">
                    {{-- Previous --}}
                    @if ($books->onFirstPage())
                        <span
                            class="px-3 py-1.5 border border-ink text-xs font-mono text-muted rounded opacity-50 cursor-not-allowed">←
                            Prev</span>
                    @else
                        <a href="{{ $books->previousPageUrl() }}"
                            class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">←
                            Prev</a>
                    @endif

                    {{-- Page Numbers (simplified) --}}
                    @foreach ($books->getUrlRange(1, min(5, $books->lastPage())) as $page => $url)
                        @if ($page == $books->currentPage())
                            <span
                                class="px-3 py-1.5 border border-ink bg-ink text-surface text-xs font-mono rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($books->lastPage() > 5)
                        @if ($books->lastPage() > 6)
                            <span class="text-muted">...</span>
                        @endif
                        @if ($books->lastPage() > 1)
                            <a href="{{ $books->url($books->lastPage()) }}"
                                class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">
                                {{ $books->lastPage() }}
                            </a>
                        @endif
                    @endif

                    {{-- Next --}}
                    @if ($books->hasMorePages())
                        <a href="{{ $books->nextPageUrl() }}"
                            class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">Next
                            →</a>
                    @else
                        <span
                            class="px-3 py-1.5 border border-ink text-xs font-mono text-muted rounded opacity-50 cursor-not-allowed">Next
                            →</span>
                    @endif
                </nav>
            </div>
        @endif

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
