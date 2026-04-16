
<x-layouts.app class="bg-background text-ink antialiased min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-lg bg-surface border border-ink p-8 text-center">
        <x-lucide-clock class="w-12 h-12 text-accent mx-auto mb-4 stroke-[1.5]" />
        <h1 class="text-7xl font-mono font-bold text-ink tracking-tight mb-2">419</h1>
        <div class="w-12 h-px bg-ink mx-auto mb-4"></div>
        <h2 class="font-serif text-xl font-semibold text-ink mb-2">Sesi Berakhir</h2>
        <p class="font-serif text-muted mb-6 text-sm leading-relaxed max-w-md mx-auto">
            Token keamanan halaman telah kedaluwarsa. Kembali dan ulangi tindakan Anda. Data yang belum disimpan mungkin tidak tersimpan.
        </p>
        <a href="{{ url()->previous() ?? '/' }}" class="px-5 py-2.5 border border-ink bg-ink text-surface text-sm font-serif hover:bg-ink/90 transition-colors rounded-md inline-flex items-center justify-center gap-2">
            <x-lucide-rotate-ccw class="w-4 h-4" /> Muat Ulang
        </a>
    </div>
</x-layouts.app>
