<x-layouts.app>
    <div class="max-w-4xl mx-auto space-y-8 px-2 py-6">

        {{-- Header Page --}}
        <div class="text-center border-b border-ink pb-6">
            <x-lucide-book-open class="w-12 h-12 text-ink mx-auto mb-4 stroke-[1.5]" />
            <h1 class="text-3xl font-serif font-bold text-ink tracking-tight">Tentang Scriptoria</h1>
            <p class="font-serif text-muted mt-2 max-w-2xl mx-auto">
                Sistem arsip digital perpustakaan yang dirancang untuk melestarikan, mengelola, dan memudahkan akses terhadap koleksi pengetahuan.
            </p>
        </div>

        {{-- Seksi I: Visi & Misi --}}
        <section class="bg-surface border border-ink p-6 md:p-8">
            <h2 class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 mb-4 flex items-center gap-2">
                <x-lucide-target class="w-4 h-4 text-coffee" /> I. Visi & Misi
            </h2>

            <div class="space-y-4">
                <div>
                    <h3 class="font-mono text-xs uppercase tracking-wider text-coffee mb-2">Visi</h3>
                    <p class="font-serif text-ink leading-relaxed">
                        Menjadi pusat preservasi dan diseminasi pengetahuan yang terpercaya, dengan mengintegrasikan nilai-nilai kearifan lokal dan standar arsip internasional.
                    </p>
                </div>

                <div>
                    <h3 class="font-mono text-xs uppercase tracking-wider text-coffee mb-2">Misi</h3>
                    <ul class="space-y-2 font-serif text-ink">
                        <li class="flex items-start gap-2">
                            <span class="text-coffee mt-1">•</span>
                            <span>Melestarikan koleksi buku fisik dan digital melalui dokumentasi dan konservasi yang sistematis.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-coffee mt-1">•</span>
                            <span>Memudahkan akses pengetahuan bagi anggota melalui sistem katalog yang terstruktur dan intuitif.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-coffee mt-1">•</span>
                            <span>Mendorong literasi dan riset melalui penyediaan referensi yang relevan dan terverifikasi.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-coffee mt-1">•</span>
                            <span>Menjaga integritas data dan privasi pengguna sesuai prinsip etika perpustakaan.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- Seksi II: Sejarah Singkat --}}
        <section class="bg-surface border border-ink p-6 md:p-8">
            <h2 class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 mb-4 flex items-center gap-2">
                <x-lucide-history class="w-4 h-4 text-coffee" /> II. Sejarah Singkat
            </h2>

            <div class="space-y-4 font-serif text-ink leading-relaxed">
                <p>
                    <span class="font-mono text-coffee">2020</span> — Scriptoria bermula dari inisiatif kecil sekelompok akademisi dan pegiat literasi untuk mendigitalisasi koleksi buku langka yang tersebar di berbagai perpustakaan daerah.
                </p>
                <p>
                    <span class="font-mono text-coffee">2022</span> — Platform arsip digital pertama diluncurkan dengan fokus pada katalogisasi berbasis metadata Dublin Core dan standar ISBN/ISSN.
                </p>
                <p>
                    <span class="font-mono text-coffee">2024</span> — Scriptoria berevolusi menjadi sistem manajemen perpustakaan terintegrasi, mendukung alur peminjaman, verifikasi anggota, dan pelaporan statistik koleksi.
                </p>
                <p class="pt-2 border-t border-ink mt-4">
                    Kini, Scriptoria melayani <span class="font-mono text-ink">842 anggota aktif</span> dengan koleksi lebih dari <span class="font-mono text-ink">12.458 entri</span>, terus berkembang berkat kontribusi kurator, relawan, dan komunitas pembaca.
                </p>
            </div>
        </section>

        {{-- Seksi III: Tim & Kontributor --}}
        <section class="bg-surface border border-ink p-6 md:p-8">
            <h2 class="text-lg font-serif font-semibold text-ink border-b border-ink pb-2 mb-4 flex items-center gap-2">
                <x-lucide-users class="w-4 h-4 text-coffee" /> III. Tim & Kontributor
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                $team = [
                ['name' => 'Eserel', 'role' => 'Admin Kurator', 'desc' => 'Koordinator sistem dan validasi metadata'],
                ['name' => 'Alya Rahmawati', 'role' => 'Petugas Katalog', 'desc' => 'Input data dan verifikasi ISBN'],
                ['name' => 'Budi Santoso', 'role' => 'Pengembang', 'desc' => 'Maintenance sistem dan integrasi API'],
                ['name' => 'Citra Dewi', 'role' => 'Relawan Digitalisasi', 'desc' => 'Scan dan OCR dokumen arsip'],
                ];
                @endphp

                @foreach($team as $member)
                <div class="border border-ink p-4 flex items-start gap-3">
                    <div class="w-10 h-10 bg-background border border-ink rounded-full flex items-center justify-center flex-shrink-0">
                        <x-lucide-circle-user-round class="w-5 h-5 text-muted" />
                    </div>
                    <div>
                        <p class="font-serif font-semibold text-ink">{{ $member['name'] }}</p>
                        <p class="font-mono text-xs text-coffee">{{ $member['role'] }}</p>
                        <p class="font-serif text-sm text-muted mt-1">{{ $member['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        {{-- Info Panel --}}
        <div class="border border-ink bg-surface p-4 flex items-start gap-3">
            <x-lucide-info class="w-5 h-5 text-coffee flex-shrink-0 mt-0.5" />
            <div class="font-serif text-sm text-muted">
                <span class="text-ink font-semibold">Ingin berkontribusi?</span> Scriptoria terbuka untuk kolaborasi kurasi, donasi buku langka, atau pengembangan teknis. Hubungi kami melalui halaman <a href="#" class="text-coffee hover:text-ink underline">Kontak</a>.
            </div>
        </div>
    </div>
</x-layouts.app>