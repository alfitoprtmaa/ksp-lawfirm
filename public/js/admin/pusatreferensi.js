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

    // 2. FILTER & PENCARIAN TABEL REFERENSI
    const searchInput = document.getElementById('searchRefInput');
    const catSelect = document.getElementById('filterRefCategory');
    const statusSelect = document.getElementById('filterRefStatus');
    const btnReset = document.getElementById('btnResetRefFilter');
    const tbody = document.getElementById('refTableBody');
    const showingText = document.getElementById('refShowingText');

    function filterRefTable() {
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
                ? `Menampilkan 1 – ${visible} dari 156 data`
                : 'Tidak ada dokumen referensi yang sesuai filter';
        }
    }

    [searchInput, catSelect, statusSelect].forEach(el => {
        if (el) {
            el.addEventListener('input', filterRefTable);
            el.addEventListener('change', filterRefTable);
        }
    });

    if (btnReset) {
        btnReset.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            if (catSelect) catSelect.value = 'all';
            if (statusSelect) statusSelect.value = 'all';
            filterRefTable();
        });
    }

    // 3. KONTROL MODAL UNIVERSAL
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

    document.getElementById('btnOpenAddDocModal')?.addEventListener('click', () => openModal('addDocModal'));

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

    // 4. SINKRONISASI CASE ID -> KATEGORI PERKARA (OTOMATIS)
    const addCaseSelect = document.getElementById('add_case_code');
    const addCategoryInput = document.getElementById('add_case_category');
    const addLawyerSelect = document.getElementById('add_lawyer_name');

    function syncAddCaseCategory() {
        if (!addCaseSelect || !addCategoryInput) return;
        const selectedOpt = addCaseSelect.options[addCaseSelect.selectedIndex];
        addCategoryInput.value = selectedOpt.getAttribute('data-category') || '';

        const defaultLawyer = selectedOpt.getAttribute('data-lawyer');
        if (defaultLawyer && addLawyerSelect) {
            addLawyerSelect.value = defaultLawyer;
        }
    }

    if (addCaseSelect) {
        addCaseSelect.addEventListener('change', syncAddCaseCategory);
        syncAddCaseCategory();
    }

    const editCaseSelect = document.getElementById('edit_case_code');
    const editCategoryInput = document.getElementById('edit_case_category');

    if (editCaseSelect && editCategoryInput) {
        editCaseSelect.addEventListener('change', function () {
            const opt = this.options[this.selectedIndex];
            editCategoryInput.value = opt.getAttribute('data-category') || '';
        });
    }

    // 5. DRAG & DROP / PILIH FILE DOKUMEN
    const dropzone = document.getElementById('docDropzone');
    const fileInput = document.getElementById('docFileInput');
    const filenameLabel = document.getElementById('selectedDocFilename');
    const hiddenDocName = document.getElementById('hiddenDocName');

    function updateSelectedFile(file) {
        if (!file) return;
        const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
        if (filenameLabel) {
            filenameLabel.textContent = `${file.name} (${sizeMB} MB)`;
            filenameLabel.classList.add('has-file');
        }
        if (hiddenDocName) {
            hiddenDocName.value = file.name;
        }
    }

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            updateSelectedFile(this.files?.[0]);
        });
    }

    if (dropzone) {
        ['dragenter', 'dragover'].forEach(ev => {
            dropzone.addEventListener(ev, (e) => {
                e.preventDefault();
                dropzone.classList.add('drag-over');
            });
        });

        ['dragleave', 'drop'].forEach(ev => {
            dropzone.addEventListener(ev, (e) => {
                e.preventDefault();
                dropzone.classList.remove('drag-over');
            });
        });

        dropzone.addEventListener('drop', (e) => {
            const file = e.dataTransfer?.files?.[0];
            if (file && fileInput) {
                const dt = new DataTransfer();
                dt.items.add(file);
                fileInput.files = dt.files;
                updateSelectedFile(file);
            }
        });
    }

    // 6. MODAL PRATINJAU & EDIT DOKUMEN
    document.querySelectorAll('.btn-preview-ref').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-ref') || '{}');
            if (!data.reference_id) return;

            document.getElementById('prevDocCategory').textContent = data.category || '-';
            document.getElementById('prevDocTitle').textContent = data.title || '-';
            document.getElementById('prevDocCase').textContent = `Case ID: ${data.case_code}`;
            document.getElementById('prevDocType').textContent = data.reference_type || '-';
            document.getElementById('prevDocLawyer').textContent = data.lawyer_name || '-';
            document.getElementById('prevDocDate').textContent = data.published_at || '-';
            document.getElementById('prevDocStatus').textContent = data.status || '-';
            document.getElementById('prevDocFilename').textContent = data.pdf_document || '-';
            document.getElementById('prevDocDesc').textContent = data.subtitle || '-';

            openModal('previewDocModal');
        });
    });

    const editForm = document.getElementById('editDocForm');
    document.querySelectorAll('.btn-edit-ref').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-ref') || '{}');
            if (!data.reference_id) return;

            if (editForm) editForm.action = `/admin/pusat-referensi/${data.reference_id}`;

            document.getElementById('edit_doc_title').value = data.title || '';
            document.getElementById('edit_case_code').value = data.case_code || 'PK-2023-001';
            document.getElementById('edit_case_category').value = data.category || '';
            document.getElementById('edit_ref_type').value = data.reference_type || 'Peraturan Perundang-undangan';
            document.getElementById('edit_lawyer_name').value = data.lawyer_name || 'Dewi Lestari';
            document.getElementById('edit_doc_date').value = data.raw_date || '';
            document.getElementById('edit_doc_status').value = data.status || 'Draf';
            document.getElementById('edit_doc_desc').value = data.subtitle || '';

            openModal('editDocModal');
        });
    });
});