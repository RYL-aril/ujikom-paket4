<x-layouts.app>
    <div class="max-w-7xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Data Pengguna Perpustakaan</h1>
                <p class="text-muted mt-1 font-serif">Manajemen anggota, status keanggotaan, dan riwayat akun.</p>
            </div>
            <button
                class="px-4 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md shadow-[var(--elevation-1)] flex items-center gap-2 w-max">
                <x-lucide-user-plus class="w-4 h-4" /> Tambah Anggota
            </button>
        </div>

        {{-- 2. FILTER & PENCARIAN --}}
        <div class="bg-surface border border-ink p-4 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <div class="relative flex-1 sm:w-64">
                    <x-lucide-search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-coffee/60" />
                    <input role="text" placeholder="Cari nama atau ID anggota..."
                        class="w-full pl-9 pr-4 py-2 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/60 focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                </div>
                <select
                    class="px-3 py-2 bg-background border border-ink text-sm font-serif text-coffee focus:outline-none focus:ring-1 focus:ring-ink rounded-md">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="pending">Pending</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <span class="text-xs font-mono text-muted">Menampilkan 124 dari 842 anggota</span>
        </div>

        {{-- 3. TABEL DATA --}}
        <div class="bg-surface border border-ink">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-ink bg-ink/5">
                            <th class="text-left px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">ID
                            </th>
                            <th class="text-left px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Nama
                                Lengkap</th>
                            <th class="text-left px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">Email
                                / Kontak</th>
                            <th class="text-center px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">
                                Role</th>
                            <th class="text-center px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">
                                Status</th>
                            <th class="text-right px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">
                                Bergabung</th>
                            <th class="text-right px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ink">
                        @forelse ($users as $user)
                            <tr class="hover:bg-ink/5 transition-colors">
                                <td class="px-6 py-4 font-mono text-coffee">{{ $user->id }}</td>
                                <td class="px-6 py-4 font-serif text-ink">{{ $user->name }}</td>
                                <td class="px-6 py-4 font-mono text-muted text-xs">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-2 py-0.5 text-xs font-mono border border-ink rounded bg-ink/5 text-coffee">{{ $user->role }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $badge = match ($user->status) {
                                            'aktif' => 'bg-ink/5 text-ink border-ink',
                                            'pending' => 'bg-coffee/10 text-coffee border-coffee',
                                            'nonaktif' => 'bg-muted/10 text-muted border-muted',
                                        };
                                    @endphp
                                    <span
                                        class="px-2 py-0.5 text-xs font-mono border rounded uppercase tracking-wider {{ $badge }}">{{ $user->status }}</span>
                                </td>
                                <td class="px-6 py-4 text-right font-mono text-muted text-xs">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                            class="p-1.5 border border-ink/40 rounded hover:bg-ink/10 hover:border-ink transition-colors group">
                                            <x-lucide-eye class="w-4 h-4 text-coffee/70 group-hover:text-ink" />
                                        </a>
                                        <button
                                            class="p-1.5 border border-ink/40 rounded hover:bg-ink/10 hover:border-ink transition-colors group">
                                            <x-lucide-pencil class="w-4 h-4 text-coffee/70 group-hover:text-ink" />
                                        </button>
                                        <button
                                            class="p-1.5 border border-ink/40 rounded hover:bg-red-50 hover:border-red-800 transition-colors group">
                                            <x-lucide-trash-2 class="w-4 h-4 text-coffee/70 group-hover:text-red-800" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-muted font-serif">
                                    Belum ada pengguna terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 4. PAGINATION STATIS --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border border-ink bg-surface p-4">
            <span class="text-xs font-mono text-muted">Menampilkan halaman 1 dari 85</span>
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
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">85</button>
                <button
                    class="px-3 py-1.5 border border-ink text-xs font-mono text-coffee hover:bg-ink/5 hover:text-ink transition-colors rounded">Next
                    →</button>
            </nav>
        </div>

        {{-- 5. CATATAN SISTEM / VALIDASI --}}
        <div class="bg-surface border border-ink p-5">
            <div class="flex items-center gap-2 mb-3">
                <x-lucide-alert-circle class="w-4 h-4 text-coffee" />
                <h3 class="font-serif font-semibold text-ink text-sm">Validasi Data</h3>
            </div>
            <ul class="space-y-2 font-serif text-sm text-muted">
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>3 akun memerlukan verifikasi email sebelum status diubah menjadi <span
                            class="text-ink font-semibold">Aktif</span>.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-coffee mt-1">•</span>
                    <span>Kartu anggota digital dapat diunduh melalui tombol <span class="text-ink font-semibold">Aksi →
                            Detail</span>.</span>
                </li>
            </ul>
        </div>
    </div>
</x-layouts.app>
