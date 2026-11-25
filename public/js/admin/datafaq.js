document.addEventListener('DOMContentLoaded', function () {
    // 1. SIDEBAR DROPDOWN & TOGGLE
    document.querySelectorAll('.nav-item.has-dropdown').forEach(trigger => {
        trigger.addEventListener('click', function () {
            const group = this.closest('.nav-group');
            if (group) group.classList.toggle('open');
        });
    });

    const menuToggle = document.querySelector('.menu-toggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            if (window.innerWidth <= 768) {
                document.body.classList.toggle('sidebar-mobile-open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        });
    }

    // 2. FILTER & PENCARIAN TABEL FAQ
    const searchInput = document.getElementById('searchFaqInput');
    const catSelect = document.getElementById('filterFaqCategory');
    const statusSelect = document.getElementById('filterFaqStatus');
    const btnReset = document.getElementById('btnResetFaqFilter');
    const tbody = document.getElementById('faqTableBody');
    const showingText = document.getElementById('faqShowingText');

    function filterFaqTable() {
        if (!tbody) return;
        const kw = (searchInput?.value || '').trim().toLowerCase();
        const cat = catSelect?.value || 'all';
        const st = statusSelect?.value || 'all';
        const rows = tbody.querySelectorAll('tr');
        let visible = 0;

        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            const rowCat = row.getAttribute('data-category') || '';
            const rowStatus = row.getAttribute('data-status') || '';

            const matchKw = !kw || text.includes(kw);
            const matchCat = cat === 'all' || rowCat === cat;
            const matchSt = st === 'all' || rowStatus === st;

            if (matchKw && matchCat && matchSt) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        if (showingText) {
            showingText.textContent = visible > 0
                ? `Menampilkan 1–${visible} dari 24 FAQ`
                : 'Tidak ada FAQ yang sesuai filter';
        }
    }

    [searchInput, catSelect, statusSelect].forEach(el => {
        if (el) {
            el.addEventListener('input', filterFaqTable);
            el.addEventListener('change', filterFaqTable);
        }
    });

    if (btnReset) {
        btnReset.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            if (catSelect) catSelect.value = 'all';
            if (statusSelect) statusSelect.value = 'all';
            filterFaqTable();
        });
    }

    // 3. KONTROL MODAL TAMBAH & EDIT FAQ
    function openModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.add('show');
        document.body.classList.add('modal-open');
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('show');
        document.body.classList.remove('modal-open');
    }

    document.getElementById('btnOpenAddFaqModal')?.addEventListener('click', () => openModal('addFaqModal'));

    document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', function () {
            closeModal(this.getAttribute('data-close-modal'));
        });
    });

    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) {
                overlay.classList.remove('show');
                document.body.classList.remove('modal-open');
            }
        });
    });

    // Highlight pilihan radio Status Publikasi
    document.querySelectorAll('.status-radio-card input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const grid = this.closest('.status-radio-grid');
            if (grid) {
                grid.querySelectorAll('.status-radio-card').forEach(card => card.classList.remove('selected'));
            }
            this.closest('.status-radio-card')?.classList.add('selected');
        });
    });

    // 4. POPULATE DATA KE MODAL EDIT FAQ
    const editForm = document.getElementById('editFaqForm');
    document.querySelectorAll('.btn-icon-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-faq') || '{}');
            if (!data.faq_id) return;

            if (editForm) editForm.action = `/admin/faq/${data.faq_id}`;

            document.getElementById('edit_faq_question').value = data.question || '';
            document.getElementById('edit_faq_category').value = data.category || 'Konsultasi';
            document.getElementById('edit_faq_order').value = data.display_order || 1;
            document.getElementById('edit_faq_answer').value = data.answer || '';

            const activeVal = data.is_active ? '1' : '0';
            document.querySelectorAll('#editStatusRadioGrid input[name="is_active"]').forEach(radio => {
                const isMatch = radio.value === activeVal;
                radio.checked = isMatch;
                radio.closest('.status-radio-card')?.classList.toggle('selected', isMatch);
            });

            openModal('editFaqModal');
        });
    });
});