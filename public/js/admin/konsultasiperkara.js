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

    // 2. HALAMAN 1: SEARCH & FILTER TABEL PERKARA
    const searchInput = document.getElementById('searchCaseInput');
    const casesTbody = document.getElementById('casesTableBody');
    const btnFilter = document.getElementById('btnToggleCaseFilter');
    const filterPopover = document.getElementById('caseFilterPopover');
    const activeCategoryLabel = document.getElementById('activeCategoryLabel');
    let selectedCategory = 'all';

    function filterCasesTable() {
        if (!casesTbody) return;
        const keyword = (searchInput?.value || '').trim().toLowerCase();
        const rows = casesTbody.querySelectorAll('tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            const cat = row.getAttribute('data-category') || '';
            const matchKeyword = !keyword || text.includes(keyword);
            const matchCat = selectedCategory === 'all' || cat === selectedCategory;

            if (matchKeyword && matchCat) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const rangeInfo = document.getElementById('tableRangeInfo');
        if (rangeInfo) {
            rangeInfo.textContent = visibleCount > 0
                ? `Menampilkan 1–${visibleCount} dari ${rows.length} perkara`
                : 'Tidak ada perkara yang sesuai filter';
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterCasesTable);
    }

    if (btnFilter && filterPopover) {
        btnFilter.addEventListener('click', (e) => {
            e.stopPropagation();
            filterPopover.classList.toggle('show');
        });

        filterPopover.querySelectorAll('.filter-opt').forEach(opt => {
            opt.addEventListener('click', function () {
                filterPopover.querySelectorAll('.filter-opt').forEach(o => o.classList.remove('active'));
                this.classList.add('active');
                selectedCategory = this.getAttribute('data-cat');
                if (activeCategoryLabel) {
                    activeCategoryLabel.textContent = selectedCategory === 'all' ? 'Filter' : selectedCategory;
                }
                filterPopover.classList.remove('show');
                filterCasesTable();
            });
        });

        document.addEventListener('click', (e) => {
            if (!filterPopover.contains(e.target) && !btnFilter.contains(e.target)) {
                filterPopover.classList.remove('show');
            }
        });
    }

    // 3. HALAMAN 2: MODAL MINTA PERBAIKAN
    const revisionModal = document.getElementById('revisionModal');
    const btnOpenRev = document.getElementById('btnOpenRevisionModal');
    const btnCloseRev = document.getElementById('btnCloseRevisionModal');
    const btnCancelRev = document.getElementById('btnCancelRevisionModal');

    if (btnOpenRev && revisionModal) {
        btnOpenRev.addEventListener('click', () => revisionModal.classList.add('show'));
    }
    [btnCloseRev, btnCancelRev].forEach(btn => {
        if (btn && revisionModal) {
            btn.addEventListener('click', () => revisionModal.classList.remove('show'));
        }
    });

    // 4. HALAMAN 3: SELEKSI & PENUGASAN ADVOKAT
    const btnRunSelection = document.getElementById('btnRunSelection');
    const btnResetSelection = document.getElementById('btnResetSelection');
    const beforeState = document.getElementById('beforeSelectionState');
    const afterState = document.getElementById('afterSelectionState');
    const substituteSelect = document.getElementById('substituteLawyerSelect');
    const selectedLawyerInput = document.getElementById('selectedLawyerIdInput');
    const btnApprove = document.getElementById('btnApproveAssignment');

    const sideHeading = document.getElementById('sideStatusHeading');
    const sideStrong = document.getElementById('sideStatusStrong');
    const sideNote = document.getElementById('sideStatusNote');

    function enableApproval(lawyerId, lawyerName, sourceLabel) {
        if (selectedLawyerInput) selectedLawyerInput.value = lawyerId;
        if (btnApprove) {
            btnApprove.disabled = false;
            btnApprove.classList.add('ready');
        }
        if (sideHeading) sideHeading.textContent = 'Siap ditugaskan';
        if (sideStrong) sideStrong.textContent = lawyerName;
        if (sideNote) sideNote.textContent = `Dipilih melalui ${sourceLabel}. Klik "Setujui penugasan" untuk mengaktifkan.`;
    }

    function resetApproval() {
        if (selectedLawyerInput) selectedLawyerInput.value = '';
        if (btnApprove) {
            btnApprove.disabled = true;
            btnApprove.classList.remove('ready');
        }
        if (sideHeading) sideHeading.textContent = 'Menunggu seleksi';
        if (sideStrong) sideStrong.textContent = 'Penugasan belum aktif.';
        if (sideNote) sideNote.textContent = 'Hasil seleksi perlu ditinjau admin.';
    }

    if (btnRunSelection) {
        btnRunSelection.addEventListener('click', function () {
            const recId = this.getAttribute('data-rec-id');
            const recName = this.getAttribute('data-rec-name');

            if (beforeState) beforeState.style.display = 'none';
            if (afterState) afterState.style.display = 'block';
            if (substituteSelect) substituteSelect.value = '';

            enableApproval(recId, recName, 'rekomendasi sistem');
        });
    }

    if (btnResetSelection) {
        btnResetSelection.addEventListener('click', function () {
            if (afterState) afterState.style.display = 'none';
            if (beforeState) beforeState.style.display = 'block';
            if (substituteSelect) substituteSelect.value = '';
            resetApproval();
        });
    }

    if (substituteSelect) {
        substituteSelect.addEventListener('change', function () {
            const chosenId = this.value;
            if (chosenId) {
                const chosenName = this.options[this.selectedIndex].getAttribute('data-name');
                enableApproval(chosenId, chosenName, 'advokat pengganti');
            } else if (afterState && afterState.style.display === 'block' && btnRunSelection) {
                enableApproval(
                    btnRunSelection.getAttribute('data-rec-id'),
                    btnRunSelection.getAttribute('data-rec-name'),
                    'rekomendasi sistem'
                );
            } else {
                resetApproval();
            }
        });
    }
});