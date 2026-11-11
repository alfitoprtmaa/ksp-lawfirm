/* Halaman Artikel: pencarian, filter kategori, urutan, dan pagination (di browser).
   Jika backend nanti memfilter di server, file ini bisa dihapus. */
(function () {
    'use strict';

    var grid = document.getElementById('artGrid');
    if (!grid) return;

    var cards = Array.prototype.slice.call(grid.children);
    var pills = Array.prototype.slice.call(document.querySelectorAll('.pill'));
    var form = document.getElementById('artSearch');
    var input = document.getElementById('artQuery');
    var sortSel = document.getElementById('artSort');
    var info = document.getElementById('artInfo');
    var pager = document.getElementById('artPager');
    var empty = document.getElementById('artEmpty');
    var size = parseInt(grid.dataset.pageSize, 10) || 6;
    var state = { cat: 'all', q: '', sort: 'new', page: 1 };

    // Dukungan link langsung: /artikel?q=pesangon&kategori=Perdata
    var params = new URLSearchParams(window.location.search);
    if (params.get('q')) { state.q = params.get('q'); input.value = state.q; }
    if (params.get('kategori')) { state.cat = params.get('kategori'); }

    function render(scroll) {
        var q = state.q.toLowerCase().trim();
        var list = cards.filter(function (c) {
            var okCat = state.cat === 'all' || c.dataset.category === state.cat;
            var okQ = !q || c.dataset.search.indexOf(q) > -1;
            return okCat && okQ;
        });
        list.sort(function (a, b) {
            if (state.sort === 'az') return a.dataset.title.localeCompare(b.dataset.title, 'id');
            var d = a.dataset.date < b.dataset.date ? -1 : (a.dataset.date > b.dataset.date ? 1 : 0);
            return state.sort === 'old' ? d : -d;
        });

        var pages = Math.max(1, Math.ceil(list.length / size));
        state.page = Math.min(state.page, pages);
        var start = (state.page - 1) * size;
        var visible = list.slice(start, start + size);

        cards.forEach(function (c) { c.hidden = true; c.classList.remove('pop'); });
        visible.forEach(function (c, i) {
            grid.appendChild(c);
            c.hidden = false;
            c.style.animationDelay = (i * 60) + 'ms';
            void c.offsetWidth; // restart animasi
            c.classList.add('pop');
        });

        pills.forEach(function (p) {
            var on = p.dataset.cat === state.cat;
            p.classList.toggle('is-on', on);
            p.setAttribute('aria-pressed', on);
        });

        if (!list.length) info.textContent = 'Tidak ada artikel yang cocok';
        else if (pages === 1) info.textContent = 'Menampilkan ' + list.length + ' artikel panduan';
        else info.textContent = 'Menampilkan ' + (start + 1) + '–' + (start + visible.length) + ' dari ' + list.length + ' artikel';

        pager.innerHTML = '';
        for (var i = 1; i <= pages; i++) {
            (function (n) {
                var b = document.createElement('button');
                b.type = 'button';
                b.className = 'pg' + (n === state.page ? ' is-on' : '');
                b.textContent = n;
                b.setAttribute('aria-label', 'Halaman ' + n);
                if (n === state.page) b.setAttribute('aria-current', 'page');
                b.addEventListener('click', function () { state.page = n; render(true); });
                pager.appendChild(b);
            })(i);
        }
        pager.hidden = !list.length;
        empty.hidden = list.length > 0;

        if (scroll) document.getElementById('jelajah').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    pills.forEach(function (p) {
        p.addEventListener('click', function () { state.cat = p.dataset.cat; state.page = 1; render(false); });
    });
    form.addEventListener('submit', function (e) { e.preventDefault(); state.q = input.value; state.page = 1; render(false); });
    input.addEventListener('input', function () { state.q = input.value; state.page = 1; render(false); });
    sortSel.addEventListener('change', function () { state.sort = sortSel.value; state.page = 1; render(false); });
    document.getElementById('artReset').addEventListener('click', function () {
        state = { cat: 'all', q: '', sort: 'new', page: 1 };
        input.value = ''; sortSel.value = 'new'; render(false);
    });

    render(false);
})();