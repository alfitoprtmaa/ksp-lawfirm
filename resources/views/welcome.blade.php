
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ketut Surya & Partners | Law Firm</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&display=swap">

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
<header class="navbar">
    <a class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Ketut Surya & Partners">
    </a>
    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu">☰</button>
    <nav class="nav-links" id="navLinks">
        <a href="#beranda">Beranda</a>
        <a href="#tentang">About Us</a>
        <a href="#layanan">Layanan</a>
        <a href="#artikel">Artikel</a>
        <a href="#kontak">Kontak</a>
    </nav>
    <div class="nav-actions">
        <a href="#" class="btn btn-blue">Booking ↗</a>
        <a href="#" class="btn btn-green">Konsultasi Sekarang ↗</a>
    </div>
</header>

<main>
    <section class="hero" id="beranda">
        <div class="eyebrow"><span class="dot"></span> Ketut Surya & Partners</div>
        <h1>Hukum terkadang tidur,<br>namun tidak pernah mati</h1>
        <p class="hero-subtitle">Dorm iunt Aliquando Leges Nunquam Moriuntur</p>
        <div class="hero-actions">
            <a href="#layanan" class="btn btn-green">Jelajahi Layanan ↗</a>
            <a href="#" class="btn btn-blue">Booking ↗</a>
            <a href="#tentang" class="btn btn-dark">Lihat Tentang Kami ↓</a>
        </div>
    </section>

    <section class="about section" id="tentang">
        <div class="section-heading">
            <span class="eyebrow"><span class="dot"></span> Tentang Kami</span>
            <h2>About Ketut Surya & Partners</h2>
            <p>Legal services shaped around your needs and priorities.</p>
        </div>
        <div class="about-content">
            <p>Ketut Surya & Partners is a law firm providing comprehensive legal solutions for individuals, businesses, institutions, and various entities. We are committed to delivering strategic, responsible, and solution-oriented legal services, combining legal knowledge with a practical understanding of our clients' interests and objectives.</p>
            <p>Our practice encompasses litigation, dispute resolution, corporate and commercial matters, regulatory compliance, and a wide range of specialized legal work. We approach every matter with integrity, professionalism, confidentiality, and meticulous attention to detail.</p>
            <p>Our commitment is simple: to provide legal solutions that protect our clients' rights, interests, and business objectives.</p>
        </div>
    </section>

    <section class="services section" id="layanan">
        <div class="section-heading">
            <span class="eyebrow"><span class="dot"></span> Our Legal Services</span>
            <h2>Legal Services</h2>
            <p>Strategic legal counsel, practical solutions, and professional representation for every legal challenge.</p>
        </div>
        <div class="service-list">
            <a href="#konsultasi" class="service-item blue">
                <span class="service-icon">⚖</span><span>Dispute Resolution</span><span class="service-arrow">↗</span>
            </a>
            <a href="#konsultasi" class="service-item red">
                <span class="service-icon">▤</span><span>Litigation</span><span class="service-arrow">↗</span>
            </a>
            <a href="#konsultasi" class="service-item green">
                <span class="service-icon">◆</span><span>Intellectual Property</span><span class="service-arrow">↗</span>
            </a>
            <a href="#konsultasi" class="service-item gray">
                <span class="service-icon">▣</span><span>Corporate, Commercial & Compliance</span><span class="service-arrow">↗</span>
            </a>
            <a href="#konsultasi" class="service-item gold">
                <span class="service-icon">◆</span><span>Retainer & General Counsel Services</span><span class="service-arrow">↗</span>
            </a>
        </div>
    </section>

    <section class="practice section">
        <span class="eyebrow"><span class="dot"></span> Our Practice Areas</span>
        <h2>Practicing Area</h2>
        <div class="practice-grid">
            <div><span>01</span> Banking and restructuring</div>
            <div><span>02</span> Corporate and commercial</div>
            <div><span>03</span> Litigation</div>
            <div><span>04</span> Civil litigation and dispute resolution</div>
            <div><span>05</span> Contracts and legal affairs</div>
            <div><span>06</span> Taxation</div>
            <div><span>07</span> Criminal defense and litigation</div>
            <div><span>08</span> Banking and finance</div>
            <div><span>09</span> Licensing and compliance</div>
            <div><span>10</span> Intellectual property</div>
            <div><span>11</span> Employment and labor</div>
            <div><span>12</span> Real estate and construction</div>
            <div><span>13</span> Arbitration</div>
            <div><span>14</span> Mergers and acquisitions</div>
            <div><span>15</span> IT and technology law</div>
        </div>
    </section>

    <section class="team section">
        <div class="center-heading">
            <span class="eyebrow"><span class="dot"></span> Our Legal Team</span>
            <h2>The people behind the practice.</h2>
        </div>
        <div class="team-grid">
            <article class="team-card">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=85" alt="Ketua tim hukum">
                <div class="team-info"><h3>Surya Putra, S.H., M.H.</h3><p>Managing Partner</p><a href="#kontak">Lihat Profil ↗</a></div>
            </article>
            <article class="team-card">
                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=85" alt="Pengacara perempuan">
                <div class="team-info"><h3>Mycha de Savernaya, S.H.</h3><p>Senior Associate</p><a href="#kontak">Lihat Profil ↗</a></div>
            </article>
            <article class="team-card">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=85" alt="Pengacara senior">
                <div class="team-info"><h3>Muhammad Yunus Latieno, S.H.</h3><p>Partner</p><a href="#kontak">Lihat Profil ↗</a></div>
            </article>
            <article class="team-card">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=85" alt="Pengacara">
                <div class="team-info"><h3>Bagus Adi Mahendra</h3><p>Legal Associate</p><a href="#kontak">Lihat Profil ↗</a></div>
            </article>
        </div>
    </section>

    <section class="consultation section" id="konsultasi">
        <div class="consult-copy">
            <span class="eyebrow"><span class="dot"></span> Get Legal Counsel</span>
            <h2>Choose How We<br>Can Help You</h2>
            <p>We understand that every legal matter is unique. Choose the consultation channel that works best for you and get connected with our legal team.</p>
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=700&q=85" alt="Konsultan hukum profesional">
        </div>
        <div class="consult-options">
            <a href="{{ url('/konsultasi') }}" class="consult-card whatsapp">
                <span class="consult-icon">◈</span><h3>WhatsApp Consultation</h3>
                <p>Connect directly with our team for quick questions, initial guidance, and consultation scheduling.</p><span class="consult-link">Buka WhatsApp ↗</span>
            </a>
            <a href="{{ url('/konsultasi') }}" class="consult-card email">
                <span class="consult-icon">✉</span><h3>Via Email</h3>
                <p>Send a detailed description of your legal matter. Our team will review your inquiry and respond accordingly.</p><span class="consult-link">Kirim Email ↗</span>
            </a>
            <a href="{{ url('/booking') }}" class="consult-card meeting">
                <span class="consult-icon">▣</span><h3>Online Meeting</h3>
                <p>Discuss your case in a scheduled online meeting with a lawyer who understands your legal needs.</p><span class="consult-link">Lihat Jadwal ↗</span>
            </a>
        </div>
    </section>

    <section class="articles section" id="artikel">
        <div class="center-heading">
            <span class="eyebrow"><span class="dot"></span> Our Insights</span>
            <h2>Stay Updated with the Latest Legal News</h2>
            <p>Get the latest insights on legal developments, business regulations, and industry trends.</p>
        </div>
        <div class="article-grid">
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=700&q=85" alt="Dokumen hukum">
                <div class="article-body"><span class="article-date">LEGAL INSIGHT · 12 SEP 2026</span><h3>Tantangan Penegakan Hak Kekayaan Intelektual di Era Digital</h3><p>Memahami perlindungan hukum terhadap karya dan inovasi dalam perkembangan teknologi.</p><a href="{{ url('/artikel') }}">Baca Selengkapnya ↗</a></div>
            </article>
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=700&q=85" alt="Dokumen kontrak">
                <div class="article-body"><span class="article-date">BUSINESS LAW · 08 SEP 2026</span><h3>Memahami Kontrak Bisnis dan Risiko Hukumnya</h3><p>Hal-hal penting yang perlu diperhatikan sebelum menandatangani perjanjian bisnis.</p><a href="{{ url('/artikel') }}">Baca Selengkapnya ↗</a></div>
            </article>
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?auto=format&fit=crop&w=700&q=85" alt="Buku hukum">
                <div class="article-body"><span class="article-date">LEGAL UPDATE · 02 SEP 2026</span><h3>Perkembangan Regulasi dan Kepatuhan Perusahaan</h3><p>Mengenal pentingnya kepatuhan hukum dalam menjalankan kegiatan usaha.</p><a href="{{ url('/artikel') }}">Baca Selengkapnya ↗</a></div>
            </article>
        </div>
        <div class="center-button"><a href="{{ url('/artikel') }}" class="btn btn-dark">Lihat Semua Artikel ↓</a></div>
    </section>

    <section class="faq section">
        <div class="center-heading">
            <span class="eyebrow"><span class="dot"></span> FAQ</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>
        </div>
        <div class="faq-list">
            <details><summary>Bagaimana cara berkonsultasi dengan pengacara?</summary><p>Anda dapat menghubungi tim melalui halaman konsultasi atau membuat booking untuk menjadwalkan pertemuan.</p></details>
            <details><summary>Layanan hukum apa saja yang tersedia?</summary><p>Kami menyediakan layanan litigasi, penyelesaian sengketa, hukum perusahaan, kekayaan intelektual, serta konsultasi hukum lainnya.</p></details>
            <details><summary>Apakah saya harus membuat janji sebelum datang?</summary><p>Kami menyarankan klien melakukan booking terlebih dahulu agar jadwal konsultasi dapat disesuaikan dengan ketersediaan tim.</p></details>
            <details><summary>Bagaimana kerahasiaan informasi klien dijaga?</summary><p>Informasi klien ditangani secara profesional dan rahasia sesuai dengan kewajiban hukum serta etika profesi yang berlaku.</p></details>
        </div>
    </section>

    <section class="contact section" id="kontak">
        <div class="contact-intro">
            <span class="eyebrow"><span class="dot"></span> Get in Touch</span>
            <h2>Discuss your legal needs with us.</h2>
            <p>We are ready to assist you with professional legal services tailored to your needs.</p>
            <a href="{{ url('/konsultasi') }}" class="btn btn-green">Konsultasi Sekarang ↗</a>
        </div>
        <div class="contact-details">
            <div><span>TELEPON</span><a href="tel:081919044044">0819-1904-4044 ↗</a></div>
            <div><span>EMAIL</span><a href="mailto:info@ketutsurya.com">info@ketutsurya.com ↗</a></div>
            <div><span>ALAMAT</span><p>Indonesia · Silakan hubungi kami untuk informasi kantor.</p></div>
        </div>
    </section>
</main>

<footer class="footer">
    <a href="#beranda" class="logo">KS<span>│</span></a>
    <p>© {{ date('Y') }} Ketut Surya & Partners. All rights reserved.</p>
    <div><a href="#tentang">Tentang Kami</a><a href="#layanan">Layanan</a><a href="#kontak">Kontak</a></div>
</footer>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    menuToggle.addEventListener('click', () => navLinks.classList.toggle('active'));
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => navLinks.classList.remove('active'));
    });
</script>
</body>
</html>
