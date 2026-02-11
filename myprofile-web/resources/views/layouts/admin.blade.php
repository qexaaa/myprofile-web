<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Optional Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    /* === ROOT === */
    body {
        min-height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        transition: background-color .3s, color .3s;
    }

    /* === SIDEBAR === */
    .sidebar {
        width: 240px;
        min-height: 100vh;
        background: #1f2937;
    }

    .sidebar a {
        color: #cbd5e1;
        border-radius: 8px;
        transition: all .2s ease;
    }

    .sidebar a:hover {
        background: #374151;
        color: #fff;
    }

    .sidebar a.active {
        background: #2563eb;
        color: #fff;
    }

    /* === CONTENT === */
    .content {
        padding: 28px;
    }

    /* === CARD (DEFAULT / LIGHT MODE) === */
    .card {
        border-radius: 16px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        transition: all .25s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.12);
    }

    .card .icon {
        font-size: 1.8rem;
        opacity: .9;
    }

    /* ===bDARK MODE BASE === */
    body.dark {
        background: radial-gradient(circle at top, #020617, #020617);
        color: #e5e7eb;
    }

    /* === DARK SIDEBAR === */
    body.dark .sidebar {
        background: #020617;
    }

    body.dark .sidebar a {
        color: #94a3b8;
    }

    body.dark .sidebar a:hover {
        background: #0f172a;
        color: #fff;
    }

    body.dark .sidebar a.active {
        background: #2563eb;
        color: #fff;
    }

    /* === DARK CARD === */
    body.dark .card {
        position: relative;
        background: linear-gradient(180deg, #020617, #020617);
        border-radius: 16px;

        /* OUTLINE + DEPTH */
        border: 1px solid rgba(148,163,184,0.18);
        box-shadow:
            0 0 0 1px rgba(148,163,184,0.05),
            0 25px 50px rgba(0,0,0,0.7);

        transition: all .25s ease;
    }

    /* HOVER ELEGAN */
    body.dark .card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 0 0 1px rgba(148,163,184,0.25),
            0 35px 70px rgba(0,0,0,0.9);
    }

    /* CARD TEXT */
   /* Default text */
    body.dark {
        color: #e5e7eb;
    }

    /* Heading */
    body.dark h1,
    body.dark h2,
    body.dark h3,
    body.dark h4,
    body.dark h5 {
        color: #f8fafc;
    }

    /* Card text only */
    body.dark .card {
        color: #e5e7eb;
    }

    /* Table text */
    body.dark .table th {
        color: #cbd5e1;
    }

    body.dark .table td {
        color: #f1f5f9;
    }

    /* Label */
    body.dark label,
    body.dark .form-label {
        color: #cbd5e1;
    }

    /* Input & textarea */
    body.dark .form-control {
        background: #020617;
        border: 1px solid rgba(148,163,184,0.25);
        color: #e5e7eb;
    }

    body.dark .form-control::placeholder {
        color: #64748b;
    }

    /* Table */
    body.dark table th {
        color: #94a3b8;
    }

    body.dark table td {
        color: #e5e7eb;
    }

    /* Alert / empty state */
    body.dark .alert,
    body.dark .empty-state {
        background: rgba(255,255,255,0.03);
        color: #cbd5e1;
    }


    /* SUBTEXT */
    body.dark .card small,
    body.dark .card span {
        color: #94a3b8 !important;
    }

    /* ICON */
    body.dark .card i {
        font-size: 1.9rem;
        opacity: .9;
    }

    /* INNER GLOW (BIAR KELIAT PREMIUM) */
    body.dark .card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 16px;
        pointer-events: none;
        box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04);
    }

    /* === BUTTON === */
    .btn-outline-light {
        border-radius: 10px;
    }

    /* === TABLE (DARK MODE FRIENDLY) === */
    body.dark table {
        color: #e5e7eb;
    }

    body.dark table thead {
        background: #020617;
    }

    body.dark table tbody tr:hover {
        background: rgba(255,255,255,0.03);
    }

    /* Table wrapper */
    body.dark .table {
        background: transparent;
    }

    /* Header */
    body.dark .table thead th {
        background: #020617;
        color: #cbd5e1;
        font-weight: 600;
        border-bottom: 1px solid rgba(148,163,184,0.25);
    }

    /* Body row */
    body.dark .table tbody tr {
        background: rgba(255,255,255,0.02);
    }

    /* Body text */
    body.dark .table tbody td {
        color: #e5e7eb;
        border-bottom: 1px solid rgba(148,163,184,0.12);
    }

    /* Hover */
    body.dark .table tbody tr:hover {
        background: rgba(255,255,255,0.06);
    }

    /* === ADMIN CARD === */
    .admin-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        box-shadow:
            0 10px 25px rgba(0,0,0,0.45),
            inset 0 0 0 1px rgba(255,255,255,0.02);
        backdrop-filter: blur(6px);
    }

    /* === TABLE === */
    .admin-table {
        color: #e5e7eb;
    }

    .admin-table thead th {
        color: #9ca3af;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .admin-table tbody tr:hover {
        background: rgba(255,255,255,0.04);
    }

    /* === EMPTY STATE === */
    .empty-state {
        padding: 40px 20px;
        text-align: center;
        color: #9ca3af;
    }

    .empty-state i {
        font-size: 40px;
        margin-bottom: 12px;
        opacity: 0.6;
    }

    /* === FORM INPUT – DARK MODE === */
    body.dark .form-control,
    body.dark .form-select {
        background: #020617;
        color: #e5e7eb;
        border: 1px solid rgba(148,163,184,0.3);
    }

    body.dark .form-control::placeholder {
        color: #64748b;
    }

    body.dark .form-control:focus {
        background: #020617;
        color: #fff;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.35);
    }

    /* Pastikan isi cell kelihatan */
    body.dark .admin-table tbody td {
        background: #020617;
        color: #f8fafc;
        vertical-align: middle;
    }

    /* Header tabel lebih kontras */
    body.dark .admin-table thead th {
        background: #020617;
        color: #e5e7eb;
        font-weight: 600;
    }

    /* Row hover */
    body.dark .admin-table tbody tr:hover td {
        background: #020617;
    }

    /* === ICON BUTTON ACTION === */
    .btn-icon {
        width: 38px;
        height: 38px;
        padding: 0;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: 1px solid transparent;
        transition: all .2s ease;
    }

    /* EDIT – BIRU OUTLINE */
    .btn-edit {
        border: 1px solid #2563eb;
        color: #3b82f6;
    }

    .btn-edit:hover {
        background: rgba(37,99,235,.15);
    }

    /* DELETE – BIARKAN SEPERTI SEKARANG */
    .btn-delete {
        border: 1px solid #ef4444;
        color: #f87171;
    }

    .btn-delete:hover {
        background: rgba(239,68,68,.15);
    }

    /* === ADMIN TABLE === */

    .admin-table-wrapper {
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid rgba(148,163,184,0.25);
    }

    body.dark .admin-table-wrapper {
        background: #020617;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    /* HEADER */
    .admin-table thead th {
        background: rgba(15,23,42,0.9);
        color: #e5e7eb !important;
        font-weight: 600;
        padding: 14px;
        border-bottom: 1px solid rgba(148,163,184,0.25);
    }

    /* ROW */
    .admin-table tbody tr {
        background: rgba(255,255,255,0.03);
    }

    .admin-table tbody tr:hover {
        background: rgba(255,255,255,0.06);
    }

    /* CELL */
    .admin-table tbody td {
        color: #f8fafc !important;
        padding: 14px;
        border-bottom: 1px solid rgba(148,163,184,0.12);
    }
    
    /* ==== PORTFOLIO IMAGE CARD === */
    .portfolio-thumb-card {
        width: 140px;
        height: 90px;
        border-radius: 12px;
        overflow: hidden;
        background: #020617;
        border: 1px solid rgba(148,163,184,0.25);
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .portfolio-thumb-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .25s ease;
    }

    .portfolio-thumb-card:hover img {
        transform: scale(1.05);
    }

    /* === LIGHT MODE ===== */

    /* Body light */
    body:not(.dark) {
        background: #f8fafc;
        color: #111827;
    }

    /* Admin Card */
    body:not(.dark) .admin-card {
        background: #ffffff;
        color: #111827;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* Table wrapper */
    body:not(.dark) .admin-table-wrapper {
        background: #ffffff;
    }

    /* Table */
    body:not(.dark) .admin-table {
        color: #111827;
    }

    /* Table header */
    body:not(.dark) .admin-table thead th {
        background: #1f2937;
        color: #ffffff !important;
        font-weight: 600;
    }

    /* Table body */
    body:not(.dark) .admin-table tbody td {
        background: #ffffff;
        color: #111827 !important;
    }

    /* Row hover */
    body:not(.dark) .admin-table tbody tr:hover td {
        background: #f1f5f9;
    }

    /* Empty state */
    body:not(.dark) .empty-state {
        color: #6b7280;
    }

    /* Form input */
    body:not(.dark) .form-control,
    body:not(.dark) .form-select {
        background: #ffffff;
        color: #111827;
        border: 1px solid #d1d5db;
    }

    </style>

</head>
<body>

<div class="d-flex">
    {{-- SIDEBAR --}}
    <aside class="sidebar p-3">
        <h5 class="text-white mb-4">Admin Panel</h5>

        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/portfolios*') ? 'active' : '' }}"
                   href="{{ route('admin.portfolios.index') }}">
                    <i class="bi bi-collection me-2"></i> Portfolio
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/skills*') ? 'active' : '' }}"
                   href="{{ route('admin.skills.index') }}">
                    <i class="bi bi-bar-chart me-2"></i> Skills
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/certificates*') ? 'active' : '' }}"
                   href="{{ route('admin.certificates.index') }}">
                    <i class="bi bi-award me-2"></i> Certificates
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.profile.edit') }}"
                class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>

        </ul>

        <hr class="text-secondary">

        <button id="darkToggle" class="btn btn-outline-light w-100 mb-2">
            <i class="bi bi-moon-fill me-1"></i> Dark Mode
        </button>


        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-light w-100">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-fill content">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('click', function (e) {
    if (!e.target.closest('.btn-delete')) return;

    const btn = e.target.closest('.btn-delete');
    const id = btn.dataset.id;

    Swal.fire({
        title: 'Yakin hapus data?',
        text: 'Data yang dihapus tidak bisa dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
});
</script>


<script>
const toggle = document.getElementById('darkToggle');
const body = document.body;

// Load mode dari localStorage
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark');
    toggle.innerHTML = '<i class="bi bi-sun-fill me-1"></i> Light Mode';
}

toggle.addEventListener('click', () => {
    body.classList.toggle('dark');

    if (body.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
        toggle.innerHTML = '<i class="bi bi-sun-fill me-1"></i> Light Mode';
    } else {
        localStorage.setItem('theme', 'light');
        toggle.innerHTML = '<i class="bi bi-moon-fill me-1"></i> Dark Mode';
    }
});
</script>


@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = "{{ session('success') }}";

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: successMessage,
        timer: 2000,
        showConfirmButton: false
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('previewImageModal');
    const previewImage = document.getElementById('previewImage');
    const previewTitle = document.getElementById('previewImageTitle');

    modal.addEventListener('show.bs.modal', function (event) {
        const trigger = event.relatedTarget;
        previewImage.src = trigger.getAttribute('data-image');
        previewTitle.textContent = trigger.getAttribute('data-title');
    });
});
</script>


@endif


</body>
</html>
