<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | مطعمنا اللذيذ</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #ff6b6b;
            --secondary-color: #ffa502;
            --dark-color: #2f3542;
            --light-color: #f1f2f6;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #fff9f9;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.9rem;
            color: white !important;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand img {
            height: 40px;
            margin-left: 10px;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 8px;
            position: relative;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            transform: translateY(-2px);
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: white;
            bottom: 0;
            right: 0;
            transition: width 0.3s;
        }
        
        .nav-link:hover:after {
            width: 100%;
            left: 0;
        }
        
        .cart-icon {
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--dark-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-section {
            background: url('/images/food-banner.jpg') no-repeat center center;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
        }
        
        .search-box {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .search-input {
            border-radius: 50px !important;
            padding: 15px 25px;
            border: none;
        }
        
        .search-btn {
            border-radius: 50px !important;
            padding: 10px 25px;
            background: var(--primary-color);
            border: none;
        }
    </style>
</head>
<body>
    <div class="top-bar py-2 d-none d-md-block" style="background: var(--dark-color); color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-phone-alt me-2"></i> 01141073336
                    <i class="fas fa-envelope ms-3 me-2"></i> Mohamedshams@Support.com
                </div>
                <div class="col-md-6 text-start">
                    <i class="fas fa-truck me-2"></i> توصيل مجاني للطلبات فوق 200 جنيه
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h1>طعامنا اللذيذ</h1>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home me-1"></i> الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products"><i class="fas fa-utensils me-1"></i> قائمة الطعام</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="fas fa-info-circle me-1"></i> عنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="fas fa-phone-alt me-1"></i> اتصل بنا</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/profile"><i class="fas fa-user me-1"></i> حسابي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cart-icon" href="/cart">
                                <i class="fas fa-shopping-cart"></i>
                                @if(Cart::count() > 0)
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                @endif
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link bg-transparent border-0">
                                    <i class="fas fa-sign-out-alt me-1"></i> تسجيل خروج
                                </button>
                            </form>
                        </li> --}}
                    @else
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> تسجيل دخول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus me-1"></i> تسجيل جديد</a>
                        </li> --}}
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- قسم الهيرو (اختياري) -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="display-3 fw-bold mb-4">أطيب المأكولات بأفضل الأسعار</h1>
                <p class="lead mb-5">استمتع بأشهى الأطباق المعدة بعناية من قبل أمهر الطهاة</p>
                
                <div class="search-box">
                    <form action="/search" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control search-input" name="q" placeholder="ابحث عن وجبتك المفضلة...">
                            <button class="btn btn-primary search-btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- المحتوى الرئيسي -->
    <main class="py-5">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // تنشيط عناصر القائمة عند التمرير
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-sm');
                navbar.style.padding = '10px 0';
            } else {
                navbar.classList.remove('shadow-sm');
                navbar.style.padding = '15px 0';
            }
        });
    </script>
</body>
</html>