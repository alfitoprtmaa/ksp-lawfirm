document.addEventListener('DOMContentLoaded', function () {
    // 1. SIDEBAR DROPDOWN & TOGGLE
    document.querySelectorAll('.nav-item.has-dropdown').forEach(trigger => {
        trigger.addEventListener('click', function () {
            const parent = this.closest('.nav-group');
            if (parent) parent.classList.toggle('open');
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

    // 2. HALAMAN KELOLA JADWAL (KALENDER & FILTER - DEFAULT HARI INI)
    const calendarGrid = document.getElementById('adminCalendarGrid');
    if (calendarGrid) {
        const schedules = window.ADMIN_SCHEDULES || [];
        const todayStr = window.ADMIN_TODAY_DATE || new Date().toISOString().slice(0, 10);
        const [initY, initM] = todayStr.split('-').map(Number);

        let currentYear = initY;
        let currentMonth = initM - 1; // 0-indexed
        let selectedDateStr = todayStr; // Default dipilih = hari ini

        const monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        const dayNamesFull = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        const searchInput = document.getElementById('filterSearchInput');
        const lawyerSelect = document.getElementById('filterLawyerSelect');
        const categorySelect = document.getElementById('filterCategorySelect');
        const monthSelect = document.getElementById('filterMonthSelect');
        const btnReset = document.getElementById('btnResetFilters');

        function formatDateStr(y, mZeroIdx, d) {
            return `${y}-${String(mZeroIdx + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
        }

        function syncMonthDropdown() {
            if (!monthSelect) return;
            const ym = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}`;
            if ([...monthSelect.options].some(opt => opt.value === ym)) {
                monthSelect.value = ym;
            }
        }

        function getCategoryPillClass(type) {
            switch (type) {
                case 'Sidang': return 'pill-blue';
                case 'Konsultasi': return 'pill-emerald';
                case 'Internal': return 'pill-amber';
                case 'Mediasi': return 'pill-amber';
                default: return 'pill-purple';
            }
        }

        function getFilteredSchedules() {
            const keyword = (searchInput?.value || '').trim().toLowerCase();
            const lawyerId = lawyerSelect?.value || 'all';
            const category = categorySelect?.value || 'all';

            return schedules.filter(item => {
                const matchKeyword = !keyword ||
                    item.event_title.toLowerCase().includes(keyword) ||
                    (item.case_code && item.case_code.toLowerCase().includes(keyword)) ||
                    (item.lawyer_name && item.lawyer_name.toLowerCase().includes(keyword));

                const matchLawyer = lawyerId === 'all' || String(item.lawyer_id) === lawyerId;
                const matchCategory = category === 'all' || item.event_type === category;

                return matchKeyword && matchLawyer && matchCategory;
            });
        }

        function openSingleDetailModal(ev, dateLabel) {
            const modal = document.getElementById('singleDetailModal');
            if (!modal) return;

            const badge = document.getElementById('modalCatBadge');
            badge.className = `pill-tag ${getCategoryPillClass(ev.event_type)}`;
            badge.textContent = ev.event_type;

            document.getElementById('modalEvTitle').textContent = ev.event_title;
            document.getElementById('modalEvDate').textContent = dateLabel;
            document.getElementById('modalEvTime').textContent = `${ev.start_time_label} – ${ev.end_time_label} WIB`;
            document.getElementById('modalEvLawyer').textContent = ev.lawyer_name;
            document.getElementById('modalEvLocation').textContent = ev.location;
            document.getElementById('modalEvCase').textContent = ev.case_code || '-';
            document.getElementById('modalEvDesc').textContent = ev.description || '-';

            modal.classList.add('show');
        }

        const btnCloseDetailModal = document.getElementById('btnCloseDetailModal');
        const singleDetailModal = document.getElementById('singleDetailModal');
        if (btnCloseDetailModal && singleDetailModal) {
            btnCloseDetailModal.addEventListener('click', () => singleDetailModal.classList.remove('show'));
            singleDetailModal.addEventListener('click', (e) => {
                if (e.target === singleDetailModal) singleDetailModal.classList.remove('show');
            });
        }

        function renderRightDayPanel(dateStr) {
            const [y, m, d] = dateStr.split('-').map(Number);
            const dateObj = new Date(y, m - 1, d);
            const headingLabel = `${dayNamesFull[dateObj.getDay()]}, ${d} ${monthNames[m - 1]}`;
            const fullDateLabel = `${headingLabel} ${y}`;
            const isToday = dateStr === todayStr;

            document.getElementById('selectedDayTitle').textContent = headingLabel;

            const dayEvents = getFilteredSchedules().filter(ev => ev.date === dateStr);
            document.getElementById('selectedDaySubtitle').textContent = isToday
                ? `${dayEvents.length} agenda hari ini untuk tim lawyer`
                : `${dayEvents.length} agenda untuk tim lawyer`;

            const listContainer = document.getElementById('dayAgendaList');
            listContainer.innerHTML = '';

            if (dayEvents.length === 0) {
                listContainer.innerHTML = `
                    <div class="empty-day-box">
                        <i class='bx bx-calendar-x'></i>
                        <h4>${isToday ? 'Tidak ada agenda hari ini' : 'Tidak ada agenda'}</h4>
                        <p>Belum ada jadwal yang dijadwalkan pada tanggal ini.</p>
                    </div>
                `;
                return;
            }

            dayEvents.forEach(ev => {
                const card = document.createElement('div');
                card.className = 'agenda-item-card';
                card.innerHTML = `
                    <div class="agenda-time">${ev.start_time_label} – ${ev.end_time_label}</div>
                    <div class="agenda-title">${ev.event_title}</div>
                    <div class="agenda-lawyer">${ev.lawyer_name}</div>
                    <div class="agenda-sub">${ev.sub_info}</div>
                    <div class="agenda-card-bottom">
                        <span class="pill-tag ${getCategoryPillClass(ev.event_type)}">${ev.event_type}</span>
                        <button type="button" class="btn-detail-link">
                            <span>Detail</span>
                            <i class='bx bx-right-arrow-alt'></i>
                        </button>
                    </div>
                `;

                card.querySelector('.btn-detail-link').addEventListener('click', () => {
                    openSingleDetailModal(ev, fullDateLabel);
                });

                listContainer.appendChild(card);
            });
        }

        function renderCalendar() {
            document.getElementById('calendarMonthTitle').textContent = `${monthNames[currentMonth]} ${currentYear}`;
            syncMonthDropdown();
            calendarGrid.innerHTML = '';

            const rawFirstDay = new Date(currentYear, currentMonth, 1).getDay();
            const startOffset = rawFirstDay === 0 ? 6 : rawFirstDay - 1;

            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();
            const filtered = getFilteredSchedules();

            const monthPrefix = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}`;
            const monthEventsCount = filtered.filter(ev => ev.date.startsWith(monthPrefix)).length;
            document.getElementById('calendarAgendaCount').textContent = `${monthEventsCount} agenda`;

            for (let i = startOffset - 1; i >= 0; i--) {
                const prevDay = daysInPrevMonth - i;
                const prevM = currentMonth === 0 ? 11 : currentMonth - 1;
                const prevY = currentMonth === 0 ? currentYear - 1 : currentYear;
                calendarGrid.appendChild(createDayCell(prevDay, formatDateStr(prevY, prevM, prevDay), true, filtered));
            }

            for (let day = 1; day <= daysInMonth; day++) {
                calendarGrid.appendChild(createDayCell(day, formatDateStr(currentYear, currentMonth, day), false, filtered));
            }

            const totalRendered = startOffset + daysInMonth;
            const remaining = totalRendered <= 35 ? 35 - totalRendered : 42 - totalRendered;
            for (let nextDay = 1; nextDay <= remaining; nextDay++) {
                const nextM = currentMonth === 11 ? 0 : currentMonth + 1;
                const nextY = currentMonth === 11 ? currentYear + 1 : currentYear;
                calendarGrid.appendChild(createDayCell(nextDay, formatDateStr(nextY, nextM, nextDay), true, filtered));
            }
        }

        function createDayCell(dayNum, dateStr, isOtherMonth, filteredEvents) {
            const cell = document.createElement('div');
            cell.className = 'cal-day-cell';
            if (isOtherMonth) cell.classList.add('other-month');
            if (dateStr === todayStr) cell.classList.add('today-day');
            if (dateStr === selectedDateStr) cell.classList.add('selected-day');

            const numSpan = document.createElement('span');
            numSpan.className = 'cal-day-number';
            numSpan.textContent = dayNum;
            cell.appendChild(numSpan);

            const dayEvents = filteredEvents.filter(ev => ev.date === dateStr);
            if (dayEvents.length > 0) {
                const firstEv = dayEvents[0];
                const pill = document.createElement('div');
                pill.className = `cal-event-pill ${getCategoryPillClass(firstEv.event_type)}`;
                pill.innerHTML = `
                    <strong>${firstEv.start_time_label} · ${firstEv.event_type}</strong>
                    <span>${firstEv.lawyer_short}</span>
                `;
                cell.appendChild(pill);

                if (dayEvents.length > 1) {
                    const moreNote = document.createElement('div');
                    moreNote.className = 'more-agenda-note';
                    moreNote.textContent = `+${dayEvents.length - 1} agenda lainnya`;
                    cell.appendChild(moreNote);
                }
            }

            cell.addEventListener('click', () => {
                selectedDateStr = dateStr;
                renderCalendar();
                renderRightDayPanel(selectedDateStr);
            });

            return cell;
        }

        document.getElementById('btnPrevMonth').addEventListener('click', () => {
            if (currentMonth === 0) { currentMonth = 11; currentYear--; } else { currentMonth--; }
            renderCalendar();
        });

        document.getElementById('btnNextMonth').addEventListener('click', () => {
            if (currentMonth === 11) { currentMonth = 0; currentYear++; } else { currentMonth++; }
            renderCalendar();
        });

        document.getElementById('btnToday').addEventListener('click', () => {
            currentYear = initY;
            currentMonth = initM - 1;
            selectedDateStr = todayStr;
            renderCalendar();
            renderRightDayPanel(selectedDateStr);
        });

        [searchInput, lawyerSelect, categorySelect].forEach(el => {
            if (el) {
                el.addEventListener('input', () => { renderCalendar(); renderRightDayPanel(selectedDateStr); });
                el.addEventListener('change', () => { renderCalendar(); renderRightDayPanel(selectedDateStr); });
            }
        });

        if (monthSelect) {
            monthSelect.addEventListener('change', function () {
                const [y, m] = this.value.split('-').map(Number);
                currentYear = y;
                currentMonth = m - 1;
                renderCalendar();
            });
        }

        if (btnReset) {
            btnReset.addEventListener('click', () => {
                if (searchInput) searchInput.value = '';
                if (lawyerSelect) lawyerSelect.value = 'all';
                if (categorySelect) categorySelect.value = 'all';
                currentYear = initY;
                currentMonth = initM - 1;
                selectedDateStr = todayStr;
                renderCalendar();
                renderRightDayPanel(selectedDateStr);
            });
        }

        // Inisialisasi awal: langsung tampilkan bulan & tanggal hari ini
        renderCalendar();
        renderRightDayPanel(selectedDateStr);
    }

    // 3. HALAMAN TAMBAH JADWAL (PILIH LAWYER & UPDATE COUNTER)
    const lawyerChecklist = document.getElementById('lawyerChecklist');
    if (lawyerChecklist) {
        const checkboxes = lawyerChecklist.querySelectorAll('.lawyer-checkbox');
        const countLabel = document.getElementById('selectedLawyerCountLabel');
        const footerSummary = document.getElementById('footerSelectedSummary');
        const lawyerSearchInput = document.getElementById('lawyerSearchInput');

        const dateInput = document.getElementById('schedule_date');
        const startSelect = document.getElementById('start_time');
        const endSelect = document.getElementById('end_time');
        const availabilityLabel = document.getElementById('availabilitySubLabel');

        function updateSelectedCounter() {
            let count = 0;
            checkboxes.forEach(cb => {
                const card = cb.closest('.lawyer-option-card');
                if (cb.checked) {
                    count++;
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
            });

            if (countLabel) countLabel.textContent = `${count} lawyer dipilih`;
            if (footerSummary) footerSummary.textContent = `Jadwal akan ditambahkan untuk ${count} lawyer terpilih.`;
        }

        function updateAvailabilityText() {
            if (!dateInput || !startSelect || !endSelect || !availabilityLabel) return;
            const shortMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const parts = dateInput.value.split('-');
            if (parts.length === 3) {
                const d = parseInt(parts[2], 10);
                const m = shortMonths[parseInt(parts[1], 10) - 1] || '';
                availabilityLabel.textContent = `Ketersediaan: ${d} ${m}, ${startSelect.value}–${endSelect.value}`;
            }
        }

        checkboxes.forEach(cb => cb.addEventListener('change', updateSelectedCounter));
        [dateInput, startSelect, endSelect].forEach(el => {
            if (el) el.addEventListener('change', updateAvailabilityText);
        });

        if (lawyerSearchInput) {
            lawyerSearchInput.addEventListener('input', function () {
                const q = this.value.trim().toLowerCase();
                lawyerChecklist.querySelectorAll('.lawyer-option-card').forEach(card => {
                    const text = card.getAttribute('data-search') || '';
                    card.style.display = text.includes(q) ? 'flex' : 'none';
                });
            });
        }

        updateSelectedCounter();
        updateAvailabilityText();
    }
});