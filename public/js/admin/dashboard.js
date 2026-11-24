document.addEventListener('DOMContentLoaded', function () {
    // 1. Toggle Dropdown Menu Sidebar
    const dropdownTriggers = document.querySelectorAll('.nav-item.has-dropdown');
    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            const parentGroup = this.closest('.nav-group');
            if (parentGroup) {
                parentGroup.classList.toggle('open');
            }
        });
    });

    // 2. Toggle Sidebar (Desktop & Mobile)
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

    // 3. Toggle Dropdown Pemilih Tanggal (Bulan)
    const dateDropdown = document.getElementById('dateDropdown');
    const dateFilterBtn = document.getElementById('dateFilterBtn');

    if (dateDropdown && dateFilterBtn) {
        dateFilterBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = dateDropdown.classList.toggle('open');
            dateFilterBtn.setAttribute('aria-expanded', isOpen);
        });

        // Tutup dropdown tanggal saat klik di luar area dropdown
        document.addEventListener('click', function (e) {
            if (!dateDropdown.contains(e.target)) {
                dateDropdown.classList.remove('open');
                dateFilterBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }
});