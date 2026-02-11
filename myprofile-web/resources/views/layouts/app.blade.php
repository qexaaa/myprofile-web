<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Bootstrap 5 icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>

        body {
        margin: 0;
        padding-top: 70px;
        position: relative;
        background: transparent;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: -1;

            background-image: url("{{ $heroBg ?? '' }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            filter: brightness(0.55);
        }
        /*
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            display: flex;
            align-items: center;
        }

        .hero img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
        }

        */

        html {
            scroll-behavior: smooth;
        }

        body {
            padding-top: 70px; /* supaya navbar tidak nutup konten */
        }

        .skill-bar {
            transition: width 1.2s ease-in-out;
            font-weight: 500;
        }

        .progress-bar {
            transition: width 1.2s ease;
            font-weight: 500;
        }

        .card {
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,.12);
        }

        .hero-content {
            opacity: 0;
            transform: translateY(30px);
            animation: heroFadeUp 1.1s ease forwards;
        }

        @keyframes heroFadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================
        CERTIFICATE CARD – PUBLIC
        ========================= */

        .certificate-card {
            border-radius: 16px;
            overflow: hidden;
            transition: all .25s ease;
        }

        .certificate-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0,0,0,.15);
        }

        .certificate-card img {
            transition: transform .3s ease;
        }

        .certificate-card:hover img {
            transform: scale(1.05);
        }

        .certificate-thumb {
            height: 180px;
            background: #f3f4f6;
            overflow: hidden;
        }

        .certificate-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* =========================
        Portofolio CARD – PUBLIC
        ========================= */

        .portfolio-card {
            border-radius: 16px;
            overflow: hidden;
            transition: all .25s ease;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .portfolio-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 45px rgba(0,0,0,0.15);
        }

        .portfolio-card img {
            object-fit: cover;
            height: 200px;
        }

        .portfolio-card .card-body {
            padding: 18px;
        }

        .portfolio-card .card-title {
            font-weight: 600;
        }


        /* =========================
        Navbar Cstomization
        ========================= */

        .navbar-brand {
            font-size: 18px;
            letter-spacing: 0.5px;
        }

        .brand-role {
            font-size: 12px;
            color: #adb5bd;
            margin-left: 6px;
        }

        .contact-card {
            animation: fadeUp 0.4s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        skeleton {
            background: linear-gradient(
                90deg,
                #e5e7eb 25%,
                #f3f4f6 37%,
                #e5e7eb 63%
            );
            background-size: 400% 100%;
            animation: shimmer 1.4s ease infinite;
            border-radius: 12px;
            height: 220px;
        }

        @keyframes shimmer {
            0% { background-position: 100% 0; }
            100% { background-position: -100% 0; }
        }

    </style>
</head>
<body>

@include('layouts.navbar')

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const skillSection = document.querySelector("#skills");
    const bars = document.querySelectorAll(".skill-bar");
    let animated = false;

    function animateSkills() {
        if (!skillSection || animated) return;

        const sectionTop = skillSection.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (sectionTop < windowHeight - 100) {
            bars.forEach(bar => {
                const level = bar.getAttribute("data-level");
                bar.style.width = level + "%";
                bar.textContent = level + "%";
            });
            animated = true;
        }
    }

    window.addEventListener("scroll", animateSkills);
    animateSkills(); // jaga-jaga kalau langsung kelihatan
});
</script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.querySelector(".typing-text");
            if (!el) return;

            const text = el.textContent;
            el.textContent = "";

            let i = 0;
            const speed = 40; // makin besar = makin lambat

            function type() {
                if (i < text.length) {
                    el.textContent += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }

            type();
        });
    </script>

    <script src="{{ asset('js/home-pagination.js') }}"></script>


</body>
</html>
