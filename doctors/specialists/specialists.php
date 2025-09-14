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

<!-- زر تغيير اللغة -->
<div class="language-switcher">
  <button id="langSwitch" class="lang-btn">EN</button>
</div>

<!-- المقدمة -->
<section class="hero-section">
  <div class="container text-center">
    <h1 id="heroTitle">أطباؤنا المتميزون</h1>
    <p id="heroDesc" class="lead">تعرف على نخبة من أفضل الأطباء المتخصصين في مختلف المجالات الطبية الذين يقدمون رعاية صحية استثنائية</p>
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
        <a href="../booking_appo/booking.php" class="btn btn-primary">حجز موعد</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
<script>
  // بيانات الأطباء الموسعة
  const doctorsData = {
    1: {
      name: "د. إيمان الشع
    2: {
      name: "الأخصائية هنادي داوود",
      specialty: "أخصائية نفسية",
      img: "https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
      rating: 4.0,
      patients: 320,
      sessions: 860,
      upcoming: 8,
      email: "hanadi@lifepath.com",
      phone: "+962 79 765 4321",
      location: "عمان، الأردن",
      expertise: "العلاج السلوكي المعرفي، الاستشارات الأسرية",
      experience: [
        "أخصائية نفسية - مركز مسار الحياة (2017-حتى الآن)",
        "معالجة نفسية - عيادة الأسرة (2013-2017)",
        "باحثة مساعدة - مركز الدراسات النفسية (2010-2013)"
      ],
      qualifications: [
        "ماجستير في علم النفس السريري - الجامعة الأردنية",
        "بكالوريوس في علم النفس - جامعة البتراء",
        "دبلوم في العلاج الأسري - معهد الإرشاد النفسي"
      ],
      publications: [
        "العلاج السلوكي المعرفي للاكتئاب (2019)",
        "ديناميكية العلاقات الأسرية (2016)"
      ],
      bio: "أخصائية نفسية معتمدة متخصصة في العلاج السلوكي المعرفي والاستشارات الأسرية. حاصلة على ماجستير في علم النفس السريري وتتمتع بخبرة واسعة في تقديم الاستشارات النفسية."
    },
    3: {
      name: "الأخصائية رند صالح",
      specialty: "أخصائية نفسية عيادية",
      img: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
      rating: 5.0,
      patients: 520,
      sessions: 1450,
      upcoming: 15,
      email: "rand@lifepath.com",
      phone: "+962 79 555 8888",
      location: "عمان، الأردن",
      expertise: "تشخيص الاضطرابات النفسية، العلاج النفسي",
      experience: [
        "أخصائية نفسية عيادية - مركز مسار الحياة (2016-حتى الآن)",
        "باحثة رئيسية - مركز الدراسات النفسية (2012-2016)",
        "معالجة نفسية - مستشفى الملكة رانيا (2008-2012)"
      ],
      qualifications: [
        "دكتوراه في علم النفس العيادي - جامعة العلوم التطبيقية",
        "ماجستير في الصحة النفسية - الجامعة الأردنية",
        "بكالوريوس في علم النفس - جامعة الزيتونة"
      ],
      publications: [
        "تشخيص الاضطرابات النفسية باستخدام التقنيات الحديثة (2021)",
        "فعالية العلاج النفسي في اضطرابات القلق (2018)",
        "دليل الصحة النفسية للمجتمع (2015)"
      ],
      bio: "أخصائية نفسية عيادية متخصصة في تشخيص وعلاج الاضطرابات النفسية. حاصلة على الدكتوراه في علم النفس العيادي ولها العديد من الأبحاث المنشورة في مجال الصحة النفسية."
    },
    // يمكن إضافة بيانات بقية الأطباء هنا بنفس الهيكل...
  };

  // فلترة الأطباء حسب التخصص
  document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', function() {
      // إزالة النشط من جميع الأزرار
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
      });
      
      // إضافة النشط للزر المختار
      this.classList.add('active');
      
      const filter = this.getAttribute('data-filter');
      
      // إظهار أو إخفاء الأطباء حسب التخصص
      document.querySelectorAll('.col-md-6.col-lg-4').forEach(card => {
        if (filter === 'all' || card.getAttribute('data-category') === filter) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // تفعيل نموذج عرض الطبيب
  const doctorModal = document.getElementById('doctorModal');
  doctorModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const doctorId = button.getAttribute('data-doctor');
    const doctor = doctorsData[doctorId];
    
    document.getElementById('modalDoctorImg').src = doctor.img;
    document.getElementById('modalDoctorName').textContent = doctor.name;
    document.getElementById('modalDoctorSpecialty').textContent = doctor.specialty;
    
    // عرض التقييم
    const ratingElement = document.getElementById('modalDoctorRating');
    ratingElement.innerHTML = '';
    for (let i = 1; i <= 5; i++) {
      const star = document.createElement('i');
      if (i <= Math.floor(doctor.rating)) {
        star.className = 'fas fa-star';
      } else if (i === Math.ceil(doctor.rating) && !Number.isInteger(doctor.rating)) {
        star.className = 'fas fa-star-half-alt';
      } else {
        star.className = 'far fa-star';
      }
      ratingElement.appendChild(star);
    }
    ratingElement.innerHTML += ` <span>(${doctor.rating})</span>`;
    
    // تعبئة البيانات الأخرى
    document.getElementById('statsPatients').textContent = doctor.patients;
    document.getElementById('statsSessions').textContent = doctor.sessions;
    document.getElementById('statsUpcoming').textContent = doctor.upcoming;
    document.getElementById('contactEmail').textContent = doctor.email;
    document.getElementById('contactPhone').textContent = doctor.phone;
    document.getElementById('contactLocation').textContent = doctor.location;
    document.getElementById('modalDoctorExpertise').textContent = doctor.expertise;
    document.getElementById('modalDoctorBio').textContent = doctor.bio;
    
    const experienceList = document.getElementById('modalDoctorExperience');
    experienceList.innerHTML = '';
    doctor.experience.forEach(exp => {
      const li = document.createElement('li');
      li.textContent = exp;
      experienceList.appendChild(li);
    });
    
    const qualificationsList = document.getElementById('modalDoctorQualifications');
    qualificationsList.innerHTML = '';
    doctor.qualifications.forEach(qualification => {
      const li = document.createElement('li');
      li.textContent = qualification;
      qualificationsList.appendChild(li);
    });
    
    const publicationsList = document.getElementById('modalDoctorPublications');
    publicationsList.innerHTML = '';
    doctor.publications.forEach(publication => {
      const li = document.createElement('li');
      li.textContent = publication;
      publicationsList.appendChild(li);
    });
  });

  // تبديل اللغة
  document.getElementById('langSwitch').addEventListener('click', function() {
    const isArabic = this.textContent === 'EN';
    
    if (isArabic) {
      // التبديل إلى الإنجليزية
      this.textContent = 'AR';
      document.documentElement.dir = 'ltr';
      document.getElementById('heroTitle').textContent = 'Our Distinguished Doctors';
      document.getElementById('heroDesc').textContent = 'Meet our elite team of specialist doctors who provide exceptional healthcare in various medical fields';
      document.querySelector('.section-title').textContent = 'Medical Specialties';
      document.querySelector('[data-filter="all"]').textContent = 'All Specialties';
      document.querySelector('[data-filter="psychology"]').textContent = 'Psychology & Counseling';
      document.querySelector('[data-filter="autism"]').textContent = 'Autism Disorders';
      document.querySelector('[data-filter="occupational"]').textContent = 'Occupational Therapy';
      document.querySelector('[data-filter="speech"]').textContent = 'Speech & Language';
      document.querySelector('[data-filter="creative"]').textContent = 'Creative Therapy';
      document.querySelector('[data-filter="assessment"]').textContent = 'Assessment & Testing';
      
      // تحديث نصوص الزر
      document.querySelectorAll('.view-profile-btn').forEach(btn => {
        btn.innerHTML = 'View Profile <i class="fas fa-arrow-right ms-2"></i>';
      });
    } else {
      // التبديل إلى العربية
      this.textContent = 'EN';
      document.documentElement.dir = 'rtl';
      document.getElementById('heroTitle').textContent = 'أطباؤنا المتميزون';
      document.getElementById('heroDesc').textContent = 'تعرف على نخبة من أفضل الأطباء المتخصصين في مختلف المجالات الطبية الذين يقدمون رعاية صحية استثنائية';
      document.querySelector('.section-title').textContent = 'التخصصات الطبية';
      document.querySelector('[data-filter="all"]').textContent = 'جميع التخصصات';
      document.querySelector('[data-filter="psychology"]').textContent = 'علم النفس والإرشاد';
      document.querySelector('[data-filter="autism"]').textContent = 'اضطرابات التوحد';
      document.querySelector('[data-filter="occupational"]').textContent = 'العلاج الوظيفي';
      document.querySelector('[data-filter="speech"]').textContent = 'النطق واللغة';
      document.querySelector('[data-filter="creative"]').textContent = 'العلاج بالإبداع';
      document.querySelector('[data-filter="assessment"]').textContent = 'التقييم والاختبارات';
      
      // تحديث نصوص الزر
      document.querySelectorAll('.view-profile-btn').forEach(btn => {
        btn.innerHTML = 'عرض الملف الشخصي <i class="fa-brands fa-whatsapp"></i>
';
      });
    }
  });
</script>
<div?>
<p>  jbnhoujhdjkghkjdghkjsgtUOTYHsgtjHLTFKLJSZPHLOYKGNKGZK </p>
</div>

=======
<script src="specialists.js"></script>
>>>>>>> 01152e7 (رفع آخر التعديلات)
</body>
</html>