<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>أطباؤنا | Life Path Clinic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="specialists.css">
</head>
<body>
  <style>
/* الهيدر */
.header {
  background: linear-gradient(90deg, #007bff, #00bfff); /* Gradient أزرق جميل */
  color: white; /* نص واضح */
  padding: 60px 20px;
  text-align: center;
  border-radius: 0 0 20px 20px;
}

/* أيقونات الهيدر */
.header-icon {
  color: white;
  transition: color 0.3s;
}
.header-icon:hover {
  color: #ffd700; /* تغيير لون عند المرور لتوضيح */
}

/* زر */
.btn-primary {
  background: linear-gradient(90deg, #00bfff, #0655A9FF);
  border: none;
  padding: 12px 28px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1rem;
  color: white;
  cursor: pointer;
  transition: all 0.3s ease;
}

/* تأثير hover للزر */
.btn-primary:hover {
  filter: brightness(1.2); /* يزيد الإضاءة */
  transform: scale(1.09);  /* تكبير بسيط */
}




  </style>

<!-- زر تغيير اللغة -->
<div class="language-switcher">
  <button id="langSwitch" class="lang-btn">EN</button>
</div>

<!-- المقدمة -->
<section class="hero-section">
  <div class="container text-center">
    <h1 id="heroTitle">أطباؤنا المتميزون</h1>
    <p id="heroDesc" class="lead">تعرف على نخبة من أفضل الأطباء المتخصصين في مختلف المجالات الطبية الذين يقدمون رعاية صحية استثنائية</p>
          <a href="booking_appo/booking.php" class="btn btn-primary btn-lg">احجز موعدك الآن</a>

  </div>
</section>

<!-- الفلترة حسب التخصص -->
<div class="container mb-5">
  <h2 class="section-title text-center">التخصصات الطبية</h2>
  <div class="filter-buttons">
    <button class="filter-btn active" data-filter="all">جميع التخصصات</button>
    <button class="filter-btn" data-filter="psychology">علم النفس والإرشاد</button>
    <button class="filter-btn" data-filter="autism">اضطرابات التوحد</button>
    <button class="filter-btn" data-filter="occupational">العلاج الوظيفي</button>
    <button class="filter-btn" data-filter="speech">النطق واللغة</button>
    <button class="filter-btn" data-filter="creative">العلاج بالإبداع</button>
    <button class="filter-btn" data-filter="assessment">التقييم والاختبارات</button>
  </div>

  <!-- قائمة الأطباء -->
  <div class="row g-4" id="doctorsList">
    
    <!-- طبيب 1 -->
    <div class="col-md-6 col-lg-4" data-category="psychology">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
          alt="د. إيمان الشعيبي" class="doctor-img">
          <div class="doctor-specialty">الإرشاد النفسي والتربوي</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">د. إيمان الشعيبي</h4>
          <p class="doctor-bio">أخصائية الإرشاد النفسي والتربوي مع أكثر من 10 سنوات من الخبرة في تقديم الاستشارات النفسية والتوجيه التربوي.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span class="ms-2">(4.5)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="1">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 2 -->
    <div class="col-md-6 col-lg-4" data-category="psychology">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية هنادي داوود" class="doctor-img">
          <div class="doctor-specialty">علم النفس</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية هنادي داوود</h4>
          <p class="doctor-bio">أخصائية نفسية معتمدة متخصصة في العلاج السلوكي المعرفي والاستشارات الأسرية، حاصلة على ماجستير في علم النفس السريري.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <span class="ms-2">(4.0)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="2">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 3 -->
    <div class="col-md-6 col-lg-4" data-category="psychology">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية رند صالح" class="doctor-img">
          <div class="doctor-specialty">علم النفس العيادي</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية رند صالح</h4>
          <p class="doctor-bio">أخصائية نفسية عيادية متخصصة في تشخيص وعلاج الاضطرابات النفسية، مع خبرة واسعة في مجال الصحة النفسية.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <span class="ms-2">(5.0)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="3">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 4 -->
    <div class="col-md-6 col-lg-4" data-category="psychology">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1551836026-d5c8c5ab235e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية لارا عبيد" class="doctor-img">
          <div class="doctor-specialty">علم النفس</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية لارا عبيد</h4>
          <p class="doctor-bio">أخصائية نفسية متخصصة في علاج اضطرابات القلق والاكتئاب، تستخدم أحدث الأساليب العلاجية المبنية على الأدلة العلمية.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span class="ms-2">(4.5)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="4">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 5 -->
    <div class="col-md-6 col-lg-4" data-category="occupational">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية لين حسين" class="doctor-img">
          <div class="doctor-specialty">العلاج الوظيفي</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية لين حسين</h4>
          <p class="doctor-bio">أخصائية العلاج الوظيفي مع خبرة في مساعدة الأطفال والكبار على تطوير المهارات الحركية والحسية لتحسين جودة الحياة.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <span class="ms-2">(4.0)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="5">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 6 -->
    <div class="col-md-6 col-lg-4" data-category="creative">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1573497019236-61f35f4145ed?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية نور ابو الجود" class="doctor-img">
          <div class="doctor-specialty">العلاج بالإبداع</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية نور أبو الجود</h4>
          <p class="doctor-bio">معالجة بالفنون الإبداعية تستخدم الفن والموسيقى والدراما كوسائل علاجية لتعزيز الصحة النفسية والتنمية الشخصية.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <span class="ms-2">(5.0)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="6">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 7 -->
    <div class="col-md-6 col-lg-4" data-category="speech">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية أسيل عطية" class="doctor-img">
          <div class="doctor-specialty">النطق واللanguage</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية أسيل عطية</h4>
          <p class="doctor-bio">أخصائية النطق واللغة مع خبرة في تشخيص وعلاج اضطرابات النطق واللغة والتواصل عند الأطفال والكبار.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span class="ms-2">(4.5)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="7">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 8 -->
    <div class="col-md-6 col-lg-4" data-category="assessment">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="الاخصائية رغد رياحي" class="doctor-img">
          <div class="doctor-specialty">التقييم والاختبارات</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">الأخصائية رغد رياحي</h4>
          <p class="doctor-bio">أخصائية التقييم والاختبارات النفسية، متخصصة في تطبيق وتفسير المقاييس النفسية لتشخيص الحالات بدقة.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <span class="ms-2">(4.0)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="8">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- طبيب 9 -->
    <div class="col-md-6 col-lg-4" data-category="psychology">
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="https://images.unsplash.com/photo-1584302171621-87d53e5d359c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="المدربة أماني البس" class="doctor-img">
          <div class="doctor-specialty">تدريب برنامج مسار الحياة</div>
        </div>
        <div class="doctor-info">
          <h4 class="doctor-name">المدربة أماني البس</h4>
          <p class="doctor-bio">مدربة معتمدة لبرنامج مسار الحياة، متخصصة في تطوير المهارات الحياتية وتعزيز الصحة النفسية من خلال البرامج التدريبية.</p>
          <div class="star-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <span class="ms-2">(5.0)</span>
          </div>
          <button class="btn view-profile-btn" data-bs-toggle="modal" data-bs-target="#doctorModal" data-doctor="9">
            عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>
          </button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- زر واتساب -->
<a href="https://wa.me/962775346699" target="_blank" class="whatsapp-float">
  <i class="fab fa-whatsapp"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="doctorModalLabel">الملف الشخصي للطبيب</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Header Section -->
        <div class="text-center mb-4">
          <img id="modalDoctorImg" src="" alt="طبيب" class="doctor-modal-img">
          <h3 id="modalDoctorName" class="mb-1"></h3>
          <p id="modalDoctorSpecialty" class="text-muted mb-2"></p>
          <div id="modalDoctorRating" class="star-rating"></div>
        </div>
        
        <!-- Statistics Section -->
        <div class="row modal-stats text-center mb-4">
          <div class="col-md-4 mb-3">
            <div class="card p-3">
              <div class="stats">
                <i class="fa-solid fa-user-doctor text-primary"></i>
                <span id="statsPatients">320</span> مرضى
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-3">
              <div class="stats">
                <i class="fa-solid fa-calendar-check text-success"></i>
                <span id="statsSessions">540</span> جلسة
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-3">
              <div class="stats">
                <i class="fa-solid fa-clock text-warning"></i>
                <span id="statsUpcoming">8</span> مواعيد قادمة
              </div>
            </div>
          </div>
        </div>
        
        <!-- About & Contact Info -->
        <div class="row mb-4">
          <div class="col-md-6 mb-3">
            <div class="card p-3 h-100">
              <h5 class="card-title"><i class="fa-solid fa-user me-2"></i>نبذة عن الطبيب</h5>
              <p id="modalDoctorBio" class="mb-0"></p>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card p-3 h-100">
              <h5 class="card-title"><i class="fa-solid fa-address-book me-2"></i>معلومات الاتصال</h5>
              <ul class="list-unstyled mb-0 profile-contact">
                <li><i class="fa-solid fa-envelope text-primary"></i><span id="contactEmail">ahmad.khatib@nafasclinic.com</span></li>
                <li><i class="fa-solid fa-phone text-success"></i><span id="contactPhone">+962 79 555 1234</span></li>
                <li><i class="fa-solid fa-map-marker-alt text-danger"></i><span id="contactLocation">عمان، الأردن</span></li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Experience & Specializations -->
        <div class="row mb-4">
          <div class="col-md-6 mb-3">
            <div class="card p-3 h-100">
              <h5 class="card-title"><i class="fa-solid fa-briefcase me-2"></i>الخبرة العملية</h5>
              <ul id="modalDoctorExperience" class="mb-0"></ul>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card p-3 h-100">
              <h5 class="card-title"><i class="fa-solid fa-graduation-cap me-2"></i>المؤهلات العلمية</h5>
              <ul id="modalDoctorQualifications" class="mb-0"></ul>
            </div>
          </div>
        </div>
        
        <!-- Additional Info -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card p-3 h-100">
              <h5 class="card-title"><i class="fa-solid fa-star me-2"></i>التخصص الدقيق</h5>
              <p id="modalDoctorExpertise" class="mb-0"></p>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card p-3 h-100">
              <h5 class="card-title"><i class="fa-solid fa-book-open me-2"></i>الأبحاث والمنشورات</h5>
              <ul id="modalDoctorPublications" class="mb-0"></ul>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="specialists.js"></script>
</body>
</html>
