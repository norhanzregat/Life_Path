<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Life Path - عيادة مسار الحياة</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .btn-more-doctors {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #0266D1, #1a7eff);
      color: white;
      padding: 14px 28px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(2, 102, 209, 0.3);
      position: relative;
      overflow: hidden;
      border: none;
      font-size: 1.1rem;
    }
    
    .btn-more-doctors:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #1a7eff, #0266D1);
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: 1;
    }
    
    .btn-more-doctors:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(2, 102, 209, 0.4);
    }
    
    .btn-more-doctors:hover:before {
      opacity: 1;
    }
    
    .btn-more-doctors span {
      position: relative;
      z-index: 2;
    }
    
    .btn-icon {
      margin-right: 10px;
      background: rgba(255, 255, 255, 0.2);
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      position: relative;
      z-index: 2;
    }
    
    .btn-more-doctors:hover .btn-icon {
      background: rgba(255, 255, 255, 0.3);
      transform: translateX(3px);
    }

    :root {
      --primary-color: #0266D1;
      --secondary-color: #1a7eff;
      --accent-color: #4eafff;
      --light-bg: #f5f9ff;
      --text-dark: #2d3748;
      --text-light: #718096;
      --border-radius: 12px;
      --box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }

    body {
      font-family: 'Tajawal', sans-serif;
      background: var(--light-bg);
      color: var(--text-dark);
      line-height: 1.6;
    }

    /* تحسينات الشريط العلوي */
    .navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 12px 0;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-weight: 700;
      font-size: 1.6rem;
      color: var(--primary-color) !important;
    }

    .logo-img {
      width: 150px;
      height: 70px;
      object-fit: contain;
      margin-left: 10px;
    }

    .nav-link {
      color: var(--text-dark) !important;
      font-weight: 500;
      margin: 0 6px;
      transition: var(--transition);
      position: relative;
      font-size: 0.95rem;
    }

    .nav-link:hover {
      color: var(--primary-color) !important;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      right: 0;
      background-color: var(--primary-color);
      transition: width 0.3s;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* قسم البطل */
    .hero {
      background: linear-gradient(to right, #101E66FF, #0449AAFF);
      color: #ffffff;
      text-align: center;
      padding: 80px 20px;
      border-radius: 0 0 30px 30px;
      margin-bottom: 50px;
    }

    .hero h1 {
      font-size: 2.4rem;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.3;
    }

    .hero p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      max-width: 700px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* الأزرار */
    .btn-primary {
      background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
      border: none;
      padding: 12px 28px;
      border-radius: 50px;
      font-weight: 600;
      transition: var(--transition);
      font-size: 1rem;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(2, 102, 209, 0.2);
    }

    .login-btn {
      background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
      color: white !important;
      padding: 8px 18px;
      border-radius: 50px;
      font-weight: 600;
      transition: var(--transition);
      font-size: 0.9rem;
      text-decoration: none;
      padding: 10px;
    }

    .login-btn:hover {
      background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(2, 102, 209, 0.2);
      color: white !important;
    }

    /* العناوين */
    .section-title {
      text-align: center;
      margin-bottom: 40px;
      color: var(--primary-color);
      position: relative;
      padding-bottom: 15px;
      font-size: 2rem;
      font-weight: 700;
    }

    .section-title::after {
      content: '';
      position: absolute;
      width: 70px;
      height: 3px;
      background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
      bottom: 0;
      right: 50%;
      transform: translateX(50%);
    }

    /* البطاقات */
    .service-card,
    .team-card {
      border-radius: var(--border-radius);
      padding: 25px 20px;
      background: #ffffff;
      box-shadow: var(--box-shadow);
      transition: var(--transition);
      height: 100%;
      text-align: center;
      border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .service-card:hover,
    .team-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .service-icon {
      font-size: 2.2rem;
      color: var(--primary-color);
      margin-bottom: 18px;
    }

    .team-img {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 18px;
      border: 4px solid var(--light-bg);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .team-card h5 {
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 5px;
      font-size: 1.1rem;
    }

    .team-card p {
      color: var(--text-light);
      font-size: 0.9rem;
    }

    /* منتقي اللغة */
    .language-selector {
      position: relative;
      display: inline-block;
    }

    .language-btn {
      background: transparent;
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
      border-radius: 50px;
      padding: 7px 14px;
      display: flex;
      align-items: center;
      font-weight: 600;
      transition: var(--transition);
      font-size: 0.9rem;
    }

    .language-btn:hover {
      background: var(--primary-color);
      color: white;
    }

    .language-dropdown {
      position: absolute;
      top: 100%;
      left: 0;
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      padding: 8px;
      min-width: 130px;
      z-index: 1000;
      display: none;
      margin-top: 5px;
    }

    .language-dropdown.show {
      display: block;
    }

    .language-option {
      display: flex;
      align-items: center;
      padding: 8px 10px;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s;
      font-size: 0.9rem;
    }

    .language-option:hover {
      background: var(--light-bg);
    }

    .language-flag {
      width: 20px;
      height: 15px;
      margin-left: 8px;
      border-radius: 2px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
    }

    /* النماذج */
    .modal-content {
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .auth-tabs {
      display: flex;
      border-bottom: 1px solid #eee;
    }

    .auth-tab {
      flex: 1;
      text-align: center;
      padding: 14px;
      cursor: pointer;
      transition: var(--transition);
      font-weight: 600;
      font-size: 0.95rem;
    }

    .auth-tab.active {
      color: var(--primary-color);
      border-bottom: 3px solid var(--primary-color);
    }

    .auth-form {
      padding: 22px;
    }

    .form-control {
      padding: 12px 14px;
      border-radius: 10px;
      margin-bottom: 15px;
      border: 1px solid #e2e8f0;
      transition: var(--transition);
      font-size: 0.9rem;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(2, 102, 209, 0.1);
    }

    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    /* منتقي الدولة للهاتف */
    .phone-input-group {
      display: flex;
      align-items: stretch;
    }

    .country-select {
      display: flex;
      align-items: center;
      padding: 5px 12px;
      background: #f8f9fa;
      border: 1px solid #e2e8f0;
      border-radius: 10px 0 0 10px;
      cursor: pointer;
      user-select: none;
      min-width: 100px;
    }

    .country-select .flag-icon {
      width: 20px;
      height: 15px;
      margin-left: 6px;
    }

    .country-code {
      font-weight: bold;
      font-size: 0.9rem;
    }

    .phone-number-input {
      border-radius: 0 10px 10px 0;
      flex: 1;
      font-size: 0.9rem;
    }

    .country-dropdown {
      position: absolute;
      top: 100%;
      right: 0;
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      max-height: 200px;
      overflow-y: auto;
      width: 200px;
      display: none;
      z-index: 1000;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .country-dropdown.show {
      display: block;
    }

    .country-option {
      padding: 8px 12px;
      display: flex;
      align-items: center;
      cursor: pointer;
      transition: background 0.2s;
      font-size: 0.9rem;
    }

    .country-option:hover {
      background: #f8f9fa;
    }

    .country-option .flag-icon {
      margin-left: 8px;
      width: 20px;
      height: 15px;
    }

    .form-note {
      font-size: 0.75rem;
      color: var(--text-light);
      margin-top: 5px;
    }

    .forgot-password {
      color: var(--primary-color);
      text-decoration: none;
      font-size: 0.85rem;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    /* الفوتر */
    footer {
      background: linear-gradient(to right, #101944FF, #0449AAFF);
      color: #ffffff;
      padding: 50px 0 25px;
      margin-top: 70px;
    }

    footer h5 {
      font-weight: 700;
      margin-bottom: 18px;
      position: relative;
      padding-bottom: 10px;
      font-size: 1.2rem;
    }

    footer h5::after {
      content: '';
      position: absolute;
      width: 35px;
      height: 2px;
      background-color: #fff;
      bottom: 0;
      right: 0;
    }

    footer a {
      color: #e0e0e0;
      text-decoration: none;
      transition: var(--transition);
      font-size: 0.9rem;
    }

    footer a:hover {
      color: #ffffff;
      text-decoration: underline;
    }

    .social-icons a {
      display: inline-block;
      width: 38px;
      height: 38px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      text-align: center;
      line-height: 38px;
      margin-left: 8px;
      transition: var(--transition);
    }

    .social-icons a:hover {
      background: var(--primary-color);
      transform: translateY(-3px);
    }

    /* تحسينات للشاشات الصغيرة */
    @media (max-width: 768px) {
      .hero {
        padding: 60px 15px;
        border-radius: 0 0 20px 20px;
      }

      .hero h1 {
        font-size: 1.8rem;
      }

      .hero p {
        font-size: 0.95rem;
      }

      .section-title {
        font-size: 1.6rem;
        margin-bottom: 30px;
      }

      .team-img {
        width: 110px;
        height: 110px;
      }

      .language-dropdown {
        right: 0;
        left: auto;
      }

      .auth-form {
        padding: 18px;
      }

      .modal-content {
        margin: 20px;
      }

      .navbar-brand {
        font-size: 1.4rem;
      }

      .logo-img {
        width: 120px;
        height: 60px;
      }
    }

    /* تحسينات إضافية */
    .text-muted {
      font-size: 0.85rem;
    }

    .card {
      border-radius: var(--border-radius);
      border: none;
      box-shadow: var(--box-shadow);
    }

    .form-label {
      font-weight: 500;
      margin-bottom: 8px;
      font-size: 0.9rem;
    }

    .form-select {
      padding: 12px 14px;
      border-radius: 10px;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>

  <!-- شريط التنقل -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/images/life.png" alt="Life Path Logo" class="logo-img">
        <span class="ms-2 fw-bold">Life Path</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#home">الرئيسية</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">خدماتنا</a></li>
          <li class="nav-item"><a class="nav-link" href="#team">فريقنا</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">عن العيادة</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">اتصل بنا</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3 me-3">
          <!-- منتقي اللغة المحسن -->
          <div class="language-selector">
            <button class="language-btn" id="languageButton">
              <i class="bi bi-translate me-1"></i> <span id="currentLanguage">العربية</span>
            </button>
            <div class="language-dropdown" id="languageDropdown">
              <div class="language-option" data-lang="ar">
                <span class="language-flag">🇸🇦</span>
                العربية
              </div>
              <div class="language-option" data-lang="en">
                <span class="language-flag">🇺🇸</span>
                English
              </div>

            </div>
          </div>

          <a href="main_page_patients/main.php" class="login-btn" data-bs-toggle="modal" data-bs-target="#authModal">
            <i class="bi bi-person-circle me-1" style="margin-left: 5px;"></i>تسجيل الدخول
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- قسم البطل -->
  <section id="home" class="hero">
    <div class="container">
      <h1>ابدأ رحلة التعافي مع Life Path</h1>
      <p>نحن هنا لنساعدك في رحلتك نحو الصحة النفسية والتوازن الداخلي، مع فريق من الأخصائيين النفسيين ذوي الخبرة
        والكفاءة.</p>
      <a href="main_page_patients/main.php" class="btn btn-primary btn-lg">احجز موعدك الآن</a>

    </div>
  </section>

  <!-- خدماتنا -->
  <section id="services" class="py-5">
    <div class="container">
      <h2 class="section-title">خدماتنا</h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-chat-dots"></i></div>
            <h4>استشارات نفسية</h4>
            <p>جلسات استشارية مع أخصائيين نفسيين معتمدين لتقديم الدعم والمساندة في مختلف القضايا النفسية.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-people"></i></div>
            <h4>جلسات علاج فردي</h4>
            <p>جلسات علاجية مخصصة تناسب احتياجاتك الفردية بهدف تحقيق النمو الشخصي والتغلب على التحديات.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-emoji-smile"></i></div>
            <h4>علاج الأطفال والمراهقين</h4>
            <p>برامج علاجية متخصصة مصممة خصيصًا لفئة الأطفال والمراهقين لمساعدتهم على تجاوز الصعوبات.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-clipboard-data"></i></div>
            <h4>التقييم النفسي الشامل</h4>
            <p>إجراء تقييمات نفسية شاملة باستخدام أدوات قياسية معتمدة لتشخيص الحالة ووضع خطة علاج مناسبة.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- فريقنا -->
<section id="team" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title">فريقنا الطبي</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="team-card text-center">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="د. أحمد علي" class="team-img">
          <h5>د. أحمد علي</h5>
          <p>أخصائي نفسي إكلينيكي</p>
          <p class="text-muted">خبرة أكثر من 15 عاماً في العلاج النفسي واضطرابات القلق.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="team-card text-center">
          <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="د. سارا يوسف" class="team-img">
          <h5>د. سارة يوسف</h5>
          <p>معالجة نفسية</p>
          <p class="text-muted">متخصصة في العلاج السلوكي المعرفي والعلاج الأسري.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="team-card text-center">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="د. ليلى حسن" class="team-img">
          <h5>د. ليلى حسن</h5>
          <p>استشارية أسرة</p>
          <p class="text-muted">خبيرة في حل المشكلات الأسرية واستشارات ما قبل الزواج.</p>
        </div>
      </div>
    </div>

    <!-- زر عرض المزيد محسن -->
    <div class="text-center mt-5">
      <a href="doctors/specialists/specialists.php" class="btn-more-doctors">
        <span>اكتشف المزيد من الأطباء</span>
        <div class="btn-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
          </svg>
        </div>
      </a>
    </div>
  </div>


</section>


  <!-- نموذج المصادقة -->
  <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="auth-tabs">
          <div class="auth-tab active" id="login-tab">تسجيل الدخول</div>
          <div class="auth-tab" id="register-tab">إنشاء حساب</div>
        </div>
        <div class="auth-form">

          <!-- نموذج تسجيل الدخول -->
          <form id="loginForm" class="auth-form-content">
            <div class="mb-3">
              <label for="loginEmail" class="form-label">البريد الإلكتروني</label>
              <input type="email" class="form-control" id="loginEmail" required>
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">كلمة المرور</label>
              <input type="password" class="form-control" id="loginPassword" required>
              <div class="d-flex justify-content-between align-items-center mt-1">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">تذكرني</label>
                </div>
                <a href="#" class="forgot-password">نسيت كلمة المرور؟</a>
              </div>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
            </div>
            <div class="text-center mt-3">
              <p>ليس لديك حساب؟ <a href="#" class="text-primary" onclick="switchToRegister()">إنشاء حساب</a></p>
            </div>
          </form>

          <!-- نموذج التسجيل -->
          <form id="registerForm" class="auth-form-content" style="display: none;">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="userName" class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" id="userName" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="registerEmail" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="registerEmail" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="gender" class="form-label">الجنس</label>
                <select class="form-select" id="gender" required>
                  <option value="">اختر الجنس</option>
                  <option value="male">ذكر</option>
                  <option value="female">أنثى</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">تاريخ الميلاد</label>
                <input type="date" class="form-control" id="dob" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">رقم الهاتف</label>
              <div class="phone-input-group position-relative">
                <!-- زر اختيار الدولة -->
                <div class="country-select" id="countrySelect" style="height: 48px; margin-left: 11px;">
                  <span class="flag-icon flag-icon-jo"></span>
                  <span class="country-code ms-1" id="countryCode">+962</span>
                  <i class="bi bi-caret-down-fill ms-2"></i>
                </div>

                <!-- حقل إدخال الرقم -->
                <input type="tel" id="phoneNumber" class="form-control phone-number-input" placeholder="أدخل رقم الهاتف"
                  pattern="[0-9]{6,15}" required>

                <!-- قائمة الدول -->
                <div class="country-dropdown" id="countryDropdown">

                  <!-- الدول العربية -->
                  <div class="country-option" data-code="+962" data-flag="jo">
                    <span class="flag-icon flag-icon-jo"></span> الأردن
                  </div>
                  <div class="country-option" data-code="+966" data-flag="sa">
                    <span class="flag-icon flag-icon-sa"></span> السعودية
                  </div>
                  <div class="country-option" data-code="+971" data-flag="ae">
                    <span class="flag-icon flag-icon-ae"></span> الإمارات
                  </div>
                  <div class="country-option" data-code="+20" data-flag="eg">
                    <span class="flag-icon flag-icon-eg"></span> مصر
                  </div>
                  <div class="country-option" data-code="+974" data-flag="qa">
                    <span class="flag-icon flag-icon-qa"></span> قطر
                  </div>
                  <div class="country-option" data-code="+965" data-flag="kw">
                    <span class="flag-icon flag-icon-kw"></span> الكويت
                  </div>
                  <div class="country-option" data-code="+968" data-flag="om">
                    <span class="flag-icon flag-icon-om"></span> عمان
                  </div>
                  <div class="country-option" data-code="+218" data-flag="ly">
                    <span class="flag-icon flag-icon-ly"></span> ليبيا
                  </div>
                  <div class="country-option" data-code="+213" data-flag="dz">
                    <span class="flag-icon flag-icon-dz"></span> الجزائر
                  </div>
                  <div class="country-option" data-code="+216" data-flag="tn">
                    <span class="flag-icon flag-icon-tn"></span> تونس
                  </div>
                  <div class="country-option" data-code="+249" data-flag="sd">
                    <span class="flag-icon flag-icon-sd"></span> السودان
                  </div>
                  <div class="country-option" data-code="+963" data-flag="sy">
                    <span class="flag-icon flag-icon-sy"></span> سوريا
                  </div>
                  <div class="country-option" data-code="+961" data-flag="lb">
                    <span class="flag-icon flag-icon-lb"></span> لبنان
                  </div>
                  <div class="country-option" data-code="+964" data-flag="iq">
                    <span class="flag-icon flag-icon-iq"></span> العراق
                  </div>
                  <div class="country-option" data-code="+967" data-flag="ye">
                    <span class="flag-icon flag-icon-ye"></span> اليمن
                  </div>

                  <!-- الدول الأجنبية -->
                  <div class="country-option" data-code="+1" data-flag="us">
                    <span class="flag-icon flag-icon-us"></span> الولايات المتحدة الأمريكية
                  </div>
                  <div class="country-option" data-code="+44" data-flag="gb">
                    <span class="flag-icon flag-icon-gb"></span> المملكة المتحدة
                  </div>
                  <div class="country-option" data-code="+49" data-flag="de">
                    <span class="flag-icon flag-icon-de"></span> ألمانيا
                  </div>
                  <div class="country-option" data-code="+33" data-flag="fr">
                    <span class="flag-icon flag-icon-fr"></span> فرنسا
                  </div>
                  <div class="country-option" data-code="+39" data-flag="it">
                    <span class="flag-icon flag-icon-it"></span> إيطاليا
                  </div>
                  <div class="country-option" data-code="+81" data-flag="jp">
                    <span class="flag-icon flag-icon-jp"></span> اليابان
                  </div>
                  <div class="country-option" data-code="+82" data-flag="kr">
                    <span class="flag-icon flag-icon-kr"></span> كوريا الجنوبية
                  </div>
                  <div class="country-option" data-code="+91" data-flag="in">
                    <span class="flag-icon flag-icon-in"></span> الهند
                  </div>
                  <div class="country-option" data-code="+7" data-flag="ru">
                    <span class="flag-icon flag-icon-ru"></span> روسيا
                  </div>
                  <div class="country-option" data-code="+61" data-flag="au">
                    <span class="flag-icon flag-icon-au"></span> أستراليا
                  </div>
                  <div class="country-option" data-code="+34" data-flag="es">
                    <span class="flag-icon flag-icon-es"></span> إسبانيا
                  </div>
                  <div class="country-option" data-code="+55" data-flag="br">
                    <span class="flag-icon flag-icon-br"></span> البرازيل
                  </div>
                  <div class="country-option" data-code="+27" data-flag="za">
                    <span class="flag-icon flag-icon-za"></span> جنوب أفريقيا
                  </div>
                  <div class="country-option" data-code="+46" data-flag="se">
                    <span class="flag-icon flag-icon-se"></span> السويد
                  </div>
                  <div class="country-option" data-code="+47" data-flag="no">
                    <span class="flag-icon flag-icon-no"></span> النرويج
                  </div>
                  <div class="country-option" data-code="+48" data-flag="pl">
                    <span class="flag-icon flag-icon-pl"></span> بولندا
                  </div>
                  <div class="country-option" data-code="+31" data-flag="nl">
                    <span class="flag-icon flag-icon-nl"></span> هولندا
                  </div>
                  <div class="country-option" data-code="+32" data-flag="be">
                    <span class="flag-icon flag-icon-be"></span> بلجيكا
                  </div>
                  <div class="country-option" data-code="+351" data-flag="pt">
                    <span class="flag-icon flag-icon-pt"></span> البرتغال
                  </div>
                  <div class="country-option" data-code="+358" data-flag="fi">
                    <span class="flag-icon flag-icon-fi"></span> فنلندا
                  </div>
                  <div class="country-option" data-code="+41" data-flag="ch">
                    <span class="flag-icon flag-icon-ch"></span> سويسرا
                  </div>
                  <div class="country-option" data-code="+60" data-flag="my">
                    <span class="flag-icon flag-icon-my"></span> ماليزيا
                  </div>
                  <div class="country-option" data-code="+66" data-flag="th">
                    <span class="flag-icon flag-icon-th"></span> تايلاند
                  </div>
                  <div class="country-option" data-code="+84" data-flag="vn">
                    <span class="flag-icon flag-icon-vn"></span> فيتنام
                  </div>
                  <div class="country-option" data-code="+65" data-flag="sg">
                    <span class="flag-icon flag-icon-sg"></span> سنغافورة
                  </div>
                  <div class="country-option" data-code="+90" data-flag="tr">
                    <span class="flag-icon flag-icon-tr"></span> تركيا
                  </div>
                  <div class="country-option" data-code="+86" data-flag="cn">
                    <span class="flag-icon flag-icon-cn"></span> الصين
                  </div>
                  <div class="country-option" data-code="+52" data-flag="mx">
                    <span class="flag-icon flag-icon-mx"></span> المكسيك
                  </div>
                  <div class="country-option" data-code="+1" data-flag="ca">
                    <span class="flag-icon flag-icon-ca"></span> كندا
                  </div>
                  <div class="country-option" data-code="+1" data-flag="au">
                    <span class="flag-icon flag-icon-au"></span> أستراليا
                  </div>
                  <div class="country-option" data-code="+64" data-flag="nz">
                    <span class="flag-icon flag-icon-nz"></span> نيوزيلندا
                  </div>

                </div>

              </div>
              <div class="form-note">أرقام فقط، 6-15 خانة</div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="registerPassword" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" id="registerPassword" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" class="form-control" id="confirmPassword" required>
              </div>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="agreeTerms" required>
              <label class="form-check-label" for="agreeTerms">أوافق على <a href="#" class="text-primary">الشروط
                  والأحكام</a> و <a href="#" class="text-primary">سياسة الخصوصية</a></label>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">إنشاء حساب</button>
            </div>

            <div class="text-center mt-3">
              <p>لديك حساب بالفعل؟ <a href="#" class="text-primary" onclick="switchToLogin()">تسجيل الدخول</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- اتصل بنا -->
  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="section-title">اتصل بنا</h2>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow border-0">
            <div class="card-body p-4">
              <form>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">الاسم الكامل</label>
                    <input type="text" class="form-control" id="name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="subject" class="form-label">الموضوع</label>
                  <input type="text" class="form-control" id="subject" required>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">الرسالة</label>
                  <textarea class="form-control" id="message" rows="4" required></textarea>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- الفوتر -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5>Life Path - مسار الحياة</h5>
          <p>نسير معك في رحلة التعافي نحو حياة نفسية أفضل، نقدم خدمات استشارية وعلاجية متخصصة بواسطة فريق من الأطباء
            والمعالجين النفسيين.</p>
        </div>
        <div class="col-lg-4 mb-4">
          <h5>معلومات الاتصال</h5>
          <p><i class="bi bi-telephone me-2"></i> +962 7 9999 9999</p>
          <p><i class="bi bi-envelope me-2"></i> info@lifepath.com</p>
          <p><i class="bi bi-geo-alt me-2"></i> عمان - الأردن</p>
        </div>
        <div class="col-lg-4 mb-4">
          <h5>تابعنا على</h5>
          <div class="social-icons mt-3">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
      <hr class="mt-4 mb-4">
      <div class="text-center">
        <p>© 2023 Life Path. جميع الحقوق محفوظة.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // التبديل بين تسجيل الدخول والتسجيل
    function switchToRegister() {
      document.getElementById('login-tab').classList.remove('active');
      document.getElementById('register-tab').classList.add('active');
      document.getElementById('loginForm').style.display = 'none';
      document.getElementById('registerForm').style.display = 'block';
    }

    function switchToLogin() {
      document.getElementById('register-tab').classList.remove('active');
      document.getElementById('login-tab').classList.add('active');
      document.getElementById('registerForm').style.display = 'none';
      document.getElementById('loginForm').style.display = 'block';
    }

    document.getElementById('login-tab').addEventListener('click', switchToLogin);
    document.getElementById('register-tab').addEventListener('click', switchToRegister);

    // إرسال النماذج
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('تم تسجيل الدخول بنجاح! سيتم توجيهك إلى صفحة الحجز.');
      setTimeout(function () {
        window.location.href = 'booking.html';
      }, 1000);
    });

    document.getElementById('registerForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('تم إنشاء الحساب بنجاح! يمكنك الآن تسجيل الدخول.');
      switchToLogin();
    });

    // منتقي اللغة المخصص
    document.getElementById('languageButton').addEventListener('click', function () {
      document.getElementById('languageDropdown').classList.toggle('show');
    });

    document.querySelectorAll('.language-option').forEach(option => {
      option.addEventListener('click', function () {
        const lang = this.getAttribute('data-lang');
        setLanguage(lang);
      });
    });

    function setLanguage(lang) {
      const langText = document.getElementById('currentLanguage');
      const langBtn = document.querySelector('.language-btn');

      if (lang === 'ar') {
        langText.textContent = 'العربية';
        langBtn.innerHTML = '<i class="bi bi-translate me-1"></i> العربية';
        document.documentElement.dir = 'rtl';
        document.documentElement.lang = 'ar';
        alert('تم تغيير اللغة إلى العربية');
      } else if (lang === 'en') {
        langText.textContent = 'English';
        langBtn.innerHTML = '<i class="bi bi-translate me-1"></i> English';
        document.documentElement.dir = 'ltr';
        document.documentElement.lang = 'en';
        alert('Language changed to English');
      }

      // إغلاق القائمة المنسدلة
      document.getElementById('languageDropdown').classList.remove('show');
    }

    // إغلاق منتقي اللغة عند النقر خارجها
    window.addEventListener('click', function (e) {
      const dropdown = document.getElementById('languageDropdown');
      const selector = document.querySelector('.language-selector');

      if (!selector.contains(e.target) && dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
      }
    });

    // منتقي الدولة للهاتف
    const countrySelect = document.getElementById('countrySelect');
    const countryDropdown = document.getElementById('countryDropdown');
    const countryCodeSpan = document.getElementById('countryCode');
    const countryFlagSpan = countrySelect.querySelector('.flag-icon');

    // فتح وإغلاق القائمة
    countrySelect.addEventListener('click', (e) => {
      e.stopPropagation();
      countryDropdown.classList.toggle('show');
    });

    // اختيار الدولة من القائمة
    document.querySelectorAll('.country-option').forEach(option => {
      option.addEventListener('click', () => {
        const code = option.getAttribute('data-code');
        const flag = option.getAttribute('data-flag');
        const flagClass = `flag-icon-${flag}`;

        countryCodeSpan.textContent = code;
        countryFlagSpan.className = `flag-icon ${flagClass}`;
        countryDropdown.classList.remove('show');
      });
    });

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener('click', function (event) {
      if (!countrySelect.contains(event.target) && !countryDropdown.contains(event.target)) {
        countryDropdown.classList.remove('show');
      }
    });

    // تعيين تاريخ أقصى لتاريخ الميلاد
    document.getElementById('dob').max = new Date().toISOString().split("T")[0];
  </script>
</body>

</html>