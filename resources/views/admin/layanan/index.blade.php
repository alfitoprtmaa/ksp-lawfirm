<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Layanan - Lawyer Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/admin/datalayanan/index.css') }}">
</head>
<body>

<div class="admin-layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor Hukum" class="brand-logo">
            <div class="brand-text">
                <h1>Lawyer Admin</h1>
                <span>Sistem Manajemen Advokat</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <i class='bx bx-home-alt nav-icon'></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.jadwal.index') }}" class="nav-item">
                <i class='bx bx-calendar nav-icon'></i>
                <span>Kelola Jadwal</span>
            </a>

            <div class="nav-group">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-video nav-icon'></i>
                        <span>Kelola Konsultasi</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.konsultasionline.index') }}">Konsultasi Online</a></li>
                    <li><a href="#">Jadwal Konsultasi</a></li>
                </ul>
            </div>

            <a href="{{ route('admin.perkara.index') }}" class="nav-item">
                <i class='bx bx-folder nav-icon'></i>
                <span>Konsultasi Perkara</span>
            </a>

            <div class="nav-group open">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-group nav-icon'></i>
                        <span>Akses Pengguna</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.advokat.index') }}">Data Advokat</a></li>
                    <li><a href="{{ route('admin.role.index') }}">Data Role</a></li>
                    <li><a href="{{ route('admin.klien.index') }}">Data Pengguna</a></li>
                </ul>
            </div>

            <!-- MENU AKTIF: MANAJEMEN KONTEN -> DATA LAYANAN -->
            <div class="nav-group open">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-briefcase nav-icon'></i>
                        <span>Manajemen Konten</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.layanan.index') }}" class="active-sub">Data Layanan</a></li>
                    <li><a href="{{ route('admin.artikel.index') }}">Data Artikel Kegiatan</a></li>
                    <li><a href="{{ route('admin.faq.index') }}">Data FAQ</a></li>
                </ul>
            </div>

            <a href="{{ route('admin.referensi.index') }}" class="nav-item">
                <i class='bx bx-book-open nav-icon'></i>
                <span>Kelola Pusat Referensi</span>
            </a>
        </nav>

        <div class="sidebar-watermark">
            <svg viewBox="0 0 200 100" fill="currentColor">
                <polygon points="100,10 15,45 185,45" />
                <rect x="25" y="48" width="150" height="6" />
                <rect x="35" y="58" width="14" height="42" />
                <rect x="64" y="58" width="14" height="42" />
                <rect x="93" y="58" width="14" height="42" />
                <rect x="122" y="58" width="14" height="42" />
                <rect x="151" y="58" width="14" height="42" />
            </svg>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- TOPBAR -->
        <header class="topbar">
            <button type="button" class="menu-toggle" aria-label="Toggle Menu">
                <i class='bx bx-menu'></i>
            </button>

            <div class="topbar-actions">
                <button type="button" class="notif-btn" aria-label="Notifikasi">
                    <i class='bx bx-bell'></i>
                    <span class="notif-dot"></span>
                </button>
                <div class="topbar-divider"></div>
                <div class="user-profile">
                    <div class="avatar">{{ $admin['initial'] }}</div>
                    <span class="user-name">{{ $admin['full_name'] }}</span>
                    <i class='bx bx-chevron-down chevron-dark'></i>
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <main class="content">
            <div class="breadcrumb">
                <span>Manajemen Konten</span>
                <span>/</span>
                <span class="current">Data Layanan</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Data Layanan</h2>
                    <p>Tambah dan kelola bidang praktik serta layanan hukum yang ditampilkan di website.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    <i class='bx bx-error-circle'></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- ==================== SECTION 1: PRACTICING AREA ==================== -->
            <section class="service-section-card">
                <div class="section-card-header">
                    <div>
                        <div class="title-with-count">
                            <h3>Practicing Area</h3>
                            <span class="count-pill">{{ $paTotalCount }}</span>
                        </div>
                        <p>Kelola bidang praktik hukum pada website.</p>
                    </div>

                    <button type="button" class="btn-maroon" id="btnOpenAddPaModal">
                        <i class='bx bx-plus'></i>
                        <span>Tambah Practicing Area</span>
                    </button>
                </div>

                <div class="section-filter-row">
                    <div class="search-input-wrap">
                        <input type="text" id="searchPaInput" placeholder="Cari practicing area...">
                    </div>

                    <div class="status-select-wrap">
                        <select id="filterPaStatus">
                            <option value="all">Semua status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-order">URUTAN</th>
                                <th class="col-name">NAMA PRACTICING AREA</th>
                                <th class="col-status">STATUS</th>
                                <th class="col-action text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="paTableBody">
                            <!-- Di-render dinamis oleh JS agar pagination & filter instan -->
                        </tbody>
                    </table>
                </div>

                <div class="section-table-footer">
                    <span id="paShowingText">Menampilkan 1–5 dari {{ $paTotalCount }} practicing area</span>
                    <div class="pagination-controls" id="paPaginationControls"></div>
                </div>
            </section>

            <!-- ==================== SECTION 2: LEGAL SERVICE ==================== -->
            <section class="service-section-card">
                <div class="section-card-header">
                    <div>
                        <div class="title-with-count">
                            <h3>Legal Service</h3>
                            <span class="count-pill">{{ $lsTotalCount }}</span>
                        </div>
                        <p>Kelola jenis layanan dan cakupan pendampingan hukum.</p>
                    </div>

                    <button type="button" class="btn-maroon" id="btnOpenAddLsModal">
                        <i class='bx bx-plus'></i>
                        <span>Tambah Legal Service</span>
                    </button>
                </div>

                <div class="section-filter-row">
                    <div class="search-input-wrap">
                        <input type="text" id="searchLsInput" placeholder="Cari legal service...">
                    </div>

                    <div class="status-select-wrap">
                        <select id="filterLsStatus">
                            <option value="all">Semua status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-order">URUTAN</th>
                                <th class="col-name">NAMA LEGAL SERVICE</th>
                                <th class="col-status">STATUS</th>
                                <th class="col-action text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="lsTableBody">
                            <!-- Di-render dinamis oleh JS agar pagination & filter instan -->
                        </tbody>
                    </table>
                </div>

                <div class="section-table-footer">
                    <span id="lsShowingText">Menampilkan 1–{{ $lsTotalCount }} dari {{ $lsTotalCount }} legal service</span>
                    <div class="pagination-controls" id="lsPaginationControls"></div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ==================== MODAL 1: TAMBAH PRACTICING AREA ==================== -->
