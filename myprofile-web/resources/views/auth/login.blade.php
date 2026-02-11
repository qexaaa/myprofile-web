<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }
        .login-card {
            border-radius: 1rem;
        }
        .password-toggle {
            cursor: pointer;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">

            <div class="card shadow-lg border-0 login-card">
                <div class="card-body p-4">

                    {{-- HEADER --}}
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Admin Panel</h4>
                        <p class="text-muted mb-0">
                            Silakan login untuk melanjutkan
                        </p>
                    </div>

                    {{-- ERROR --}}
                    @if(session('error'))
                        <div class="alert alert-danger small">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form method="POST" action="{{ url('/admin/login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="admin@email.com"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>

                            <div class="input-group">
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control"
                                       placeholder="••••••••"
                                       required>

                                <span class="input-group-text password-toggle"
                                      id="togglePassword">
                                    <i class="bi bi-eye-slash" id="iconPassword"></i>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                    {{-- FOOTER --}}
                    <div class="text-center mt-3">
                        <a href="{{ url('/') }}"
                           class="text-decoration-none small text-muted">
                            ← Kembali ke Website
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- SHOW / HIDE PASSWORD SCRIPT --}}
<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const iconPassword = document.getElementById('iconPassword');

    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        iconPassword.classList.toggle('bi-eye');
        iconPassword.classList.toggle('bi-eye-slash');
    });
</script>

</body>
</html>
