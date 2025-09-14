
  // بيانات الأطباء الموسعة
  const doctorsData = {
    1: {
      name: "د. إيمان الشعيبي",
      specialty: "أخصائية الإرشاد النفسي والتربوي",
      img: "https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
      rating: 4.5,
      patients: 450,
      sessions: 1200,
      upcoming: 12,
      email: "imanal@lifepath.com",
      phone: "+962 79 123 4567",
      location: "عمان، الأردن",
      expertise: "الإرشاد النفسي، التوجيه التربوي، حل المشكلات التعليمية",
      experience: [
        "أخصائية الإرشاد النفسي - مركز مسار الحياة (2015-حتى الآن)",
        "مستشارة تربوية - وزارة التربية والتعليم (2010-2015)",
        "معالجة نفسية - مستشفى الجامعة الأردنية (2008-2010)"
      ],
      qualifications: [
        "دكتوراه في الإرشاد النفسي والتربوي - جامعة عمان العربية",
        "ماجستير في علم النفس التربوي - الجامعة الأردنية",
        "بكالوريوس في علم النفس - جامعة اليرموك"
      ],
      publications: [
        "دراسة حول تأثير الإرشاد النفسي على التحصيل الدراسي (2020)",
        "دليل الإرشاد التربوي للمراهقين (2018)"
      ],
      bio: "أخصائية الإرشاد النفسي والتربوي مع أكثر من 10 سنوات من الخبرة في تقديم الاستشارات النفسية والتوجيه التربوي. حاصلة على شهادة الدكتوراه في الإرشاد النفسي والتربوي وتعمل مع مختلف الفئات العمرية."
    },
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
        btn.innerHTML = 'عرض الملف الشخصي <i class="fas fa-arrow-left ms-2"></i>';
      });
    }
  });
