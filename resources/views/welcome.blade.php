<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        /* 1. Navbar Transparan */
        .navbar { transition: 0.3s; padding: 20px 0; }
        .navbar-brand { font-weight: 700; font-size: 24px; color: white !important; }
        .nav-link { color: rgba(255,255,255,0.8) !important; font-weight: 500; margin-left: 20px; }
        .nav-link:hover { color: white !important; }

        /* 2. Hero Section (Gambar Besar) */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('https://sman113jakarta.sch.id/wp-content/uploads/2023/07/LOBBY-DSC_0735.jpg');
            background-size: cover;
            background-position: center;
            height: 90vh; /* Tinggi hampir selayar penuh */
            display: flex;
            align-items: center;
            color: white;
            position: relative;
        }

        /* 3. Floating Cards (Kartu Melayang) */
        .floating-container {
            margin-top: -100px; /* Ini kuncinya: naik ke atas menimpa gambar */
            position: relative;
            z-index: 10;
        }
        .info-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border: none;
            transition: transform 0.3s;
        }
        .info-card:hover { transform: translateY(-10px); }
        .icon-box { font-size: 40px; color: #0d6efd; margin-bottom: 15px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg position-absolute w-100 z-3">
        <div class="container">
            <a class="navbar-brand" href="#">
    <img src="{{ asset('img/logo.png') }}" alt="Logo SMAN 113 JAKARTA" height="150">
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item ms-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-light text-primary px-4 py-2 rounded-pill fw-bold">Login</a>
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="text-uppercase tracking-wider mb-2 d-block text-warning fw-bold"></span>
                    <h1 class="display-3 fw-bold mb-4">SMAN 113 JAKARTA</h1>
                    <p class="lead mb-5 text-white-50">Unggul Dan Berkarakter Pancasila Serta Peduli Lingkungan</p>
                    <a href="#" class="btn btn-primary btn-lg px-5 py-3 rounded-1 fw-bold">Daftar Disini</a>
                </div>
            </div>
        </div>
    </section>

    <section class="floating-container mb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card info-card h-100">
                        <div class="d-flex align-items-start">
                            <div class="icon-box me-3"><i class="bi bi-mortarboard"></i></div>
                            <div>
                                <h4 class="fw-bold">Moto</h4>
                                <p class="text-muted small">Unggul Berprestasi, Teladan Berbudi Pekerti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card h-100">
                        <div class="d-flex align-items-start">
                            <div class="icon-box me-3"><i class="bi bi-buildings"></i></div>
                            <div>
                                <h4 class="fw-bold">VISI</h4>
                                <p class="text-muted small">menjadi sekolah modern yang beriman, cerdas, berdaya saing, dan berkarakter, dengan misi menciptakan lulusan berkualitas tinggi yang berintegritas dan mampu bersaing secara global, didukung lingkungan belajar yang inovatif, aman, nyaman, serta menanamkan nilai-nilai agama dan nasionalisme

</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card h-100">
                        <div class="d-flex align-items-start">
                            <div class="icon-box me-3"><i class="bi bi-book"></i></div>
                            <div>
                                <h4 class="fw-bold">MISI</h4>
                                <p class="text-muted small">fokus pada peningkatan kualitas pendidikan melalui prestasi akademik & non-akademik, pengembangan profesional guru, integrasi teknologi, penanaman nilai Pancasila & budi pekerti luhur, serta menciptakan lingkungan sekolah yang aman, nyaman, dan peduli lingkungan, didukung kemitraan harmonis & literasi, serta pembinaan kepemimpinan siswa. Sekolah ini bertujuan membentuk lulusan berakhlak mulia, cerdas, berdaya saing, dan berkarakter kuat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('img/proffff.jpeg') }}" class="img-fluid rounded shadow" alt="Students">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h5 class="text-primary fw-bold"></h5>
                    <h2 class="fw-bold mb-4">Tentang SMAN 113 JAKARTA</h2>
                    <p class="text-muted">SMAN 113 Jakarta merupakan salah satu institusi pendidikan menengah atas negeri yang berlokasi strategis di Jakarta Timur. Sekolah ini didirikan dengan tujuan utama untuk memberikan layanan pendidikan berkualitas, membentuk karakter peserta didik yang unggul, berintegritas, dan siap bersaing di era global.

Sejak berdirinya, SMAN 113 Jakarta telah berkomitmen penuh untuk menjadi pelopor dalam inovasi pendidikan dan pengembangan potensi siswa secara holistik, baik dalam bidang akademik maupun non-akademik.</p>
                    
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 mt-5 text-center">
        <div class="container">
            <small>&copy; 2025 SMAN NEGERI 113 JAKARTA VEGAS</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>