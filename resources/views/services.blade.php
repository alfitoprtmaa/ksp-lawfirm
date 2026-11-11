<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan – Ketut Surya Putra &amp; Partners</title>
    <meta name="description" content="Layanan hukum Ketut Surya Putra & Partners: dispute resolution, litigation, kekayaan intelektual, korporasi, dan retainer.">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Lora:ital,wght@0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
</head>
<body class="page-inner" data-whatsapp="{{ $whatsapp }}">

{{-- ================= NAVBAR ================= --}}
<header class="nav" id="nav">
    <div class="nav__inner">
        <a class="nav__logo"><img src="{{ asset('images/logo.png') }}" alt="KS&P"></a>

        <nav class="nav__links" id="navLinks" aria-label="Menu utama">
            <a href="{{ route('welcome') }}">Beranda</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="#" class="is-active">Layanan</a>
            <a href="{{ route('articles') }}">Artikel</a>
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
    {{-- ===== Hero ===== --}}
    <section class="page-hero">
        <div class="container">
            <span class="chip chip--sm"><i class="dot"></i> Services</span>
            <h1>Our Services</h1>
            <div class="page-hero__row">
                <span class="page-hero__label">Ruang Lingkup Layanan</span>
                <p>{{ $intro }}</p>
            </div>
        </div>
    </section>

    {{-- ===== Daftar layanan ===== --}}
    <section class="svc">
        <div class="container">
            @foreach ($services as $i => $s)
                <article class="svc__row" id="{{ $s['slug'] }}" data-reveal>
                    <span class="svc__no">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="svc__title">
                        <h3>{{ $s['title'] }}</h3>
                        <p>{{ $s['tagline'] }}</p>
                    </div>
                    <div class="svc__body">
                        <p class="bio">{{ $s['desc'] }}</p>
                        <ul class="ticks">
                            @foreach ($s['points'] as $pt)<li>{{ $pt }}</li>@endforeach
                        </ul>
                        <a class="more" target="_blank" rel="noopener"
                           href="https://wa.me/{{ $whatsapp }}?text={{ rawurlencode('Halo, saya ingin berdiskusi tentang layanan '.$s['title']) }}">
                            Diskusikan kebutuhan Anda <span aria-hidden="true">↗</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</main>

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
            nav.classList.toggle('is-scrolled', window.scrollY > 40);
            toTop.classList.toggle('is-show', window.scrollY > 600);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        toggle.addEventListener('click', function () {
            var open = nav.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', open);
        });
        $$('#navLinks a').forEach(function (a) {
            a.addEventListener('click', function () {
                nav.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
        toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

        var links = $$('#navLinks a');
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (!e.isIntersecting) return;
                    links.forEach(function (a) {
                        a.classList.toggle('is-active', a.getAttribute('href') === '#' + e.target.id);
                    });
                });
            }, { rootMargin: '-45% 0px -50% 0px' });
            links.forEach(function (a) {
                var t = $(a.getAttribute('href'));
                if (t) io.observe(t);
            });
        }

        /* ---------- Accordion (layanan & FAQ) ---------- */
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
        function step() { var c = $('.card', track); return c ? c.offsetWidth + 20 : 300; }
        $('#teamPrev').addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); });
        $('#teamNext').addEventListener('click', function () { track.scrollBy({ left: step(), behavior: 'smooth' }); });

        var down = false, startX = 0, startLeft = 0, moved = false;
        track.addEventListener('pointerdown', function (e) {
            if (e.pointerType === 'touch') return; // touch pakai scroll native
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

        /* ---------- Modal booking -> WhatsApp ---------- */
        var modal = $('#bookingModal'), lastFocus = null;
        function openModal() {
            lastFocus = document.activeElement;
            modal.hidden = false;
            document.body.style.overflow = 'hidden';
            $('#bkName').focus();
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
        dateInput.min = new Date().toISOString().split('T')[0];

        $('#bkSend').addEventListener('click', function () {
            var name = $('#bkName').value.trim();
            var err = $('#bkErr');
            if (!name) { err.hidden = false; $('#bkName').focus(); return; }
            err.hidden = true;

            var text = 'Halo Ketut Surya Putra & Partners, saya ingin booking konsultasi.\n' +
                'Nama: ' + name + '\n' +
                'Bidang hukum: ' + $('#bkTopic').value + '\n' +
                (dateInput.value ? 'Tanggal: ' + dateInput.value + '\n' : '') +
                ($('#bkMsg').value.trim() ? 'Ringkasan: ' + $('#bkMsg').value.trim() : '');

            window.open('https://wa.me/' + document.body.dataset.whatsapp + '?text=' + encodeURIComponent(text), '_blank', 'noopener');
            closeModal();
        });
    })();
</script>
</body>
</html>