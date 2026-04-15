@props([
    'date' => now()->format('l, d F Y'),
    'userName' => auth()->user()->name ?? 'Eserel',
    'userRole' => auth()->user()->role ?? 'Admin',
    'avatar' => 'https://i.pinimg.com/1200x/9d/a6/85/9da685aef502c3f249bd434a78bc8028.jpg',
])

<header class="h-16 bg-surface border-b border-ink px-6 flex items-center justify-between">
    <div>
        <p class="text-xs font-mono uppercase tracking-widest text-muted">{{ $date }}</p>
        <h2 class="mt-1 text-lg font-serif font-bold text-ink">Selamat Bertugas, {{ $userName }}</h2>
    </div>

    <div class="flex items-center gap-3">
        <span
            class="text-xs font-bold uppercase tracking-wider px-2 py-1 bg-coffee/10 text-coffee rounded-md border border-coffee/20">
            {{ $userRole }}
        </span>
        <img src="{{ $avatar }}" alt="{{ $userName }}"
            class="w-9 h-9 rounded-full object-cover border border-ink">
    </div>
</header>
