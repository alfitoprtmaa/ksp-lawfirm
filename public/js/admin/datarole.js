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

    // 2. SEARCH & FILTER TABEL ROLE
    const searchInput = document.getElementById('searchRoleInput');
    const statusSelect = document.getElementById('filterRoleStatusSelect');
    const btnReset = document.getElementById('btnResetRoleFilter');
    const tbody = document.getElementById('rolesTableBody');
    const showingText = document.getElementById('roleShowingText');

    function filterRolesTable() {
        if (!tbody) return;
        const keyword = (searchInput?.value || '').trim().toLowerCase();
        const status = statusSelect?.value || 'all';
        const rows = tbody.querySelectorAll('tr');
        let visible = 0;

        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            const rowStatus = row.getAttribute('data-status') || '';
            const matchKeyword = !keyword || text.includes(keyword);
            const matchStatus = status === 'all' || rowStatus === status;

            if (matchKeyword && matchStatus) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        if (showingText) {
            showingText.textContent = visible > 0
                ? `Menampilkan 1–${visible} dari ${rows.length} role`
                : 'Tidak ada role yang sesuai filter';
        }
    }

    [searchInput, statusSelect].forEach(el => {
        if (el) {
            el.addEventListener('input', filterRolesTable);
            el.addEventListener('change', filterRolesTable);
        }
    });

    if (btnReset) {
        btnReset.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            if (statusSelect) statusSelect.value = 'all';
            filterRolesTable();
        });
    }

    // 3. KONTROL MODAL TAMBAH & EDIT ROLE
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

    const btnOpenAdd = document.getElementById('btnOpenAddRoleModal');
    if (btnOpenAdd) {
        btnOpenAdd.addEventListener('click', () => openModal('addRoleModal'));
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

    // Toggle class .checked pada kartu Hak Akses
    document.querySelectorAll('.perm-checkbox').forEach(cb => {
        cb.addEventListener('change', function () {
            const card = this.closest('.permission-card');
            if (card) card.classList.toggle('checked', this.checked);
        });
    });

    // 4. KLIK BARIS TABEL -> BUKA MODAL EDIT ROLE
    const editForm = document.getElementById('editRoleForm');
    const deleteForm = document.getElementById('deleteRoleForm');
    const btnTriggerDelete = document.getElementById('btnTriggerDeleteRole');
    let currentEditingRole = null;

    document.querySelectorAll('.role-row-clickable').forEach(row => {
        row.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-role') || '{}');
            if (!data.role_code) return;

            currentEditingRole = data;

            if (editForm) editForm.action = `/admin/role/${data.role_code}`;
            if (deleteForm) deleteForm.action = `/admin/role/${data.role_code}`;

            document.getElementById('edit_role_code').value = data.role_code;
            document.getElementById('edit_role_name').value = data.role_name || '';
            document.getElementById('edit_role_status').value = data.status || 'Aktif';
            document.getElementById('edit_role_desc').value = data.description || '';

            const perms = data.permissions || [];
            document.querySelectorAll('#editPermissionsGrid .perm-checkbox').forEach(cb => {
                const isChecked = perms.includes(cb.value);
                cb.checked = isChecked;
                const card = cb.closest('.permission-card');
                if (card) card.classList.toggle('checked', isChecked);
            });

            openModal('editRoleModal');
        });
    });

    if (btnTriggerDelete && deleteForm) {
        btnTriggerDelete.addEventListener('click', function () {
            if (!currentEditingRole) return;
            if (confirm(`Apakah Anda yakin ingin menghapus role ${currentEditingRole.role_name} (${currentEditingRole.role_code})?`)) {
                deleteForm.submit();
            }
        });
    }
});