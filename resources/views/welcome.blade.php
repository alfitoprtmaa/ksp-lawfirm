<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ketut Surya Putra &amp; Partners – Law Firm</title>
    <meta name="description" content="Ketut Surya Putra & Partners adalah firma hukum yang menyediakan layanan hukum komprehensif bagi individu, perusahaan, dan institusi.">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Lora:ital,wght@0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body data-whatsapp="{{ $whatsapp }}">

{{-- ================= NAVBAR ================= --}}
<header class="nav" id="nav">
    <div class="nav__inner">
        <a href="#beranda" class="nav__logo"><img src="{{ asset('images/logo.png') }}" alt="KS&P"></a>

        <nav class="nav__links" id="navLinks" aria-label="Menu utama">
            <a href="#beranda" class="is-active">Beranda</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('services') }}">Layanan</a>
            <a href="#">Artikel</a>
            <a href="{{ route('contact') }}">Kontak</a>
        </nav>

        <div class="nav__cta">
            <button class="btn btn--blue btn--stack" data-open-booking>
                <span>
                    <b>Booking</b>
                    <!-- <small>Login / Daftar</small> -->
                </span>
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
            </button>
            <a class="btn btn--green" href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener">
                Konsultasi Sekarang
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
            </a>
        </div>

        <button class="nav__toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="navLinks">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<main>
{{-- ================= HERO ================= --}}
<section class="hero" id="beranda">
    <div class="hero__content">
        <span class="chip"><i class="dot"></i> Ketut Surya &amp; Partners</span>
        <h1>Hukum terkadang tidur,<br>namun tidak pernah mati</h1>
        <p class="hero__latin">Dormiunt Aliquando Leges Nunquam Moriuntur</p>
        <div class="hero__actions">
            <a class="btn btn--green" href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener">
                Konsultasi Sekarang
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
            </a>
            <button class="btn btn--blue" data-open-booking>
                Booking
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
            </button>
            <a class="btn btn--ghost" href="#layanan">
                Lihat Layanan
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ================= ABOUT ================= --}}
<section class="about" id="about">
    <div class="container about__grid">
        <div>
            <span class="chip chip--sm"><i class="dot"></i> 01 | About Us</span>
            <h2>About Ketut Surya &amp; Partners</h2>
            <p class="muted small">Legal services shaped around our clients' interests and objectives.</p>
        </div>
        <p class="about__text">
            <strong>KETUT SURYA PUTRA &amp; PARTNERS</strong> is a law firm providing comprehensive legal services to individuals, corporations,
            institutions, and business entities. We are committed to delivering strategic, responsive, and solution-oriented
            legal services, combining rigorous legal analysis with a practical understanding of our clients' interests and
            objectives. Our practice encompasses litigation, dispute resolution, corporate and commercial matters, regulatory
            compliance, and specialized areas of law. We approach every matter with integrity, professionalism, confidentiality,
            and attention to detail. Our commitment is simple: to provide legal solutions that protect our clients' rights,
            interests, and business objectives.
        </p>
    </div>
</section>

{{-- ================= LEGAL SERVICES ================= --}}
<section class="services" id="layanan">
    <div class="container services__grid">
        <div>
            <span class="chip chip--sm"><i class="dot"></i> 02 | Legal Service</span>
            <h2>Legal Services</h2>
            <p class="muted small">Strategic counsel across disputes, litigation, corporate matters, and specialized areas of law.</p>
            <p class="quote">Your rights, interests, and objectives guide our work.</p>
        </div>

        <div class="acc" id="serviceAcc">
            @foreach ($services as $s)
                <div class="acc__item acc__item--{{ $s['color'] }}">
                    <button class="acc__head" aria-expanded="false">
                        <span class="acc__icon"><i class="{{ $s['icon'] }}"></i></span>
                        <span class="acc__title">{{ $s['title'] }}</span>
                        <span class="acc__chev" aria-hidden="true"></span>
                    </button>
                    <div class="acc__body"><p>{{ $s['desc'] }}</p></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= PRACTICING AREA ================= --}}
