<x-layouts.app
    title="Visi & Misi HIMASIF ー Himpunan Mahasiswa Sistem Informasi UIKA"
    description="Arah gerak HIMASIF dalam membangun mahasiswa Sistem Informasi UIKA yang sistematis, kolaboratif, dan berdampak."
>
    @push('head')
        @vite('resources/js/visi-misi.js')
    @endpush

    @php
        $misiList = [
            [
                'no' => '01',
                'judul' => 'Sistematis',
                'desc' => 'Menyelenggarakan tata kelola organisasi yang tertib, transparan, dan terdokumentasi dengan baik.',
            ],
            [
                'no' => '02',
                'judul' => 'Kolaboratif',
                'desc' => 'Mempererat kekeluargaan antaranggota serta membangun kerja sama dengan himpunan, kampus, dan industri.',
            ],
            [
                'no' => '03',
                'judul' => 'Inovatif',
                'desc' => 'Mewadahi ide, karya, dan prestasi mahasiswa Sistem Informasi di bidang teknologi.',
            ],
            [
                'no' => '04',
                'judul' => 'Aktif',
                'desc' => 'Memfasilitasi pengembangan hard skill dan soft skill lewat kegiatan belajar, pelatihan, dan kompetisi.',
            ],
            [
                'no' => '05',
                'judul' => 'Berdampak',
                'desc' => 'Menghadirkan program kerja yang relevan dan memberi manfaat nyata bagi mahasiswa maupun masyarakat.',
            ],
        ];

        $targetList = [
            [
                'tag' => '01 · DAMPAK',
                'judul' => 'Program Bermanfaat',
                'desc' => 'Mayoritas mahasiswa menilai program kerja HIMASIF bermanfaat (survei akhir periode).',
                'ring' => 100,
                'icon' => null,
            ],
            [
                'tag' => '02 · KEAKTIFAN',
                'judul' => 'Partisipasi Anggota',
                'desc' => 'Tingkat kehadiran mahasiswa dalam kegiatan HIMASIF sepanjang periode.',
                'ring' => 85,
                'icon' => null,
            ],
            [
                'tag' => '03 · PRESTASI',
                'judul' => 'Berprestasi di Tingkat Nasional',
                'desc' => 'Mengantarkan mahasiswa Sistem Informasi UIKA meraih prestasi di kompetisi IT.',
                'ring' => 100,
                'icon' => 'fa-solid fa-trophy',
            ],
            [
                'tag' => '04 · RELASI',
                'judul' => 'Jejaring yang Luas',
                'desc' => 'Menjalin kerja sama dengan himpunan kampus lain dan mitra industri.',
                'ring' => 100,
                'icon' => 'fa-solid fa-network-wired',
            ],
        ];
    @endphp

    <div class="tk-page">
        {{-- ===== HERO DENGAN BACKGROUND FOTO ===== --}}
        <section class="tk-hero tk-hero--image">
            <div class="tk-hero__bg">
                <img src="{{ img_asset('hero_slide/bg-hero-1.webp') }}" alt="HIMASIF UIKA">
            </div>
            <span class="tk-spark" style="top:24%; left:10%;">&#10022;</span>
            <span class="tk-spark" style="top:18%; right:12%;">&#10022;</span>
            <div class="tk-glow" style="top:35%; left:20%;"></div>

            <div class="tk-container tk-center">
                <p class="tk-hero__sub" data-aos="fade-down" data-aos-duration="800">HIMASIF 2026</p>
                <h1 class="tk-title" data-tk-words>VISI <span class="tk-text-gold">&amp; MISI</span></h1>
                <p class="tk-desc" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800">
                    Arah gerak HIMASIF dalam membangun mahasiswa Sistem Informasi UIKA yang sistematis, kolaboratif, dan berdampak.
                </p>
                <a href="#arah-gerak" class="tk-scroll-hint" aria-label="Gulir ke bawah" data-aos="fade-up" data-aos-delay="500">
                    <span></span>
                    Gulir
                </a>
            </div>
        </section>

        {{-- ===== MARQUEE NILAI ===== --}}
        <div class="tk-marquee" aria-label="Nilai Kabinet HIMASIF">
            <div class="tk-marquee__track">
                @foreach (['SISTEMATIS', 'EFISIENSI', 'KOLABORATIF', 'INOVATIF', 'REFORMASI', 'AKTIF', 'BERDAMPAK'] as $nilai)
                    <span class="tk-marquee__item">{{ $nilai }} <span class="tk-text-gold">&#10022;</span></span>
                @endforeach
            </div>
        </div>

        {{-- ===== ARAH GERAK & VISI ===== --}}
        <section class="tk-section" id="arah-gerak">
            <div class="tk-glow tk-glow--gold" style="top:28%; right:8%;"></div>
            <div class="tk-container">
                <div class="tk-intro" style="margin-bottom:56px;">
                    <div data-aos="fade-right" data-aos-duration="800">
                        <span class="tk-eyebrow">Arah Gerak</span>
                        <h2 class="tk-title">Visi dan Misi untuk Sistem Informasi yang Lebih Maju</h2>
                        <p class="tk-desc">
                            Halaman ini memuat visi dan misi HIMASIF sebagai pedoman dalam menjalankan organisasi,
                            menyusun program kerja, dan mengukur dampaknya bagi mahasiswa Sistem Informasi UIKA.
                        </p>
                    </div>
                    <div class="tk-intro__media" data-aos="fade-left" data-aos-duration="800">
                        <img src="{{ img_asset('hero_slide/bg-hero-2.webp') }}" alt="Pengurus HIMASIF" loading="lazy">
                    </div>
                </div>

                <div class="tk-card tk-shine tk-visi" data-aos="zoom-in" data-aos-duration="800">
                    <span class="tk-visi__corner tk-visi__corner--tl" aria-hidden="true"></span>
                    <span class="tk-visi__corner tk-visi__corner--br" aria-hidden="true"></span>
                    <span class="tk-visi__badge">VISI</span>
                    <p
                        class="tk-visi__text"
                        data-tk-reveal
                        data-tk-keys="solid,adaptif,berdampak,kolaborasi,inovasi"
                    >
                        “Menjadikan HIMASIF sebagai organisasi mahasiswa Sistem Informasi yang solid, adaptif, dan berdampak, yang mampu mewadahi serta mengembangkan potensi seluruh mahasiswa Sistem Informasi Universitas Ibn Khaldun Bogor melalui kolaborasi dan inovasi yang berkelanjutan.”
                    </p>
                </div>
            </div>
        </section>

        {{-- ===== 5 MISI (TIMELINE ZIG-ZAG) ===== --}}
        <section class="tk-section" id="misi">
            <div class="tk-glow" style="top:45%; left:10%;"></div>
            <div class="tk-container">
                <div class="tk-section-head tk-center" data-aos="fade-up" data-aos-duration="800">
                    <span class="tk-eyebrow tk-eyebrow--center">Misi</span>
                    <h2 class="tk-title">Lima Langkah Membangun <span class="tk-text-gold">Generasi Sistem Informasi</span></h2>
                </div>

                <div class="tk-timeline">
                    <div class="tk-timeline__line" aria-hidden="true">
                        <div class="tk-timeline__fill"></div>
                    </div>

                    @foreach ($misiList as $misi)
                        <article class="tk-card tk-misi" data-aos="fade-up">
                            <span class="tk-misi__dot" aria-hidden="true"></span>
                            <div class="tk-misi__head">
                                <h3>{{ $misi['judul'] }}</h3>
                                <span class="tk-misi__num">{{ $misi['no'] }}</span>
                            </div>
                            <p>{{ $misi['desc'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== GARIS PEMISAH GELOMBANG ===== --}}
        <svg class="tk-divider" viewBox="0 0 640 40" aria-hidden="true">
            <path d="M 10 20 Q 165 4, 320 20 T 630 20" />
        </svg>

        {{-- ===== TARGET KEBERHASILAN ===== --}}
        <section class="tk-section tk-section--tight" id="target">
            <div class="tk-container">
                <div class="tk-section-head tk-center" data-aos="fade-up" data-aos-duration="800">
                    <span class="tk-eyebrow tk-eyebrow--center">Target</span>
                    <h2 class="tk-title">Mengukur <span class="tk-text-gold">Keberhasilan Kami</span></h2>
                    <p class="tk-desc">Visi yang terarah, komitmen yang nyata, dan dampak yang bisa diukur.</p>
                </div>

                <div class="tk-goals">
                    @foreach ($targetList as $target)
                        <article class="tk-card tk-goal" data-tk-ring="{{ $target['ring'] }}" data-aos="fade-up">
                            <div class="tk-ring">
                                <svg viewBox="0 0 96 96" aria-hidden="true">
                                    <circle class="tk-ring__bg" cx="48" cy="48" r="40" />
                                    <circle
                                        class="tk-ring__val"
                                        cx="48"
                                        cy="48"
                                        r="40"
                                        @if ($target['icon']) style="stroke-dashoffset: 0;" @endif
                                    />
                                </svg>
                                <div class="tk-ring__label">
                                    @if ($target['icon'])
                                        <i class="{{ $target['icon'] }} tk-ring__icon" aria-hidden="true"></i>
                                    @else
                                        0%
                                    @endif
                                </div>
                            </div>
            <div class="tk-container">
                <div class="tk-section-head tk-center" data-aos="fade-up" data-aos-duration="800">
                    <span class="tk-eyebrow tk-eyebrow--center">Target</span>
                    <h2 class="tk-title">Mengukur <span class="tk-text-gold">Keberhasilan Kami</span></h2>
                    <p class="tk-desc">Visi yang terarah, komitmen yang nyata, dan dampak yang bisa diukur.</p>
                </div>

                <div class="tk-goals">
                    @foreach ($targetList as $target)
                        <article class="tk-card tk-goal" data-tk-ring="{{ $target['ring'] }}" data-aos="fade-up">
                            <div class="tk-ring">
                                <svg viewBox="0 0 96 96" aria-hidden="true">
                                    <circle class="tk-ring__bg" cx="48" cy="48" r="40" />
                                    <circle
                                        class="tk-ring__val"
                                        cx="48"
                                        cy="48"
                                        r="40"
                                        style="{{ $target['icon'] ? 'stroke-dashoffset: 0;' : '' }}"/>
                                </svg>
                                <div class="tk-ring__label">
                                    @if ($target['icon'])
                                        <i class="{{ $target['icon'] }} tk-ring__icon" aria-hidden="true"></i>
                                    @else
                                        0%
                                    @endif
                                </div>
                            </div>

                            <div>
                                <span class="tk-goal__num">{{ $target['tag'] }}</span>
                                <h3>{{ $target['judul'] }}</h3>
                                <p>{{ $target['desc'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="tk-btn-row tk-center" style="margin-top:36px;">
                    <a href="{{ route('pages.logo') }}" class="tk-btn">Filosofi Logo <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="{{ route('pages.kontak') }}" class="tk-btn tk-btn--ghost">Hubungi Kami</a>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>

