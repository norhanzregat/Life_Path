<?php
// بيانات الأطباء (يجب أن تكون متطابقة مع تلك في dashboard)
$doctors = [
    "1" => [
        "id" => 1,
        "name" => "Dr. Ahmad Al-Khatib",
        "specialty" => "Consultant Cardiologist",
        "email" => "ahmad.khatib@nafasclinic.com",
        "phone" => "+962 79 555 1234",
        "location" => "Amman, Jordan",
        "about" => "Dr. Ahmad Al-Khatib has over 15 years of experience in cardiology, focusing on preventive care and accurate diagnosis.",
        "avatar" => "https://randomuser.me/api/portraits/men/32.jpg",
        "experience" => [
            "Consultant Cardiologist - King Hussein Medical Center (2017-Present)",
            "Cardiology Specialist - Jordan University Hospital (2012-2017)",
            "Resident Doctor - Al Bashir Hospital (2008-2012)"
        ],
        "publications" => [
            "Study on Coronary Artery Diseases - Jordan Medical Journal, 2023",
            "Modern Techniques in Treating Cardiac Disorders - Health Magazine, 2021"
        ],
        "stats" => [
            "patients" => 320,
            "sessions" => 540,
            "upcoming" => 8
        ]
    ],
    "2" => [
        "id" => 2,
        "name" => "Dr. Sarah Johnson",
        "specialty" => "Pediatric Specialist",
        "email" => "sarah.johnson@nafasclinic.com",
        "phone" => "+962 79 555 5678",
        "location" => "Irbid, Jordan",
        "about" => "Dr. Sarah Johnson specializes in pediatric care with 10 years of experience, focusing on child development and preventive medicine.",
        "avatar" => "https://randomuser.me/api/portraits/women/44.jpg",
        "experience" => [
            "Pediatric Specialist - Jordan Children's Hospital (2018-Present)",
            "Pediatric Resident - Al Khalidi Hospital (2014-2018)"
        ],
        "publications" => [
            "Childhood Vaccination Trends - Middle East Medical Journal, 2022",
            "Nutrition for Growing Children - Pediatric Health, 2020"
        ],
        "stats" => [
            "patients" => 240,
            "sessions" => 420,
            "upcoming" => 5
        ]
    ],
    "3" => [
        "id" => 3,
        "name" => "Dr. Salma Jaber",
        "specialty" => "Pediatric Specialist",
        "email" => "salma.jaber@nafasclinic.com",
        "phone" => "+962 79 555 6789",
        "location" => "Irbid, Jordan",
        "about" => "Dr. Salma Jaber specializes in pediatric care with 10 years of experience, focusing on child development and preventive medicine.",
        "avatar" => "https://randomuser.me/api/portraits/women/44.jpg",
        "experience" => [
            "Pediatric Specialist - Jordan Children's Hospital (2018-Present)",
            "Pediatric Resident - Al Khalidi Hospital (2014-2018)"
        ],
        "publications" => [
            "Childhood Vaccination Trends - Middle East Medical Journal, 2022",
            "Nutrition for Growing Children - Pediatric Health, 2020"
        ],
        "stats" => [
            "patients" => 290,
            "sessions" => 620,
            "upcoming" => 7
        ]
    ]
];

// الحصول على معرف الطبيب من الرابط
$doctorId = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : '1';

// التحقق من وجود الطبيب في المصفوفة
if (!isset($doctors[$doctorId])) {
    // إذا لم يوجد، نستخدم الطبيب الأول
    $doctorId = '1';
}

