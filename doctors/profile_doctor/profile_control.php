<?php
// بيانات الأطباء (في التطبيق الحقيقي يجب جلبها من قاعدة البيانات)
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

// تحديد الطبيب الحالي (من خلال معلمة URL أو افتراضي)
$currentDoctorId = isset($_GET['doctor_id']) && isset($doctors[$_GET['doctor_id']]) ? $_GET['doctor_id'] : '1';
$doctor = $doctors[$currentDoctorId];

// بيانات الحجوزات (مرتبطة بمعرف الطبيب)
$appointments = [
    "1" => [
        [
            "id" => 1,
            "patient_name" => "Mohammad Ali",
            "patient_email" => "mohammad.ali@example.com",
            "date" => "2023-12-15",
            "time" => "10:00 AM",
            "status" => "confirmed",
            "type" => "in-person",
            "notes" => "Routine checkup"
        ],
        [
            "id" => 2,
            "patient_name" => "Sara Ahmad",
            "patient_email" => "sara.ahmad@example.com",
            "date" => "2023-12-16",
            "time" => "11:30 AM",
            "status" => "pending",
            "type" => "video",
            "notes" => "Follow-up consultation"
        ],
        [
            "id" => 3,
            "patient_name" => "Jaber Ahmad",
            "patient_email" => "jaber.ahmad@example.com",
            "date" => "2023-12-16",
            "time" => "11:30 AM",
            "status" => "pending",
            "type" => "video",
            "notes" => "Follow-up consultation"
        ],
        [
            "id" => 4,
            "patient_name" => "Tamer Ali",
            "patient_email" => "tamer.ali@example.com",
            "date" => "2023-12-16",
            "time" => "11:30 AM",
            "status" => "pending",
            "type" => "video",
            "notes" => "Follow-up consultation"
        ],
        [
            "id" => 5,
            "patient_name" => "Lina Mohammad",
            "patient_email" => "lina@example.com",
            "date" => "2023-12-17",
            "time" => "09:00 AM",
            "status" => "confirmed",
            "type" => "in-person",
            "notes" => "Annual checkup"
        ],
        [
            "id" => 6,
            "patient_name" => "Rami Hassan",
            "patient_email" => "rami@example.com",
            "date" => "2023-12-17",
            "time" => "10:30 AM",
            "status" => "completed",
            "type" => "video",
            "notes" => "Consultation"
        ]
    ],

    "2" => [
        [
            "id" => 7,
            "patient_name" => "Layla Hassan",
            "patient_email" => "layla.hassan@example.com",
            "date" => "2023-12-15",
            "time" => "09:00 AM",
            "status" => "confirmed",
            "type" => "in-person",
            "notes" => "Annual checkup"
        ],
        [
            "id" => 8,
            "patient_name" => "Omar Mahmoud",
            "patient_email" => "omar.mahmoud@example.com",
            "date" => "2023-12-17",
            "time" => "03:30 PM",
            "status" => "completed",
            "type" => "video",
            "notes" => "Vaccination consultation"
        ],
        [
            "id" => 9,
            "patient_name" => "Ala'a Al-ahmed",
            "patient_email" => "ala'a@example.com",
            "date" => "2023-12-17",
            "time" => "03:30 PM",
            "status" => "completed",
            "type" => "video",
            "notes" => "Vaccination consultation"
        ]
    ],

    "3" => [
        [
            "id" => 10,
            "patient_name" => "Layla Hassan",
            "patient_email" => "layla.hassan@example.com",
            "date" => "2023-12-15",
            "time" => "09:00 AM",
            "status" => "confirmed",
            "type" => "in-person",
            "notes" => "Annual checkup"
        ],
        [
            "id" => 11,
            "patient_name" => "Omar Mahmoud",
            "patient_email" => "omar.mahmoud@example.com",
            "date" => "2023-12-17",
            "time" => "03:30 PM",
            "status" => "completed",
            "type" => "video",
            "notes" => "Vaccination consultation"
        ],
        [
            "id" => 12,
            "patient_name" => "Ala'a Al-ahmed",
            "patient_email" => "ala'a@example.com",
            "date" => "2023-12-17",
            "time" => "03:30 PM",
            "status" => "completed",
            "type" => "video",
            "notes" => "Vaccination consultation"
        ]
    ]
];

