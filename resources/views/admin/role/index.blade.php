<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Role - Lawyer Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/admin/role/index.css') }}">
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

            <!-- MENU AKTIF: AKSES PENGGUNA -> DATA ROLE -->
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
                    <li><a href="{{ route('admin.role.index') }}" class="active-sub">Data Role</a></li>
                    <li><a href="{{ route('admin.klien.index') }}" >Data Klien</a></li>
                </ul>
            </div>

            <div class="nav-group open">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-briefcase nav-icon'></i>
                        <span>Manajemen Konten</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.layanan.index') }}">Data Layanan</a></li>
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
                <span>Akses Pengguna</span>
                <i class='bx bx-chevron-right'></i>
                <span class="current">Data Role</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Data Role</h2>
                    <p>Kelola ID role, status, dan akses akun berdasarkan email.</p>
                </div>
                <button type="button" class="btn-maroon" id="btnOpenAddRoleModal">
                    <i class='bx bx-plus'></i>
                    <span>Tambah Role</span>
                </button>
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

            <!-- 3 SUMMARY CARDS -->
            <section class="metrics-grid-3">
                <div class="metric-card">
                    <div class="metric-icon icon-maroon">
                        <i class='bx bx-shield-plus'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Total Role</span>
                        <strong class="metric-value">{{ $stats['total'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-emerald">
                        <i class='bx bx-check-circle'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Role Aktif</span>
                        <strong class="metric-value">{{ $stats['active'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-slate">
                        <i class='bx bx-x-circle'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Role Nonaktif</span>
                        <strong class="metric-value">{{ $stats['inactive'] }}</strong>
                    </div>
                </div>
            </section>

            <!-- FILTER BAR -->
            <section class="filter-bar">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" id="searchRoleInput" placeholder="Cari ID atau nama role...">
                </div>

                <div class="select-box">
                    <select id="filterRoleStatusSelect">
                        <option value="all">Semua Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <button type="button" class="btn-reset" id="btnResetRoleFilter">
                    <i class='bx bx-refresh'></i>
                    <span>Reset</span>
                </button>
            </section>

            <!-- TABEL DATA ROLE -->
            <section class="table-card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-id">ID ROLE</th>
                                <th class="col-name">NAMA ROLE</th>
                                <th class="col-status text-right">STATUS ROLE</th>
                            </tr>
                        </thead>
                        <tbody id="rolesTableBody">
                            @foreach($roles as $role)
                                @php
                                    $isAktif = $role['status'] === 'Aktif';
                                @endphp
                                <tr class="role-row-clickable"
                                    title="Klik untuk edit atau kelola hak akses {{ $role['role_name'] }}"
                                    data-role='@json($role)'
                                    data-search="{{ strtolower($role['role_code'] . ' ' . $role['role_name']) }}"
                                    data-status="{{ $role['status'] }}">
                                    <td class="col-id text-muted">{{ $role['role_code'] }}</td>
                                    <td class="col-name">
                                        <strong>{{ $role['role_name'] }}</strong>
                                    </td>
                                    <td class="col-status text-right">
                                        <span class="role-status-badge {{ $isAktif ? 'badge-active' : 'badge-inactive' }}">
                                            <span class="status-dot"></span>
                                            <span>{{ $role['status'] }}</span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="roleShowingText">Menampilkan 1–{{ count($roles) }} dari {{ count($roles) }} role</span>

                    <div class="pagination-controls">
                        <button type="button" class="page-btn" disabled><i class='bx bx-chevron-left'></i></button>
                        <button type="button" class="page-btn active">1</button>
                        <button type="button" class="page-btn" disabled><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ==================== MODAL 1: TAMBAH ROLE ==================== -->
<div class="modal-overlay" id="addRoleModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="addRoleModalTitle">
        <div class="modal-header">
            <div>
                <h3 id="addRoleModalTitle">Tambah Role</h3>
                <p>Buat role baru dan tentukan hak akses pengguna.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="addRoleModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.role.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <!-- ID Role & Status -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="auto_role_code">ID Role</label>
                        <input
                            type="text"
                            id="auto_role_code"
                            class="form-control input-readonly"
                            value="{{ $nextRoleCode }} (otomatis)"
                            readonly
                        >
                    </div>

                    <div class="form-group">
                        <label for="add_role_status">Status</label>
                        <div class="select-wrapper">
                            <select id="add_role_status" name="status" class="form-control">
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <!-- Nama Role -->
                <div class="form-group">
                    <label for="add_role_name">Nama Role *</label>
                    <input
                        type="text"
                        id="add_role_name"
                        name="role_name"
                        class="form-control"
                        placeholder="Masukkan nama role"
                        required
                    >
                </div>

                <!-- Deskripsi (Opsional) -->
                <div class="form-group">
                    <label for="add_role_desc">Deskripsi (opsional)</label>
                    <textarea
                        id="add_role_desc"
                        name="description"
                        rows="3"
                        class="form-control"
                        placeholder="Tuliskan deskripsi singkat role"
                    ></textarea>
                </div>

                <!-- Hak Akses (6 Modul) -->
                <div class="form-group">
                    <div class="label-between">
                        <label>Hak Akses</label>
                        <span class="label-hint">Pilih modul yang dapat diakses</span>
                    </div>

                    <div class="permissions-grid">
                        @foreach($modules as $mod)
                            @php $checked = $mod === 'Dashboard'; @endphp
                            <label class="permission-card {{ $checked ? 'checked' : '' }}">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $mod }}"
                                    class="perm-checkbox"
                                    {{ $checked ? 'checked' : '' }}
                                >
                                <span class="perm-check-box">
                                    <i class='bx bx-check'></i>
                                </span>
                                <span class="perm-name">{{ $mod }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <span class="required-note">* Wajib diisi</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="addRoleModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Role</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 2: EDIT / KELOLA ROLE (SAAT KLIK BARIS) ==================== -->
<div class="modal-overlay" id="editRoleModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="editRoleModalTitle">
        <div class="modal-header">
            <div>
                <h3 id="editRoleModalTitle">Edit Role</h3>
                <p>Perbarui status dan hak akses modul untuk role terpilih.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="editRoleModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="" method="POST" id="editRoleForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_role_code">ID Role</label>
                        <input type="text" id="edit_role_code" class="form-control input-readonly" readonly>
                    </div>

                    <div class="form-group">
                        <label for="edit_role_status">Status</label>
                        <div class="select-wrapper">
                            <select id="edit_role_status" name="status" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_role_name">Nama Role *</label>
                    <input type="text" id="edit_role_name" name="role_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="edit_role_desc">Deskripsi (opsional)</label>
                    <textarea id="edit_role_desc" name="description" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="label-between">
                        <label>Hak Akses</label>
                        <span class="label-hint">Pilih modul yang dapat diakses</span>
                    </div>

                    <div class="permissions-grid" id="editPermissionsGrid">
                        @foreach($modules as $mod)
                            <label class="permission-card">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $mod }}"
                                    class="perm-checkbox"
                                >
                                <span class="perm-check-box">
                                    <i class='bx bx-check'></i>
                                </span>
                                <span class="perm-name">{{ $mod }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="modal-footer modal-footer-between">
                <button type="button" class="btn-delete-outline" id="btnTriggerDeleteRole">
                    <i class='bx bx-trash'></i>
                    <span>Hapus Role</span>
                </button>
                <div class="footer-right-btns">
                    <button type="button" class="btn-cancel" data-close-modal="editRoleModal">Batal</button>
                    <button type="submit" class="btn-maroon btn-submit">Simpan Perubahan</button>
                </div>
            </div>
        </form>

        <form action="" method="POST" id="deleteRoleForm" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<script src="{{ asset('js/admin/datarole.js') }}"></script>
</body>
</html>