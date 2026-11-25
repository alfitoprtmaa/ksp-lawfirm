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

    // 2. FILTER & PENCARIAN TABEL ADVOKAT
    const searchInput = document.getElementById('searchLawyerInput');
    const specSelect = document.getElementById('filterSpecSelect');
    const statusSelect = document.getElementById('filterStatusSelect');
    const btnReset = document.getElementById('btnResetLawyerFilter');
    const tbody = document.getElementById('lawyersTableBody');
    const showingText = document.getElementById('lawyerShowingText');

    function filterLawyersTable() {
        if (!tbody) return;
        const keyword = (searchInput?.value || '').trim().toLowerCase();
        const spec = specSelect?.value || 'all';
        const status = statusSelect?.value || 'all';

        const rows = tbody.querySelectorAll('tr');
        let visible = 0;

        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            const rowSpec = row.getAttribute('data-spec') || '';
            const rowStatus = row.getAttribute('data-status') || '';

            const matchKeyword = !keyword || text.includes(keyword);
            const matchSpec = spec === 'all' || rowSpec === spec;
            const matchStatus = status === 'all' || rowStatus === status;

            if (matchKeyword && matchSpec && matchStatus) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        if (showingText) {
            showingText.textContent = visible > 0
                ? `Menampilkan 1–${visible} dari 42 data`
                : 'Tidak ada data advokat yang sesuai';
        }
    }

    [searchInput, specSelect, statusSelect].forEach(el => {
        if (el) {
            el.addEventListener('input', filterLawyersTable);
            el.addEventListener('change', filterLawyersTable);
        }
    });

    if (btnReset) {
        btnReset.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            if (specSelect) specSelect.value = 'all';
            if (statusSelect) statusSelect.value = 'all';
            filterLawyersTable();
        });
    }

    // 3. KONTROL MODAL (TAMBAH & EDIT ADVOKAT)
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.classList.add('show');
        document.body.classList.add('modal-open');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.classList.remove('show');
        document.body.classList.remove('modal-open');
    }

    const btnOpenAdd = document.getElementById('btnOpenAddLawyerModal');
    if (btnOpenAdd) {
        btnOpenAdd.addEventListener('click', () => openModal('addLawyerModal'));
    }

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

    // 4. POPULATE DATA KE MODAL EDIT ADVOKAT
    const editForm = document.getElementById('editLawyerForm');
    const editPhotoPreview = document.getElementById('editPhotoPreview');
    const editPicker = document.getElementById('editArticlePicker');

    document.querySelectorAll('.btn-icon-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-lawyer') || '{}');
            if (!data.lawyer_id) return;

            if (editForm) {
                editForm.action = `/admin/advokat/${data.lawyer_id}`;
            }

            document.getElementById('edit_full_name').value = data.full_name || '';
            document.getElementById('edit_nia').value = data.nia || '';
            document.getElementById('edit_specialization').value = data.specialization || 'Hukum Perdata';
            document.getElementById('edit_self_description').value = data.self_description || '';
            document.getElementById('edit_linkedin_url').value = data.linkedin_url || '';

            if (editPhotoPreview) {
                editPhotoPreview.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(data.full_name || 'Adv')}&background=6B2130&color=fff`;
            }

            // Set Radio Role Pengguna
            document.querySelectorAll('#editLawyerModal input[name="role_name"]').forEach(radio => {
                radio.checked = (radio.value === (data.role_name || 'Lawyer'));
            });

            // Set Checkbox Artikel Terkait
            const selectedArticles = data.article_ids || [];
            if (editPicker) {
                editPicker.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                    cb.checked = selectedArticles.includes(parseInt(cb.value, 10));
                });
                updatePickerLabel(editPicker);
            }

            openModal('editLawyerModal');
        });
    });

    // 5. PREVIEW UPLOAD FOTO PROFIL
    document.querySelectorAll('.hidden-file-input').forEach(input => {
        input.addEventListener('change', function () {
            const file = this.files?.[0];
            const previewId = this.getAttribute('data-preview');
            const previewEl = document.getElementById(previewId);

            if (file && previewEl) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewEl.src = e.target.result;
                    previewEl.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // 6. MULTI-ARTICLE DROPDOWN PICKER
    function updatePickerLabel(pickerEl) {
        const trigger = pickerEl.querySelector('.picker-trigger');
        const labelSpan = pickerEl.querySelector('.picker-placeholder');
        const checked = pickerEl.querySelectorAll('input[type="checkbox"]:checked');

        if (checked.length === 0) {
            labelSpan.textContent = 'Pilih artikel yang sudah didaftarkan';
            trigger.classList.remove('has-selected');
        } else {
            labelSpan.textContent = `${checked.length} artikel dipilih`;
            trigger.classList.add('has-selected');
        }
    }

    document.querySelectorAll('.multi-article-picker').forEach(picker => {
        const trigger = picker.querySelector('.picker-trigger');
        trigger.addEventListener('click', function (e) {
            e.stopPropagation();
            picker.classList.toggle('open');
        });

        picker.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', () => updatePickerLabel(picker));
        });
    });

    document.addEventListener('click', function (e) {
        document.querySelectorAll('.multi-article-picker.open').forEach(picker => {
            if (!picker.contains(e.target)) {
                picker.classList.remove('open');
            }
        });
    });
});