// بيانات المرضى (مرتبطة بمعرف الطبيب)
$patients = [
    "1" => [
        [
            "id" => 1,
            "name" => "Mohammad Ali",
            "email" => "mohammad.ali@example.com",
            "phone" => "+962 79 123 4567",
            "age" => 45,
            "gender" => "male",
            "last_visit" => "2023-11-20",
            "next_appointment" => "2023-12-15"
        ],
        [
            "id" => 2,
            "name" => "Sara Ahmad",
            "email" => "sara.ahmad@example.com",
            "phone" => "+962 79 234 5678",
            "age" => 32,
            "gender" => "female",
            "last_visit" => "2023-10-15",
            "next_appointment" => "2023-12-16"
        ],
        [
            "id" => 3,
            "name" => "Jaber Ahmad",
            "email" => "jaber.ahmad@example.com",
            "phone" => "+962 79 345 6789",
            "age" => 28,
            "gender" => "male",
            "last_visit" => "2023-10-10",
            "next_appointment" => "2023-12-16"
        ],
        [
            "id" => 4,
            "name" => "Tamer Ali",
            "email" => "tamer.ali@example.com",
            "phone" => "+962 79 456 7890",
            "age" => 35,
            "gender" => "male",
            "last_visit" => "2023-09-25",
            "next_appointment" => "2023-12-16"
        ],
        [
            "id" => 5,
            "name" => "Lina Mohammad",
            "email" => "lina@example.com",
            "phone" => "+962 79 567 8901",
            "age" => 29,
            "gender" => "female",
            "last_visit" => "2023-09-15",
            "next_appointment" => "2023-12-17"
        ],
        [
            "id" => 6,
            "name" => "Rami Hassan",
            "email" => "rami@example.com",
            "phone" => "+962 79 678 9012",
            "age" => 42,
            "gender" => "male",
            "last_visit" => "2023-08-30",
            "next_appointment" => "2023-12-17"
        ]
    ],

    "2" => [
        [
            "id" => 7,
            "name" => "Layla Hassan",
            "email" => "layla.hassan@example.com",
            "phone" => "+962 79 345 6789",
            "age" => 8,
            "gender" => "female",
            "last_visit" => "2023-11-10",
            "next_appointment" => "2023-12-15"
        ],
        [
            "id" => 8,
            "name" => "Omar Mahmoud",
            "email" => "omar.mahmoud@example.com",
            "phone" => "+962 79 456 7890",
            "age" => 6,
            "gender" => "male",
            "last_visit" => "2023-12-05",
            "next_appointment" => "2023-12-17"
        ],
        [
            "id" => 9,
            "name" => "Ala'a Al-ahmed",
            "email" => "ala'a@example.com",
            "phone" => "+962 79 567 8901",
            "age" => 5,
            "gender" => "female",
            "last_visit" => "2023-12-01",
            "next_appointment" => "2023-12-17"
        ]
    ],

    "3" => [
        [
            "id" => 10,
            "name" => "Layla Hassan",
            "email" => "layla.hassan@example.com",
            "phone" => "+962 79 345 6789",
            "age" => 8,
            "gender" => "female",
            "last_visit" => "2023-11-10",
            "next_appointment" => "2023-12-15"
        ],
        [
            "id" => 11,
            "name" => "Omar Mahmoud",
            "email" => "omar.mahmoud@example.com",
            "phone" => "+962 79 456 7890",
            "age" => 6,
            "gender" => "male",
            "last_visit" => "2023-12-05",
            "next_appointment" => "2023-12-17"
        ],
        [
            "id" => 12,
            "name" => "Ala'a Al-ahmed",
            "email" => "ala'a@example.com",
            "phone" => "+962 79 567 8901",
            "age" => 5,
            "gender" => "female",
            "last_visit" => "2023-12-01",
            "next_appointment" => "2023-12-17"
        ],
        [
            "id" => 13,
            "name" => "Yousef Ahmad",
            "email" => "yousef@example.com",
            "phone" => "+962 79 678 9012",
            "age" => 7,
            "gender" => "male",
            "last_visit" => "2023-11-20",
            "next_appointment" => "2023-12-18"
        ]
    ]
];

// بيانات الإشعارات (مرتبطة بمعرف الطبيب)
$notifications = [
    "1" => [
        [
            "id" => 1,
            "title" => "New Appointment Request",
            "message" => "Sara Ahmad requested an appointment for December 16",
            "time" => "2 hours ago",
            "read" => false
        ],
        [
            "id" => 2,
            "title" => "Appointment Reminder",
            "message" => "You have an appointment with Mohammad Ali tomorrow at 10:00 AM",
            "time" => "5 hours ago",
            "read" => true
        ]
    ],
    "2" => [
        [
            "id" => 3,
            "title" => "New Patient Registration",
            "message" => "New patient Ahmed Saleh registered for your clinic",
            "time" => "3 hours ago",
            "read" => false
        ],
        [
            "id" => 4,
            "title" => "Vaccination Schedule Update",
            "message" => "New vaccination guidelines have been published",
            "time" => "1 day ago",
            "read" => true
        ]
    ],
    "3" => [
        [
            "id" => 5,
            "title" => "New Patient Registration",
            "message" => "New patient Ahmed Saleh registered for your clinic",
            "time" => "3 hours ago",
            "read" => false
        ],
        [
            "id" => 6,
            "title" => "Vaccination Schedule Update",
            "message" => "New vaccination guidelines have been published",
            "time" => "1 day ago",
            "read" => true
        ]
    ]
];

// تحديد البيانات الحالية بناءً على الطبيب المحدد
$currentAppointments = $appointments[$currentDoctorId];
$currentPatients = $patients[$currentDoctorId];
$currentNotifications = $notifications[$currentDoctorId];

// فلترة الحجوزات
$filteredAppointments = $currentAppointments;

// فلترة حسب التاريخ
if (isset($_GET['date_filter']) && $_GET['date_filter'] !== 'all') {
    $today = date('Y-m-d');
    $filteredAppointments = array_filter($filteredAppointments, function($appointment) use ($today) {
        $appointmentDate = $appointment['date'];
        $diff = (strtotime($appointmentDate) - strtotime($today)) / (60 * 60 * 24);
        
        switch ($_GET['date_filter']) {
            case '2days':
                return $diff >= -2 && $diff <= 2;
            case '7days':
                return $diff >= -7 && $diff <= 7;
            case '30days':
                return $diff >= -30 && $diff <= 30;
            default:
                return true;
        }
    });
}

// فلترة حسب الحالة
if (isset($_GET['status_filter']) && $_GET['status_filter'] !== 'all') {
    $filteredAppointments = array_filter($filteredAppointments, function($appointment) {
        return $appointment['status'] === $_GET['status_filter'];
    });
}

