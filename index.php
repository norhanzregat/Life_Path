
<?php
session_start();
require_once 'connection.php'; // ملف الاتصال بقاعدة البيانات
// التحقق من حالة تسجيل الدخول
$isLoggedIn = false;
$userName = '';

if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true;
    $userName = $_SESSION['user_name'];
}

// عرض رسائل النجاح للتسجيل
if (isset($_SESSION['registration_success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show fixed-top m-4" role="alert" style="z-index: 9999;">
            ' . $_SESSION['registration_success'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>';
    unset($_SESSION['registration_success']);
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title data-translate="site_title">Life Path - عيادة مسار الحياة النفسية</title>

  <!-- CSS المكتبة -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
  
  <!-- AOS Library -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <!-- SEO Meta Tags -->
  <meta name="description" data-translate="site_description"
    content="عيادة مسار الحياة - خدمات الصحة النفسية والاستشارات النفسية المتخصصة">
  <meta name="keywords" content="عيادة نفسية، استشارات نفسية، علاج نفسي، صحة نفسية">
  <meta name="author" content="Life Path Clinic">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" data-translate="site_title" content="Life Path - عيادة مسار الحياة النفسية">
  <meta property="og:description" data-translate="site_description"
    content="عيادة مسار الحياة - خدمات الصحة النفسية والاستشارات النفسية المتخصصة">
  <meta property="og:type" content="website">
  <meta property="og:image" content="assets/images/og-image.jpg">

  <!-- Favicon -->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">

  <!-- External CSS Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Loading Screen -->
  <div id="loading-screen">
    <div class="loading-content">
      <div class="loading-logo">
        <img src="assets/images/life.png" alt="Life Path Logo ">
      </div>
      <div class="loading-spinner"></div>
      <p data-translate="loading">جاري التحميل...</p>
    </div>
  </div>
  

  <!-- عرض رسائل الخطأ والنجاح -->
  <?php if (isset($_SESSION['errors'])): ?>
    <div class="alert alert-danger alert-dismissible fade show fixed-top m-4" role="alert" style="z-index: 9999;">
      <ul class="mb-0">
        <?php foreach ($_SESSION['errors'] as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['errors']); ?>
  <?php endif; ?>

  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show fixed-top m-4" role="alert" style="z-index: 9999;">
      <?php echo $_SESSION['success']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>



  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNavbar">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <img src="assets/images/life.png" alt="Life Path Logo" class="logo-img">
        <span class="brand-text" data-translate="brand_name">Life Path</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="#home" data-translate="nav_home">الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about" data-translate="nav_about">عن العيادة</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services" data-translate="nav_services">خدماتنا</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#team" data-translate="nav_team">فريقنا</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact" data-translate="nav_contact">اتصل بنا</a>
          </li>
        </ul>

        <div class="navbar-actions">
          <!-- Language Selector -->
          <div class="language-selector">
            <button class="language-btn" id="languageButton">
              <i class="bi bi-translate"></i>
              <span id="currentLanguage">العربية</span>
              <i class="bi bi-chevron-down"></i>
            </button>
            <div class="language-dropdown" id="languageDropdown">
              <div class="language-option" data-lang="ar">
                <span class="flag">🇸🇦</span>
                <span>العربية</span>
              </div>
              <div class="language-option" data-lang="en">
                <span class="flag">🇺🇸</span>
                <span>English</span>
              </div>
            </div>
          </div>

<div class="navbar-actions">
  <!-- Language Selector -->
  <div class="language-selector">
    <!-- ... (الكود الحالي يبقى كما هو) ... -->
  </div>

  <!-- Login Button / User Menu -->
  <?php if ($isLoggedIn): ?>
<div class="user-menu">
  <button class="login-btn">
    <i class="bi bi-person-circle"></i>
    <span>مرحباً، <?php echo explode(' ', $userName)[0]; ?></span>
    <i class="bi bi-caret-down-fill dropdown-icon"></i>
  </button>
  <div class="user-dropdown">
    <a href="../booking_appo/booking.php" class="dropdown-item">
      <i class="bi bi-calendar-check"></i>
      <span>مواعيدي</span>
    </a>
    <a href="auth/logout.php" class="dropdown-item">
      <i class="bi bi-box-arrow-right"></i>
      <span>تسجيل الخروج</span>
    </a>
  </div>
</div>

<style>
/* Container */
.user-menu {
  position: relative;
  display: inline-block;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Button */
.login-btn {
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 8px 12px;
  border-radius: 6px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: background 0.3s, box-shadow 0.3s;
}

.login-btn:hover {
  background-color: #f8f8f8;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Dropdown icon */
.dropdown-icon {
  font-size: 0.8em;
  margin-left: auto;
}

/* Dropdown menu */
.user-dropdown {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  background-color: #fff;
  min-width: 180px;
  border: 1px solid #ddd;
  border-radius: 6px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  z-index: 1000;
  margin-top: 6px;
}

/* Show dropdown on hover */
.user-menu:hover .user-dropdown {
  display: block;
}

/* Dropdown items */
.user-dropdown .dropdown-item {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 12px;
  color: #333;
  text-decoration: none;
  transition: background 0.2s;
}

.user-dropdown .dropdown-item i {
  font-size: 1.1em;
}

.user-dropdown .dropdown-item:hover {
  background-color: #2563eb;
  color: white;
  border-radius: 4px;
}
</style>

  <?php else: ?>
    <button class="login-btn" data-bs-toggle="modal" data-bs-target="#authModal">
      <i class="bi bi-person-circle"></i>
      <span data-translate="login">تسجيل الدخول</span>
    </button>
  <?php endif; ?>
</div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="hero-section">
    <div class="hero-background">
      <div class="hero-overlay"></div>
      <div class="hero-particles"></div>
    </div>

    <div class="container">
      <div class="row align-items-center min-vh-100">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="hero-content">
            <h1 class="hero-title" data-translate="hero_title">
              ابدأ رحلة التعافي مع <span class="text-gradient" data-translate="brand_name">Life Path</span>
            </h1>
            <p class="hero-subtitle" data-translate="hero_subtitle">
              نحن هنا لنساعدك في رحلتك نحو الصحة النفسية والتوازن الداخلي، مع فريق من الأخصائيين النفسيين ذوي الخبرة
              والكفاءة.
            </p>
            <div class="hero-actions">
              <!-- زر حجز الموعد -->
              <a href="booking_appo/booking.php" class="btn btn-primary btn-lg">
                <i class="bi bi-calendar-check"></i>
                <span data-translate="book_appointment">احجز موعدك الآن</span>
              </a>

              <!-- زر اعرف المزيد -->
              <button class="btn btn-outline-light btn-lg" onclick="scrollToSection('about')">
                <i class="bi bi-info-circle"></i>
                <span data-translate="learn_more">اعرف المزيد</span>
              </button>
            </div>


            <!-- Statistics -->
            <div class="hero-stats">
              <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-number">500+</div>
                <div class="stat-label" data-translate="happy_patients">مريض سعيد</div>
              </div>
              <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-number">15+</div>
                <div class="stat-label" data-translate="years_experience">سنة خبرة</div>
              </div>
              <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-number">10+</div>
                <div class="stat-label" data-translate="specialists">أخصائي</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left">
          <div class="hero-image">
            <img src="assets/images/doctorss.jpg" alt="صورة الكادر" class="img-fluid">
            <div class="floating-card" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-heart-pulse text-primary"></i>
              <div>
                <h6 data-translate="professional_care">رعاية احترافية</h6>
                <p data-translate="expert_team">فريق من الخبراء</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="about-image">
            <img src="assets/images/clinic.jpg" alt="About Clinic" class="img-fluid rounded-4">
            <div class="about-badge">
              <i class="bi bi-award"></i>
              <div>
                <strong data-translate="certified_clinic">عيادة معتمدة</strong>
                <span data-translate="quality_care">رعاية عالية الجودة</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left">
          <div class="about-content">
            <div class="section-header">
              <span class="section-badge" data-translate="about_us">عن العيادة</span>
              <h2 class="section-title" data-translate="about_title">
                نحن نهتم بصحتك النفسية وراحتك
              </h2>
            </div>

            <p class="about-text" data-translate="about_description">
              في عيادة مسار الحياة، نسعى لتقديم تجربة علاجية متكاملة تركز على صحتك النفسية والجسدية.
              نؤمن بأن الرعاية النفسية هي أساس حياة متوازنة وسعيدة، ونقدم برامج استشارية وعلاجية متخصصة لجميع الفئات
              العمرية.
            </p>

            <div class="about-features">
              <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-check-circle-fill"></i>
                <span data-translate="feature_1">استشارات نفسية فردية وجماعية</span>
              </div>
              <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-check-circle-fill"></i>
                <span data-translate="feature_2">جلسات علاج للأطفال والمراهقين</span>
              </div>
              <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-check-circle-fill"></i>
                <span data-translate="feature_3">تقييم نفسي شامل وخطط علاج شخصية</span>
              </div>
              <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-check-circle-fill"></i>
                <span data-translate="feature_4">برامج دعم الأسري والعلاج الأسري</span>
              </div>
            </div>

            <div class="about-actions">
              <button class="btn btn-primary" onclick="scrollToSection('contact')">
                <i class="bi bi-telephone"></i>
                <span data-translate="contact_us">تواصل معنا</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="services-section py-5 bg-light">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <span class="section-badge" data-translate="our_services">خدماتنا</span>
        <h2 class="section-title" data-translate="services_title">
          خدمات متخصصة لصحتك النفسية
        </h2>
        <p class="section-subtitle" data-translate="services_subtitle">
          نقدم مجموعة شاملة من الخدمات النفسية المتخصصة لمساعدتك في رحلة التعافي
        </p>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card">
            <div class="service-icon">
              <i class="bi bi-chat-dots-fill"></i>
            </div>
            <h4 data-translate="service_1_title">استشارات نفسية</h4>
            <p data-translate="service_1_desc">
              جلسات استشارية مع أخصائيين نفسيين معتمدين لتقديم الدعم والمساندة في مختلف القضايا النفسية.
            </p>
            <a href="#" class="service-link">
              <span data-translate="learn_more">اعرف المزيد</span>
              <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card">
            <div class="service-icon">
              <i class="bi bi-person-fill"></i>
            </div>
            <h4 data-translate="service_2_title">علاج فردي</h4>
            <p data-translate="service_2_desc">
              جلسات علاجية مخصصة تناسب احتياجاتك الفردية بهدف تحقيق النمو الشخصي والتغلب على التحديات.
            </p>
            <a href="#" class="service-link">
              <span data-translate="learn_more">اعرف المزيد</span>
              <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card">
            <div class="service-icon">
              <i class="bi bi-emoji-smile-fill"></i>
            </div>
            <h4 data-translate="service_3_title">علاج الأطفال</h4>
            <p data-translate="service_3_desc">
              برامج علاجية متخصصة مصممة خصيصاً لفئة الأطفال والمراهقين لمساعدتهم على تجاوز الصعوبات.
            </p>
            <a href="#" class="service-link">
              <span data-translate="learn_more">اعرف المزيد</span>
              <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-card">
            <div class="service-icon">
              <i class="bi bi-clipboard-data-fill"></i>
            </div>
            <h4 data-translate="service_4_title">التقييم النفسي</h4>
            <p data-translate="service_4_desc">
              إجراء تقييمات نفسية شاملة باستخدام أدوات قياسية معتمدة لتشخيص الحالة ووضع خطة علاج مناسبة.
            </p>
            <a href="#" class="service-link">
              <span data-translate="learn_more">اعرف المزيد</span>
              <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section id="team" class="team-section py-5">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <span class="section-badge" data-translate="our_team">فريقنا</span>
        <h2 class="section-title" data-translate="team_title">
          فريق من الخبراء المتخصصين
        </h2>
        <p class="section-subtitle" data-translate="team_subtitle">
          نخبة من الأطباء والمعالجين النفسيين ذوي الخبرة والكفاءة العالية
        </p>
      </div>

      <div class="row g-4" id="teamContainer">

        <!-- Team members will be loaded dynamically -->
      </div>

      <div class="text-center mt-5" data-aos="fade-up">
        <a href="doctors/specialists/specialists.php" class="btn btn-outline-primary btn-lg">
          <i class="bi bi-plus-circle"></i>
          <span data-translate="view_all_doctors">عرض جميع الأطباء</span>
        </a>
      </div>

    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section py-5 bg-light">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <span class="section-badge" data-translate="contact_us">اتصل بنا</span>
        <h2 class="section-title" data-translate="contact_title">
          نحن هنا لمساعدتك
        </h2>
        <p class="section-subtitle" data-translate="contact_subtitle">
          تواصل معنا اليوم لبدء رحلة التعافي والحصول على الدعم الذي تحتاجه
        </p>
      </div>

      <div class="row g-5">
        <div class="col-lg-8" data-aos="fade-right">
          <div class="contact-form-wrapper">
            <form id="contactForm" class="contact-form" action="contact_handler.php" method="POST">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contactName" data-translate="full_name">الاسم الكامل</label>
                    <input type="text" id="contactName" name="name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contactEmail" data-translate="email">البريد الإلكتروني</label>
                    <input type="email" id="contactEmail" name="email" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contactPhone" data-translate="phone">رقم الهاتف</label>
                    <input type="tel" id="contactPhone" name="phone" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contactSubject" data-translate="subject">الموضوع</label>
                    <select id="contactSubject" name="subject" class="form-control" required>
                      <option value="" data-translate="select_subject">اختر الموضوع</option>
                      <option value="appointment" data-translate="appointment_inquiry">استفسار عن موعد</option>
                      <option value="consultation" data-translate="consultation_inquiry">استفسار عن استشارة</option>
                      <option value="general" data-translate="general_inquiry">استفسار عام</option>
                      <option value="complaint" data-translate="complaint">شكوى</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="contactMessage" data-translate="message">الرسالة</label>
                    <textarea id="contactMessage" name="message" class="form-control" rows="5" required></textarea>
                  </div>
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg">
                  <i class="bi bi-send"></i>
                  <span data-translate="send_message">إرسال الرسالة</span>
                </button>
              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-left">
          <div class="contact-info">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <div class="contact-details">
                <h5 data-translate="address">العنوان</h5>
                <p data-translate="clinic_address">عمان - الأردن، شارع الملك عبدالله الثاني</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div class="contact-details">
                <h5 data-translate="phone">الهاتف</h5>
                <p>+962 7 9999 9999</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="contact-details">
                <h5 data-translate="email">البريد الإلكتروني</h5>
                <p><a href="mailto:info@lifepath.com">info@lifepath.com</a></p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="bi bi-clock-fill"></i>
              </div>
              <div class="contact-details">
                <h5 data-translate="working_hours">ساعات العمل</h5>
                <p data-translate="hours_details">السبت - الخميس: 9:00 ص - 8:00 م</p>
              </div>
            </div>

            <div class="social-links">
              <h5 data-translate="follow_us">تابعنا على</h5>
              <div class="social-icons">
                <a href="#" class="social-link facebook">
                  <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="social-link twitter">
                  <i class="bi bi-twitter"></i>
                </a>
                <a href="#" class="social-link instagram">
                  <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="social-link linkedin">
                  <i class="bi bi-linkedin"></i>
                </a>
                <a href="#" class="social-link whatsapp">
                  <i class="bi bi-whatsapp"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="footer-brand">
            <img src="assets/images/life.png" alt="Life Path Logo" class="footer-logo">
            <h5 data-translate="brand_name">Life Path</h5>
            <p data-translate="footer_description">
              نسير معك في رحلة التعافي نحو حياة نفسية أفضل، نقدم خدمات استشارية وعلاجية متخصصة بواسطة فريق من الأطباء
              والمعالجين النفسيين.
            </p>
          </div>
        </div>

        <div class="col-lg-2 col-md-6">
          <div class="footer-links">
            <h6 data-translate="quick_links">روابط سريعة</h6>
            <ul>
              <li><a href="#home" data-translate="nav_home">الرئيسية</a></li>
              <li><a href="#about" data-translate="nav_about">عن العيادة</a></li>
              <li><a href="#services" data-translate="nav_services">خدماتنا</a></li>
              <li><a href="#team" data-translate="nav_team">فريقنا</a></li>
              <li><a href="#contact" data-translate="nav_contact">اتصل بنا</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-links">
            <h6 data-translate="our_services">خدماتنا</h6>
            <ul>
              <li><a href="#" data-translate="service_1_title">استشارات نفسية</a></li>
              <li><a href="#" data-translate="service_2_title">علاج فردي</a></li>
              <li><a href="#" data-translate="service_3_title">علاج الأطفال</a></li>
              <li><a href="#" data-translate="service_4_title">التقييم النفسي</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-contact">
            <h6 data-translate="contact_info">معلومات الاتصال</h6>
            <div class="contact-item">
              <i class="bi bi-geo-alt"></i>
              <span data-translate="clinic_address">عمان - الأردن</span>
            </div>
            <div class="contact-item">
              <i class="bi bi-telephone"></i>
              <span>+962 7 9999 9999</span>
            </div>
            <div class="contact-item">
              <i class="bi bi-envelope"></i>
              <span><a href="mailto:info@lifepath.com">info@lifepath.com</a></span>
            </div>
          </div>
        </div>
      </div>

      <hr class="footer-divider">

      <div class="footer-bottom">
        <div class="row align-items-center">
          <div class="col-md-6">
            <p class="copyright" data-translate="copyright">
              © 2024 Life Path Clinic. جميع الحقوق محفوظة.
            </p>
          </div>
          <div class="col-md-6">
            <div class="footer-social">
              <a href="#" class="social-link facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="social-link twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="social-link instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="social-link linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="social-link whatsapp"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

<!-- Authentication Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header with Tabs -->
      <div class="modal-header border-0">
        <div class="auth-tabs w-100 d-flex justify-content-start">
          <button type="button" class="auth-tab active me-2" id="loginTab" data-translate="login">تسجيل الدخول</button>
          <button type="button" class="auth-tab" id="registerTab" data-translate="register">إنشاء حساب</button>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

        <!-- Login Form -->
        <form id="loginForm" class="auth-form">
          <div class="row g-3">
            <div class="col-12">
              <label for="loginEmail" data-translate="email">البريد الإلكتروني</label>
              <input type="email" id="loginEmail" name="email" class="form-control" required>
            </div>
            <div class="col-12">
              <label for="loginPassword" data-translate="password">كلمة المرور</label>
              <input type="password" id="loginPassword" name="password" class="form-control" required>
            </div>
            <div class="col-12 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <input type="checkbox" id="rememberMe" class="form-check-input" name="remember">
                <label for="rememberMe" class="form-check-label" data-translate="remember_me">تذكرني</label>
              </div>
              <a href="#" class="forgot-password" data-translate="forgot_password">نسيت كلمة المرور؟</a>
            </div>
            <div class="col-12">
              <button type="submit" name="login" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right"></i> <span data-translate="login">تسجيل الدخول</span>
              </button>
            </div>
          </div>
        </form>

        <!-- Register Form -->
        <form id="registerForm" class="auth-form d-none mt-3">
          <div class="row g-3">

            <div class="col-md-6">
              <label for="registerFirstName">الاسم الأول</label>
              <input type="text" id="registerFirstName" name="first_name" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label for="registerLastName">الاسم الأخير</label>
              <input type="text" id="registerLastName" name="last_name" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label for="registerEmail">البريد الإلكتروني</label>
              <input type="email" id="registerEmail" name="email" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label for="registerPhone">رقم الهاتف</label>
              <div class="input-group">
                <select class="form-select" id="countryCode" name="countryCode" style="max-width:110px;">
                  <option value="+962" selected>🇯🇴 +962</option>
                  <option value="+966">🇸🇦 +966</option>
                  <option value="+20">🇪🇬 +20</option>
                  <option value="+971">🇦🇪 +971</option>
                  <option value="+965">🇰🇼 +965</option>
                  <option value="+964">🇮🇶 +964</option>
                  <option value="+1">🇺🇸 +1</option>
                  <option value="+44">🇬🇧 +44</option>
                </select>
                <input type="tel" id="registerPhone" name="phone" class="form-control" placeholder="7X XXX XXXX" pattern="[0-9]{7,12}" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="registerGender">الجنس</label>
              <select id="registerGender" name="gender" class="form-control" required>
                <option value="">اختر الجنس</option>
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="registerDob">تاريخ الميلاد</label>
              <input type="date" id="registerDob" name="dob" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="col-md-6">
              <label for="registerPassword">كلمة المرور</label>
              <input type="password" id="registerPassword" name="password" class="form-control" required minlength="8">
            </div>

            <div class="col-md-6">
              <label for="registerConfirmPassword">تأكيد كلمة المرور</label>
              <input type="password" id="registerConfirmPassword" name="confirm_password" class="form-control" required minlength="8">
            </div>

            <div class="col-12">
              <div class="form-check">
                <input type="checkbox" id="agreeTerms" name="terms" class="form-check-input" required>
                <label for="agreeTerms" class="form-check-label">
                  أوافق على <a href="#">الشروط والأحكام</a> و <a href="#">سياسة الخصوصية</a>
                </label>
              </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-person-plus"></i> إنشاء حساب
              </button>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Success Message Modal -->

  <div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center py-5">
          <div class="success-icon">
            <i class="bi bi-check-circle-fill text-success"></i>
          </div>
          <h4 class="mt-3" data-translate="success_title">تم بنجاح!</h4>
          <p class="text-muted" id="successMessage"></p>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-translate="close">إغلاق</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->

  <!-- JavaScript files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- ✅ سكربت تسجيل الدخول والتسجيل -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Login form
      const loginForm = document.getElementById("loginForm");
      if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
          e.preventDefault();
          fetch("auth/login_post.php", { method: "POST", body: new FormData(this) })
            .then(res => res.json())
            .then(data => {
              if (data.status === "success") {
                window.location.href = data.redirect; // تحويل
              } else {
                alert(data.message);
              }
            })
            .catch(err => console.error("Error:", err));
        });
      }

      // Register form
      const registerForm = document.getElementById("registerForm");
      if (registerForm) {
        registerForm.addEventListener("submit", async function(e) {
          e.preventDefault();
          const formData = new FormData(this);
          try {
            const res = await fetch("auth/register_post.php", { method: "POST", body: formData });
            const result = await res.json();
            if(result.status === "success"){
              Swal.fire({ icon: 'success', title: 'تم التسجيل بنجاح!', text: 'يمكنك الآن تسجيل الدخول.', timer: 3000 });
              this.reset();
            } else {
              let errors = result.errors ? Object.values(result.errors).join('<br>') : result.message;
              Swal.fire({ icon: 'error', title: 'يوجد خطأ', html: errors });
            }
          } catch (err) {
            console.error(err);
            Swal.fire({ icon: 'error', title: 'حدث خطأ', text: 'يرجى المحاولة مرة أخرى لاحقاً.' });
          }
        });
      }

      // Tabs switching
      const loginTab = document.getElementById('loginTab');
      const registerTab = document.getElementById('registerTab');
      if (loginTab && registerTab && loginForm && registerForm) {
        loginTab.addEventListener('click', () => {
          loginTab.classList.add('active');
          registerTab.classList.remove('active');
          loginForm.classList.remove('d-none');
          registerForm.classList.add('d-none');
        });

        registerTab.addEventListener('click', () => {
          registerTab.classList.add('active');
          loginTab.classList.remove('active');
          registerForm.classList.remove('d-none');
          loginForm.classList.add('d-none');
        });
      }
    });
  </script>

  <!-- ملفاتك -->
  <script src="js/main.js"></script>
  <script src="js/lang.js"></script>


  
</body>
</html>
