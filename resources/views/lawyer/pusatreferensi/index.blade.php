<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Referensi - Lawyer Portal</title>
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/pusatreferensi/pusatreferensi.css') }}">
</head>
<body>
    <div class="layout-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    {{-- Tempat asset logo milikmu --}}
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>&amp; PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG LAWYER</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
                        <i class='bx bx-shopping-bag'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item active">
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
                        <span>Dashboard</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span class="current">Pusat Referensi</span>
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
                <!-- Alert Notifikasi -->
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class='bx bx-check-circle'></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class='bx bx-error-circle'></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Page Header -->
                <div class="page-header-row">
                    <div class="page-title-group">
                        <h2>Pusat Referensi</h2>
                        <p>Arsip dan kumpulan dokumen yang diklasifikasikan berdasarkan perkara. Anda dapat mencari, memfilter, dan mengunggah dokumen baru.</p>
                    </div>
                    <button type="button" class="btn-primary" id="openUploadModalBtn">
                        <i class='bx bx-plus'></i> Upload Dokumen
                    </button>
                </div>

                <!-- Category Cards -->
                <div class="category-grid">
                    @foreach ($categories as $cat)
                        <a href="{{ route('lawyer.pusatreferensi.index', ['category' => $cat['slug']]) }}"
                           class="cat-card {{ $activeCategory === $cat['slug'] ? 'active' : '' }}">
                            <div class="cat-icon-wrapper {{ $cat['color'] }}">
                                <i class='bx {{ $cat['icon'] }}'></i>
                            </div>
                            <div class="cat-info">
                                <h3>{{ $cat['name'] }}</h3>
                                <p>{{ $cat['count'] }} Dokumen</p>
                            </div>
                            <span class="cat-arrow">
                                <i class='bx bx-right-arrow-alt'></i>
                            </span>
                        </a>
                    @endforeach
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <form action="{{ route('lawyer.pusatreferensi.index') }}" method="GET" class="table-toolbar">
                        <input type="hidden" name="category" value="{{ $activeCategory }}">
                        <div class="search-box">
                            <i class='bx bx-search'></i>
                            <input type="text" name="search" id="searchInput" value="{{ $search }}" placeholder="Cari dokumen...">
                        </div>

                        <div class="filter-wrapper">
                            <select name="status" class="filter-select" onchange="this.form.submit()">
                                <option value="">Filter: Semua Status</option>
                                <option value="Selesai" {{ $statusFilter === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Dalam Proses" {{ $statusFilter === 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                            </select>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="data-table" id="referenceTable">
                            <thead>
                                <tr>
                                    <th class="col-check"><input type="checkbox" id="selectAllCheckbox"></th>
                                    <th>CASE ID</th>
                                    <th>NAMA DOKUMEN</th>
                                    <th>TANGGAL UPLOAD</th>
                                    <th>DIUNGGAH OLEH</th>
                                    <th>STATUS</th>
                                    <th class="col-action">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $doc)
                                    <tr>
                                        <td><input type="checkbox" class="row-checkbox"></td>
                                        <td class="case-id">{{ $doc['case_code'] }}</td>
                                        <td>
                                            <div class="doc-name">
                                                <span class="file-icon {{ strtolower($doc['file_type']) }}">{{ $doc['file_type'] }}</span>
                                                <div>
                                                    <p class="title">{{ $doc['title'] }}</p>
                                                    <p class="size">{{ $doc['file_size'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="date">{{ $doc['upload_date'] }}</p>
                                            <p class="time">{{ $doc['upload_time'] }}</p>
                                        </td>
                                        <td class="uploader-name">{{ $doc['uploaded_by'] }}</td>
                                        <td>
                                            @if ($doc['status'] === 'Selesai')
                                                <span class="badge badge-selesai">Selesai</span>
                                            @else
                                                <span class="badge badge-proses">{{ $doc['status'] }}</span>
                                            @endif
                                        </td>
                                        <td class="col-action">
                                            <button type="button" class="btn-icon" title="Opsi Dokumen">
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="empty-state">
                                            Tidak ada dokumen referensi yang ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="table-pagination">
                        <p>Menampilkan <strong>1–{{ $documents->count() }}</strong> dari <strong>28</strong> dokumen</p>
                        <div class="pagination-controls">
                            <button type="button" class="page-btn"><i class='bx bx-chevron-left'></i></button>
                            <button type="button" class="page-btn active">1</button>
                            <button type="button" class="page-btn">2</button>
                            <button type="button" class="page-btn">3</button>
                            <button type="button" class="page-btn"><i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Upload Dokumen -->
    <div class="modal-overlay" id="uploadModal">
        <div class="modal-box">
            <div class="modal-header">
                <h3>Upload Dokumen Referensi</h3>
                <button type="button" class="modal-close" id="closeUploadModalBtn">
                    <i class='bx bx-x'></i>
                </button>
            </div>
            <form action="{{ route('lawyer.pusatreferensi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="booking_id">Case ID / Perkara</label>
                        <select id="booking_id" name="booking_id" required>
                            <option value="">-- Pilih Perkara --</option>
                            @foreach ($availableCases as $case)
                                <option value="{{ $case['booking_id'] }}">{{ $case['case_code'] }} - {{ $case['title'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Kategori Dokumen</label>
                        <select id="category" name="category" required>
                            <option value="Sengketa Tanah">Sengketa Tanah</option>
                            <option value="Perjanjian Kontrak">Perjanjian Kontrak</option>
                            <option value="Gugatan Perkara">Gugatan Perkara</option>
                            <option value="Sengketa Waris">Sengketa Waris</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Nama Dokumen</label>
                        <input type="text" id="title" name="title" placeholder="Contoh: Surat-gugatan.pdf" required>
                    </div>

                    <div class="form-group">
                        <label for="pdf_document">Pilih File (PDF, DOCX, XLSX - Maks 10MB)</label>
                        <input type="file" id="pdf_document" name="pdf_document" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-outline" id="cancelUploadModalBtn">Batal</button>
                    <button type="submit" class="btn-primary">Simpan &amp; Upload</button>
                </div>
            </form>
        </div>
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

            // Select All Checkbox
            const selectAllCheckbox = document.getElementById('selectAllCheckbox');
            const rowCheckboxes = document.querySelectorAll('.row-checkbox');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    rowCheckboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
                });
            }

            // Live Client-Side Search Filter
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('#referenceTable tbody tr');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const keyword = this.value.toLowerCase();
                    tableRows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(keyword) ? '' : 'none';
                    });
                });
            }

            // Modal Upload Dokumen
            const uploadModal = document.getElementById('uploadModal');
            const openUploadModalBtn = document.getElementById('openUploadModalBtn');
            const closeUploadModalBtn = document.getElementById('closeUploadModalBtn');
            const cancelUploadModalBtn = document.getElementById('cancelUploadModalBtn');

            function closeModal() {
                uploadModal.classList.remove('active');
            }

            if (openUploadModalBtn && uploadModal) {
                openUploadModalBtn.addEventListener('click', () => uploadModal.classList.add('active'));
                closeUploadModalBtn.addEventListener('click', closeModal);
                cancelUploadModalBtn.addEventListener('click', closeModal);
                uploadModal.addEventListener('click', (e) => {
                    if (e.target === uploadModal) closeModal();
                });
            }
        });
    </script>
</body>
</html>