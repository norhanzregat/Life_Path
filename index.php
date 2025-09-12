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
<link rel="stylesheet" href="css/index_style.css">
</head>

<body>

  <!-- شريط التنقل -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">
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

  <!-- Breadcrumb -->
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">خدماتنا</li>
      </ol>
    </nav>
  </div>

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
            <div class="service-icon"><i class="bi bi-chat-dots-fill"></i></div>
            <h4>استشارات نفسية</h4>
            <p>جلسات استشارية مع أخصائيين نفسيين معتمدين لتقديم الدعم والمساندة في مختلف القضايا النفسية.</p>
            <a href="psychological_consultations.html" class="service-btn">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
            <a href="psychological_consultations.html" class="service-link"></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-people-fill"></i></div>
            <h4>جلسات علاج فردي</h4>
            <p>جلسات علاجية مخصصة تناسب احتياجاتك الفردية بهدف تحقيق النمو الشخصي والتغلب على التحديات.</p>
            <a href="individual_therapy.html" class="service-btn">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
            <a href="individual_therapy.html" class="service-link"></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-emoji-smile-fill"></i></div>
            <h4>علاج الأطفال والمراهقين</h4>
            <p>برامج علاجية متخصصة مصممة خصيصًا لفئة الأطفال والمراهقين لمساعدتهم على تجاوز الصعوبات.</p>
            <a href="children_teen_therapy.html" class="service-btn">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
            <a href="children_teen_therapy.html" class="service-link"></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-clipboard-data-fill"></i></div>
            <h4>التقييم النفسي الشامل</h4>
            <p>إجراء تقييمات نفسية شاملة باستخدام أدوات قياسية معتمدة لتشخيص الحالة ووضع خطة علاج مناسبة.</p>
            <a href="psychological_assessment.html" class="service-btn">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
            <a href="psychological_assessment.html" class="service-link"></a>
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
  <script src="js/index.js"></script>

</body>

</html>