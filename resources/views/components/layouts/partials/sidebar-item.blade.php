@props(['icon', 'label', 'href', 'active' => false])

<a href="{{ $href }}" @class([
    'flex items-center gap-4 px-8 py-2.5 transition-colors duration-200 group text-sm font-serif relative border-l-4',
    'bg-ink/5 text-ink font-bold border-ink' => $active,
    'text-coffee/80 hover:text-ink hover:bg-ink/5 border-transparent' => !$active,
])>
    <span @class([
        'transition-colors duration-200',
        'text-ink' => $active,
        'text-coffee/40 group-hover:text-ink/60' => !$active,
    ])>
        @if ($icon === 'dashboard' || $icon === 'chart-bar')
            <x-lucide-layout-dashboard class="w-5 h-5 stroke-[1.5]" />
        @elseif($icon === 'book' || $icon === 'book-open')
            <x-lucide-book-open class="w-5 h-5 stroke-[1.5]" />
        @elseif($icon === 'users')
            <x-lucide-users-round class="w-5 h-5 stroke-[1.5]" />
        @elseif($icon === 'transaction')
            <x-lucide-repeat class="w-5 h-5 stroke-[1.5]" />
        @else
            <x-lucide-circle-slash class="w-5 h-5 stroke-[1.5]" />
        @endif
    </span>

    <span class="flex-1 tracking-wide">{{ $label }}</span>

    @if ($active)
        <span class="font-serif text-ink text-lg leading-none opacity-50 relative -top-[1px]">›</span>
    @endif
</a>
