<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Lawyer Portal</title>
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                    {{-- Tempat asset logo milikmu --}}
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
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
                        <i class='bx bx-shopping-bag'></i>
                        <span>Kelola Perkara</span>
                    </a>
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
                <a href="{{ route('lawyer.akun.index') }}" class="nav-item active">
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
                        <span>Akun</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span class="current">Pengaturan akun</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn notif-btn" title="Notifikasi">
                        <i class='bx bx-bell'></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="user-profile">
                        <div class="avatar">
                            {{-- Tempat asset foto profil lawyer milikmu --}}
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
                <div class="settings-container">
                    <!-- Page Heading -->
                    <div class="page-header">
                        <h1 class="page-title">Pengaturan akun</h1>
                        <p class="page-subtitle">Kelola informasi pribadi dan keamanan akun Anda.</p>
                    </div>

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

                    <form action="{{ route('lawyer.akun.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Card 1: Informasi Pribadi -->
                        <div class="settings-card">
                            <div class="card-header">
                                <h3>Informasi Pribadi</h3>
                            </div>

                            <!-- Foto Profil -->
                            <div class="profile-photo-section">
                                <img src="{{ asset($lawyer['photo_path'] ?? 'images/lawyer-default.png') }}" alt="{{ $lawyer['full_name'] }}" class="profile-large" id="avatarPreview">
                                <div class="photo-actions">
                                    <div class="action-buttons">
                                        <input type="file" name="avatar" id="avatarInput" accept="image/jpeg,image/png,image/webp" hidden>
                                        <button type="button" class="btn-primary-sm" id="btnTriggerAvatar">Ubah Foto</button>
                                        <button type="button" class="btn-outline-sm" id="btnRemoveAvatar">Hapus</button>
                                    </div>
                                    <p class="helper-text">JPG, PNG atau WebP. Maksimal 2MB.</p>
                                </div>
                            </div>

                            <!-- Form Grid 2 Kolom -->
                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $lawyer['full_name']) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $lawyer['email']) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone', $lawyer['phone']) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Keamanan Akun -->
                        <div class="settings-card">
                            <div class="card-header">
                                <h3>Keamanan Akun</h3>
                                <p>Pengaturan kata sandi dan proteksi autentikasi dua faktor.</p>
                            </div>

                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="current_password">Sandi Saat Ini</label>
                                    <input type="password" id="current_password" name="current_password" placeholder="••••••••••••">
                                </div>

                                <div class="form-group">
                                    <label for="new_password">Sandi Baru</label>
                                    <input type="password" id="new_password" name="new_password" placeholder="Masukkan sandi baru">
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="{{ route('lawyer.akun.index') }}" class="btn-outline">Batal</a>
                            <button type="submit" class="btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>

                    <!-- Form Tersembunyi untuk Hapus Avatar -->
                    <form action="{{ route('lawyer.akun.avatar.delete') }}" method="POST" id="deleteAvatarForm" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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

            // Trigger Input File Foto Profil & Live Preview
            const btnTriggerAvatar = document.getElementById('btnTriggerAvatar');
            const avatarInput = document.getElementById('avatarInput');
            const avatarPreview = document.getElementById('avatarPreview');
            const btnRemoveAvatar = document.getElementById('btnRemoveAvatar');
            const deleteAvatarForm = document.getElementById('deleteAvatarForm');

            if (btnTriggerAvatar && avatarInput) {
                btnTriggerAvatar.addEventListener('click', function() {
                    avatarInput.click();
                });

                avatarInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            avatarPreview.src = event.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            if (btnRemoveAvatar && deleteAvatarForm) {
                btnRemoveAvatar.addEventListener('click', function() {
                    if (confirm('Hapus foto profil saat ini?')) {
                        deleteAvatarForm.submit();
                    }
                });
            }
        });
    </script>
</body>
</html>