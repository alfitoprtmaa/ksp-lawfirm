<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Perkara - Lawyer Portal</title>
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/kelolaperkara/kelolaperkara.css') }}">
</head>
<body>
    <div class="layout-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>&amp; PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG KLIEN</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>

                    <!-- Dropdown Menu Kelola Perkara -->
                    <div class="nav-group open">
                        <button type="button" class="nav-item nav-dropdown-toggle active" id="kelolaPerkaraToggle">
                            <div class="nav-item-left">
                                <i class='bx bx-shopping-bag'></i>
                                <span>Kelola Perkara</span>
                            </div>
                            <i class='bx bx-chevron-up dropdown-chevron'></i>
                        </button>
                        <div class="nav-submenu">
                            <a href="{{ route('lawyer.kelolaperkara.dikerjakan') }}" class="submenu-item {{ $activeTab === 'dikerjakan' ? 'active' : '' }}">
                                <span class="submenu-dash">—</span>
                                <span>Perkara Dikerjakan</span>
                                @if ($activeTab === 'dikerjakan')
                                    <span class="active-dot"></span>
                                @endif
                            </a>
                            <a href="{{ route('lawyer.kelolaperkara.selesai') }}" class="submenu-item {{ $activeTab === 'selesai' ? 'active' : '' }}">
                                <span class="submenu-dash">—</span>
                                <span>Perkara Selesai</span>
                                @if ($activeTab === 'selesai')
                                    <span class="active-dot"></span>
                                @endif
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item">
                        <i class='bx bx-message-square-detail'></i>
                        <span>Pusat Referensi</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <a href="{{ route('lawyer.akun.index') }}" class="nav-item">
                    <i class='bx bx-cog'></i>
                    <span>Pengaturan akun</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Kelola Perkara</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span class="current">{{ $activeTab === 'dikerjakan' ? 'Perkara Dikerjakan' : 'Perkara Selesai' }}</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn notif-btn" title="Notifikasi">
                        <i class='bx bx-bell'></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="user-profile">
                        <div class="avatar">
                            <img src="{{ asset($lawyer['photo_path'] ?? 'images/lawyer-default.png') }}" alt="{{ $lawyer['full_name'] }}">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $lawyer['full_name'] }}</span>
                            <span class="user-role">{{ $lawyer['role_name'] ?? 'Lawyer' }}</span>
                        </div>
                        <i class='bx bx-chevron-down dropdown-arrow'></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class='bx bx-check-circle'></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="page-header-block">
                    <h1>Kelola Perkara</h1>
                    <p>Daftar perkara yang kamu tangani. Kelola progres, dokumen, dan riwayat setiap perkara.</p>
                </div>

                <!-- Search & Filter Bar -->
                <form action="{{ $activeTab === 'dikerjakan' ? route('lawyer.kelolaperkara.dikerjakan') : route('lawyer.kelolaperkara.selesai') }}" method="GET" class="filter-bar">
                    <div class="search-box">
                        <i class='bx bx-search'></i>
                        <input type="text" name="search" id="searchCaseInput" value="{{ $search }}" placeholder="Cari perkara...">
                    </div>

                    <div class="filter-dropdown-wrapper">
                        <i class='bx bx-filter-alt filter-icon'></i>
                        <select name="field" class="filter-select" onchange="this.form.submit()">
                            <option value="">Filter</option>
                            <option value="Perdata" {{ $field === 'Perdata' ? 'selected' : '' }}>Perdata</option>
                            <option value="Bisnis" {{ $field === 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                            <option value="Keluarga" {{ $field === 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                            <option value="Pidana" {{ $field === 'Pidana' ? 'selected' : '' }}>Pidana</option>
                        </select>
                    </div>
                </form>

                <!-- Table Section -->
                <div class="table-wrapper">
                    <table class="data-table" id="casesTable">
                        <thead>
                            <tr>
                                <th class="col-check"><input type="checkbox" id="selectAllCases"></th>
                                <th>Case ID</th>
                                <th>Judul Perkara</th>
                                <th>Klien</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Dibuka</th>
                                <th class="col-action">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cases as $item)
                                <tr>
                                    <td><input type="checkbox" class="case-checkbox"></td>
                                    <td class="text-muted-cell">{{ $item['case_code'] }}</td>
                                    <td class="case-title-cell">{{ $item['consultation_title'] }}</td>
                                    <td class="text-muted-cell">{{ $item['applicant_name'] }}</td>
                                    <td class="text-muted-cell">{{ $item['field_name'] }}</td>
                                    <td>
                                        @if ($item['booking_status'] === 'Selesai')
                                            <span class="badge badge-selesai">Selesai</span>
                                        @else
                                            <span class="badge badge-proses">Dalam Proses</span>
                                        @endif
                                    </td>
                                    <td class="text-muted-cell">{{ $item['opened_date'] }}</td>
                                    <td class="col-action">
                                        <a href="{{ route('lawyer.kelolaperkara.show', $item['booking_id']) }}" class="detail-link">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="empty-state">
                                        Belum ada perkara pada kategori ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="table-pagination">
                        <p>Menampilkan 1–{{ $cases->count() }} dari 12 perkara</p>
                        <div class="pagination-controls">
                            <button type="button" class="page-btn"><i class='bx bx-chevron-left'></i></button>
                            <button type="button" class="page-btn active">1</button>
                            <button type="button" class="page-btn">2</button>
                            <button type="button" class="page-btn"><i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');

            if (mobileMenuBtn && sidebar) {
                mobileMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                            sidebar.classList.remove('active');
                        }
                    }
                });
            }

            // Toggle Submenu Sidebar
            const kelolaToggle = document.getElementById('kelolaPerkaraToggle');
            if (kelolaToggle) {
                kelolaToggle.addEventListener('click', function() {
                    this.closest('.nav-group').classList.toggle('open');
                });
            }

            // Select All Checkboxes
            const selectAll = document.getElementById('selectAllCases');
            const checkboxes = document.querySelectorAll('.case-checkbox');
            if (selectAll) {
                selectAll.addEventListener('change', function() {
                    checkboxes.forEach(cb => cb.checked = selectAll.checked);
                });
            }

            // Live Search Filter
            const searchInput = document.getElementById('searchCaseInput');
            const tableRows = document.querySelectorAll('#casesTable tbody tr');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const q = this.value.toLowerCase();
                    tableRows.forEach(row => {
                        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
                    });
                });
            }
        });
    </script>
</body>
</html>