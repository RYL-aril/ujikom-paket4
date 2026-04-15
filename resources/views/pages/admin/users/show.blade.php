<x-layouts.app>
    <div class="max-w-6xl mx-auto space-y-6 px-2">
        
        {{-- 1. HEADER PAGE --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-ink pb-5">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.users.index') }}" class="p-2 border border-ink rounded hover:bg-ink/5 transition-colors">
                    <x-lucide-arrow-left class="w-5 h-5 text-coffee" />
                </a>
                <div>
                    <h1 class="text-2xl font-serif font-bold text-ink tracking-tight">Detail Anggota</h1>
                    <p class="text-muted mt-1 font-serif text-sm">Profil lengkap, riwayat peminjaman, dan status keanggotaan.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-mail class="w-4 h-4" /> Kirim Notifikasi
                </button>
                <a href="#" class="px-4 py-2 border border-ink bg-surface text-sm font-serif text-coffee hover:text-ink hover:bg-ink/5 transition-all rounded-md flex items-center gap-2">
                    <x-lucide-pencil class="w-4 h-4" /> Edit Profil
                </a>
            </div>
        </div>

        {{-- 2. MAIN CONTENT GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- LEFT: Profile & Quick Stats --}}
            <div class="space-y-6">
                {{-- Profile Card --}}
                <div class="bg-surface border border-ink p-6 flex flex-col items-center text-center">
                    <div class="w-24 h-24 bg-background border border-ink rounded-full flex items-center justify-center mb-4">
                        <x-lucide-user class="w-10 h-10 text-muted" />
                    </div>
                    <h2 class="font-serif text-xl font-bold text-ink">Alya Rahmawati</h2>
                    <p class="font-mono text-sm text-coffee mt-1">ID: USR-001 | Anggota</p>
                    <span class="mt-3 px-3 py-1 border border-ink bg-ink/5 text-xs font-mono uppercase tracking-wider text-ink rounded">
                        Aktif
                    </span>
                    <div class="mt-6 w-full space-y-3 text-left">
                        <div class="flex justify-between border-b border-ink pb-2">
                            <span class="font-mono text-xs text-muted">Email</span>
                            <span class="font-serif text-sm text-ink">alya.r@univ.ac.id</span>
                        </div>
                        <div class="flex justify-between border-b border-ink pb-2">
                            <span class="font-mono text-xs text-muted">Telepon</span>
                            <span class="font-serif text-sm text-ink">+62 812-3456-7890</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-mono text-xs text-muted">Bergabung</span>
                            <span class="font-serif text-sm text-ink">12 Jan 2023</span>
                        </div>
                    </div>
                </div>

                {{-- Quick Stats --}}
                <div class="bg-surface border border-ink p-5">
                    <h3 class="font-serif font-semibold text-ink mb-4 border-b border-ink pb-2">Ringkasan Aktivitas</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Sedang Dipinjam</span>
                            <span class="font-serif text-ink font-semibold">2 buku</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Total Peminjaman</span>
                            <span class="font-serif text-ink font-semibold">18 kali</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Denda Terutang</span>
                            <span class="font-serif text-red-700 font-semibold">Rp 0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-muted">Masa Berlaku</span>
                            <span class="font-serif text-coffee text-sm">Aktif s/d Des 2024</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Details & History --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Basic Info --}}
                <div class="bg-surface border border-ink p-6">
                    <h2 class="text-lg font-serif font-semibold text-ink mb-4 border-b border-ink pb-2">Data Lengkap Anggota</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Alamat Domisili</p>
                            <p class="font-serif text-ink">Jl. Pendidikan No. 45, RT 03/RW 07, Kec. Menteng, Jakarta Pusat</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Fakultas / Jurusan</p>
                            <p class="font-serif text-ink">Fakultas Ilmu Budaya / Sastra Indonesia</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Role</p>
                            <p class="font-serif text-ink">Anggota</p>
                        </div>
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-coffee mb-1">Batas Peminjaman</p>
                            <p class="font-serif text-ink">Maksimal 4 buku / 7 hari</p>
                        </div>
                    </div>
                </div>

                {{-- Active Loans Table --}}
                <div class="bg-surface border border-ink">
                    <div class="px-6 py-4 border-b border-ink flex items-center justify-between">
                        <h3 class="font-serif font-semibold text-ink">Peminjaman Aktif</h3>
                        <a href="#" class="text-xs font-mono uppercase tracking-widest text-coffee hover:text-ink transition-colors">Lihat Riwayat ›</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-ink bg-ink/5">
                                    <th class="text-left px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">ID</th>
                                    <th class="text-left px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Judul Buku</th>
                                    <th class="text-center px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">Pinjam</th>
                                    <th class="text-center px-6 py-3 font-mono text-xs uppercase tracking-wider text-muted">Jatuh Tempo</th>
                                    <th class="text-center px-6 py-3 font-serif text-xs uppercase tracking-wider text-muted">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $loans = [
                                        ['id' => 'TXN-8842', 'book' => 'Filosofi Teras', 'borrowed' => '01 Jun 2024', 'due' => '08 Jun 2024', 'status' => 'dipinjam'],
                                        ['id' => 'TXN-8835', 'book' => 'Laut Bercerita', 'borrowed' => '03 Jun 2024', 'due' => '10 Jun 2024', 'status' => 'dipinjam'],
                                    ];
                                @endphp

                                @foreach($loans as $loan)
                                    <tr class="border-b border-ink hover:bg-ink/5 transition-colors last:border-b-0">
                                        <td class="px-6 py-4 font-mono text-coffee text-xs">{{ $loan['id'] }}</td>
                                        <td class="px-6 py-4 font-serif text-ink">{{ $loan['book'] }}</td>
                                        <td class="px-6 py-4 text-center font-mono text-muted text-xs">{{ $loan['borrowed'] }}</td>
                                        <td class="px-6 py-4 text-center font-mono text-muted text-xs">{{ $loan['due'] }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="px-2 py-0.5 text-xs font-mono border border-ink rounded uppercase tracking-wider text-ink bg-surface">
                                                {{ $loan['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Internal Notes --}}
                <div class="bg-surface border border-ink p-5">
                    <h3 class="font-serif font-semibold text-ink mb-3 flex items-center gap-2">
                        <x-lucide-file-text class="w-4 h-4 text-coffee" />
                        Catatan Admin
                    </h3>
                    <p class="font-serif text-sm text-muted leading-relaxed">
                        Anggota dengan perilaku peminjaman yang baik. Tidak ada riwayat keterlambatan atau kerusakan buku.
                        Disarankan untuk promosi keanggotaan "Peneliti" jika mengajukan proyek skripsi.
                    </p>
                    <p class="text-xs font-mono text-coffee/60 mt-3">— Diperbarui: 05 Jun 2024</p>
                </div>
            </div>
        </div>

        {{-- 3. INFO PANEL --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-info class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Akses Cepat:</span> Gunakan tombol <span class="text-coffee">Edit Profil</span> untuk memperbarui data keanggotaan. Tombol <span class="text-coffee">Kirim Notifikasi</span> untuk mengirim pengingat jatuh tempo atau konfirmasi peminjaman via email.
            </div>
        </div>
    </div>
</x-layouts.app>