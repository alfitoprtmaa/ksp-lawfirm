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

    // 2. KONTROL MODAL UNIVERSAL
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

    document.getElementById('btnOpenAddPaModal')?.addEventListener('click', () => openModal('addPaModal'));
    document.getElementById('btnOpenAddLsModal')?.addEventListener('click', () => openModal('addLsModal'));

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

    const deleteForm = document.getElementById('deleteServiceItemForm');

    // 3. HELPER RENDER TABEL + SEARCH + FILTER + PAGINATION
    function setupServiceTable(config) {
        const tbody = document.getElementById(config.tbodyId);
        const searchInput = document.getElementById(config.searchId);
        const statusSelect = document.getElementById(config.statusId);
        const showingText = document.getElementById(config.showingId);
        const paginationWrap = document.getElementById(config.paginationId);

        const perPage = 5;
        let currentPage = 1;

        function getFiltered() {
            const kw = (searchInput?.value || '').trim().toLowerCase();
            const st = statusSelect?.value || 'all';

            return config.data.filter(item => {
                const name = (item[config.nameKey] || '').toLowerCase();
                const matchKw = !kw || name.includes(kw);
                const matchSt = st === 'all' || item.status === st;
                return matchKw && matchSt;
            });
        }

        function renderPagination(totalPages) {
            if (!paginationWrap) return;
            paginationWrap.innerHTML = '';

            const prevBtn = document.createElement('button');
            prevBtn.type = 'button';
            prevBtn.className = 'page-btn';
            prevBtn.innerHTML = "<i class='bx bx-chevron-left'></i>";
            prevBtn.disabled = currentPage <= 1;
            prevBtn.addEventListener('click', () => { currentPage--; render(); });
            paginationWrap.appendChild(prevBtn);

            for (let p = 1; p <= totalPages; p++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = `page-btn ${p === currentPage ? 'active' : ''}`;
                btn.textContent = p;
                btn.addEventListener('click', () => { currentPage = p; render(); });
                paginationWrap.appendChild(btn);
            }

            const nextBtn = document.createElement('button');
            nextBtn.type = 'button';
            nextBtn.className = 'page-btn';
            nextBtn.innerHTML = "<i class='bx bx-chevron-right'></i>";
            nextBtn.disabled = currentPage >= totalPages;
            nextBtn.addEventListener('click', () => { currentPage++; render(); });
            paginationWrap.appendChild(nextBtn);
        }

        function render() {
            if (!tbody) return;
            const filtered = getFiltered();
            const totalFiltered = filtered.length;
            const totalPages = Math.max(1, Math.ceil(totalFiltered / perPage));
            if (currentPage > totalPages) currentPage = totalPages;

            const startIdx = (currentPage - 1) * perPage;
            const pageItems = filtered.slice(startIdx, startIdx + perPage);

            tbody.innerHTML = '';

            if (pageItems.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" style="text-align:center; padding: 28px; color: #667085;">
                            Tidak ada data ${config.labelSingular} yang sesuai.
                        </td>
                    </tr>
                `;
            } else {
                pageItems.forEach(item => {
                    const orderFormatted = String(item.order).padStart(2, '0');
                    const statusClass = item.status === 'Aktif' ? 'status-active' : 'status-inactive';
                    const idVal = item[config.idKey];
                    const nameVal = item[config.nameKey];

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td class="col-order">${orderFormatted}</td>
                        <td class="col-name">${nameVal}</td>
                        <td class="col-status">
                            <span class="status-pill ${statusClass}">${item.status}</span>
                        </td>
                        <td class="col-action text-right">
                            <div class="row-action-group">
                                <button type="button" class="btn-table-edit">Edit</button>
                                <button type="button" class="btn-table-delete">Hapus</button>
                            </div>
                        </td>
                    `;

                    tr.querySelector('.btn-table-edit').addEventListener('click', () => config.onEdit(item));
                    tr.querySelector('.btn-table-delete').addEventListener('click', () => {
                        if (deleteForm && confirm(`Hapus ${config.labelSingular} "${nameVal}"?`)) {
                            deleteForm.action = `${config.deleteUrlBase}/${idVal}`;
                            deleteForm.submit();
                        }
                    });

                    tbody.appendChild(tr);
                });
            }

            if (showingText) {
                const fromNum = totalFiltered === 0 ? 0 : startIdx + 1;
                const toNum = startIdx + pageItems.length;
                const displayTotal = config.overrideTotal && !searchInput?.value && statusSelect?.value === 'all'
                    ? config.overrideTotal
                    : totalFiltered;
                showingText.textContent = `Menampilkan ${fromNum}–${toNum} dari ${displayTotal} ${config.labelSingular}`;
            }

            renderPagination(totalPages);
        }

        searchInput?.addEventListener('input', () => { currentPage = 1; render(); });
        statusSelect?.addEventListener('change', () => { currentPage = 1; render(); });

        render();
    }

    // 4. INISIALISASI TABEL PRACTICING AREA
    setupServiceTable({
        data: window.PRACTICING_AREAS_DATA || [],
        idKey: 'legal_field_id',
        nameKey: 'field_name',
        labelSingular: 'practicing area',
        overrideTotal: window.PA_TOTAL_DISPLAY || null,
        tbodyId: 'paTableBody',
        searchId: 'searchPaInput',
        statusId: 'filterPaStatus',
        showingId: 'paShowingText',
        paginationId: 'paPaginationControls',
        deleteUrlBase: '/admin/layanan/practicing-area',
        onEdit: function (item) {
            const form = document.getElementById('editPaForm');
            if (form) form.action = `/admin/layanan/practicing-area/${item.legal_field_id}`;
            document.getElementById('edit_pa_name').value = item.field_name || '';
            document.getElementById('edit_pa_order').value = item.order || 1;
            document.getElementById('edit_pa_status').value = item.status || 'Aktif';
            document.getElementById('edit_pa_desc').value = item.description || '';
            openModal('editPaModal');
        },
    });

    // 5. INISIALISASI TABEL LEGAL SERVICE
    setupServiceTable({
        data: window.LEGAL_SERVICES_DATA || [],
        idKey: 'category_id',
        nameKey: 'category_name',
        labelSingular: 'legal service',
        overrideTotal: null,
        tbodyId: 'lsTableBody',
        searchId: 'searchLsInput',
        statusId: 'filterLsStatus',
        showingId: 'lsShowingText',
        paginationId: 'lsPaginationControls',
        deleteUrlBase: '/admin/layanan/legal-service',
        onEdit: function (item) {
            const form = document.getElementById('editLsForm');
            if (form) form.action = `/admin/layanan/legal-service/${item.category_id}`;
            document.getElementById('edit_ls_name').value = item.category_name || '';
            document.getElementById('edit_ls_order').value = item.order || 1;
            document.getElementById('edit_ls_status').value = item.status || 'Aktif';
            document.getElementById('edit_ls_desc').value = item.description || '';
            openModal('editLsModal');
        },
    });
});