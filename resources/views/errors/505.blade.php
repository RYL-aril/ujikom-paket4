<x-layouts.app>
    <div class="bg-background text-ink antialiased min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-lg bg-surface border border-ink p-8 text-center">
            <x-lucide-alert-octagon class="w-12 h-12 text-accent mx-auto mb-4 stroke-[1.5]" />
            <h1 class="text-7xl font-mono font-bold text-ink tracking-tight mb-2">500</h1>
            <div class="w-12 h-px bg-ink mx-auto mb-4"></div>
            <h2 class="font-serif text-xl font-semibold text-ink mb-2">Gangguan Sistem</h2>
            <p class="font-serif text-muted mb-6 text-sm leading-relaxed max-w-md mx-auto">
                Terjadi kesalahan pada server arsip. Tim teknis telah menerima log error dan sedang melakukan verifikasi sistem.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ url()->previous() ?? '/' }}" class="px-5 py-2.5 border border-ink bg-background text-sm font-serif text-accent hover:text-ink hover:bg-ink/5 transition-colors rounded-md">
                    Coba Lagi
                </a>
            </div>

            @if(app()->hasDebugModeEnabled())
            <div class="mt-6 pt-4 border-t border-ink text-left bg-background p-4 rounded">
                <p class="font-mono text-[10px] uppercase tracking-wider text-muted mb-2">Debug Info</p>
                <p class="font-mono text-xs text-accent break-all whitespace-pre-wrap">{{ $exception?->getMessage() ?? 'Unknown exception' }}</p>
            </div>
            @endif
        </div>
    </div>
</x-layouts.app>