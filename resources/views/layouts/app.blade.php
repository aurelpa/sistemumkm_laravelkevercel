<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Pendataan UMKM - Platform manajemen data Usaha Mikro, Kecil, dan Menengah">
    <title>@yield('title', 'Dashboard') | Sistem Pendataan UMKM</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --primary-light: #818cf8;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #0f172a;
            --dark-2: #1e293b;
            --dark-3: #334155;
            --text-muted: #94a3b8;
            --border: rgba(255,255,255,0.08);
            --card-bg: rgba(255,255,255,0.04);
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark-2);
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-brand .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            margin-bottom: 10px;
        }

        .sidebar-brand h5 {
            font-size: 0.95rem;
            font-weight: 700;
            color: white;
            margin-bottom: 2px;
            line-height: 1.3;
        }

        .sidebar-brand small {
            color: var(--text-muted);
            font-size: 0.72rem;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .nav-label {
            color: var(--text-muted);
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0 8px;
            margin-bottom: 8px;
            margin-top: 16px;
        }

        .nav-link-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-link-item:hover {
            background: rgba(79, 70, 229, 0.15);
            color: var(--primary-light);
        }

        .nav-link-item.active {
            background: linear-gradient(135deg, rgba(79,70,229,0.3), rgba(14,165,233,0.15));
            color: white;
            border: 1px solid rgba(79,70,229,0.4);
        }

        .nav-link-item i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            background: var(--dark-2);
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-title {
            font-size: 1rem;
            font-weight: 600;
            color: white;
        }

        .topbar-subtitle {
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-btn {
            width: 36px;
            height: 36px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s;
        }

        .topbar-btn:hover {
            background: rgba(79,70,229,0.2);
            color: var(--primary-light);
            border-color: var(--primary);
        }

        .hamburger {
            display: none;
        }

        /* ===== PAGE CONTENT ===== */
        .page-content {
            padding: 28px;
            flex: 1;
        }

        /* ===== CARDS ===== */
        .card {
            background: var(--dark-2);
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border);
            padding: 16px 20px;
        }

        .card-body {
            padding: 20px;
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: var(--dark-2);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient);
        }

        .stat-card.primary { --gradient: linear-gradient(90deg, #4f46e5, #818cf8); }
        .stat-card.success { --gradient: linear-gradient(90deg, #10b981, #34d399); }
        .stat-card.warning { --gradient: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .stat-card.info    { --gradient: linear-gradient(90deg, #0ea5e9, #38bdf8); }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 16px;
        }

        .stat-icon.primary { background: rgba(79,70,229,0.2); color: #818cf8; }
        .stat-icon.success { background: rgba(16,185,129,0.2); color: #34d399; }
        .stat-icon.warning { background: rgba(245,158,11,0.2); color: #fbbf24; }
        .stat-icon.info    { background: rgba(14,165,233,0.2); color: #38bdf8; }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ===== TABLES ===== */
        .table {
            color: #e2e8f0;
        }

        .table thead th {
            background: rgba(255,255,255,0.04);
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 12px 16px;
        }

        .table tbody td {
            border-color: var(--border);
            padding: 14px 16px;
            vertical-align: middle;
            font-size: 0.875rem;
        }

        .table tbody tr {
            transition: background 0.15s;
        }

        .table tbody tr:hover {
            background: rgba(255,255,255,0.03);
        }

        /* ===== BADGES ===== */
        .badge-jenis {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 600;
            background: rgba(79,70,229,0.2);
            color: #818cf8;
            border: 1px solid rgba(79,70,229,0.3);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), #2e27a5);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(79,70,229,0.4);
            color: white;
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary-light);
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 0.8rem;
            border-radius: 6px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .btn-view {
            background: rgba(14,165,233,0.15);
            color: #38bdf8;
            border: 1px solid rgba(14,165,233,0.3);
        }

        .btn-view:hover {
            background: rgba(14,165,233,0.3);
            color: #38bdf8;
        }

        .btn-edit {
            background: rgba(245,158,11,0.15);
            color: #fbbf24;
            border: 1px solid rgba(245,158,11,0.3);
        }

        .btn-edit:hover {
            background: rgba(245,158,11,0.3);
            color: #fbbf24;
        }

        .btn-delete {
            background: rgba(239,68,68,0.15);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.3);
        }

        .btn-delete:hover {
            background: rgba(239,68,68,0.3);
            color: #f87171;
        }

        /* ===== FORMS ===== */
        .form-control,
        .form-select {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            color: #e2e8f0;
            padding: 10px 14px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            background: rgba(255,255,255,0.07);
            border-color: var(--primary);
            color: #e2e8f0;
            box-shadow: 0 0 0 3px rgba(79,70,229,0.2);
        }

        .form-control::placeholder {
            color: rgba(148,163,184,0.5);
        }

        .form-select option {
            background: var(--dark-2);
            color: #e2e8f0;
        }

        .form-label {
            font-size: 0.83rem;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 6px;
        }

        .invalid-feedback {
            font-size: 0.78rem;
        }

        /* ===== ALERTS ===== */
        .alert {
            border-radius: 10px;
            border: none;
            font-size: 0.875rem;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: rgba(16,185,129,0.15);
            color: #34d399;
            border: 1px solid rgba(16,185,129,0.3);
        }

        .alert-danger {
            background: rgba(239,68,68,0.15);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.3);
        }

        .alert-warning {
            background: rgba(245,158,11,0.15);
            color: #fbbf24;
            border: 1px solid rgba(245,158,11,0.3);
        }

        /* ===== PAGINATION ===== */
        .pagination .page-link {
            background: var(--dark-2);
            border-color: var(--border);
            color: #94a3b8;
            font-size: 0.83rem;
            padding: 8px 14px;
            border-radius: 6px;
            margin: 0 2px;
            transition: all 0.2s;
        }

        .pagination .page-link:hover {
            background: rgba(79,70,229,0.2);
            color: var(--primary-light);
            border-color: var(--primary);
        }

        .pagination .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .pagination .page-item.disabled .page-link {
            background: rgba(255,255,255,0.03);
            color: rgba(148,163,184,0.3);
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: white;
            margin-bottom: 4px;
        }

        .section-subtitle {
            font-size: 0.83rem;
            color: var(--text-muted);
        }

        /* ===== SEARCH BOX ===== */
        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .search-wrapper input {
            padding-left: 36px;
        }

        /* ===== DETAIL ===== */
        .detail-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 0.93rem;
            color: #e2e8f0;
            font-weight: 500;
        }

        .detail-divider {
            border-color: var(--border);
            margin: 20px 0;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state-icon {
            font-size: 3.5rem;
            color: var(--text-muted);
            opacity: 0.4;
            margin-bottom: 16px;
        }

        /* ===== MODAL ===== */
        .modal-content {
            background: var(--dark-2);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .modal-header {
            border-bottom-color: var(--border);
        }

        .modal-footer {
            border-top-color: var(--border);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .hamburger {
                display: flex;
            }

            .page-content {
                padding: 16px;
            }

            .stat-value {
                font-size: 1.6rem;
            }
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--dark-3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="bi bi-shop"></i>
            </div>
            <h5>Sistem Pendataan UMKM</h5>
            <small>Platform Manajemen UMKM</small>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="nav-link-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <div class="nav-label">Manajemen Data</div>
            <a href="{{ route('umkm.index') }}" class="nav-link-item {{ request()->routeIs('umkm.*') ? 'active' : '' }}">
                <i class="bi bi-building"></i>
                <span>Data UMKM</span>
            </a>
            <a href="{{ route('umkm.create') }}" class="nav-link-item">
                <i class="bi bi-plus-circle"></i>
                <span>Tambah UMKM</span>
            </a>
        </nav>

    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="topbar-btn hamburger" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                    <div class="topbar-subtitle">@yield('page-subtitle', 'Sistem Pendataan UMKM')</div>
                </div>
            </div>
            <div class="topbar-right">
                <div class="topbar-btn" title="Notifikasi">
                    <i class="bi bi-bell"></i>
                </div>
                <div style="width:34px;height:34px;background:linear-gradient(135deg,#4f46e5,#0ea5e9);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:white;">A</div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-danger" id="deleteModalLabel">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0" style="color:#cbd5e1;">Apakah Anda yakin ingin menghapus data UMKM <strong id="deleteUmkmName" style="color:white;"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 && sidebar && sidebarToggle) {
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Delete Modal
        const deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                document.getElementById('deleteUmkmName').textContent = name;
                document.getElementById('deleteForm').action = '/umkm/' + id;
            });
        }

        // Auto hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>
