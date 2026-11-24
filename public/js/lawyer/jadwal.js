document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Sidebar Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.querySelector('.sidebar');

    if (mobileMenuBtn && sidebar) {
        mobileMenuBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            sidebar.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    }

    // 2. Modal Tambah Jadwal & Toggle Input "Lainnya"
    const scheduleModal = document.getElementById('addScheduleModal');
    const btnOpenModal = document.getElementById('btnOpenScheduleModal');
    const btnCloseModal = document.getElementById('btnCloseScheduleModal');
    const btnCancelModal = document.getElementById('btnCancelScheduleModal');
    const customActivityGroup = document.getElementById('customActivityGroup');
    const customActivityInput = document.getElementById('custom_event_type');
    const typeRadios = document.querySelectorAll('input[name="event_type"]');

    function openScheduleModal() {
        scheduleModal.classList.add('show');
        scheduleModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    }

    function closeScheduleModal() {
        scheduleModal.classList.remove('show');
        scheduleModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    }

    if (btnOpenModal) btnOpenModal.addEventListener('click', openScheduleModal);
    if (btnCloseModal) btnCloseModal.addEventListener('click', closeScheduleModal);
    if (btnCancelModal) btnCancelModal.addEventListener('click', closeScheduleModal);

    if (scheduleModal) {
        scheduleModal.addEventListener('click', function (e) {
            if (e.target === scheduleModal) closeScheduleModal();
        });
    }

    typeRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'Lainnya') {
                customActivityGroup.classList.remove('hidden');
                customActivityInput.setAttribute('required', 'required');
                customActivityInput.focus();
            } else {
                customActivityGroup.classList.add('hidden');
                customActivityInput.removeAttribute('required');
            }
        });
    });

    // 3. Kalender & Panel Rincian Jadwal (Default ke Hari Ini)
    const schedules = window.SCHEDULE_DATA || [];
    const todayStr = window.TODAY_DATE_STR || new Date().toISOString().slice(0, 10);

    // Parse tanggal hari ini (YYYY-MM-DD)
    const [initYear, initMonth, initDay] = todayStr.split('-').map(Number);
    let currentYear = initYear;
    let currentMonth = initMonth - 1; // 0-indexed (0 = Jan, 10 = Nov)
    let selectedDateStr = todayStr; // Default dipilih = hari ini
    let activeCategoryFilter = 'all';

    const monthNames = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    const dayNamesShort = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    const dayNamesFull = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    const calendarGrid = document.getElementById('calendarGrid');
    const calendarMonthLabel = document.getElementById('calendarMonthLabel');
    const categorySelect = document.getElementById('categoryFilterSelect');

    function formatDateStr(year, monthZeroIdx, day) {
        const m = String(monthZeroIdx + 1).padStart(2, '0');
        const d = String(day).padStart(2, '0');
        return `${year}-${m}-${d}`;
    }

    function parseLocalDate(dateStr) {
        const [y, m, d] = dateStr.split('-').map(Number);
        return new Date(y, m - 1, d);
    }

    function getFilteredSchedules() {
        if (activeCategoryFilter === 'all') return schedules;
        return schedules.filter(item => item.event_type === activeCategoryFilter);
    }

    function getPillColorClass(eventType) {
        switch (eventType) {
            case 'Sidang':
                return { pill: 'event-blue', dot: 'dot-blue', badge: 'badge-blue-light' };
            case 'Konsultasi':
                return { pill: 'event-green', dot: 'dot-green', badge: 'badge-green-light' };
            case 'Internal':
                return { pill: 'event-yellow', dot: 'dot-yellow', badge: 'badge-yellow-light' };
            case 'Mediasi':
            case 'Lainnya':
            default:
                return { pill: 'event-purple', dot: 'dot-purple', badge: 'badge-purple-light' };
        }
    }

    function renderEventDetail(eventObj, fullDateLabel) {
        const colors = getPillColorClass(eventObj.event_type);
        const badgeEl = document.getElementById('detailBadgeType');
        badgeEl.className = `badge ${colors.badge}`;
        badgeEl.textContent = eventObj.event_type;

        document.getElementById('detailEventTitle').textContent = eventObj.event_title;
        document.getElementById('detailFullDate').textContent = fullDateLabel;
        document.getElementById('detailTimeRange').textContent = `${eventObj.start_time_label} - ${eventObj.end_time_label}`;
        document.getElementById('detailCaseId').textContent = eventObj.case_code || '-';
        document.getElementById('detailLocation').textContent = eventObj.location || '-';
        document.getElementById('detailAgendaType').textContent = eventObj.agenda_label || eventObj.event_type;
        document.getElementById('detailDescription').textContent = eventObj.description || 'Tidak ada catatan tambahan.';
    }

    function renderAgendaPanel(dateStr) {
        const dateObj = parseLocalDate(dateStr);
        const dayShort = dayNamesShort[dateObj.getDay()];
        const dayFull = dayNamesFull[dateObj.getDay()];
        const dayNum = dateObj.getDate();
        const monthName = monthNames[dateObj.getMonth()];
        const yearNum = dateObj.getFullYear();

        const isToday = dateStr === todayStr;
        const shortHeading = `${dayShort}, ${dayNum} ${monthName} ${yearNum}`;
        const fullDateLabel = `${dayFull}, ${dayNum} ${monthName} ${yearNum}`;

        document.getElementById('agendaSelectedDateHeading').textContent = shortHeading;

        const dayEvents = getFilteredSchedules().filter(ev => ev.date === dateStr);
        const countText = isToday
            ? `${dayEvents.length} agenda hari ini`
            : `${dayEvents.length} agenda pada tanggal ini`;
        document.getElementById('agendaCountSubtitle').textContent = countText;

        const emptyBox = document.getElementById('agendaEmptyState');
        const filledBox = document.getElementById('agendaFilledContainer');
        const timelineList = document.getElementById('agendaTimelineList');

        if (dayEvents.length === 0) {
            emptyBox.style.display = 'block';
            filledBox.style.display = 'none';
            document.getElementById('emptyStateTitle').textContent = isToday
                ? 'Tidak ada jadwal di hari ini'
                : 'Tidak ada jadwal pada tanggal ini';
            return;
        }

        emptyBox.style.display = 'none';
        filledBox.style.display = 'block';
        timelineList.innerHTML = '';

        dayEvents.forEach((ev, idx) => {
            const colors = getPillColorClass(ev.event_type);
            const item = document.createElement('div');
            item.className = `timeline-item ${idx === 0 ? 'active' : ''}`;
            item.innerHTML = `
                <div class="timeline-dot ${colors.dot}"></div>
                <div class="timeline-content">
                    <div class="time">${ev.start_time_label} - ${ev.end_time_label}</div>
                    <div class="title">${ev.event_title}</div>
                    <div class="subtitle">${ev.case_code || ev.event_type} &bull; ${ev.location || '-'}</div>
                </div>
            `;

            item.addEventListener('click', function () {
                timelineList.querySelectorAll('.timeline-item').forEach(el => el.classList.remove('active'));
                item.classList.add('active');
                renderEventDetail(ev, fullDateLabel);
            });

            timelineList.appendChild(item);
        });

        // Tampilkan detail item pertama secara default
        renderEventDetail(dayEvents[0], fullDateLabel);
    }

    function renderCalendar() {
        calendarMonthLabel.textContent = `${monthNames[currentMonth]} ${currentYear}`;
        calendarGrid.innerHTML = '';

        const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();

        const filtered = getFilteredSchedules();

        // Sel bulan sebelumnya
        for (let i = firstDayOfMonth - 1; i >= 0; i--) {
            const prevDay = daysInPrevMonth - i;
            const prevMonthIdx = currentMonth === 0 ? 11 : currentMonth - 1;
            const prevYear = currentMonth === 0 ? currentYear - 1 : currentYear;
            const cellDateStr = formatDateStr(prevYear, prevMonthIdx, prevDay);

            const cell = createDayCell(prevDay, cellDateStr, true, filtered);
            calendarGrid.appendChild(cell);
        }

        // Sel bulan aktif
        for (let day = 1; day <= daysInMonth; day++) {
            const cellDateStr = formatDateStr(currentYear, currentMonth, day);
            const cell = createDayCell(day, cellDateStr, false, filtered);
            calendarGrid.appendChild(cell);
        }

        // Sel bulan berikutnya untuk melengkapi kelipatan 7
        const totalCells = firstDayOfMonth + daysInMonth;
        const remainingCells = totalCells % 7 === 0 ? 0 : 7 - (totalCells % 7);
        for (let nextDay = 1; nextDay <= remainingCells; nextDay++) {
            const nextMonthIdx = currentMonth === 11 ? 0 : currentMonth + 1;
            const nextYear = currentMonth === 11 ? currentYear + 1 : currentYear;
            const cellDateStr = formatDateStr(nextYear, nextMonthIdx, nextDay);

            const cell = createDayCell(nextDay, cellDateStr, true, filtered);
            calendarGrid.appendChild(cell);
        }
    }

    function createDayCell(dayNumber, cellDateStr, isOtherMonth, filteredEvents) {
        const cell = document.createElement('div');
        cell.className = 'cal-cell';
        if (isOtherMonth) cell.classList.add('other-month');
        if (cellDateStr === todayStr) cell.classList.add('today-cell');
        if (cellDateStr === selectedDateStr) cell.classList.add('selected-cell');

        const dateSpan = document.createElement('span');
        dateSpan.className = 'date';
        dateSpan.textContent = dayNumber;
        cell.appendChild(dateSpan);

        const dayEvents = filteredEvents.filter(ev => ev.date === cellDateStr);
        dayEvents.forEach(ev => {
            const colors = getPillColorClass(ev.event_type);
            const pill = document.createElement('div');
            pill.className = `event-pill ${colors.pill}`;
            pill.innerHTML = `
                <span class="dot"></span>
                <div class="event-info">
                    <strong>${ev.start_time_label} ${ev.event_type}</strong>
                    <span>${ev.short_sub || ev.event_title}</span>
                </div>
            `;
            cell.appendChild(pill);
        });

        cell.addEventListener('click', function () {
            selectedDateStr = cellDateStr;
            renderCalendar();
            renderAgendaPanel(selectedDateStr);
        });

        return cell;
    }

    document.getElementById('btnPrevMonth').addEventListener('click', function () {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear -= 1;
        } else {
            currentMonth -= 1;
        }
        renderCalendar();
    });

    document.getElementById('btnNextMonth').addEventListener('click', function () {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear += 1;
        } else {
            currentMonth += 1;
        }
        renderCalendar();
    });

    document.getElementById('btnJumpToday').addEventListener('click', function () {
        currentYear = initYear;
        currentMonth = initMonth - 1;
        selectedDateStr = todayStr;
        renderCalendar();
        renderAgendaPanel(selectedDateStr);
    });

    if (categorySelect) {
        categorySelect.addEventListener('change', function () {
            activeCategoryFilter = this.value;
            renderCalendar();
            renderAgendaPanel(selectedDateStr);
        });
    }

    // Inisialisasi awal: Kalender & Panel Kanan langsung menampilkan Hari Ini
    renderCalendar();
    renderAgendaPanel(selectedDateStr);
});