// إعادة ترقيم المفاتيح بعد التصفية
$filteredAppointments = array_values($filteredAppointments);

// ترقيم الحجوزات
$appointmentsPerPage = 4;
$appointmentsTotalPages = ceil(count($filteredAppointments) / $appointmentsPerPage);
$appointmentsCurrentPage = isset($_GET['appointments_page']) ? max(1, min($appointmentsTotalPages, intval($_GET['appointments_page']))) : 1;
$appointmentsStartIndex = ($appointmentsCurrentPage - 1) * $appointmentsPerPage;
$appointmentsToShow = array_slice($filteredAppointments, $appointmentsStartIndex, $appointmentsPerPage);

// فلترة المرضى
$patientsSearch = isset($_GET['patients_search']) ? strtolower(trim($_GET['patients_search'])) : '';
$filteredPatients = $currentPatients;

if (!empty($patientsSearch)) {
    $filteredPatients = array_filter($filteredPatients, function($patient) use ($patientsSearch) {
        return strpos(strtolower($patient['name']), $patientsSearch) !== false || 
               strpos(strtolower($patient['email']), $patientsSearch) !== false;
    });
}

// إعادة ترقيم المفاتيح بعد التصفية
$filteredPatients = array_values($filteredPatients);

// ترقيم المرضى
$patientsPerPage = 6;
$patientsTotalPages = ceil(count($filteredPatients) / $patientsPerPage);
$patientsCurrentPage = isset($_GET['patients_page']) ? max(1, min($patientsTotalPages, intval($_GET['patients_page']))) : 1;
$patientsStartIndex = ($patientsCurrentPage - 1) * $patientsPerPage;
$patientsToShow = array_slice($filteredPatients, $patientsStartIndex, $patientsPerPage);

// إنشاء روابط الترقيم مع الحفاظ على معاملات الفلترة
function getPaginationLink($pageType, $pageNum) {
    $params = $_GET;
    $params[$pageType . '_page'] = $pageNum;
    return '?' . http_build_query($params);
}

