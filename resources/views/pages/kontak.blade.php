<x-layouts.app
    title="Kontak Kami ー Himpunan Mahasiswa Sistem Informasi UIKA"
    description="Kami siap menjawab pertanyaan, menerima masukan, dan membuka peluang kolaborasi dengan siapa saja."
>
    @push('head')
        @vite('resources/js/kontak.js')
    @endpush

    <div class="tk-page">
        {{-- ===== HERO KONTAK ===== --}}
        <section class="tk-hero tk-hero--contact">
            <div class="tk-bubbles" aria-hidden="true">
                <span class="tk-bubble"><i class="fa-brands fa-whatsapp"></i></span>
                <span class="tk-bubble"><i class="fa-regular fa-envelope"></i></span>
                <span class="tk-bubble"><i class="fa-brands fa-instagram"></i></span>
                <span class="tk-bubble"><i class="fa-regular fa-paper-plane"></i></span>
            </div>
            <span class="tk-spark" style="top:22%; left:14%;">&#10022;</span>
            <span class="tk-spark" style="top:18%; right:16%;">&#10022;</span>
            <div class="tk-glow" style="top:35%; left:50%;"></div>

            <div class="tk-container tk-center">
                <span class="tk-eyebrow tk-eyebrow--center" data-aos="fade-down" data-aos-duration="800">Kontak Kami</span>
                <h1 class="tk-title" data-tk-words>Mari Terhubung dengan <span class="tk-text-gold">HIMASIF</span></h1>
                <p class="tk-desc" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800">
                    Kami siap menjawab pertanyaan, menerima masukan, dan membuka peluang kolaborasi dengan siapa saja.
                </p>
                <div class="tk-btn-row" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">
                    <a href="#kirim-pesan" class="tk-btn">Kirim Pesan <i class="fa-solid fa-paper-plane"></i></a>
                    <a href="#lokasi-kami" class="tk-btn tk-btn--ghost">Lihat Lokasi</a>
                </div>
            </div>
        </section>

        {{-- ===== FORM PESAN & KANAL RESMI ===== --}}
        <section class="tk-section" id="kirim-pesan">
            <div class="tk-glow tk-glow--gold" style="top:20%; right:6%;"></div>
            <div class="tk-container">
                <div class="tk-contact-grid">
                    {{-- Kolom Kiri: Form Kirim Pesan --}}
                    <form id="tk-contact-form" class="tk-card tk-form" novalidate data-aos="fade-right" data-aos-duration="800">
                        <h2 class="tk-form__title">Kirim Pesan &amp; Terhubung</h2>
                        <p class="tk-form__sub">Isi form di bawah. Kolom bertanda * wajib diisi.</p>

                        <input type="text" name="website" class="tk-honey" tabindex="-1" autocomplete="off" aria-hidden="true">

                        <div class="tk-field">
                            <input id="tk-nama" type="text" name="nama" placeholder=" " required>
                            <label for="tk-nama">Nama Lengkap *</label>
                            <i class="fa-regular fa-user tk-field__icon" aria-hidden="true"></i>
                            <span class="tk-field__error" role="alert"></span>
                        </div>

                        <div class="tk-field">
                            <input id="tk-email" type="email" name="email" placeholder=" " required>
                            <label for="tk-email">Email *</label>
                            <i class="fa-regular fa-envelope tk-field__icon" aria-hidden="true"></i>
                            <span class="tk-field__error" role="alert"></span>
                        </div>

                        <div class="tk-field">
                            <input id="tk-telepon" type="tel" name="telepon" placeholder=" ">
                            <label for="tk-telepon">Nomor telepon (opsional)</label>
                            <i class="fa-solid fa-phone tk-field__icon" aria-hidden="true"></i>
                            <span class="tk-field__error" role="alert"></span>
                        </div>

                        <div class="tk-field">
                            <textarea id="tk-pesan" name="pesan" maxlength="500" placeholder=" " required></textarea>
                            <label for="tk-pesan">Pesan *</label>
                            <i class="fa-regular fa-comment-dots tk-field__icon" aria-hidden="true"></i>
                            <span class="tk-field__count">0/500</span>
                            <span class="tk-field__error" role="alert"></span>
                        </div>

                        <button type="submit" class="tk-btn tk-send">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>

                    {{-- Kolom Kanan: Kanal Resmi --}}
                    <div data-aos="fade-left" data-aos-duration="800">
                        <span class="tk-eyebrow">Kanal Resmi</span>
                        <h2 class="tk-title">Temukan Kami di Berbagai Platform</h2>

                        <div class="tk-channels">
                            <a href="https://wa.me" target="_blank" rel="noopener" class="tk-card tk-channel">
                                <span class="tk-channel__icon"><i class="fa-brands fa-whatsapp"></i></span>
                                <div>
                                    <h3>+62 8xx-xxxx-xxxx</h3>
                                    <p>Respon cepat untuk pertanyaan singkat atau koordinasi langsung.</p>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square tk-channel__arrow" aria-hidden="true"></i>
                            </a>

                            <a href="{{ config('site.social.email') }}" target="_blank" rel="noopener" class="tk-card tk-channel">
                                <span class="tk-channel__icon"><i class="fa-regular fa-envelope"></i></span>
                                <div>
                                    <h3>himasifuikabogor@gmail.com</h3>
                                    <p>Untuk surat resmi, undangan, dan pengajuan kerja sama.</p>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square tk-channel__arrow" aria-hidden="true"></i>
                            </a>

                            <a href="{{ config('site.social.instagram') }}" target="_blank" rel="noopener" class="tk-card tk-channel">
                                <span class="tk-channel__icon"><i class="fa-brands fa-instagram"></i></span>
                                <div>
                                    <h3>@himasifuikabogor</h3>
                                    <p>Info kegiatan, berita, dan dokumentasi terbaru.</p>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square tk-channel__arrow" aria-hidden="true"></i>
                            </a>

                            <a href="{{ config('site.social.tiktok') }}" target="_blank" rel="noopener" class="tk-card tk-channel">
                                <span class="tk-channel__icon"><i class="fa-brands fa-tiktok"></i></span>
                                <div>
                                    <h3>@himasifuika</h3>
                                    <p>Konten singkat kegiatan dan keseharian HIMASIF.</p>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square tk-channel__arrow" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== LOKASI & PETA ===== --}}
        <section class="tk-section tk-section--tight" id="lokasi-kami">
            <div class="tk-container">
                <div class="tk-location">
                    <div class="tk-card tk-location__info" data-aos="fade-right" data-aos-duration="800">
                        <span class="tk-eyebrow">Lokasi</span>
                        <h2 class="tk-title">Kunjungi Kami</h2>
                        <address>
                            <strong>Universitas Ibn Khaldun Bogor</strong><br>
                            Jl. Sholeh Iskandar, Kota Bogor, Jawa Barat
                        </address>
                        <a
                            href="https://google.com"
                            target="_blank"
                            rel="noopener"
                            class="tk-btn"
                        >
                            Buka di Google Maps <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>

                    <div class="tk-map" data-aos="fade-left" data-aos-duration="800">
                        <span class="tk-map__pin" aria-hidden="true"></span>
                        <iframe
                            title="Peta Lokasi Universitas Ibn Khaldun Bogor"
                            data-src="https://google.com"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== RUANG IDE & MOCKUP CHAT ===== --}}
        <section class="tk-section">
            <div class="tk-glow" style="top:50%; left:20%;"></div>
            <div class="tk-container">
                <div class="tk-card tk-idea" data-aos="zoom-in" data-aos-duration="800">
                    <div>
                        <span class="tk-eyebrow">Ruang Ide</span>
                        <h2 class="tk-title">Ide Kreatifmu Berharga untuk HIMASIF!</h2>
                        <p class="tk-desc" style="margin-bottom:24px;">
                            Punya usulan kegiatan, fitur website, atau masukan untuk himpunan? Sampaikan saja,
                            kami baca dan tindak lanjuti untuk program yang bermanfaat bagi banyak mahasiswa.
                        </p>
                        <a href="#kirim-pesan" class="tk-btn">
                            Kirim Ide <i class="fa-solid fa-lightbulb"></i>
                        </a>
                    </div>

                    {{-- Mockup chat di HP --}}
                    <div class="tk-phone" aria-hidden="true">
                        <div class="tk-phone__notch"></div>
                        <div class="tk-phone__screen">
                            <div class="tk-chat__head">
                                <span class="tk-chat__avatar"></span>
                                <span>HIMASIF · Ruang Ide</span>
                            </div>

                            <div class="tk-chat__body">
                                <div class="tk-chat__msg tk-chat__msg--in">
                                    Halo! Ada ide untuk HIMASIF?
                                </div>
                                <div class="tk-chat__msg tk-chat__msg--out">
                                    Bikin workshop UI/UX dong, kak!
                                </div>
                                <div class="tk-chat__msg tk-chat__msg--in">
                                    Ide bagus, kami catat ya! 🚀
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>