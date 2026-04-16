<x-layouts.app>
    <div class="bg-background text-ink antialiased min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-lg bg-surface border border-ink p-8 text-center">
            <x-lucide-file-x class="w-12 h-12 text-accent mx-auto mb-4 stroke-[1.5]" />
            <h1 class="text-7xl font-mono font-bold text-ink tracking-tight mb-2">404</h1>
            <div class="w-12 h-px bg-ink mx-auto mb-4"></div>
            <h2 class="font-serif text-xl font-semibold text-ink mb-2">Arsip Tidak Ditemukan</h2>
            <p class="font-serif text-muted mb-6 text-sm leading-relaxed max-w-md mx-auto">
                Dokumen atau halaman yang Anda cari telah dipindahkan, diarsipkan, atau tidak terdaftar dalam katalog Scriptoria.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ url()->previous() ?? '/' }}" class="px-5 py-2.5 border border-ink bg-background text-sm font-serif text-accent hover:text-ink hover:bg-ink/5 transition-colors rounded-md">
                    Kembali
                </a>
            </div>
            <p class="mt-8 text-[10px] font-mono text-muted uppercase tracking-widest">Scriptoria Digital Archive • {{ date('Y') }}</p>
        </div>
    </div>
</x-layouts.app>