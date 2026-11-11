<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel – Ketut Surya Putra &amp; Partners</title>
    <meta name="description" content="Wawasan dan kabar hukum: informasi, panduan praktis, dan cerita pendampingan dari Ketut Surya Putra & Partners.">
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Lora:ital,wght@0,500;1,400;1,500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
</head>
<body class="page-inner" data-whatsapp="{{ $whatsapp }}">

{{-- ================= NAVBAR ================= --}}
<header class="nav" id="nav">
    <div class="nav__inner">
        <a class="nav__logo"><img src="{{ asset('images/logo.png') }}" alt="KS&P"></a>

        <nav class="nav__links" id="navLinks" aria-label="Menu utama">
            <a href="{{ route('welcome') }}">Beranda</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('services') }}">Layanan</a>
            <a href="#" class="is-active">Artikel</a>
            <a href="{{ route('contact') }}">Kontak</a>
        </nav>

        <div class="nav__cta">
            <button class="btn btn--blue btn--stack" data-open-booking>
                <span><b>Booking</b><small>Login / Daftar</small></span>
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
    {{-- ===== Hero ===== --}}
    <section class="page-hero page-hero--crumb">
        <div class="container">
            <nav class="crumb" aria-label="Breadcrumb"><a href="{{ route('welcome') }}">Beranda</a> <span>/</span> <span>Artikel</span></nav>
            <span class="chip chip--sm"><i class="dot"></i> Articles</span>
            <h1>Our Articles</h1>
            <div class="page-hero__row">
                <span class="page-hero__label">Wawasan &amp; Kabar Hukum</span>
                <p>@foreach ($intro as $line)<span>{{ $line }}</span>@endforeach</p>
            </div>
        </div>
    </section>

    <section class="arts">
        <div class="container">

            {{-- ===== Artikel pilihan ===== --}}
            <article class="feat" data-reveal>
                <div class="feat__img"><img src="{{ asset('images/'.$featured['image']) }}" alt="{{ $featured['title'] }}"></div>
                <div class="feat__body">
                    <span class="kicker">Artikel Pilihan / {{ $featured['kicker'] }}</span>
                    <h2>{{ $featured['title'] }}</h2>
                    <p>{{ $featured['excerpt'] }}</p>
                    <a class="feat__btn" href="{{ $featured['url'] }}">Baca selengkapnya <span aria-hidden="true">→</span></a>
                </div>
            </article>
            <p class="caption">{{ $featured['caption'] }}</p>

            {{-- ===== Jelajahi artikel ===== --}}
            <div class="explore" id="jelajah">
                <div class="explore__top">
                    <div>
                        <h2>Jelajahi artikel</h2>
                        <p>Temukan topik yang dekat dengan kebutuhan hukum Anda.</p>
                    </div>
                    <form class="search" id="artSearch" role="search" action="{{ route('articles') }}" method="get">
                        <input id="artQuery" name="q" type="search" placeholder="Cari topik atau kata kunci..." aria-label="Cari artikel" autocomplete="off">
                        <button type="submit">Cari</button>
                    </form>
                </div>

                <div class="filters">
                    <div class="pills" role="group" aria-label="Filter kategori">
                        <button type="button" class="pill is-on" data-cat="all" aria-pressed="true">Semua artikel</button>
                        @foreach ($categories as $cat)
                            <button type="button" class="pill" data-cat="{{ $cat }}" aria-pressed="false">{{ $cat }}</button>
                        @endforeach
                    </div>
                    <select class="sort" id="artSort" aria-label="Urutkan artikel">
                        <option value="new">Terbaru</option>
                        <option value="old">Terlama</option>
                        <option value="az">Judul A–Z</option>
                    </select>
                </div>

                <div class="agrid" id="artGrid" data-page-size="6">
                    @foreach ($articles as $a)
                        <a class="acard" href="{{ $a['url'] }}"
                           data-category="{{ $a['category'] }}" data-date="{{ $a['date'] }}" data-title="{{ $a['title'] }}"
                           data-search="{{ mb_strtolower($a['title'].' '.$a['excerpt'].' '.$a['category']) }}">
                            <div class="acard__meta"><b>{{ $a['category'] }}</b><span>{{ $a['minutes'] }} menit baca</span></div>
                            <h3>{{ $a['title'] }}</h3>
                            <p>{{ $a['excerpt'] }}</p>
                            <span class="acard__more">Baca selengkapnya <span aria-hidden="true">→</span></span>
                        </a>
                    @endforeach
                </div>

                <div class="art-empty" id="artEmpty" hidden>
                    <p>Belum ada artikel yang cocok dengan pencarian Anda.</p>
                    <button type="button" id="artReset">Reset pencarian</button>
                </div>

                <div class="foot">
                    <span id="artInfo" aria-live="polite">Menampilkan {{ count($articles) }} artikel panduan</span>
                    <div class="pager" id="artPager" aria-label="Halaman"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Kontak ===== --}}
    <section class="contact" id="kontak">
        <div class="container contact__grid">
            <div>
                <span class="chip chip--sm"><i class="dot"></i> Kontak Kami</span>
                <h2>Discuss your legal needs with us.</h2>
                <p class="muted small">For enquiries about our legal services, please contact KETUT SURYA PUTRA &amp; PARTNERS.</p>
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
<script src="{{ asset('js/articles.js') }}"></script>
</body>
</html>