<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Klien - Lawyer Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/dataklien/index.css') }}">
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

            <a href="{{ route('admin.konsultasionline.index') }}" class="nav-item">
                <i class='bx bx-video nav-icon'></i>
                <span>Kelola Konsultasi</span>
            </a>

            <a href="{{ route('admin.perkara.index') }}" class="nav-item">
                <i class='bx bx-folder nav-icon'></i>
                <span>Konsultasi Perkara</span>
            </a>

            <!-- MENU AKTIF: AKSES PENGGUNA -> DATA KLIEN -->
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
                    <li><a href="{{ route('admin.klien.index') }}" class="active-sub">Data Klien</a></li>
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
                    <li><a href="#">Data Layanan</a></li>
                    <li><a href="#">Data Artikel Kegiatan</a></li>
                    <li><a href="#">Data FAQ</a></li>
                </ul>
            </div>

            <a href="#" class="nav-item">
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
                <span>Akses pengguna</span>
                <span>/</span>
                <span class="current">Klien</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Kelola klien</h2>
                    <p>Atur data, status akun, role, dan hak akses fitur setiap klien.</p>
                </div>
                <a href="{{ route('admin.klien.create') }}" class="btn-maroon">
                    Daftarkan klien
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 3 SUMMARY CARDS -->
            <section class="summary-grid-3">
                <div class="summary-card">
                    <span class="summary-label">Total klien</span>
                    <div class="summary-bottom">
                        <strong class="summary-value">{{ $stats['total'] }}</strong>
                        <span class="summary-sub">Seluruh akun terdaftar</span>
                    </div>
                </div>

                <div class="summary-card">
                    <span class="summary-label">Klien aktif</span>
                    <div class="summary-bottom">
                        <strong class="summary-value">{{ $stats['active'] }}</strong>
                        <span class="summary-sub">Dapat mengakses portal</span>
                    </div>
                </div>

                <div class="summary-card">
                    <span class="summary-label">Klien nonaktif</span>
                    <div class="summary-bottom">
                        <strong class="summary-value">{{ $stats['inactive'] }}</strong>
                        <span class="summary-sub">Akses portal dinonaktifkan</span>
                    </div>
                </div>
            </section>

            <!-- DAFTAR KLIEN CARD -->
            <section class="table-card">
                <div class="table-card-header">
                    <h3>Daftar klien</h3>
                    <p>Setiap akun wajib memiliki role sebagai dasar hak akses fitur web.</p>
                </div>

                <div class="filter-row">
                    <div class="search-input-wrap">
                        <input type="text" id="searchClientInput" placeholder="Cari nama, email, atau nomor WhatsApp">
                    </div>

                    <div class="status-select-wrap">
                        <select id="filterClientStatus">
                            <option value="all">Status: Semua</option>
                            <option value="Aktif">Status: Aktif</option>
                            <option value="Nonaktif">Status: Nonaktif</option>
                        </select>
                        <i class='bx bx-chevron-down'></i>
                    </div>

                    <button type="button" class="btn-apply-filter" id="btnApplyClientFilter">
                        Terapkan
                    </button>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama &amp; email</th>
                                <th>WhatsApp</th>
                                <th>Role</th>
                                <th>Status akun</th>
                                <th>Terakhir masuk</th>
                                <th class="text-right">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody id="clientsTableBody">
                            @foreach($clients as $index => $client)
                                @php
                                    $isAktif = $client['account_status'] === 'Aktif';
                                @endphp
                                <tr class="{{ $index === 0 ? 'selected-client-row' : '' }}"
                                    data-search="{{ strtolower($client['full_name'] . ' ' . $client['email'] . ' ' . $client['whatsapp']) }}"
                                    data-status="{{ $client['account_status'] }}">
                                    <td>
                                        <span class="client-name">{{ $client['full_name'] }}</span>
                                        <span class="client-email">{{ $client['email'] }}</span>
                                    </td>
                                    <td class="text-dark-sub">{{ $client['whatsapp'] }}</td>
                                    <td>
                                        <span class="role-pill">{{ $client['role_name'] }}</span>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $isAktif ? 'status-active' : 'status-inactive' }}">
                                            {{ $client['account_status'] }}
                                        </span>
                                    </td>
                                    <td class="text-muted">{{ $client['last_login'] }}</td>
                                    <td class="text-right">
                                        <button
                                            type="button"
                                            class="btn-manage-account"
                                            data-client='@json($client)'
                                        >
                                            Atur akun &amp; role
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="clientShowingText">Menampilkan 1–{{ count($clients) }} dari {{ $stats['total'] }} klien</span>

                    <div class="pagination-group">
                        <button type="button" class="btn-page-nav" disabled>Sebelumnya</button>
                        <button type="button" class="btn-page-num active">1</button>
                        <button type="button" class="btn-page-num">2</button>
                        <button type="button" class="btn-page-num">3</button>
                        <button type="button" class="btn-page-num">4</button>
                        <button type="button" class="btn-page-nav">Berikutnya</button>
                    </div>
                </div>
            </section>

            <!-- PANEL BAWAH: ATUR ROLE -->
            @php $firstClient = $clients[0]; @endphp
            <section class="role-editor-card" id="roleEditorSection">
                <div class="role-editor-top">
                    <div>
                        <h3 id="roleEditorHeading">Atur role — {{ $firstClient['full_name'] }}</h3>
                        <p>Role akun wajib dipilih. Klien dan Lawyer memiliki akses fitur yang berbeda.</p>
                    </div>

                    <div class="account-status-toggle-wrap">
                        <label for="editorAccountStatus">Status akun:</label>
                        <div class="status-select-wrap sm">
                            <select id="editorAccountStatus" form="updateClientRoleForm" name="account_status">
                                <option value="Aktif" {{ $firstClient['account_status'] === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ $firstClient['account_status'] === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.klien.updateRole', $firstClient['customer_id']) }}" method="POST" id="updateClientRoleForm">
                    @csrf
                    @method('PATCH')

                    <div class="role-options-grid">
                        <label class="role-option-box {{ $firstClient['role_name'] === 'Klien' ? 'selected' : '' }}">
                            <input type="radio" name="role_name" value="Klien" {{ $firstClient['role_name'] === 'Klien' ? 'checked' : '' }}>
                            <span class="radio-circle"></span>
                            <div class="role-option-text">
                                <strong>Klien</strong>
                                <span>Akses konsultasi &amp; perkara milik sendiri.</span>
                            </div>
                        </label>

                        <label class="role-option-box {{ $firstClient['role_name'] === 'Lawyer' ? 'selected' : '' }}">
                            <input type="radio" name="role_name" value="Lawyer" {{ $firstClient['role_name'] === 'Lawyer' ? 'checked' : '' }}>
                            <span class="radio-circle"></span>
                            <div class="role-option-text">
                                <strong>Lawyer</strong>
                                <span>Kelola konsultasi &amp; perkara yang ditugaskan.</span>
                            </div>
                        </label>

                        <label class="role-option-box {{ $firstClient['role_name'] === 'Admin' ? 'selected' : '' }}">
                            <input type="radio" name="role_name" value="Admin" {{ $firstClient['role_name'] === 'Admin' ? 'checked' : '' }}>
                            <span class="radio-circle"></span>
                            <div class="role-option-text">
                                <strong>Admin</strong>
                                <span>Kelola konsultasi &amp; perkara yang ditugaskan.</span>
                            </div>
                        </label>
                    </div>

                    <div class="role-editor-footer">
                        <div class="footer-notes">
                            <p>Perubahan role menyesuaikan hak akses akun.</p>
                            <p>Akun nonaktif tetap tidak dapat masuk. Data &amp; riwayat tetap tersimpan.</p>
                        </div>
                        <button type="submit" class="btn-maroon btn-save-role">Simpan role</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/dataklien.js') }}"></script>
</body>
</html>