// رابط العرض العام (دائمًا الطبيب الأول)
$publicProfileLink = "profile_view.php?doctor_id=" . $currentDoctorId;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard | Nafas Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6fb;
        }

        .dashboard-card {
            border-radius: 18px;
            box-shadow: 0 2px 12px #0001;
        }

        .avatar-lg {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #0d6efd;
        }

        .stats {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .edit-btn {
            min-width: 120px;
        }

        .card-title {
            color: #0d6efd;
        }

        .list-unstyled li {
            margin-bottom: 8px;
        }

        .nav-pills .nav-link.active {
            background-color: #0d6efd;
        }

        .sidebar {
            position: sticky;
            top: 20px;
        }

        .preview-card {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }

        /* البادج الأحمر فوق الأيقونة */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .status-badge {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
        }

        .appointment-type {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            border-radius: 0.25rem;
        }

        .appointment-in-person {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .appointment-video {
            background-color: #e3f2fd;
            color: #1565c0;
        }

        .notification-item.unread {
            background-color: #f8f9fa;
        }

        .doctor-selector {
            max-width: 250px;
        }

        /* تعديلات الإشعارات */
        .dropdown-menu {
            max-height: 400px;
            /* سكرول لو في إشعارات كثيرة */
            overflow-y: auto;
            word-wrap: break-word;
            /* كسر الكلمات الطويلة */
            white-space: normal;
            /* النصوص تلف وما تطلع برا */
        }

        .dropdown-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 8px;
            padding: 10px;
            white-space: normal;
            /* يسمح بالنزول لعدة أسطر */
        }

        .dropdown-item .flex-grow-1 {
            min-width: 0;
            word-break: break-word;
            /* عشان النصوص الطويلة */
        }

        .dropdown-item .badge {
            flex-shrink: 0;
            align-self: center;
            /* يثبت البادج بمحاذاة النص */
        }

        .dropdown-item .fw-bold {
            font-size: 14px;
            margin-bottom: 2px;
        }

        .dropdown-item .small.text-muted {
            font-size: 12px;
            line-height: 1.3;
        }
    </style>
</head>

<body>
    <!-- Toast Notification -->
    <div class="toast-container">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa-solid fa-circle-check text-success me-2"></i>
                <strong class="me-auto">Life Path</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Changes saved successfully!
            </div>
        </div>
    </div>

    <div class="container py-4">
        <!-- Doctor Selector -->
        <div class="dashboard-card bg-white p-3 mb-4 d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0">Doctor Dashboard</h4>
            <div class="doctor-selector">
                <select class="form-select" id="doctorSwitch">
                    <?php foreach ($doctors as $id => $doc): ?>
                        <option value="<?= $id ?>" <?= $currentDoctorId == $id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($doc['name']) ?> - <?= htmlspecialchars($doc['specialty']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3">
                <div class="dashboard-card bg-white p-4 mb-4 sidebar">
                    <div class="text-center mb-4">
                        <img src="<?= htmlspecialchars($doctor['avatar']) ?>" alt="Doctor" class="avatar-lg mb-3 shadow"
                            id="sidebarAvatar">
                        <h5 class="fw-bold mb-1" id="sidebarName"><?= htmlspecialchars($doctor['name']) ?></h5>
                        <div class="text-muted mb-3" id="sidebarSpecialty"><?= htmlspecialchars($doctor['specialty']) ?>
                        </div>
                        <a href="<?= $publicProfileLink ?>" class="btn btn-outline-primary btn-sm">
                            <i class="fa-solid fa-eye me-1"></i>View Public Profile
                        </a>
                    </div>

                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#personal" data-bs-toggle="pill">
                                <i class="fa-solid fa-user me-2"></i>Personal Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#professional" data-bs-toggle="pill">
                                <i class="fa-solid fa-briefcase me-2"></i>Professional Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#appointments" data-bs-toggle="pill">
                                <i class="fa-solid fa-calendar-check me-2"></i>Appointments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#patients" data-bs-toggle="pill">
                                <i class="fa-solid fa-user-injured me-2"></i>Patients
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#schedule" data-bs-toggle="pill">
                                <i class="fa-solid fa-calendar me-2"></i>Schedule Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#account" data-bs-toggle="pill">
                                <i class="fa-solid fa-gear me-2"></i>Account Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Header with Notifications -->
                <div class="dashboard-card bg-white p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold mb-0"><?= htmlspecialchars($doctor['name']) ?>'s Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <div class="form-check form-switch me-3">
                                <input class="form-check-input" type="checkbox" id="editModeToggle" checked>
                                <label class="form-check-label" for="editModeToggle">Edit Mode</label>
                            </div>

                            <!-- Notifications Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary position-relative" type="button"
                                    id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bell"></i>
                                    <?php
                                    $unreadCount = count(array_filter($currentNotifications, function ($n) {
                                        return !$n['read']; }));
                                    if ($unreadCount > 0): ?>
                                        <span class="notification-badge"><?= $unreadCount ?></span>
                                    <?php endif; ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown"
                                    style="width: 350px;">
                                    <li>
                                        <h6 class="dropdown-header">Notifications</h6>
                                    </li>
                                    <?php foreach ($currentNotifications as $notification): ?>
                                        <li><a class="dropdown-item d-flex <?= !$notification['read'] ? 'unread' : '' ?>"
                                                href="#">
                                                <div class="flex-grow-1">
                                                    <div class="fw-bold"><?= htmlspecialchars($notification['title']) ?>
                                                    </div>
                                                    <div class="small text-muted">
                                                        <?= htmlspecialchars($notification['message']) ?></div>
                                                    <div class="small text-muted">
                                                        <?= htmlspecialchars($notification['time']) ?></div>
                                                </div>
                                                <?php if (!$notification['read']): ?>
                                                    <span class="badge bg-primary ms-2">New</span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-center"
                                            href="../notifications/notifications.php" >View all notifications</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card bg-white p-4 mb-4">
                    <div class="tab-content">
                        <!-- Personal Information Tab -->
                        <div class="tab-pane fade show active" id="personal">
                            <h5 class="card-title mb-4"><i class="fa-solid fa-user me-2"></i>Personal Information</h5>

                            <form id="personalForm">
                                <input type="hidden" name="doctor_id" value="<?= $currentDoctorId ?>">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="<?= htmlspecialchars($doctor['name']) ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Specialty</label>
                                        <input type="text" class="form-control" name="specialty"
                                            value="<?= htmlspecialchars($doctor['specialty']) ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?= htmlspecialchars($doctor['email']) ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="<?= htmlspecialchars($doctor['phone']) ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location"
                                            value="<?= htmlspecialchars($doctor['location']) ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Profile Image URL</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="avatar"
                                                value="<?= htmlspecialchars($doctor['avatar']) ?>">
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="document.getElementById('avatarUpload').click()">
                                                <i class="fa-solid fa-upload"></i>
                                            </button>
                                            <input type="file" id="avatarUpload" class="d-none" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">About</label>
                                    <textarea class="form-control" name="about"
                                        rows="3"><?= htmlspecialchars($doctor['about']) ?></textarea>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-floppy-disk me-1"></i>Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Professional Details Tab -->
                        <div class="tab-pane fade" id="professional">
                            <h5 class="card-title mb-4"><i class="fa-solid fa-briefcase me-2"></i>Professional Details
                            </h5>

                            <form id="professionalForm">
                                <input type="hidden" name="doctor_id" value="<?= $currentDoctorId ?>">
                                <div class="mb-3">
                                    <label class="form-label">Experience (one per line)</label>
                                    <textarea class="form-control" name="experience"
                                        rows="4"><?= htmlspecialchars(implode("\n", $doctor['experience'])) ?></textarea>
                                    <div class="form-text">Add each experience item on a new line</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Research & Publications (one per line)</label>
                                    <textarea class="form-control" name="publications"
                                        rows="4"><?= htmlspecialchars(implode("\n", $doctor['publications'])) ?></textarea>
                                    <div class="form-text">Add each publication item on a new line</div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-floppy-disk me-1"></i>Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Appointments Tab -->
                        <div class="tab-pane fade" id="appointments">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title mb-0"><i class="fa-solid fa-calendar-check me-2"></i>Appointments
                                </h5>
                                <div>
                                    <form method="get" id="appointmentsFilterForm" class="d-flex gap-2">
                                        <input type="hidden" name="doctor_id" value="<?= $currentDoctorId ?>">
                                        <!-- فلتر الوقت -->
                                        <select class="form-select form-select-sm" name="date_filter" onchange="document.getElementById('appointmentsFilterForm').submit()">
                                            <option value="all" <?= ($_GET['date_filter'] ?? '') === 'all' ? 'selected' : '' ?>>All Dates</option>
                                            <option value="2days" <?= ($_GET['date_filter'] ?? '') === '2days' ? 'selected' : '' ?>>Last 2 Days</option>
                                            <option value="7days" <?= ($_GET['date_filter'] ?? '') === '7days' ? 'selected' : '' ?>>Last 7 Days</option>
                                            <option value="30days" <?= ($_GET['date_filter'] ?? '') === '30days' ? 'selected' : '' ?>>Last 30 Days</option>
                                        </select>

                                        <!-- فلتر الحالة -->
                                        <select class="form-select form-select-sm" name="status_filter" onchange="document.getElementById('appointmentsFilterForm').submit()">
                                            <option value="all" <?= ($_GET['status_filter'] ?? '') === 'all' ? 'selected' : '' ?>>All Statuses</option>
                                            <option value="pending" <?= ($_GET['status_filter'] ?? '') === 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="confirmed" <?= ($_GET['status_filter'] ?? '') === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                            <option value="completed" <?= ($_GET['status_filter'] ?? '') === 'completed' ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Patient</th>
                                            <th>Date & Time</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($appointmentsToShow) > 0): ?>
                                            <?php foreach ($appointmentsToShow as $appointment): ?>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold">
                                                            <?= htmlspecialchars($appointment['patient_name']) ?></div>
                                                        <div class="small text-muted">
                                                            <?= htmlspecialchars($appointment['patient_email']) ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-bold"><?= htmlspecialchars($appointment['date']) ?></div>
                                                        <div class="small text-muted">
                                                            <?= htmlspecialchars($appointment['time']) ?></div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="appointment-type <?= $appointment['type'] == 'in-person' ? 'appointment-in-person' : 'appointment-video' ?>">
                                                            <?= ucfirst($appointment['type']) ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $statusClass = '';
                                                        if ($appointment['status'] == 'confirmed')
                                                            $statusClass = 'bg-success';
                                                        if ($appointment['status'] == 'pending')
                                                            $statusClass = 'bg-warning';
                                                        if ($appointment['status'] == 'completed')
                                                            $statusClass = 'bg-secondary';
                                                        ?>
                                                        <span
                                                            class="badge rounded-pill <?= $statusClass ?>"><?= ucfirst($appointment['status']) ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-bs-toggle="modal" data-bs-target="#appointmentModal"
                                                                data-appointment-id="<?= $appointment['id'] ?>">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary">
                                                                <i class="fa-solid fa-pen"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No appointments found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php if ($appointmentsTotalPages > 1): ?>
                                <nav aria-label="Appointments pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?= $appointmentsCurrentPage == 1 ? 'disabled' : '' ?>">
                                            <a class="page-link" href="<?= getPaginationLink('appointments', $appointmentsCurrentPage - 1) ?>" tabindex="-1">Previous</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $appointmentsTotalPages; $i++): ?>
                                            <li class="page-item <?= $i == $appointmentsCurrentPage ? 'active' : '' ?>">
                                                <a class="page-link" href="<?= getPaginationLink('appointments', $i) ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?= $appointmentsCurrentPage == $appointmentsTotalPages ? 'disabled' : '' ?>">
                                            <a class="page-link" href="<?= getPaginationLink('appointments', $appointmentsCurrentPage + 1) ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            <?php endif; ?>
                        </div>

                        <!-- Patients Tab -->
                        <div class="tab-pane fade" id="patients">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title mb-0"><i class="fa-solid fa-user-injured me-2"></i>Patients</h5>
                                <div>
                                    <form method="get" id="patientsSearchForm" class="d-flex gap-2">
                                        <input type="hidden" name="doctor_id" value="<?= $currentDoctorId ?>">
                                        <div class="input-group" style="width: 300px;">
                                            <input type="text" class="form-control form-control-sm" name="patients_search" placeholder="Search patients..." value="<?= htmlspecialchars($patientsSearch) ?>">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit">
                                                <i class="fa-solid fa-search"></i>
                                            </button>
                                            <?php if (!empty($patientsSearch)): ?>
                                                <a href="?doctor_id=<?= $currentDoctorId ?>" class="btn btn-outline-danger btn-sm">
                                                    <i class="fa-solid fa-times"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <?php if (count($patientsToShow) > 0): ?>
                                    <?php foreach ($patientsToShow as $patient): ?>
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="flex-shrink-0">
                                                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($patient['name']) ?>&background=random"
                                                                class="rounded-circle" width="50" height="50"
                                                                alt="<?= htmlspecialchars($patient['name']) ?>">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="card-title mb-0">
                                                                <?= htmlspecialchars($patient['name']) ?></h6>
                                                            <small class="text-muted"><?= $patient['age'] ?> years,
                                                                <?= ucfirst($patient['gender']) ?></small>
                                                        </div>
                                                    </div>

                                                    <ul class="list-unstyled small">
                                                        <li class="mb-1">
                                                            <i class="fa-solid fa-envelope text-primary me-1"></i>
                                                            <?= htmlspecialchars($patient['email']) ?>
                                                        </li>
                                                        <li class="mb-1">
                                                            <i class="fa-solid fa-phone text-success me-1"></i>
                                                            <?= htmlspecialchars($patient['phone']) ?>
                                                        </li>
                                                        <li class="mb-1">
                                                            <i class="fa-solid fa-calendar text-info me-1"></i>
                                                            Last visit: <?= htmlspecialchars($patient['last_visit']) ?>
                                                        </li>
                                                        <li>
                                                            <i class="fa-solid fa-calendar-check text-warning me-1"></i>
                                                            Next appointment:
                                                            <?= htmlspecialchars($patient['next_appointment']) ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer bg-transparent">
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-sm btn-outline-primary">View
                                                            Profile</button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-secondary">Message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-12 text-center py-4">
                                        <p>No patients found</p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($patientsTotalPages > 1): ?>
                                <nav aria-label="Patients pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?= $patientsCurrentPage == 1 ? 'disabled' : '' ?>">
                                            <a class="page-link" href="<?= getPaginationLink('patients', $patientsCurrentPage - 1) ?>" tabindex="-1">Previous</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $patientsTotalPages; $i++): ?>
                                            <li class="page-item <?= $i == $patientsCurrentPage ? 'active' : '' ?>">
                                                <a class="page-link" href="<?= getPaginationLink('patients', $i) ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?= $patientsCurrentPage == $patientsTotalPages ? 'disabled' : '' ?>">
                                            <a class="page-link" href="<?= getPaginationLink('patients', $patientsCurrentPage + 1) ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            <?php endif; ?>
                        </div>

                        <!-- Schedule Settings Tab -->
                        <div class="tab-pane fade" id="schedule">
                            <h5 class="card-title mb-4"><i class="fa-solid fa-calendar me-2"></i>Schedule Settings</h5>

                            <form id="scheduleForm">
                                <input type="hidden" name="doctor_id" value="<?= $currentDoctorId ?>">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Working Days</label>
                                        <div class="border rounded p-3">
                                            <?php
                                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                            foreach ($days as $day):
                                                ?>
                                                <div class="form-check">
                                                    <input class="form-check-input day-checkbox" type="checkbox"
                                                        id="<?= strtolower($day) ?>" checked>
                                                    <label class="form-check-label" for="<?= strtolower($day) ?>">
                                                        <?= $day ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Working Hours</label>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Start Time</label>
                                                <input type="time" class="form-control" value="09:00" name="startTime">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">End Time</label>
                                                <input type="time" class="form-control" value="17:00" name="endTime">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Appointment Duration</label>
                                                <select class="form-select" name="appointmentDuration">
                                                    <option value="15">15 minutes</option>
                                                    <option value="30" selected>30 minutes</option>
                                                    <option value="45">45 minutes</option>
                                                    <option value="60">60 minutes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Break Time</label>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Start Time</label>
                                            <input type="time" class="form-control" value="13:00" name="breakStart">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">End Time</label>
                                            <input type="time" class="form-control" value="14:00" name="breakEnd">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-floppy-disk me-1"></i>Save Schedule
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Account Settings Tab -->
                        <div class="tab-pane fade" id="account">
                            <h5 class="card-title mb-4"><i class="fa-solid fa-gear me-2"></i>Account Settings</h5>

                            <form id="accountForm">
                                <input type="hidden" name="doctor_id" value="<?= $currentDoctorId ?>">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="new_password"
                                            placeholder="Enter new password">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirm_password"
                                            placeholder="Confirm new password">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" required
                                        placeholder="Enter current password">
                                </div>

                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Notification Preferences</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="emailNotifications"
                                                checked>
                                            <label class="form-check-label" for="emailNotifications">
                                                Email Notifications
                                            </label>
                                        </div>

                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="smsNotifications">
                                            <label class="form-check-label" for="smsNotifications">
                                                SMS Notifications
                                            </label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="appointmentReminders"
                                                checked>
                                            <label class="form-check-label" for="appointmentReminders">
                                                Appointment Reminders
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-floppy-disk me-1"></i>Update Settings
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="dashboard-card bg-white p-4 preview-card">
                    <h5 class="card-title mb-3">Profile Preview</h5>
                    <div class="d-flex align-items-center">
                        <img src="<?= htmlspecialchars($doctor['avatar']) ?>" alt="Doctor" class="avatar-lg me-4 shadow"
                            id="previewAvatar">
                        <div>
                            <h5 class="fw-bold mb-1" id="previewName"><?= htmlspecialchars($doctor['name']) ?></h5>
                            <div class="text-muted mb-1" id="previewSpecialty">
                                <?= htmlspecialchars($doctor['specialty']) ?></div>
                            <div class="text-muted small"><i class="fa-solid fa-envelope text-primary me-1"></i><span
                                    id="previewEmail"><?= htmlspecialchars($doctor['email']) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment Detail Modal -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="appointmentDetail">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // تهيئة Toast للإشعارات
        const toastLiveExample = document.getElementById('liveToast');
        const toastBootstrap = bootstrap.Toast ? new bootstrap.Toast(toastLiveExample) : null;

        // حفظ البيانات في localStorage
        document.addEventListener('DOMContentLoaded', function () {
            // تحميل البيانات المحفوظة إذا وجدت
            const doctorId = '<?= $currentDoctorId ?>';
            const storageKey = 'doctorData_' + doctorId;

            if (localStorage.getItem(storageKey)) {
                const savedData = JSON.parse(localStorage.getItem(storageKey));
                updateFormData(savedData);
                updatePreview(savedData);
                updateSidebar(savedData);
            }

            // معالجة تبديل الطبيب
            document.getElementById('doctorSwitch').addEventListener('change', function () {
                window.location.href = '?doctor_id=' + this.value;
            });

            // معالجة تقديم نماذج التعديل
            document.getElementById('personalForm').addEventListener('submit', function (e) {
                e.preventDefault();
                saveFormData('personalForm');
            });

            document.getElementById('professionalForm').addEventListener('submit', function (e) {
                e.preventDefault();
                saveFormData('professionalForm');
            });

            document.getElementById('accountForm').addEventListener('submit', function (e) {
                e.preventDefault();
                showToast('Account settings updated successfully!');
            });

            document.getElementById('scheduleForm').addEventListener('submit', function (e) {
                e.preventDefault();

                // حفظ أيام العمل المختارة
                const workingDays = [];
                document.querySelectorAll('.day-checkbox:checked').forEach(checkbox => {
                    workingDays.push(checkbox.id);
                });

                const scheduleData = {
                    workingDays: workingDays,
                    startTime: document.querySelector('input[name="startTime"]').value,
                    endTime: document.querySelector('input[name="endTime"]').value,
                    appointmentDuration: document.querySelector('select[name="appointmentDuration"]').value,
                    breakStart: document.querySelector('input[name="breakStart"]').value,
                    breakEnd: document.querySelector('input[name="breakEnd"]').value
                };

                // دمج البيانات الجديدة مع البيانات الحالية
                const doctorId = document.querySelector('input[name="doctor_id"]').value;
                const storageKey = 'doctorData_' + doctorId;
                const currentData = localStorage.getItem(storageKey)
                    ? JSON.parse(localStorage.getItem(storageKey))
                    : {};

                const updatedData = { ...currentData, ...scheduleData };
                localStorage.setItem(storageKey, JSON.stringify(updatedData));

                showToast('Schedule settings updated successfully!');
            });

            // تحديث المعاينة عند تغيير القيم
            document.querySelectorAll('#personalForm input, #personalForm textarea').forEach(input => {
                input.addEventListener('input', updatePreviewFromForm);
            });

            // معالجة رفع الصورة
            document.getElementById('avatarUpload').addEventListener('change', function (e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        // حفظ الصورة كرابط base64 (في تطبيق حقيقي، يجب رفع الصورة إلى الخادم)
                        document.querySelector('input[name="avatar"]').value = e.target.result;
                        document.getElementById('previewAvatar').src = e.target.result;
                        document.getElementById('sidebarAvatar').src = e.target.result;

                        // حفظ التغيير تلقائياً
                        const doctorId = document.querySelector('input[name="doctor_id"]').value;
                        const storageKey = 'doctorData_' + doctorId;
                        const currentData = localStorage.getItem(storageKey)
                            ? JSON.parse(localStorage.getItem(storageKey))
                            : {};

                        currentData.avatar = e.target.result;
                        localStorage.setItem(storageKey, JSON.stringify(currentData));

                        showToast('Profile image updated successfully!');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // معالجة عرض تفاصيل الموعد
            const appointmentModal = document.getElementById('appointmentModal');
            if (appointmentModal) {
                appointmentModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const appointmentId = button.getAttribute('data-appointment-id');
                    loadAppointmentDetails(appointmentId);
                });
            }
        });

        function loadAppointmentDetails(appointmentId) {
            // في تطبيق حقيقي، سيتم جلب البيانات من الخادم
            // هذه بيانات نموذجية لأغراض العرض
            const appointmentDetails = {
                1: {
                    patient: "Mohammad Ali",
                    email: "mohammad.ali@example.com",
                    phone: "+962 79 123 4567",
                    date: "2023-12-15",
                    time: "10:00 AM",
                    type: "in-person",
                    status: "confirmed",
                    notes: "Routine checkup"
                },
                2: {
                    patient: "Sara Ahmad",
                    email: "sara.ahmad@example.com",
                    phone: "+962 79 234 5678",
                    date: "2023-12-16",
                    time: "11:30 AM",
                    type: "video",
                    status: "pending",
                    notes: "Follow-up consultation"
                },
                3: {
                    patient: "Jaber Ahmad",
                    email: "jaber.ahmad@example.com",
                    phone: "+962 79 345 6789",
                    date: "2023-12-16",
                    time: "11:30 AM",
                    type: "video",
                    status: "pending",
                    notes: "Follow-up consultation"
                },
                4: {
                    patient: "Tamer Ali",
                    email: "tamer.ali@example.com",
                    phone: "+962 79 456 7890",
                    date: "2023-12-16",
                    time: "11:30 AM",
                    type: "video",
                    status: "pending",
                    notes: "Follow-up consultation"
                },
                5: {
                    patient: "Lina Mohammad",
                    email: "lina@example.com",
                    phone: "+962 79 567 8901",
                    date: "2023-12-17",
                    time: "09:00 AM",
                    type: "in-person",
                    status: "confirmed",
                    notes: "Annual checkup"
                },
                6: {
                    patient: "Rami Hassan",
                    email: "rami@example.com",
                    phone: "+962 79 678 9012",
                    date: "2023-12-17",
                    time: "10:30 AM",
                    type: "video",
                    status: "completed",
                    notes: "Consultation"
                },
                7: {
                    patient: "Layla Hassan",
                    email: "layla.hassan@example.com",
                    phone: "+962 79 345 6789",
                    date: "2023-12-15",
                    time: "09:00 AM",
                    type: "in-person",
                    status: "confirmed",
                    notes: "Annual checkup"
                },
                8: {
                    patient: "Omar Mahmoud",
                    email: "omar.mahmoud@example.com",
                    phone: "+962 79 456 7890",
                    date: "2023-12-17",
                    time: "03:30 PM",
                    type: "video",
                    status: "completed",
                    notes: "Vaccination consultation"
                },
                9: {
                    patient: "Ala'a Al-ahmed",
                    email: "ala'a@example.com",
                    phone: "+962 79 567 8901",
                    date: "2023-12-17",
                    time: "03:30 PM",
                    type: "video",
                    status: "completed",
                    notes: "Vaccination consultation"
                },
                10: {
                    patient: "Layla Hassan",
                    email: "layla.hassan@example.com",
                    phone: "+962 79 345 6789",
                    date: "2023-12-15",
                    time: "09:00 AM",
                    type: "in-person",
                    status: "confirmed",
                    notes: "Annual checkup"
                },
                11: {
                    patient: "Omar Mahmoud",
                    email: "omar.mahmoud@example.com",
                    phone: "+962 79 456 7890",
                    date: "2023-12-17",
                    time: "03:30 PM",
                    type: "video",
                    status: "completed",
                    notes: "Vaccination consultation"
                },
                12: {
                    patient: "Ala'a Al-ahmed",
                    email: "ala'a@example.com",
                    phone: "+962 79 567 8901",
                    date: "2023-12-17",
                    time: "03:30 PM",
                    type: "video",
                    status: "completed",
                    notes: "Vaccination consultation"
                }
            };

            const detail = appointmentDetails[appointmentId];
            if (detail) {
                const modalContent = `
      <div class="row mb-3">
        <div class="col-md-4 fw-bold">Patient:</div>
        <div class="col-md-8">${detail.patient}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 fw-bold">Email:</div>
        <div class="col-md-8">${detail.email}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 fw-bold">Phone:</div>
        <div class="col-md-8">${detail.phone}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 fw-bold>Date & Time:</div>
        <div class="col-md-8">${detail.date} at ${detail.time}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 fw-bold">Type:</div>
        <div class="col-md-8">${detail.type}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 fw-bold">Status:</div>
        <div class="col-md-8">${detail.status}</div>
      </div>
      <div class="row">
        <div class="col-md-4 fw-bold">Notes:</div>
        <div class="col-md-8">${detail.notes}</div>
      </div>
    `;

                document.getElementById('appointmentDetail').innerHTML = modalContent;
            }
        }

        function saveFormData(formId) {
            const form = document.getElementById(formId);
            const formData = new FormData(form);
            const data = {};

            for (let [key, value] of formData.entries()) {
                if (key === 'experience' || key === 'publications') {
                    data[key] = value.split('\n').filter(item => item.trim() !== '');
                } else if (key !== 'doctor_id') {
                    data[key] = value;
                }
            }

            // دمج البيانات الجديدة مع البيانات الحالية
            const doctorId = formData.get('doctor_id');
            const storageKey = 'doctorData_' + doctorId;
            const currentData = localStorage.getItem(storageKey)
                ? JSON.parse(localStorage.getItem(storageKey))
                : {};

            const updatedData = { ...currentData, ...data };
            localStorage.setItem(storageKey, JSON.stringify(updatedData));

            updatePreview(updatedData);
            updateSidebar(updatedData);
            showToast('Changes saved successfully!');
        }

        function updateFormData(data) {
            // تحديث نموذج المعلومات الشخصية
            if (data.name) document.querySelector('input[name="name"]').value = data.name;
            if (data.specialty) document.querySelector('input[name="specialty"]').value = data.specialty;
            if (data.email) document.querySelector('input[name="email"]').value = data.email;
            if (data.phone) document.querySelector('input[name="phone"]').value = data.phone;
            if (data.location) document.querySelector('input[name="location"]').value = data.location;
            if (data.avatar) document.querySelector('input[name="avatar"]').value = data.avatar;
            if (data.about) document.querySelector('textarea[name="about"]').value = data.about;

            // تحديث نموذج المعلومات المهنية
            if (data.experience) document.querySelector('textarea[name="experience"]').value = data.experience.join('\n');
            if (data.publications) document.querySelector('textarea[name="publications"]').value = data.publications.join('\n');

            // تحديث إعدادات الجدول
            if (data.workingDays) {
                document.querySelectorAll('.day-checkbox').forEach(checkbox => {
                    checkbox.checked = data.workingDays.includes(checkbox.id);
                });
            }

            if (data.startTime) document.querySelector('input[name="startTime"]').value = data.startTime;
            if (data.endTime) document.querySelector('input[name="endTime"]').value = data.endTime;
            if (data.appointmentDuration) document.querySelector('select[name="appointmentDuration"]').value = data.appointmentDuration;
            if (data.breakStart) document.querySelector('input[name="breakStart"]').value = data.breakStart;
            if (data.breakEnd) document.querySelector('input[name="breakEnd"]').value = data.breakEnd;
        }

        function updatePreviewFromForm() {
            const formData = new FormData(document.getElementById('personalForm'));
            const data = {};

            for (let [key, value] of formData.entries()) {
                if (key !== 'doctor_id') {
                    data[key] = value;
                }
            }

            updatePreview(data);
        }

        function updatePreview(data) {
            if (data.name) document.getElementById('previewName').textContent = data.name;
            if (data.specialty) document.getElementById('previewSpecialty').textContent = data.specialty;
            if (data.email) document.getElementById('previewEmail').textContent = data.email;
            if (data.avatar) document.getElementById('previewAvatar').src = data.avatar;
        }

        function updateSidebar(data) {
            if (data.name) document.getElementById('sidebarName').textContent = data.name;
            if (data.specialty) document.getElementById('sidebarSpecialty').textContent = data.specialty;
            if (data.avatar) document.getElementById('sidebarAvatar').src = data.avatar;
        }

        function showToast(message) {
            if (toastBootstrap) {
                document.querySelector('.toast-body').textContent = message;
                toastBootstrap.show();
            } else {
                alert(message);
            }
        }
    </script>
</body>
</html>
