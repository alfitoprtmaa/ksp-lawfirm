<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Lawyer Portal</title>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/akun/akun.css') }}">
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
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
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
                        <span>Portal Lawyer</span> / <span class="current">Pengaturan Akun</span>
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
                <div class="settings-container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        
                        <!-- Profile Picture Section -->
                        <div class="profile-photo-section">
                            <img src="{{ asset('images/avatar-lawyer-large.jpg') }}" alt="Profile Picture" class="profile-large">
                            <div class="photo-actions">
                                <div class="action-buttons">
                                    <button type="button" class="btn-primary-sm">Ubah Foto</button>
                                    <button type="button" class="btn-text">Hapus</button>
                                </div>
                                <p class="helper-text">JPG, PNG atau WebP. Maksimal 2MB.</p>
                            </div>
                        </div>

                        <!-- Personal Info Section -->
                        <div class="settings-grid-layout">
                            
                            <!-- Kolom Kiri: Informasi Umum -->
                            <div class="settings-col">
                                <div class="section-title">
                                    <h3>Informasi Umum</h3>
                                    <p>Perbarui data diri dan kontak Anda.</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="namaLengkap">Nama Lengkap</label>
                                    <input type="text" id="namaLengkap" name="namaLengkap" value="Adv. Adi Pratama, S.H., M.H.">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="adi.pratama@ksp-law.com">
                                </div>
                                
                                <div class="form-group">
                                    <label for="telepon">Nomor Telepon</label>
                                    <input type="text" id="telepon" name="telepon" value="+62 812-3456-7890">
                                </div>
                            </div>

                            <!-- Kolom Kanan: Keamanan Akun -->
                            <div class="settings-col">
                                <div class="section-title">
                                    <h3>Keamanan Akun</h3>
                                    <p>Pengaturan kata sandi dan proteksi autentikasi.</p>
                                </div>

                                <div class="form-group">
                                    <label for="sandiSaatIni">Sandi Saat Ini</label>
                                    <input type="password" id="sandiSaatIni" name="sandiSaatIni" value="password123">
                                </div>
                                
                                <div class="form-group">
                                    <label for="sandiBaru">Sandi Baru</label>
                                    <input type="password" id="sandiBaru" name="sandiBaru" placeholder="Masukkan sandi baru">
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-outline">Batal</button>
                            <button type="submit" class="btn-primary">Simpan Perubahan</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>

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
    </script>
</body>
</html>