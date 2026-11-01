<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Perkara - Lawyer Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>& PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG Lawyer</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="#" class="nav-item active">
                        <i class='bx bx-briefcase'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item">
                        <i class='bx bx-folder-open'></i>
                        <span>Pusat Refrensi</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <!-- Aktif pada Pengaturan Akun -->
                <a href="#" class="nav-item active-footer">
                    <i class='bx bx-cog'></i>
                    <span>Pengaturan akun</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="topbar">
                <div class="topbar-left" style="display: flex; align-items: center; gap: 15px;">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Lawyer</span> / <span class="current">Kelola Perkara</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">Akun Anda</span>
                            <span class="user-role">Lawyer</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <div class="page-header-row">
                    <div class="page-title-group">
                        <h2>Kelola Perkara</h2>
                        <p>Daftar perkara yang kamu tangani. Kelola progres, dokumen, dan riwayat setiap perkara.</p>
                    </div>
                    <button class="btn-primary">
                        <i class='bx bx-plus'></i> Upload Dokumen
                    </button>
                </div>

                <!-- Toolbar Row (Tabs & Search) -->
                <div class="toolbar-row">
                    <div class="content-tabs">
                        <button class="tab-btn active">Semua</button>
                        <button class="tab-btn">Dalam Proses</button>
                        <button class="tab-btn">Menunggu Dokumen</button>
                        <button class="tab-btn">Selesai</button>
                        <button class="tab-btn">Ditutup</button>
                    </div>

                    <div class="search-filter-group">
                        <div class="search-box">
                            <i class='bx bx-search'></i>
                            <input type="text" placeholder="Cari perkara...">
                        </div>
                        <button class="btn-outline">
                            <i class='bx bx-filter'></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Layout Split (Tabel & Panel Kanan) -->
                <div class="content-split-layout">
                    
                    <!-- Table Section -->
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Case ID</th>
                                    <th>Judul Perkara</th>
                                    <th>Klien</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Dibuka</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data Baris (Klik untuk membuka panel kanan) -->
                                <tr onclick="toggleCaseDetail('CASE-001', this)" class="clickable-row">
                                    <td onclick="event.stopPropagation()"><input type="checkbox"></td>
                                    <td class="text-gray">CASE-001</td>
                                    <td class="font-medium text-dark">Sengketa Tanah</td>
                                    <td>Andi Pratama</td>
                                    <td>Perdata</td>
                                    <td><span class="badge badge-blue">Dalam Proses</span></td>
                                    <td>12 Jan 2025</td>
                                    <td onclick="event.stopPropagation()"><button class="btn-icon-light"><i class='bx bx-dots-vertical-rounded'></i></button></td>
                                </tr>
                                
                                <tr onclick="toggleCaseDetail('CASE-002', this)" class="clickable-row">
                                    <td onclick="event.stopPropagation()"><input type="checkbox"></td>
                                    <td class="text-gray">CASE-002</td>
                                    <td class="font-medium text-dark">Perselisihan Kontrak</td>
                                    <td>Budi Santoso</td>
                                    <td>Bisnis</td>
                                    <td><span class="badge badge-yellow">Menunggu Dokumen</span></td>
                                    <td>5 Feb 2025</td>
                                    <td onclick="event.stopPropagation()"><button class="btn-icon-light"><i class='bx bx-dots-vertical-rounded'></i></button></td>
                                </tr>

                                <tr onclick="toggleCaseDetail('CASE-003', this)" class="clickable-row">
                                    <td onclick="event.stopPropagation()"><input type="checkbox"></td>
                                    <td class="text-gray">CASE-003</td>
                                    <td class="font-medium text-dark">Perceraian</td>
                                    <td>Siti Rahayu</td>
                                    <td>Keluarga</td>
                                    <td><span class="badge badge-blue">Dalam Proses</span></td>
                                    <td>10 Mar 2025</td>
                                    <td onclick="event.stopPropagation()"><button class="btn-icon-light"><i class='bx bx-dots-vertical-rounded'></i></button></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="table-pagination">
                            <p>Menampilkan <strong>1-10</strong> dari <strong>12</strong> perkara</p>
                            <div class="pagination-controls">
                                <button class="page-btn"><i class='bx bx-chevron-left'></i></button>
                                <button class="page-btn active">1</button>
                                <button class="page-btn">2</button>
                                <button class="page-btn"><i class='bx bx-chevron-right'></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Panel (In-Page Card) -->
                    <div class="case-detail-panel" id="caseDetailPanel">
                        <div class="panel-header">
                            <div class="panel-title-wrapper">
                                <h3>CASE-001 <span class="badge badge-blue-light">Case in Process</span></h3>
                                <h2>Sengketa Tanah</h2>
                            </div>
                            <button class="btn-close-panel" onclick="closeCaseDetail()"><i class='bx bx-x'></i></button>
                        </div>

                        <div class="panel-tabs">
                            <button class="ptab-btn active">Overview</button>
                            <button class="ptab-btn">Documents</button>
                            <button class="ptab-btn">Updates</button>
                        </div>

                        <div class="panel-body">
                            <!-- Informasi Perkara -->
                            <div class="info-section">
                                <div class="section-heading">
                                    <div class="heading-left">
                                        <i class='bx bx-notepad'></i>
                                        <h4>Informasi Perkara</h4>
                                    </div>
                                    <button class="btn-sm-blue"><i class='bx bx-pencil'></i> Tambahkan Catatan</button>
                                </div>
                                
                                <div class="detail-grid">
                                    <div class="detail-label">Case ID</div>
                                    <div class="detail-value">CASE-001</div>

                                    <div class="detail-label">Judul Perkara</div>
                                    <div class="detail-value">Sengketa Tanah</div>

                                    <div class="detail-label">Kategori</div>
                                    <div class="detail-value">Perdata</div>

                                    <div class="detail-label">Deskripsi</div>
                                    <div class="detail-value">Sengketa kepemilikan tanah antara klien dengan pihak lain terkait batas lahan.</div>

                                    <div class="detail-label">Tanggal Dibuka</div>
                                    <div class="detail-value">12 Januari 2025</div>

                                    <div class="detail-label">Tanggal Ditutup</div>
                                    <div class="detail-value">-</div>

                                    <div class="detail-label">Status</div>
                                    <div class="detail-value"><span class="badge badge-blue-light">Case in Process</span></div>
                                </div>
                            </div>

                            <!-- Informasi Klien -->
                            <div class="info-section">
                                <div class="section-heading">
                                    <div class="heading-left">
                                        <i class='bx bx-user'></i>
                                        <h4>Informasi Klien</h4>
                                    </div>
                                </div>
                                
                                <div class="detail-grid">
                                    <div class="detail-label">Nama</div>
                                    <div class="detail-value">Andi Pratama</div>

                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">andi@email.com</div>

                                    <div class="detail-label">Phone</div>
                                    <div class="detail-value">0812-3456-7890</div>
                                </div>
                                
                                <div class="action-right">
                                    <button class="btn-outline-sm">Lihat Detail Klien</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Script Interaksi Panel Kanan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');

            // Toggle Sidebar saat tombol hamburger diklik
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Mencegah event klik menjalar ke dokumen
                sidebar.classList.toggle('active');
            });

            // Otomatis menutup sidebar jika user mengklik area di luar sidebar
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            });
        });

        function toggleCaseDetail(caseId, rowElement) {
            const panel = document.getElementById('caseDetailPanel');
            
            // Tampilkan panel dengan mengubah display-nya
            panel.style.display = 'flex';
            
            // Hapus kelas 'selected' dari semua baris
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.classList.remove('selected');
            });
            
            // Tambahkan kelas 'selected' ke baris yang diklik
            rowElement.classList.add('selected');
        }

        function closeCaseDetail() {
            const panel = document.getElementById('caseDetailPanel');
            
            // Sembunyikan panel
            panel.style.display = 'none';
            
            // Hapus seleksi dari tabel
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.classList.remove('selected');
            });
        }
    </script>
</body>
</html>