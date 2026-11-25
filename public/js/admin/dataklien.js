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

    // 2. FILTER & PENCARIAN TABEL KLIEN
    const searchInput = document.getElementById('searchClientInput');
    const statusSelect = document.getElementById('filterClientStatus');
    const btnApply = document.getElementById('btnApplyClientFilter');
    const tbody = document.getElementById('clientsTableBody');
    const showingText = document.getElementById('clientShowingText');

    function filterClientsTable() {
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
                ? `Menampilkan 1–${visible} dari 24 klien`
                : 'Tidak ada klien yang sesuai filter';
        }
    }

    if (searchInput) searchInput.addEventListener('input', filterClientsTable);
    if (btnApply) btnApply.addEventListener('click', filterClientsTable);
    if (statusSelect) statusSelect.addEventListener('change', filterClientsTable);

    // 3. KLIK "ATUR AKUN & ROLE" -> UPDATE PANEL BAWAH
    const roleEditorHeading = document.getElementById('roleEditorHeading');
    const updateRoleForm = document.getElementById('updateClientRoleForm');
    const editorAccountStatus = document.getElementById('editorAccountStatus');
    const roleEditorSection = document.getElementById('roleEditorSection');

    document.querySelectorAll('.btn-manage-account').forEach(btn => {
        btn.addEventListener('click', function () {
            const client = JSON.parse(this.getAttribute('data-client') || '{}');
            if (!client.customer_id) return;

            // Highlight baris terpilih
            if (tbody) {
                tbody.querySelectorAll('tr').forEach(r => r.classList.remove('selected-client-row'));
                this.closest('tr')?.classList.add('selected-client-row');
            }

            if (roleEditorHeading) {
                roleEditorHeading.textContent = `Atur role — ${client.full_name}`;
            }

            if (updateRoleForm) {
                updateRoleForm.action = `/admin/klien/${client.customer_id}/role`;

                updateRoleForm.querySelectorAll('input[name="role_name"]').forEach(radio => {
                    const isMatch = radio.value === client.role_name;
                    radio.checked = isMatch;
                    radio.closest('.role-option-box')?.classList.toggle('selected', isMatch);
                });
            }

            if (editorAccountStatus) {
                editorAccountStatus.value = client.account_status || 'Aktif';
            }

            roleEditorSection?.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });

    // Sync highlight kotak radio saat diklik
    document.querySelectorAll('.role-option-box input[type="radio"], .role-radio-pill input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const container = this.closest('.role-options-grid, .role-radio-row');
            if (container) {
                container.querySelectorAll('label').forEach(lbl => lbl.classList.remove('selected'));
            }
            this.closest('label')?.classList.add('selected');
        });
    });

    // 4. TOGGLE LIHAT / SEMBUNYIKAN KATA SANDI (HALAMAN DAFTARKAN AKUN)
    const btnTogglePass = document.getElementById('btnTogglePassword');
    const passwordInput = document.getElementById('password');

    if (btnTogglePass && passwordInput) {
        btnTogglePass.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            this.innerHTML = isPassword ? "<i class='bx bx-hide'></i>" : "<i class='bx bx-show'></i>";
        });
    }
});