// تحديد الطبيب الحالي
$doctor = $doctors[$doctorId];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Doctor Profile | Nafas Clinic</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6fb; }
    .profile-card { border-radius: 18px; box-shadow: 0 2px 12px #0001; }
    .avatar-lg { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 3px solid #0d6efd; }
    .stats { font-size: 1.1rem; font-weight: 500; }
    .edit-btn { min-width: 120px; }
    .card-title { color: #0d6efd; }
    .list-unstyled li { margin-bottom: 8px; }
  </style>
</head>
<body>
<div class="container py-4">
  <!-- Header -->
  <div class="profile-card bg-white p-4 mb-4 d-flex align-items-center">
    <img src="<?= htmlspecialchars($doctor['avatar']) ?>" alt="Doctor" class="avatar-lg me-4 shadow" id="profileAvatar">
    <div>
      <h2 class="fw-bold mb-1" id="profileName"><?= htmlspecialchars($doctor['name']) ?></h2>
      <div class="text-muted mb-1" id="profileSpecialty"><?= htmlspecialchars($doctor['specialty']) ?></div>
      <div class="text-muted small"><i class="fa-solid fa-envelope text-primary me-1"></i><span id="profileEmail"><?= htmlspecialchars($doctor['email']) ?></span></div>
    </div>
  </div>

  <!-- Statistics -->
  <div class="row text-center mb-4">
    <div class="col-md-4 mb-2">
      <div class="card p-3">
        <div class="stats"><i class="fa-solid fa-user-doctor me-2 text-primary"></i><span id="statsPatients"><?= $doctor['stats']['patients'] ?></span> Patients</div>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card p-3">
        <div class="stats"><i class="fa-solid fa-calendar-check me-2 text-success"></i><span id="statsSessions"><?= $doctor['stats']['sessions'] ?></span> Sessions</div>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card p-3">
        <div class="stats"><i class="fa-solid fa-clock me-2 text-warning"></i><span id="statsUpcoming"><?= $doctor['stats']['upcoming'] ?></span> Upcoming Appointments</div>
      </div>
    </div>
  </div>

  <!-- About & Contact Info -->
  <div class="row mb-4">
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-user me-2"></i>About the Doctor</h5>
        <p id="profileAbout"><?= htmlspecialchars($doctor['about']) ?></p>
      </div>
    </div>
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-address-book me-2"></i>Contact Information</h5>
        <ul class="list-unstyled mb-0">
          <li><i class="fa-solid fa-envelope me-2 text-primary"></i><span id="contactEmail"><?= htmlspecialchars($doctor['email']) ?></span></li>
          <li><i class="fa-solid fa-phone me-2 text-success"></i><span id="contactPhone"><?= htmlspecialchars($doctor['phone']) ?></span></li>
          <li><i class="fa-solid fa-map-marker-alt me-2 text-danger"></i><span id="contactLocation"><?= htmlspecialchars($doctor['location']) ?></span></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Experience & Publications -->
  <div class="row mb-4">
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-briefcase me-2"></i>Experience</h5>
        <ul class="mb-0" id="profileExperience">
          <?php foreach ($doctor['experience'] as $exp): ?>
            <li><?= htmlspecialchars($exp) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-book-open me-2"></i>Research & Publications</h5>
        <ul class="mb-0" id="profilePublications">
          <?php foreach ($doctor['publications'] as $pub): ?>
            <li><?= htmlspecialchars($pub) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// تحميل البيانات المحفوظة من localStorage وتحديث الصفحة
document.addEventListener('DOMContentLoaded', function() {
  // التحقق من وجود بيانات محفوظة
  if (localStorage.getItem('doctorData')) {
    const savedData = JSON.parse(localStorage.getItem('doctorData'));
    updateProfile(savedData);
  }
});

function updateProfile(data) {
  // تحديث المعلومات الأساسية
  if (data.name) {
    document.getElementById('profileName').textContent = data.name;
  }
  
  if (data.specialty) {
    document.getElementById('profileSpecialty').textContent = data.specialty;
  }
  
  if (data.email) {
    document.getElementById('profileEmail').textContent = data.email;
    document.getElementById('contactEmail').textContent = data.email;
  }
  
  if (data.avatar) {
    document.getElementById('profileAvatar').src = data.avatar;
  }
  
  if (data.phone) {
    document.getElementById('contactPhone').textContent = data.phone;
  }
  
  if (data.location) {
    document.getElementById('contactLocation').textContent = data.location;
  }
  
  if (data.about) {
    document.getElementById('profileAbout').textContent = data.about;
  }
  
  // تحديث الخبرات
  if (data.experience && Array.isArray(data.experience)) {
    const experienceList = document.getElementById('profileExperience');
    experienceList.innerHTML = '';
    
    data.experience.forEach(exp => {
      const li = document.createElement('li');
      li.textContent = exp;
      experienceList.appendChild(li);
    });
  }
  
  // تحديث المنشورات
  if (data.publications && Array.isArray(data.publications)) {
    const publicationsList = document.getElementById('profilePublications');
    publicationsList.innerHTML = '';
    
    data.publications.forEach(pub => {
      const li = document.createElement('li');
      li.textContent = pub;
      publicationsList.appendChild(li);
    });
  }
}
</script>
</body>
</html>