<div class="modal-overlay" id="addPaModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="addPaTitle">
        <div class="modal-header">
            <div>
                <h3 id="addPaTitle">Tambah Practicing Area</h3>
                <p>Tambahkan bidang praktik hukum baru ke dalam daftar layanan website.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="addPaModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.layanan.pa.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="add_pa_name">Nama Practicing Area *</label>
                    <input
                        type="text"
                        id="add_pa_name"
                        name="field_name"
                        class="form-control"
                        placeholder="Contoh: Corporate & Commercial Litigation"
                        required
                    >
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_pa_order">Urutan Tampil</label>
                        <input
                            type="number"
                            id="add_pa_order"
                            name="order"
                            min="1"
                            class="form-control"
                            value="{{ count($practicingAreas) + 1 }}"
                        >
                        <span class="field-hint">Menentukan posisi urutan di halaman publik.</span>
                    </div>

                    <div class="form-group">
                        <label for="add_pa_status">Status *</label>
                        <div class="select-wrapper">
                            <select id="add_pa_status" name="status" class="form-control" required>
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="add_pa_desc">Deskripsi Bidang Praktik (opsional)</label>
                    <textarea
                        id="add_pa_desc"
                        name="description"
                        rows="3"
                        class="form-control"
                        placeholder="Tuliskan penjelasan singkat mengenai ruang lingkup practicing area..."
                    ></textarea>
                </div>

                <span class="required-note">* Wajib diisi</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="addPaModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Practicing Area</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 2: EDIT PRACTICING AREA ==================== -->