<section class="areas">
    <div class="container">
        <span class="chip chip--sm"><i class="dot"></i> 03 | Practicing Area</span>
        <h2>Practicing Area</h2>
        <ol class="areas__grid">
            @foreach ($areas as $i => $a)
                <li><span class="areas__no">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span><span>{{ $a }}</span></li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ================= TEAM ================= --}}
<!-- <section class="team" id="team">
    <div class="container team__head">
        <span class="chip chip--sm"><i class="dot"></i> 04 | Our Team</span>
        <h2>The people behind the practice.</h2>
    </div>

    <div class="team__wrap">
        <button class="team__nav team__nav--prev" id="teamPrev" aria-label="Sebelumnya">‹</button>
        <div class="team__track" id="teamTrack">
            @foreach ($team as $m)
                <article class="card">
                    <img src="{{ asset('images/'.$m['photo']) }}" alt="{{ $m['name'] }}" draggable="false">
                    <h3>{{ $m['name'] }}</h3>
                    <a class="card__btn" href="{{ $m['url'] }}">Lihat Profil <span aria-hidden="true">↗</span></a>
                </article>
            @endforeach
        </div>
        <button class="team__nav team__nav--next" id="teamNext" aria-label="Berikutnya">›</button>
    </div>
</section> -->

{{-- ================= TEAM ================= --}}
<section class="team" id="team">
    <div class="container team__head">
        <span class="chip chip--sm"><i class="dot"></i> 04 | Our Team</span>
        <h2>The people behind the practice.</h2>
    </div>

    <!-- Wrapper utama dengan overflow hidden -->
    <div class="team__wrap">
        <!-- Track yang akan dianimasikan ke kiri -->
        <div class="team__track-auto">
            
            <!-- Render pertama -->
            @foreach ($team as $m)
                <article class="card">
                    <img src="{{ asset('images/lawyers/'.$m['photo']) }}" alt="{{ $m['name'] }}" draggable="false">
                    <h3>{{ $m['name'] }}</h3>
                    <a class="card__btn" href="{{ $m['url'] }}">Lihat Profil <span aria-hidden="true">↗</span></a>
                </article>
            @endforeach

            <!-- Render kedua (Duplikat untuk efek infinite scroll) -->
            @foreach ($team as $m)
                <article class="card" aria-hidden="true">
                    <img src="{{ asset('images/lawyers/'.$m['photo']) }}" alt="{{ $m['name'] }}" draggable="false">
                    <h3>{{ $m['name'] }}</h3>
                    <a class="card__btn" href="{{ $m['url'] }}" tabindex="-1">Lihat Profil <span aria-hidden="true">↗</span></a>
                </article>
            @endforeach

        </div>
    </div>
</section>

{{-- ================= CHOOSE HOW WE CAN HELP ================= --}}
<!-- <section class="help">
    <div class="container help__grid">
        <div>
            <span class="chip chip--sm"><i class="dot"></i> 05 | Consultation</span>
            <h2 class="h-xl">Choose How We Can Help</h2>
            <p class="muted small">Whether you need legal advice, strategic guidance, or professional representation, our team is here to provide solutions tailored to your needs.</p>
            <img class="help__photo" src="{{ asset('images/lawyers/team.jpeg') }}" alt="Tim Ketut Surya Putra & Partners">
        </div>

        <div class="help__cards">
            <div class="hc hc--green">
                <h3>WhatsApp Consultation</h3>
                <p>Connect directly with our legal team for a quick and convenient consultation. Get professional guidance wherever you are.</p>
                <a class="hc__btn" href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener">Selengkapnya ↗</a>
            </div>
            <div class="hc hc--rose">
                <h3>Via Email</h3>
                <p>Have a legal question or need further assistance? Send us an email and our team will get back to you with the information you need.</p>
                <a class="hc__btn" href="mailto:ketutsuryaputraandpartners@gmail.com">Selengkapnya ↗</a>
            </div>
            <div class="hc hc--blue">
                <h3>Online Meeting</h3>
                <p>Discuss your legal concerns with our experienced legal team through a convenient online meeting. Get professional advice, explore your legal options.</p>
                <button class="hc__btn" data-open-booking>Lihat Lokasi ↗</button>
            </div>
        </div>
    </div>
</section> -->

