<div>
    {{-- Custom CSS untuk halaman ini --}}
    <style>
        .auth-bg {
            /* --- BAGIAN BACKGROUND (SESUAI DENGAN KODE ANDA) --- */
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('img/tentang vegas.jpeg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            /* --- PERUBAHAN UTAMA: GLASSMORPHISM DAN TEKS PUTIH --- */
            background: rgba(0, 0, 0, 0.2); /* Transparan gelap */
            color: #fff; /* Teks utama di dalam card menjadi putih */
            
            backdrop-filter: blur(15px); /* Efek Blur */
            -webkit-backdrop-filter: blur(15px);
            
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5); /* Bayangan lebih gelap */
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        /* PERBAIKAN TEKS DAN IKON AGAR BENAR-BENAR PUTIH */
        .login-card h4, 
        .login-card .text-muted, 
        .login-card .text-gray-600,
        .login-card .form-control-icon i,
        .login-card .form-check-label,
        .login-card .small {
            color: #fff !important; /* Memaksa warna putih */
        }
        
        .login-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #0061f2, #6900f2);
        }

        .logo-container img {
            height: 100px;
            width: auto;
            margin-bottom: 1rem;
            filter: drop-shadow(0 5px 5px rgba(0,0,0,0.2)); /* Ubah bayangan agar sesuai latar belakang gelap */
        }

        /* PERBAIKAN INPUT FIELD AGAR TRANSPARAN & TEKS INPUT PUTIH */
        .form-control {
            background: rgba(255, 255, 255, 0.1); /* Input transparan */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Border tipis putih */
            color: #fff; /* Teks yang diketik putih */
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.95rem;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7) !important; /* Placeholder warna putih semi-transparan */
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.15);
            border-color: #fff;
        }
        
        .btn-primary {
            background: #0061f2;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #004bbd;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 97, 242, 0.3);
        }
    </style>

    <div class="auth-bg">
        <div class="login-card animate__animated animate__fadeInUp">
            
            {{-- Logo Section --}}
            <div class="text-center logo-container">
                {{-- Tombol Kembali --}}
                <div class="mb-3 text-start">
                    {{-- Diubah ke text-white --}}
                    <a href="{{ route('welcome') }}" class="text-decoration-none small"> 
                        <i class="bi bi-arrow-left"></i> Kembali ke Homepage
                    </a>
                </div>

                {{-- Logo Sekolah --}}
                <img src="{{ asset('img/logo.png') }}" alt="Logo SMAN 113 JAKARTA">
                {{-- Diubah ke text-white --}}
                <h4 class="font-weight-bold mb-1">SMAN 113 JAKARTA</h4>
                
            </div>

            {{-- Alerts Section (Biarkan seperti ini, alert sudah memiliki warna sendiri) --}}
            @if (session('error'))
            <div class="alert alert-warning alert-dismissible fade show text-sm" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @error('email')
            <div class="alert alert-danger alert-dismissible fade show text-sm" role="alert">
                <i class="bi bi-x-circle me-2"></i> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror

            @error('password')
            <div class="alert alert-danger alert-dismissible fade show text-sm" role="alert">
                <i class="bi bi-x-circle me-2"></i> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror

            {{-- Form Section --}}
            <form wire:submit.prevent="authenticate">
                
                {{-- Email Input --}}
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="email" wire:model.blur="email"
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Alamat Email"
                        autofocus>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

                {{-- Password Input --}}
                <div class="form-group mb-3 position-relative has-icon-left">
                    <input type="{{ $input_type }}" wire:model.blur="password"
                        class="form-control pe-5 @error('password') is-invalid @enderror"
                        placeholder="Kata Sandi" />
                    
                    {{-- Toggle Password Visibility --}}
                    {{-- Hilangkan text-muted agar warna mengikuti .login-card (putih) --}}
                    <span wire:click="togglePasswordVisibility" title="{{ $input_title }}"
                        class="position-absolute top-50 end-0 translate-middle-y me-3" 
                        style="cursor: pointer; z-index: 10;">
                        <i class="{{ $icon }}"></i>
                    </span>

                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="form-check d-flex align-items-center mb-4">
                    <input class="form-check-input me-2" wire:model="remember_me" type="checkbox" id="rememberMe">
                    {{-- Hilangkan text-gray-600 agar warna mengikuti .login-card (putih) --}}
                    <label class="form-check-label small" for="rememberMe">
                        Ingat Saya
                    </label>
                </div>

                {{-- Submit Button --}}
                <button class="btn btn-primary w-100 shadow-sm" type="submit">
                    Masuk Dashboard
                </button>
            </form>
            
            {{-- Footer Copyright --}}
            <div class="text-center mt-4">
                {{-- Hilangkan text-muted agar warna mengikuti .login-card (putih) --}}
                <p class="small" style="font-size: 0.7rem;">
                    &copy; {{ date('Y') }} Yayasan Pendidikan Kita<br>SMK Sandikta
                </p>
            </div>
        </div>
    </div>
</div>