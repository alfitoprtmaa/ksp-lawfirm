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

    // 2. TABEL KONSULTASI, SEARCH, FILTER & PAGINATION
    const allConsultations = window.ONLINE_CONSULTATIONS || [];
    const tbody = document.getElementById('consultationTableBody');
    const searchInput = document.getElementById('searchConsultationInput');
    const statusSelect = document.getElementById('statusFilterSelect');
    const paginationInfo = document.getElementById('paginationInfoText');
    const btnPrev = document.getElementById('btnPrevPage');
    const btnNext = document.getElementById('btnNextPage');

    const perPage = 4;
    let currentPage = 1;

    function getFilteredData() {
        const keyword = (searchInput?.value || '').trim().toLowerCase();
        const status = statusSelect?.value || 'all';

        return allConsultations.filter(item => {
            const matchKeyword = !keyword ||
                item.title.toLowerCase().includes(keyword) ||
                item.email.toLowerCase().includes(keyword) ||
                item.client_name.toLowerCase().includes(keyword);

            const matchStatus = status === 'all' || item.email_status === status;
            return matchKeyword && matchStatus;
        });
    }

    function openDetailModal(item) {
        const modal = document.getElementById('consultationDetailModal');
        if (!modal) return;

        document.getElementById('detailConsultTitle').textContent = item.title;
        document.getElementById('detailConsultClient').textContent = `${item.client_name} (${item.email})`;
        document.getElementById('detailConsultSchedule').textContent = `${item.consultation_date}, ${item.consultation_time}`;
        document.getElementById('detailConsultDuration').textContent = item.duration;
        document.getElementById('detailConsultEmailStatus').textContent = item.email_status;
        document.getElementById('detailConsultDesc').textContent = item.description || '-';

        const meetLinkEl = document.getElementById('detailConsultMeetLink');
        meetLinkEl.textContent = item.meet_link;
        meetLinkEl.href = item.meet_link;

        modal.classList.add('show');
        document.body.classList.add('modal-open');
    }

    function renderTable() {
        if (!tbody) return;
        const filtered = getFilteredData();
        const totalItems = filtered.length;
        const totalPages = Math.max(1, Math.ceil(totalItems / perPage));

        if (currentPage > totalPages) currentPage = totalPages;

        const startIdx = (currentPage - 1) * perPage;
        const pageItems = filtered.slice(startIdx, startIdx + perPage);

        tbody.innerHTML = '';

        if (pageItems.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" style="text-align:center; padding: 32px; color: #667085;">
                        Tidak ada data konsultasi yang sesuai dengan pencarian.
                    </td>
                </tr>
            `;
        } else {
            pageItems.forEach(item => {
                const badgeClass = item.email_status === 'Terkirim' ? 'badge-sent' : 'badge-pending';
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <span class="cell-primary">${item.title}</span>
                        <span class="cell-sub">${item.email}</span>
                    </td>
                    <td>
                        <span class="cell-primary">${item.consultation_date}</span>
                        <span class="cell-sub">${item.consultation_time}</span>
                    </td>
                    <td>${item.duration}</td>
                    <td>
                        <span class="email-badge ${badgeClass}">${item.email_status}</span>
                    </td>
                    <td class="text-right">
                        <button type="button" class="btn-view-detail">Lihat detail</button>
                    </td>
                `;

                tr.querySelector('.btn-view-detail').addEventListener('click', () => openDetailModal(item));
                tbody.appendChild(tr);
            });
        }

        const shownCount = pageItems.length;
        if (paginationInfo) {
            paginationInfo.textContent = `Menampilkan ${shownCount} dari ${totalItems} konsultasi`;
        }
        if (btnPrev) btnPrev.disabled = currentPage <= 1;
        if (btnNext) btnNext.disabled = currentPage >= totalPages;
    }

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            currentPage = 1;
            renderTable();
        });
    }

    if (statusSelect) {
        statusSelect.addEventListener('change', () => {
            currentPage = 1;
            renderTable();
        });
    }

    if (btnPrev) {
        btnPrev.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
    }

    if (btnNext) {
        btnNext.addEventListener('click', () => {
            currentPage++;
            renderTable();
        });
    }

    renderTable();

    // Tutup Modal Detail Konsultasi
    const detailModal = document.getElementById('consultationDetailModal');
    ['btnCloseConsultDetail', 'btnOkConsultDetail'].forEach(id => {
        const btn = document.getElementById(id);
        if (btn && detailModal) {
            btn.addEventListener('click', () => {
                detailModal.classList.remove('show');
                document.body.classList.remove('modal-open');
            });
        }
    });

    // 3. MODAL ATUR KETERSEDIAAN
    const availModal = document.getElementById('availabilityModal');
    const btnOpenAvail = document.getElementById('btnOpenAvailabilityModal');
    const btnCloseAvail = document.getElementById('btnCloseAvailabilityModal');
    const btnCancelAvail = document.getElementById('btnCancelAvailabilityModal');

    function openAvailModal() {
        if (!availModal) return;
        availModal.classList.add('show');
        document.body.classList.add('modal-open');
        recalculateSlots();
    }

    function closeAvailModal() {
        if (!availModal) return;
        availModal.classList.remove('show');
        document.body.classList.remove('modal-open');
    }

    if (btnOpenAvail) btnOpenAvail.addEventListener('click', openAvailModal);
    if (btnCloseAvail) btnCloseAvail.addEventListener('click', closeAvailModal);
    if (btnCancelAvail) btnCancelAvail.addEventListener('click', closeAvailModal);

    if (availModal) {
        availModal.addEventListener('click', (e) => {
            if (e.target === availModal) closeAvailModal();
        });
    }

    // Toggle Active State Kotak Hari (Sen - Min)
    const daysGrid = document.getElementById('daysSelectorGrid');
    if (daysGrid) {
        daysGrid.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', function () {
                const label = this.closest('.day-pill-option');
                if (label) label.classList.toggle('active', this.checked);
                recalculateSlots();
            });
        });
    }

    // Tambah & Hapus Rentang Waktu
    const timeRangesList = document.getElementById('timeRangesList');
    const btnAddTimeRange = document.getElementById('btnAddTimeRange');
    const durationSelect = document.getElementById('durationSelect');
    const slotSummaryPill = document.getElementById('slotSummaryPill');

    function bindRowEvents(row) {
        const removeBtn = row.querySelector('.btn-remove-range');
        if (removeBtn) {
            removeBtn.addEventListener('click', function () {
                if (timeRangesList.querySelectorAll('.time-range-row').length > 1) {
                    row.remove();
                    recalculateSlots();
                }
            });
        }
        row.querySelectorAll('select').forEach(sel => {
            sel.addEventListener('change', recalculateSlots);
        });
    }

    if (timeRangesList) {
        timeRangesList.querySelectorAll('.time-range-row').forEach(bindRowEvents);
    }

    if (btnAddTimeRange && timeRangesList) {
        btnAddTimeRange.addEventListener('click', function () {
            const row = document.createElement('div');
            row.className = 'time-range-row';
            row.innerHTML = `
                <div class="select-wrapper">
                    <select name="start_times[]" class="form-control time-start-select">
                        <option value="08:00">08.00</option>
                        <option value="09:00">09.00</option>
                        <option value="10:00">10.00</option>
                        <option value="13:00">13.00</option>
                        <option value="15:00" selected>15.00</option>
                        <option value="16:00">16.00</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <span class="range-sep">-</span>
                <div class="select-wrapper">
                    <select name="end_times[]" class="form-control time-end-select">
                        <option value="10:00">10.00</option>
                        <option value="11:00">11.00</option>
                        <option value="15:00">15.00</option>
                        <option value="16:00">16.00</option>
                        <option value="17:00" selected>17.00</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <button type="button" class="btn-remove-range">Hapus</button>
            `;
            timeRangesList.appendChild(row);
            bindRowEvents(row);
            recalculateSlots();
        });
    }

    if (durationSelect) {
        durationSelect.addEventListener('change', recalculateSlots);
    }

    function recalculateSlots() {
        if (!timeRangesList || !durationSelect || !slotSummaryPill) return;

        const duration = parseInt(durationSelect.value, 10) || 30;
        let totalSlots = 0;

        timeRangesList.querySelectorAll('.time-range-row').forEach(row => {
            const startVal = row.querySelector('.time-start-select')?.value || '09:00';
            const endVal = row.querySelector('.time-end-select')?.value || '11:00';
            const [sh, sm] = startVal.split(':').map(Number);
            const [eh, em] = endVal.split(':').map(Number);
            const diff = ((eh * 60) + em) - ((sh * 60) + sm);
            if (diff > 0) {
                totalSlots += Math.floor(diff / duration);
            }
        });

        const checkedDays = daysGrid
            ? Array.from(daysGrid.querySelectorAll('input:checked')).map(cb => cb.value)
            : ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'];

        let daysText = 'Belum ada hari dipilih';
        if (checkedDays.length === 1) {
            daysText = checkedDays[0];
        } else if (checkedDays.length > 1) {
            const first = checkedDays[0] === 'Sen' ? 'Senin' : checkedDays[0];
            const last = checkedDays[checkedDays.length - 1];
            daysText = `${first}–${last}`;
        }

        slotSummaryPill.textContent = `${totalSlots} slot per hari • ${daysText}`;
    }
});