{{-- ================= CHOOSE HOW WE CAN HELP ================= --}}
<section class="help">
    <div class="container help__grid">
        {{-- LEFT CONTENT --}}
        <div class="help__content">
            <span class="chip chip--sm">
                <i class="dot"></i> 05 | Consultation
            </span>

            <h2 class="help__title">Choose How We Can Help</h2>

            <p class="help__description">
                Whether you need legal advice, strategic guidance, or professional
                representation, our team is here to provide solutions tailored to your needs.
            </p>

            <img
                class="help__photo"
                src="{{ asset('images/lawyers/team.jpeg') }}"
                alt="Tim Ketut Surya Putra & Partners"
            >
        </div>

        {{-- RIGHT CARDS --}}
        <div class="help__cards">

            {{-- WHATSAPP --}}
            <div class="hc hc--green">
                <div class="hc__icon">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>

                <h3>WhatsApp Consultation</h3>

                <p>
                    Connect directly with our legal team for a quick
                    and convenient consultation. Get professional
                    guidance wherever you are.
                </p>

                <a class="hc__btn"
                   href="https://wa.me/{{ $whatsapp }}"
                   target="_blank"
                   rel="noopener">
                    <span>SELENGKAPNYA</span>
                    <span class="hc__arrow">↗</span>
                </a>
            </div>

            {{-- EMAIL --}}
            <div class="hc hc--rose">
                <div class="hc__icon">
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <h3>Via Email</h3>

                <p>
                    Have a legal question or need further assistance?
                    Send us an email and our team will get back to you
                    with the information you need.
                </p>

                <a class="hc__btn"
                   href="mailto:ketutsuryaputraandpartners@gmail.com">
                    <span>SELENGKAPNYA</span>
                    <span class="hc__arrow">↗</span>
                </a>
            </div>

            {{-- ONLINE MEETING --}}
            <div class="hc hc--blue">
                <div class="hc__icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <h3>Online Meeting</h3>

                <p>
                    Discuss your legal concerns with our experienced
                    legal team through a convenient online meeting.
                    Get professional advice and explore your legal options.
                </p>

                <button class="hc__btn" data-open-booking>
                    <span>LIHAT LOKASI</span>
                    <span class="hc__arrow">↗</span>
                </button>
            </div>

        </div>
    </div>
</section>

{{-- ================= NEWS ================= --}}
<section class="news" id="artikel">
    <div class="container">
        <div class="center">
            <span class="chip chip--sm"><i class="dot"></i> 06 | News</span>
            <h2>Stay Updated with the Latest Legal News</h2>
            <p class="muted small">Get the latest insights and updates on legal developments, regulations, and important issues shaping today's legal landscape.</p>
        </div>

        <div class="news__grid">
            @foreach ($news as $n)
                <article class="ncard">
                    <img src="{{ asset('images/'.$n['image']) }}" alt="">
                    <div class="ncard__body">
                        <span class="tag">{{ $n['category'] }}</span>
                        <h3>{{ $n['title'] }}</h3>
                        <p>{{ $n['excerpt'] }}</p>
                        <a class="ncard__btn" href="{{ $n['url'] }}">Baca Selengkapnya</a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="center"><a class="btn btn--ghost" href="#">Lihat Berita Lainnya ↗</a></div>
    </div>
</section>

{{-- ================= FAQ ================= --}}
<section class="faq">
    <div class="container container--narrow">
        <div class="center">
            <span class="chip chip--sm"><i class="dot"></i> 07 | FAQ</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>
        </div>
        <div class="faq__list" id="faqList">
            @foreach ($faqs as $f)
                <div class="faq__item">
                    <button class="faq__q" aria-expanded="false">{{ $f['q'] }}<span class="faq__plus" aria-hidden="true"></span></button>
                    <div class="faq__a"><p>{{ $f['a'] }}</p></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= CONTACT ================= --}}
