<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Adil - Hukum Harus Berdiri di Sisi yang Rentan</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Link to separate CSS file -->
    <!-- Di Laravel, gunakan {{ asset('css/landin.css') }} -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container nav-container">
            <div class="logo">
                <h2>KSP</h2>
                <small>RUANG ADIL</small>
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Beranda</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="#">Artikel</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <a href="#" class="btn btn-red">KONSULTASI CEPAT ↗</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="hero">
        <!-- Overlay untuk background gelap -->
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1><span class="text-red">Hukum</span> Harus <span class="text-red">Berdiri</span> di Sisi yang <span class="text-red">Rentan.</span></h1>
            <div class="hero-buttons">
                <a href="#" class="btn btn-red">AJUKAN KASUS ANDA ↗</a>
                <a href="#" class="btn btn-outline">BACA CERITA PERJUANGAN ↗</a>
            </div>
        </div>
    </header>

    <!-- SERVICES SECTION -->
    <section class="services section-padding">
        <div class="container">
            <span class="badge red-badge">LAYANAN KAMI</span>
            <div class="section-header">
                <h2>Solusi Hukum untuk Berbagai Kebutuhan.</h2>
                <p>Dari masalah personal hingga kebutuhan bisnis, kami hadir memberikan pendampingan hukum yang jelas, profesional, dan relevan.</p>
            </div>
            <div class="grid-4">
                <div class="card service-card">
                    <div class="icon">🔍</div>
                    <h3>Legal Auditor</h3>
                    <p>Audit dan analisis aspek hukum untuk membantu memastikan kepatuhan dan meminimalkan risiko.</p>
                    <a href="#" class="card-link">SELENGKAPNYA ↗</a>
                </div>
                <div class="card service-card">
                    <div class="icon">💼</div>
                    <h3>Kurator</h3>
                    <p>Pendampingan dalam proses kepailitan dan penyelesaian kewajiban sesuai ketentuan hukum.</p>
                    <a href="#" class="card-link">SELENGKAPNYA ↗</a>
                </div>
                <div class="card service-card">
                    <div class="icon">🤝</div>
                    <h3>Mediator</h3>
                    <p>Membantu para pihak menemukan jalan keluar melalui proses mediasi yang terarah.</p>
                    <a href="#" class="card-link">SELENGKAPNYA ↗</a>
                </div>
                <div class="card service-card">
                    <div class="icon">⚖️</div>
                    <h3>Advokat</h3>
                    <p>Pendampingan dan bantuan hukum untuk menghadapi berbagai kebutuhan dan permasalahan hukum.</p>
                    <a href="#" class="card-link">SELENGKAPNYA ↗</a>
                </div>
            </div>
        </div>
    </section>

    <!-- MANIFESTO SECTION -->
    <section class="manifesto section-padding">
        <div class="container grid-2">
            <div class="manifesto-left">
                <span class="text-label text-red">MANIFESTO RUANG ADIL</span>
                <h2>"Hukum Bukan Hanya untuk Mereka yang Mampu Membeli Keadilan."</h2>
                <p>Sistem hukum seringkali berjalan mekanis, menguntungkan mereka yang memiliki modal besar dan kekuasaan birokratis. Di Ruang Adil, kami mendefinisikan ulang praktik hukum. Kami tidak menawarkan janji manis atau pendekatan transaksional korporat. Kami menawarkan solidaritas profesional, keahlian hukum taktis, dan komitmen penuh untuk membela martabat kemanusiaan.</p>
            </div>
            <div class="manifesto-right">
                <div class="manifesto-item">
                    <div class="number">01</div>
                    <div>
                        <h3>Keadilan yang Berpihak</h3>
                        <p>Kami tidak bersikap netral terhadap penindasan. Keberpihakan kami tegas pada pekerja dan komunitas rentan.</p>
                    </div>
                </div>
                <div class="manifesto-item">
                    <div class="number">02</div>
                    <div>
                        <h3>Transparansi Penuh & Tanpa Tipu</h3>
                        <p>Setiap langkah hukum, risiko, dan estimasi biaya (jika ada) dipaparkan secara gamblang sejak hari pertama.</p>
                    </div>
                </div>
                <div class="manifesto-item">
                    <div class="number">03</div>
                    <div>
                        <h3>Berdaya Bersama</h3>
                        <p>Kami tidak hanya menyelesaikan kasus, kami mendidik komunitas agar mampu melakukan pembelaan hukum mandiri kelak.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WORKFLOW SECTION -->
    <section class="workflow section-padding text-center">
        <div class="container">
            <span class="text-label text-red">ALUR KERJA TAKTIS</span>
            <h2>Bagaimana Kami Membantu Anda</h2>
            <p class="subtitle">Empat langkah transparan untuk membawa kasus Anda dari meja pengaduan menuju jalan keluar yang adil.</p>
            
            <div class="grid-4 text-left mt-50">
                <div class="card workflow-card">
                    <div class="number-red">01</div>
                    <h3>Pengaduan & Validasi</h3>
                    <p>Kirim data awal kasus Anda melalui platform terenkripsi atau hotline darurat kami untuk analisis cepat kelayakan pendampingan.</p>
                </div>
                <div class="card workflow-card">
                    <div class="number-red">02</div>
                    <h3>Asesmen Taktis</h3>
                    <p>Temui tim advokat kami (online atau luring) untuk membedah fakta hukum, mengumpulkan bukti, dan menentukan strategi terbaik.</p>
                </div>
                <div class="card workflow-card">
                    <div class="number-red">03</div>
                    <h3>Mediasi / Somasi</h3>
                    <p>Sebelum berkonfrontasi di meja hijau, kami mengutamakan somasi strategis dan mediasi yang tegas demi hasil yang efisien.</p>
                </div>
                <div class="card workflow-card">
                    <div class="number-red">04</div>
                    <h3>Litigasi & Pembelaan</h3>
                    <p>Jika jalur alternatif buntu, kami dampingi Anda sekuat tenaga di Pengadilan Hubungan Industrial (PHI) atau pengadilan umum.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CASE STUDIES SECTION -->
    <section class="cases section-padding">
        <div class="container">
            <span class="text-label text-red">LAPORAN PERJUANGAN HUKUM</span>
            <h2>Studi Kasus & Kemenangan Nyata</h2>
            <p>Hukum adalah perjuangan yang bisa dimenangkan. Berikut adalah beberapa kasus penting yang kami dampingi hingga tuntas.</p>

            <div class="grid-2 mt-50">
                <div class="card case-card">
                    <div class="case-img" style="background-image: url('https://images.unsplash.com/photo-1541888056-51268e367807?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="case-content">
                        <span class="text-label text-red">KEADILAN BURUH</span>
                        <h3>Tuntutan Pesangon Adil: Kolektif Buruh Pabrik Tekstil Tangerang</h3>
                        <p>Setelah perusahaan mengumumkan kebangkrutan palsu dan menolak bayar pesangon, Ruang Adil mendampingi 84 pekerja menuntut hak mereka di PHI. Setelah 6 bulan litigasi, buruh berhasil mendapatkan 100% hak hak normatif senilai Rp 1.8 Miliar.</p>
                        <div class="case-footer">
                            <span class="text-red">HASIL AKHIR:</span>
                            <strong>Rp 1.8M Hak Normatif Terbayar</strong>
                        </div>
                    </div>
                </div>
                <div class="card case-card">
                    <div class="case-img" style="background-image: url('https://images.unsplash.com/photo-1531266752426-aad472b7bbf4?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="case-content">
                        <span class="text-label text-red">SENGKETA HUNIAN</span>
                        <h3>Penangguhan Penggusuran Komunitas Kampung Nelayan Pesisir</h3>
                        <p>Ketika izin pengembangan swasta mengancam merobohkan 120 rumah tanpa ganti rugi layak, tim sengketa hunian kami mengajukan gugatan administratif dan mengorganisir negosiasi terbuka. Pengadilan mengabulkan pembatalan eksekusi.</p>
                        <div class="case-footer">
                            <span class="text-red">HASIL AKHIR:</span>
                            <strong>120 Keluarga Pertahankan Tempat Tinggal</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <section class="team section-padding text-center">
        <div class="container">
            <span class="text-label text-red">PEMBELA ANDA</span>
            <h2>Advokat & Organisator Ruang Adil</h2>
            <p class="subtitle">Para ahli hukum profesional dengan rekam jejak panjang di jalanan, meja perundingan, hingga ruang sidang utama.</p>

            <div class="grid-3 text-left mt-50">
                <div class="card team-card">
                    <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=400&q=80');"></div>
                    <div class="team-content">
                        <h3>Ananda Kusuma, S.H., M.H.</h3>
                        <span class="team-role">PENDIRI & KEPALA LITIGASI BURUH</span>
                        <p>12 tahun mendampingi serikat buruh independen di kawasan industri Jabodetabek. Mantan aktivis pers mahasiswa yang berdedikasi penuh untuk keadilan upah pekerja.</p>
                    </div>
                </div>
                <div class="card team-card">
                    <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80');"></div>
                    <div class="team-content">
                        <h3>Sekar Ningrum, S.H.</h3>
                        <span class="team-role">SPESIALIS HAK SIPIL & AGRARIA</span>
                        <p>Ahli hukum sengketa agraria kota dan tata ruang. Berpengalaman membela komunitas bantaran sungai dan pesisir dari ancaman relokasi paksa tanpa musyawarah mufakat.</p>
                    </div>
                </div>
                <div class="card team-card">
                    <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80');"></div>
                    <div class="team-content">
                        <h3>Fariq Al-Fath, S.H.</h3>
                        <span class="team-role">KOORDINATOR ADVOKASI KOMUNITAS</span>
                        <p>Fokus pada pengorganisasian paralegal komunitas dan bantuan hukum struktural (BHS). Membimbing warga desa adat mengamankan hak kelola wilayah lokal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testimonials section-padding">
        <div class="container">
            <span class="text-label text-red">SUARA DARI MEREKA</span>
            <h2>Solidaritas yang Membawa Hasil</h2>

            <div class="grid-3 mt-50">
                <div class="card testimonial-card">
                    <p>"Sebelum didampingi Ruang Adil, kami merasa sangat kesepian menghadapi intimidasi manajemen pabrik. Tim advokat mendidik kami memahami kontrak kerja, mendampingi proses mediasi dengan gigih, hingga hak pesangon kami dipenuhi utuh."</p>
                    <div class="author">
                        <h4 class="text-red">Suherman</h4>
                        <span>Ketua Serikat Buruh Tekstil Mandiri Tangerang</span>
                    </div>
                </div>
                <div class="card testimonial-card">
                    <p>"Ruang Adil merespon cepat saat 3 aktivis mahasiswa kami ditahan tanpa prosedur jelas pasca demonstrasi damai. Pendampingan hukum mereka profesional, taktis, dan tidak birokratis sama sekali."</p>
                    <div class="author">
                        <h4 class="text-red">Rizky Fauzi</h4>
                        <span>Aliansi Mahasiswa Peduli Demokrasi</span>
                    </div>
                </div>
                <div class="card testimonial-card">
                    <p>"Ketika sengketa lahan rumah warga memanas, Ruang Adil datang bukan cuma membela di pengadilan, tapi membimbing warga mengerti hukum pertanahan. Kini kami lebih berdaya kolektif."</p>
                    <div class="author">
                        <h4 class="text-red">Ibu Nurhayati</h4>
                        <span>Warga Komunitas Pesisir Jakarta</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq section-padding text-center">
        <div class="container faq-container">
            <span class="text-label text-red">PEMBERITAHUAN & FAQ</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>

            <div class="faq-list text-left mt-50">
                <div class="faq-item">
                    <h3>Apakah bantuan hukum di Ruang Adil benar-benar gratis?</h3>
                    <p>Ya, khusus untuk korban pelanggaran HAM berat, kriminalisasi kebebasan berekspresi, serta pekerja rentan di bawah upah minimum, pendampingan kami bersifat 100% Pro Bono (gratis). Untuk kasus sengketa perdata bernilai besar, kami menggunakan sistem subsidi silang yang transparan.</p>
                </div>
                <div class="faq-item">
                    <h3>Bagaimana cara menentukan apakah kasus saya layak didampingi?</h3>
                    <p>Kirimkan ringkasan fakta kasus Anda melalui form kontak. Tim verifikasi kami akan melakukan penilaian awal berdasarkan aspek keadilan sosial, ketersediaan bukti hukum dasar, dan urgensi perlindungan keamanan klien.</p>
                </div>
                <div class="faq-item">
                    <h3>Apakah wilayah hukum layanan Ruang Adil hanya di Jakarta?</h3>
                    <p>Layanan litigasi tatap muka langsung kami diprioritaskan di Jabodetabek dan Jawa Barat. Namun, untuk konsultasi taktis strategis dan penyusunan somasi/dokumen hukum, kami siap membantu komunitas dari seluruh wilayah Indonesia secara daring.</p>
                </div>
                <div class="faq-item">
                    <h3>Apakah kerahasiaan identitas dan data kasus saya terjamin?</h3>
                    <p>Tentu. Berdasarkan UU Advokat, kami memegang teguh kewajiban menjaga kerahasiaan klien secara absolut. Semua berkas dan korespondensi disimpan dalam infrastruktur digital yang aman dan terenkripsi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2>Hadapi Masalah Hukum Bersama Sekutu Terpercaya.</h2>
                    <p>Jangan tunda perlindungan hak Anda. Konsultasikan kasus buruh, sengketa lahan, atau kriminalisasi hak sipil Anda hari ini bersama tim advokat Ruang Adil.</p>
                </div>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-red-dark">AJUKAN KASUS GRATIS ✉</a>
                    <a href="#" class="btn btn-outline-white">HUBUNGI TELEGRAM</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3><span class="text-red">■</span> RUANG ADIL</h3>
                    <p>Kolektif Hukum Progresif berdiri resmi yang berdedikasi membela hak-hak kerakyatan, persatuan buruh, kebebasan berekspresi, dan hak atas ruang hidup yang adil.</p>
                    <p class="copyright">© 2026 Ruang Adil. Semua hak dilindungi.</p>
                </div>
                <div class="footer-links">
                    <h4>PRACTICE</h4>
                    <ul>
                        <li><a href="#">Bantuan Buruh</a></li>
                        <li><a href="#">Hak Konstitusi</a></li>
                        <li><a href="#">Pendampingan Komunitas</a></li>
                        <li><a href="#">Sengketa Hunian</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>KOLEKTIF</h4>
                    <ul>
                        <li><a href="#">Manifesto Kami</a></li>
                        <li><a href="#">Laporan Kasus</a></li>
                        <li><a href="#">Edukasi Paralegal</a></li>
                        <li><a href="#">Tim Advokat</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>KONTAK DARURAT</h4>
                    <p>0811-929-234 (Telepon)</p>
                    <p>kontak@ruangadil.law</p>
                    <p>Gedung Juang Lt. 3, Menteng, Jakarta</p>
                    <p>Hari Kerja: 09:00 - 18:00</p>
                </div>
            </div>
            <div class="footer-disclaimer">
                <p>PEMBERITAHUAN HUKUM: Informasi yang terkandung di dalam situs web ini disediakan hanya untuk tujuan informasi umum dan tidak boleh ditafsirkan sebagai nasihat hukum formal untuk masalah subjek apa pun. Pengiriman pesan konsultasi atau informasi kasus kepada Ruang Adil melalui situs web ini tidak secara otomatis membentuk hubungan formal Klien-Advokat sampai adanya penandatanganan Surat Kuasa resmi oleh kedua belah pihak sesuai dengan ketentuan Undang-Undang Nomor 18 Tahun 2003 tentang Advokat.</p>
            </div>
        </div>
    </footer>

</body>
</html>