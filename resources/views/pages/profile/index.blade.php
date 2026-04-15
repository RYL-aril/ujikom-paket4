<x-layouts.app>
    <div class="max-w-5xl mx-auto space-y-6 px-2">

        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div>
                <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Profil Pengguna</h1>
                <p class="text-muted mt-1 font-serif text-sm">Kelola informasi akun, preferensi, dan keamanan.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2 w-max">
                <x-lucide-arrow-left class="w-4 h-4" /> Kembali
            </a>
        </div>

        {{-- 2. FORM UTAMA --}}
        <form method="POST" action="#" class="bg-surface border border-ink">
            @csrf
            <div class="p-6 md:p-8 space-y-8">

                {{-- Seksi I: Identitas & Foto --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-user class="w-4 h-4 text-coffee" /> I. Identitas & Foto
                    </h2>
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        {{-- Avatar Upload --}}
                        <div class="flex-shrink-0">
                            <div
                                class="w-24 h-24 bg-background border border-ink rounded-full flex items-center justify-center overflow-hidden">
                                <img src="https://i.pinimg.com/1200x/9d/a6/85/9da685aef502c3f249bd434a78bc8028.jpg"
                                    alt="Eserel" class="w-full h-full object-cover">
                            </div>
                            <button type="button"
                                class="mt-3 w-full px-3 py-1.5 border border-ink bg-surface text-xs font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-colors rounded">
                                Ganti Foto
                            </button>
                        </div>

                        {{-- Basic Info Fields --}}
                        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Nama
                                    Lengkap</label>
                                <input type="text" value="Eserel"
                                    class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                            </div>
                            <div>
                                <label
                                    class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Email</label>
                                <input type="email" value="eserel@scriptoria.id"
                                    class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                            </div>
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">ID
                                    Pengguna</label>
                                <input type="text" value="ADM-001" disabled
                                    class="w-full px-4 py-2.5 bg-ink/5 border border-ink text-sm font-serif text-muted cursor-not-allowed">
                            </div>
                            <div>
                                <label
                                    class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Role</label>
                                <input type="text" value="Admin Kurator" disabled
                                    class="w-full px-4 py-2.5 bg-ink/5 border border-ink text-sm font-serif text-muted cursor-not-allowed">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Seksi II: Preferensi Tampilan --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-palette class="w-4 h-4 text-coffee" /> II. Preferensi Tampilan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Bahasa
                                Antarmuka</label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="id">Bahasa Indonesia</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Zona
                                Waktu</label>
                            <select
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                                <option value="Asia/Jakarta">WIB (UTC+7)</option>
                                <option value="Asia/Makassar">WITA (UTC+8)</option>
                                <option value="Asia/Jayapura">WIT (UTC+9)</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Notifikasi
                                Dashboard</label>
                            <div class="space-y-2">
                                <label
                                    class="flex items-center gap-3 p-3 border border-ink rounded hover:bg-ink/5 transition-colors cursor-pointer">
                                    <input type="checkbox" checked
                                        class="w-4 h-4 border border-ink text-ink focus:ring-ink">
                                    <span class="font-serif text-sm text-ink">Tampilkan ringkasan transaksi
                                        harian</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 p-3 border border-ink rounded hover:bg-ink/5 transition-colors cursor-pointer">
                                    <input type="checkbox" checked
                                        class="w-4 h-4 border border-ink text-ink focus:ring-ink">
                                    <span class="font-serif text-sm text-ink">Notifikasi peminjaman menunggu
                                        verifikasi</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 p-3 border border-ink rounded hover:bg-ink/5 transition-colors cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 border border-ink text-ink focus:ring-ink">
                                    <span class="font-serif text-sm text-ink">Email laporan mingguan (setiap
                                        Senin)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Seksi III: Keamanan & Sandi --}}
                <div class="space-y-5">
                    <h2
                        class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 flex items-center gap-2">
                        <x-lucide-shield-check class="w-4 h-4 text-coffee" /> III. Keamanan & Sandi
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Sandi Saat
                                Ini</label>
                            <input type="password" placeholder="••••••••"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div></div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Sandi
                                Baru</label>
                            <input type="password" placeholder="Minimal 8 karakter"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Konfirmasi
                                Sandi Baru</label>
                            <input type="password" placeholder="Ulangi sandi baru"
                                class="w-full px-4 py-2.5 bg-background border border-ink text-sm font-serif text-ink placeholder:text-muted/50 focus:outline-none focus:ring-1 focus:ring-ink transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-mono text-xs uppercase tracking-wider text-coffee mb-2">Sesi
                                Aktif</label>
                            <div class="border border-ink p-4 bg-background">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-serif text-sm text-ink">Browser Chrome • Windows 11</p>
                                        <p class="font-mono text-xs text-muted mt-1">Terakhir aktif: 07 Jun 2024, 14:30
                                            WIB</p>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 text-xs font-mono border border-ink rounded text-ink bg-surface">Sesi
                                        Ini</span>
                                </div>
                            </div>
                            <button type="button"
                                class="mt-3 px-4 py-2 border border-ink text-xs font-serif text-coffee hover:text-red-800 hover:border-red-800 transition-colors rounded">
                                Keluarkan Semua Sesi Lain
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER ACTIONS --}}
            <div
                class="bg-[#f4f1eb] border-t border-ink px-6 md:px-8 py-5 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                <button type="reset"
                    class="w-full sm:w-auto px-6 py-2.5 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md text-center">
                    Reset
                </button>
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 bg-ink text-surface border border-ink text-sm font-serif hover:bg-ink/90 transition-all rounded-md flex items-center justify-center gap-2">
                    <x-lucide-check class="w-4 h-4" /> Simpan Perubahan
                </button>
            </div>
        </form>

        {{-- INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-info class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Catatan Keamanan:</span> Perubahan sandi akan berlaku segera.
                Pastikan Anda mengingat sandi baru. Untuk keamanan tambahan, pertimbangkan mengaktifkan autentikasi dua
                faktor (fitur akan tersedia pada pembaruan berikutnya).
            </div>
        </div>
    </div>
</x-layouts.app>