<section class="contact" id="kontak">
    <div class="container contact__grid">
        <div class="contact__info">
            <span class="chip chip--sm"><i class="dot"></i> 08 | Contact</span>
            <h2>Discuss your legal needs with us.</h2>
            <p class="muted small">For enquiries about our legal services, please contact</p>
            <p class="muted small">KETUT SURYA PUTRA &amp; PARTNERS.</p>
            <a class="btn btn--green" href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener">
                Konsultasi Sekarang
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
            </a>
        </div>
        <div class="contact__links">
            <a href="tel:+{{ $whatsapp }}"><small>Telephone</small><strong>0819-1904-4044</strong><span>↗</span></a>
            <a href="mailto:ketutsuryaputraandpartners@gmail.com"><small>Email</small><strong>ketutsuryaputraandpartners@gmail.com</strong><span>↗</span></a>
        </div>
    </div>
</section>
</main>

<footer class="footer">
    <div class="container">© {{ date('Y') }} Ketut Surya Putra &amp; Partners. All rights reserved.</div>
</footer>

{{-- ================= BOOKING MODAL ================= --}}
<div class="modal" id="bookingModal" role="dialog" aria-modal="true" aria-labelledby="bookingTitle" hidden>
    <div class="modal__box">
        <button class="modal__close" data-close-booking aria-label="Tutup">×</button>
        <h3 id="bookingTitle">Booking Konsultasi</h3>
        <p class="muted small">Isi data berikut, pesan akan dikirim ke WhatsApp tim kami.</p>
        <div class="field"><label for="bkName">Nama</label><input id="bkName" type="text" placeholder="Nama lengkap"></div>
        <div class="field">
            <label for="bkTopic">Bidang hukum</label>
            <select id="bkTopic">
                @foreach ($areas as $a)<option>{{ $a }}</option>@endforeach
            </select>
        </div>
        <div class="field"><label for="bkDate">Tanggal yang diinginkan</label><input id="bkDate" type="date"></div>
        <div class="field"><label for="bkMsg">Ringkasan masalah</label><textarea id="bkMsg" rows="3" placeholder="Ceritakan singkat kebutuhan Anda"></textarea></div>
        <p class="modal__err" id="bkErr" hidden>Nama wajib diisi.</p>
        <button class="btn btn--green btn--block" id="bkSend">Kirim via WhatsApp</button>
    </div>
</div>

<button class="totop" id="toTop" aria-label="Kembali ke atas">↑</button>

