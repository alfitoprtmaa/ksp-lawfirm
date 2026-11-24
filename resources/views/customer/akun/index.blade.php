<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama & CSS Pengaturan Akun -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/akun/akun.css') }}">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="app-container">
        
        <!-- SIDEBAR -->
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
                <ul>
                    <li><a href="{{ route('customer.index') }}"><i class='bx bx-grid-alt'></i> Overview</a></li>
                    <li><a href="{{ route('customer.perkaralama.index') }}"><i class='bx bx-git-pull-request'></i> Perkara Saya</a></li>
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-copy'></i> Perkara Baru</a></li>
                    <li><a href="{{ route('customer.tracking.index') }}"><i class='bx bx-message'></i> Track Your Case</a></li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <a href="{{ route('customer.akun.index') }}" class="settings-link active-link"><i class='bx bx-cog'></i> Pengaturan akun</a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-wrapper">
            
            <!-- TOP NAVBAR -->
            <header class="topbar">
                <div class="topbar-left d-flex align-center gap-3">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Klien</span> / <span class="current">Pengaturan Akun</span>
                    </div>
                </div>
                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $customer['full_name'] ?? 'Akun Anda' }}</span>
                            <span class="user-role">Klien</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <div class="content-area bg-page">
                
                <!-- Page Header -->
                <div class="welcome-section mb-4">
                    <h1 class="page-title text-dark font-bold">Pengaturan Akun</h1>
                    <p class="page-subtitle text-muted">Pantau status dan timeline perkara Anda.</p>
                </div>

                @if (session('success_profile'))
                    <div style="background:#ecfdf5; border:1px solid #a7f3d0; color:#065f46; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px;">
                        {{ session('success_profile') }}
                    </div>
                @endif

                @if (session('success_password'))
                    <div style="background:#ecfdf5; border:1px solid #a7f3d0; color:#065f46; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px;">
                        {{ session('success_password') }}
                    </div>
                @endif

                <!-- Profile Header Card -->
                <div class="card profile-header-card mb-4 rounded-lg bg-white border">
                    <div class="d-flex align-center gap-4">
                        <div class="avatar-lg bg-light-gray text-dark font-semibold">
                            {{ strtoupper(substr($customer['full_name'] ?? 'A', 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-dark m-0 mb-1">{{ $customer['full_name'] ?? 'Alfito Pratama' }}</h3>
                            <p class="text-sm text-muted m-0">Klien</p>
                        </div>
                    </div>

                    <form action="{{ route('customer.akun.updateAvatar') }}" method="POST" enctype="multipart/form-data" id="avatarUploadForm">
                        @csrf
                        <input type="file" name="avatar" id="avatarFileInput" accept="image/*" hidden onchange="document.getElementById('avatarUploadForm').submit()">
                        <button type="button" class="btn btn-light-outline d-flex align-center gap-2" onclick="document.getElementById('avatarFileInput').click()">
                            <i class='bx bx-camera text-lg'></i> Ubah Foto
                        </button>
                    </form>
                </div>

                <!-- Settings Grid Layout -->
                <div class="settings-grid">
                    
                    <!-- KARTU 1: INFORMASI PRIBADI -->
                    <div class="card settings-form-card rounded-lg bg-white border p-4">
                        <div class="card-header-icon mb-4 d-flex align-center gap-3">
                            <div class="icon-box-md bg-light-green text-dark rounded-md"><i class='bx bx-user'></i></div>
                            <div>
                                <h4 class="text-lg font-semibold text-dark m-0 mb-1">Informasi Pribadi</h4>
                                <p class="text-sm text-muted m-0">Pastikan data personal Anda selalu terbaru</p>
                            </div>
                        </div>

                        <form action="{{ route('customer.akun.updateProfile') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="form-label text-dark font-medium">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $customer['full_name'] ?? '') }}" required>
                                @error('full_name')
                                    <span style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label text-dark font-medium">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $customer['email'] ?? '') }}" required>
                                @error('email')
                                    <span style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label text-dark font-medium">Nomor Telpon</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $latestBookingPhone ?? '') }}">
                            </div>
                            
                            <div class="pt-2">
                                <button type="submit" class="btn btn-primary w-100 justify-center py-3 rounded-md font-semibold">
                                    Simpan Profil
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- KARTU 2: KEAMANAN AKUN -->
                    <div class="card settings-form-card rounded-lg bg-white border p-4">
                        <div class="card-header-icon mb-4 d-flex align-center gap-3">
                            <div class="icon-box-md bg-light-blue text-dark rounded-md"><i class='bx bx-lock-alt'></i></div>
                            <div>
                                <h4 class="text-lg font-semibold text-dark m-0 mb-1">Keamanan Akun</h4>
                                <p class="text-sm text-muted m-0">Pastikan data personal Anda selalu terbaru</p>
                            </div>
                        </div>

                        <form action="{{ route('customer.akun.updatePassword') }}" method="POST" id="passwordForm">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="form-label text-dark font-medium">Kata Sandi Saat Ini</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Masukkan kata sandi saat ini" required>
                                @error('current_password')
                                    <span style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label text-dark font-medium">Kata Sandi Baru</label>
                                <input type="password" name="password" id="newPasswordInput" class="form-control" placeholder="Rubah kata sandi anda" required>
                                @error('password')
                                    <span style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label text-dark font-medium">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" name="password_confirmation" id="confirmPasswordInput" class="form-control" placeholder="Ulangi kata sandi baru" required>
                            </div>
                            
                            <div class="pt-2">
                                <button type="submit" id="btnSubmitPassword" class="btn btn-disabled w-100 justify-center py-3 rounded-md font-semibold" disabled>
                                    Ubah Kata Sandi
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');
            if(mobileMenuBtn && sidebar) {
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

            // Aktifkan tombol "Ubah Kata Sandi" otomatis saat user mulai mengetik password baru
            const newPass = document.getElementById('newPasswordInput');
            const confirmPass = document.getElementById('confirmPasswordInput');
            const submitPassBtn = document.getElementById('btnSubmitPassword');

            function togglePasswordButton() {
                if (newPass.value.trim().length > 0 && confirmPass.value.trim().length > 0) {
                    submitPassBtn.disabled = false;
                    submitPassBtn.classList.remove('btn-disabled');
                    submitPassBtn.classList.add('btn-primary');
                } else {
                    submitPassBtn.disabled = true;
                    submitPassBtn.classList.add('btn-disabled');
                    submitPassBtn.classList.remove('btn-primary');
                }
            }

            if (newPass && confirmPass && submitPassBtn) {
                newPass.addEventListener('input', togglePasswordButton);
                confirmPass.addEventListener('input', togglePasswordButton);
            }
        });
    </script>
</body>
</html>