<div class="modal-overlay" id="editPaModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="editPaTitle">
        <div class="modal-header">
            <div>
                <h3 id="editPaTitle">Edit Practicing Area</h3>
                <p>Perbarui nama bidang praktik, urutan tampil, atau status publikasi.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="editPaModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="" method="POST" id="editPaForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_pa_name">Nama Practicing Area *</label>
                    <input type="text" id="edit_pa_name" name="field_name" class="form-control" required>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_pa_order">Urutan Tampil *</label>
                        <input type="number" id="edit_pa_order" name="order" min="1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_pa_status">Status *</label>
                        <div class="select-wrapper">
                            <select id="edit_pa_status" name="status" class="form-control" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_pa_desc">Deskripsi Bidang Praktik (opsional)</label>
                    <textarea id="edit_pa_desc" name="description" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="editPaModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 3: TAMBAH LEGAL SERVICE ==================== -->
<div class="modal-overlay" id="addLsModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="addLsTitle">
        <div class="modal-header">
            <div>
                <h3 id="addLsTitle">Tambah Legal Service</h3>
                <p>Tambahkan jenis layanan dan cakupan pendampingan hukum baru.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="addLsModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.layanan.ls.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="add_ls_name">Nama Legal Service *</label>
                    <input
                        type="text"
                        id="add_ls_name"
                        name="category_name"
                        class="form-control"
                        placeholder="Contoh: Mergers & Acquisitions Advisory"
                        required
                    >
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_ls_order">Urutan Tampil</label>
                        <input
                            type="number"
                            id="add_ls_order"
                            name="order"
                            min="1"
                            class="form-control"
                            value="{{ count($legalServices) + 1 }}"
                        >
                        <span class="field-hint">Menentukan posisi urutan layanan di website.</span>
                    </div>

                    <div class="form-group">
                        <label for="add_ls_status">Status *</label>
                        <div class="select-wrapper">
                            <select id="add_ls_status" name="status" class="form-control" required>
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="add_ls_desc">Cakupan Pendampingan / Deskripsi (opsional)</label>
                    <textarea
                        id="add_ls_desc"
                        name="description"
                        rows="3"
                        class="form-control"
                        placeholder="Jelaskan secara singkat layanan hukum yang diberikan kepada klien..."
                    ></textarea>
                </div>

                <span class="required-note">* Wajib diisi</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="addLsModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Legal Service</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 4: EDIT LEGAL SERVICE ==================== -->
<div class="modal-overlay" id="editLsModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="editLsTitle">
        <div class="modal-header">
            <div>
                <h3 id="editLsTitle">Edit Legal Service</h3>
                <p>Perbarui informasi layanan hukum, urutan tampil, atau status.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="editLsModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="" method="POST" id="editLsForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_ls_name">Nama Legal Service *</label>
                    <input type="text" id="edit_ls_name" name="category_name" class="form-control" required>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_ls_order">Urutan Tampil *</label>
                        <input type="number" id="edit_ls_order" name="order" min="1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_ls_status">Status *</label>
                        <div class="select-wrapper">
                            <select id="edit_ls_status" name="status" class="form-control" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_ls_desc">Cakupan Pendampingan / Deskripsi (opsional)</label>
                    <textarea id="edit_ls_desc" name="description" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="editLsModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Form Hapus Tersembunyi -->
<form action="" method="POST" id="deleteServiceItemForm" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    window.PRACTICING_AREAS_DATA = @json($practicingAreas);
    window.LEGAL_SERVICES_DATA   = @json($legalServices);
    window.PA_TOTAL_DISPLAY      = @json($paTotalCount);
</script>
<script src="{{ asset('js/admin/datalayanan.js') }}"></script>
</body>
</html>