<script>
    (function () {
        'use strict';

        var $ = function (s, c) { return (c || document).querySelector(s); };
        var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

        /* ---------- Navbar: efek scroll, menu mobile, link aktif ---------- */
        var nav = $('#nav');
        var toggle = $('#navToggle');
        var toTop = $('#toTop');

        function onScroll() {
            if (nav) nav.classList.toggle('is-scrolled', window.scrollY > 40);
            if (toTop) toTop.classList.toggle('is-show', window.scrollY > 600);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        if (toggle && nav) {
            toggle.addEventListener('click', function () {
                var open = nav.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', open);
            });
        }

        var navLinks = $$('#navLinks a');
        if (navLinks.length > 0) {
            navLinks.forEach(function (a) {
                a.addEventListener('click', function () {
                    if (nav) nav.classList.remove('is-open');
                    if (toggle) toggle.setAttribute('aria-expanded', 'false');
                });
            });

            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (!e.isIntersecting) return;
                        navLinks.forEach(function (a) {
                            a.classList.toggle('is-active', a.getAttribute('href') === '#' + e.target.id);
                        });
                    });
                }, { rootMargin: '-45% 0px -50% 0px' });
                
                navLinks.forEach(function (a) {
                    var targetId = a.getAttribute('href');
                    // Pastikan href adalah anchor internal, BUKAN cuma "#" kosong
                    if (targetId && targetId.startsWith('#') && targetId.length > 1) {
                        var t = $(targetId);
                        if (t) io.observe(t);
                    }
                });
            }
        }

        if (toTop) {
            toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });
        }

        /* ---------- Accordion (Layanan & FAQ) ---------- */
        // Fungsi ini sudah aman karena ada if (!root) return;
        function accordion(root, itemSel, headSel, bodySel, single) {
            if (!root) return;
            $$(itemSel, root).forEach(function (item) {
                var head = $(headSel, item), body = $(bodySel, item);
                head.addEventListener('click', function () {
                    var willOpen = !item.classList.contains('is-open');
                    if (single) {
                        $$(itemSel, root).forEach(function (o) {
                            o.classList.remove('is-open');
                            $(headSel, o).setAttribute('aria-expanded', 'false');
                            $(bodySel, o).style.maxHeight = null;
                        });
                    }
                    item.classList.toggle('is-open', willOpen);
                    head.setAttribute('aria-expanded', willOpen);
                    body.style.maxHeight = willOpen ? body.scrollHeight + 'px' : null;
                });
            });
        }
        accordion($('#serviceAcc'), '.acc__item', '.acc__head', '.acc__body', true);
        accordion($('#faqList'), '.faq__item', '.faq__q', '.faq__a', true);

        /* ---------- Carousel tim: tombol + drag ---------- */
        var track = $('#teamTrack');
        if (track) { // Cek apakah elemen carousel ada di halaman ini
            function step() { var c = $('.card', track); return c ? c.offsetWidth + 20 : 300; }
            
            var teamPrev = $('#teamPrev');
            var teamNext = $('#teamNext');
            
            if (teamPrev) teamPrev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); });
            if (teamNext) teamNext.addEventListener('click', function () { track.scrollBy({ left: step(), behavior: 'smooth' }); });

            var down = false, startX = 0, startLeft = 0, moved = false;
            track.addEventListener('pointerdown', function (e) {
                if (e.pointerType === 'touch') return; 
                down = true; moved = false; startX = e.clientX; startLeft = track.scrollLeft;
            });
            window.addEventListener('pointermove', function (e) {
                if (!down) return;
                var dx = e.clientX - startX;
                if (Math.abs(dx) > 5) { moved = true; track.classList.add('is-dragging'); }
                track.scrollLeft = startLeft - dx;
            });
            window.addEventListener('pointerup', function () {
                down = false; track.classList.remove('is-dragging');
            });
            track.addEventListener('click', function (e) {
                if (moved) { e.preventDefault(); moved = false; }
            }, true);
        }

        /* ---------- Modal booking -> WhatsApp ---------- */
        var modal = $('#bookingModal');
        if (modal) { // Cek apakah modal booking dipasang di halaman ini
            var lastFocus = null;
            function openModal() {
                lastFocus = document.activeElement;
                modal.hidden = false;
                document.body.style.overflow = 'hidden';
                var bkName = $('#bkName');
                if (bkName) bkName.focus();
            }
            function closeModal() {
                modal.hidden = true;
                document.body.style.overflow = '';
                if (lastFocus) lastFocus.focus();
            }
            
            $$('[data-open-booking]').forEach(function (b) { b.addEventListener('click', openModal); });
            $$('[data-close-booking]').forEach(function (b) { b.addEventListener('click', closeModal); });
            modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) closeModal(); });

            var dateInput = $('#bkDate');
            if (dateInput) dateInput.min = new Date().toISOString().split('T')[0];

            var bkSend = $('#bkSend');
            if (bkSend) {
                bkSend.addEventListener('click', function () {
                    var nameInput = $('#bkName');
                    var name = nameInput ? nameInput.value.trim() : '';
                    var err = $('#bkErr');
                    
                    if (!name) { 
                        if (err) err.hidden = false; 
                        if (nameInput) nameInput.focus(); 
                        return; 
                    }
                    if (err) err.hidden = true;

                    var topicInput = $('#bkTopic');
                    var topic = topicInput ? topicInput.value : '';
                    var msgInput = $('#bkMsg');
                    var msg = msgInput && msgInput.value.trim() ? msgInput.value.trim() : '';
                    var dateVal = dateInput && dateInput.value ? dateInput.value : '';

                    var text = 'Halo Ketut Surya Putra & Partners, saya ingin booking konsultasi.\n' +
                        'Nama: ' + name + '\n' +
                        'Bidang hukum: ' + topic + '\n' +
                        (dateVal ? 'Tanggal: ' + dateVal + '\n' : '') +
                        (msg ? 'Ringkasan: ' + msg : '');

                    var waNumber = document.body.dataset.whatsapp || '';
                    window.open('https://wa.me/' + waNumber + '?text=' + encodeURIComponent(text), '_blank', 'noopener');
                    closeModal();
                });
            }
        }
    })();
</script>
</body>
</html>