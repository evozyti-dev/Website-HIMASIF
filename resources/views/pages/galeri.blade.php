<x-layouts.app title="Galeri HIMASIF ー Himpunan Mahasiswa Sistem Informasi UIKA"
    description="Lihat kembali momen berharga, pencapaian, dan kebersamaan dari seluruh program kerja Himpunan Mahasiswa Sistem Informasi UIKA.">
    @push('head')
        @vite('resources/js/galeri.js')
    @endpush

    @php
        $kategoriList = [
            'semua' => 'Semua',
            'kompetisi' => 'Kompetisi',
            'relasi' => 'Relasi & Industri',
            'kaderisasi' => 'Kaderisasi',
            'kebersamaan' => 'Kebersamaan',
        ];

        // 1. FOTO TUMPUKAN HERO (isi path file dari public/images/, contoh: 'galeri/hero-1.webp')
        $heroPhotos = [
            'back' => 'bg-avatar-desktop.webp',
            'mid' => 'hero_logo/logo-uika.webp',
            'front' => 'hero_logo/HIMASIF.webp',
        ];

        // 2. FOTO GRID BENTO (isi 'foto' => 'galeri/nama-foto.webp' saat foto sudah siap)
        $galeriItems = [
            ['judul' => 'Acara 1', 'kategori' => 'kompetisi', 'span' => 'tk-gallery__item--wide', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 2', 'kategori' => 'relasi', 'span' => 'tk-gallery__item--tall', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 3', 'kategori' => 'kaderisasi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 4', 'kategori' => 'kebersamaan', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 5', 'kategori' => 'kompetisi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 6', 'kategori' => 'relasi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 7', 'kategori' => 'kaderisasi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 8', 'kategori' => 'kebersamaan', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 9', 'kategori' => 'kompetisi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 10', 'kategori' => 'relasi', 'span' => 'tk-gallery__item--tall', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 11', 'kategori' => 'kaderisasi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 12', 'kategori' => 'kebersamaan', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 13', 'kategori' => 'kompetisi', 'span' => 'tk-gallery__item--wide', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
            ['judul' => 'Acara 14', 'kategori' => 'relasi', 'span' => '', 'foto' => null, 'ket' => 'Foto kegiatan akan ditambahkan'],
        ];
    @endphp

    <div class="tk-page">
        {{-- ===== HERO 2 KOLOM ===== --}}
        <section class="tk-hero">
            <span class="tk-spark" style="top:20%; left:6%;">&#10022;</span>
            <span class="tk-spark" style="top:16%; right:8%;">&#10022;</span>
            <span class="tk-spark" style="top:54%; left:44%;">&#10022;</span>
            <div class="tk-glow" style="top:32%; left:28%;"></div>
            <div class="tk-glow tk-glow--gold" style="top:35%; right:16%;"></div>

            <div class="tk-container">
                <div class="tk-gl-hero__grid">
                    {{-- Kiri: Judul & CTA --}}
                    <div class="tk-gl-hero__copy">
                        <span class="tk-eyebrow" data-aos="fade-down" data-aos-duration="800">Galeri HIMASIF</span>
                        <h1 class="tk-title" data-tk-words>Dokumentasi Kegiatan <span
                                class="tk-text-gold">HIMASIF</span></h1>
                        <p class="tk-desc" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800">
                            Lihat kembali momen berharga, pencapaian, dan kebersamaan dari seluruh program kerja
                            Himpunan Mahasiswa Sistem Informasi UIKA.
                        </p>
                        <div class="tk-btn-row" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">
                            <a href="#momen" class="tk-btn">Lihat Galeri <i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>

                    {{-- Kanan: Tumpukan Bingkai Foto Miring + Badge 14 momen --}}
                    <div data-aos="zoom-in" data-aos-delay="250" data-aos-duration="900">
                        <div class="tk-gl-stack">
                            <div class="tk-gl-stack__card tk-gl-stack__card--back">
                                @if (!empty($heroPhotos['back']))
                                    <img class="tk-gl-stack__img" src="{{ img_asset($heroPhotos['back']) }}"
                                        alt="Sorotan Galeri 3">
                                @endif
                            </div>
                            <div class="tk-gl-stack__card tk-gl-stack__card--mid">
                                @if (!empty($heroPhotos['mid']))
                                    <img class="tk-gl-stack__img" src="{{ img_asset($heroPhotos['mid']) }}"
                                        alt="Sorotan Galeri 2">
                                @endif
                            </div>
                            <div class="tk-gl-stack__card tk-gl-stack__card--front">
                                @if (!empty($heroPhotos['front']))
                                    <img class="tk-gl-stack__img" src="{{ img_asset($heroPhotos['front']) }}"
                                        alt="Sorotan Galeri Utama">
                                @endif
                            </div>
                            <span class="tk-gl-stack__badge">{{ count($galeriItems) }} momen</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== MOMEN KAMI ===== --}}
        <section class="tk-section" id="momen">
            <div class="tk-glow" style="top:140px; right:6%;"></div>
            <div class="tk-container">
                <div class="tk-section-head tk-center" data-aos="fade-up" data-aos-duration="800">
                    <span class="tk-eyebrow tk-eyebrow--center">Momen Kami</span>
                    <h2 class="tk-title">Setiap Kegiatan <span class="tk-text-gold">Punya Cerita</span></h2>
                </div>

                {{-- Filter Tab --}}
                <div class="tk-center">
                    <div class="tk-filter tk-gl-filter" role="tablist" aria-label="Kategori galeri">
                        <span class="tk-filter__pill" aria-hidden="true"></span>
                        @foreach ($kategoriList as $slug => $label)
                            <button type="button" class="tk-filter__btn {{ $slug === 'semua' ? 'is-active' : '' }}"
                                data-filter="{{ $slug }}" aria-pressed="{{ $slug === 'semua' ? 'true' : 'false' }}">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Grid Bento (10 kartu awal sesuai desain ori) --}}
                <div class="tk-gallery" data-page="10">
                    @foreach ($galeriItems as $item)
                        @php
                            $hasPhoto = !empty($item['foto']);
                            $photoUrl = $hasPhoto ? img_asset($item['foto']) : img_asset('hero_logo/HIMASIF.webp');
                        @endphp
                        <article
                            class="tk-gallery__item {{ $hasPhoto ? '' : 'tk-gallery__item--placeholder' }} {{ $item['span'] }}"
                            data-category="{{ $item['kategori'] }}" data-title="{{ $item['judul'] }}"
                            data-full="{{ $photoUrl }}" tabindex="0" role="button">
                            <img class="tk-gallery__photo" src="{{ $photoUrl }}" alt="{{ $item['judul'] }}" loading="lazy">
                            <span class="tk-gallery__chip">{{ $kategoriList[$item['kategori']] }}</span>

                            <div class="tk-gallery__center">
                                <span class="tk-gallery__icon" aria-hidden="true">
                                    <i class="fa-regular fa-image"></i>
                                </span>
                                <h3>{{ $item['judul'] }}</h3>
                                <p>{{ $item['ket'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <p class="tk-gallery__empty">Belum ada foto di kategori ini.</p>

                <div class="tk-btn-row tk-center" style="margin-top:36px;">
                    <button type="button" class="tk-btn tk-btn--ghost" data-tk-more>
                        Lihat Lainnya <i class="fa-solid fa-chevron-down"></i>
                    </button>
                </div>
            </div>
        </section>

        {{-- ===== LIGHTBOX ===== --}}
        <div class="tk-lightbox" aria-hidden="true" role="dialog" aria-label="Pratinjau foto">
            <button type="button" class="tk-slider-btn tk-lightbox__close" aria-label="Tutup"><i
                    class="fa-solid fa-xmark"></i></button>
            <button type="button" class="tk-slider-btn tk-lightbox__prev" aria-label="Sebelumnya"><i
                    class="fa-solid fa-chevron-left"></i></button>
            <div class="tk-lightbox__box">
                <img class="tk-lightbox__img" src="" alt="">
                <div class="tk-lightbox__cap">
                    <h3></h3>
                    <span></span>
                </div>
                <div class="tk-lightbox__count"></div>
            </div>
            <button type="button" class="tk-slider-btn tk-lightbox__next" aria-label="Berikutnya"><i
                    class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</x-layouts.app>