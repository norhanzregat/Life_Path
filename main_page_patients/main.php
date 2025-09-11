<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path Clinic - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
 <!-- رابط الخط Inter من Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --primary-blue: #0266D1;
    --secondary-blue: #1a7eff;
    --light-blue: #e3f2fd;
    --accent-teal: #26c6da;
    --text-dark: #2d3748;
    --text-light: #718096;
}
.footer {
    background-color: rgba(0,0,0,0.85);
    color: #fff;
    padding: 40px 0;
}

.footer a {
    color: #42a5f5;
    text-decoration: none;
    transition: all 0.3s ease;
}
.footer a:hover {
    color: #1a7eff;
    text-decoration: underline;
}

.footer h5 {
    font-weight: 700;
    color: #fff;
}

.footer ul li {
    margin-bottom: 8px;
}

.footer ul li a {
    font-size: 0.95rem;
}

.footer form input {
    border-radius: 30px;
    padding: 5px 15px;
    flex: 1;
}

.footer form button {
    border-radius: 30px;
    padding: 5px 20px;
}

@media(max-width: 768px) {
    .footer .text-md-start, .footer .text-md-end {
        text-align: center !important;
    }
    .footer iframe {
        margin-top: 15px;
        height: 200px;
    }
    .footer form {
        flex-direction: column;
        gap: 10px;
    }
}
body {
    font-family: 'Inter', 'Poppins', 'Segoe UI', 'Helvetica Neue', sans-serif;
    margin: 0;
    padding: 0;

    background: linear-gradient(120deg, #B3CEFBFF, #3381E8FF, #024892FF);
    background-size: 300% 300%;
    animation: calmGradient 20s ease-in-out infinite;

    color: #333;
    min-height: 100vh;
    line-height: 1.6;
}

@keyframes calmGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Navbar Styles */
.navbar {
    background-color: rgba(255, 255, 255, 0.95);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
}

.navbar-brand {
    font-family: 'Inter', 'Poppins', 'Segoe UI', 'Helvetica Neue', sans-serif;
    font-weight: 800;
    font-size: 1.4rem;
    color: var(--primary-blue) !important;
    display: flex;
    align-items: center;
    transition: transform 0.3s ease-in-out;
}
.navbar-brand:hover { transform: scale(1.05); }

.logo-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-right: 10px;
    border-radius: 5px;
}

.navbar .nav-link {
    font-family: 'Inter', 'Poppins', 'Segoe UI', 'Helvetica Neue', sans-serif;
    font-weight: 700;
    color: #333;
    position: relative;
    padding: 8px 14px;
    border-radius: 8px;
    letter-spacing: 0.5px;
    font-size: 1rem;
    transition: all 0.3s ease-in-out;
}
.navbar .nav-link:hover {
    background-color: rgba(2, 102, 209, 0.15);
    color: var(--primary-blue);
    transform: translateY(-2px);
}
.navbar .nav-link::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0%;
    height: 2px;
    background: var(--primary-blue);
    transition: all 0.3s ease-in-out;
    transform: translateX(-50%);
}
.navbar .nav-link:hover::after { width: 100%; }

/* Buttons (Logout) */
.logout-btn {
    font-family: 'Inter', 'Poppins', 'Segoe UI', 'Helvetica Neue', sans-serif;
    font-weight: 700;
    border-radius: 12px;
    transition: all 0.3s ease-in-out;
    letter-spacing: 0.5px;
}
.logout-btn:hover {
    background-color: var(--primary-blue);
    color: #fff;
    transform: scale(1.05);
}

/* Profile */
.profile-link {
    font-family: 'Inter', 'Poppins', 'Segoe UI', 'Helvetica Neue', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    letter-spacing: 0.5px;
    border-radius: 12px;
    padding: 6px 12px;
    transition: all 0.3s ease-in-out;
}
.profile-link:hover {
    background: rgba(2, 102, 209, 0.1);
    transform: translateY(-2px);
}
.profile-link img {
    transition: transform 0.3s ease-in-out;
}
.profile-link:hover img { transform: rotate(10deg) scale(1.1); }

/* Hero Section */
.hero {
    background: rgba(255, 255, 255, 0.7);
    color: #0d47a1;
    padding: 80px 20px;
    border-radius: 20px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(8px);
    text-align: center;
    margin-top: 30px;
}
.hero h1 { font-weight: 700; font-size: 2.8rem; }
.hero p { font-size: 1.2rem; }

.btn-custom {
    background-color: var(--primary-blue);
    color: #fff;
    font-weight: 600;
    border-radius: 50px;
    padding: 10px 25px;
    transition: all 0.3s ease;
}
.btn-custom:hover {
    background-color: var(--secondary-blue);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(2, 102, 209, 0.3);
}

/* Stats Cards */
.stats-card {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    height: 100%;
    border: 1px solid rgba(2, 102, 209, 0.1);
    margin-bottom: 20px;
}
.stats-card:hover { transform: translateY(-5px); }
.stats-number {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 5px;
}
.stats-label { color: var(--text-light); font-size: 0.95rem; }

/* Appointment Widget */
#appointmentsWidget {
    position: fixed;
    top: 100px;
    right: 20px;
    width: 320px;
    max-height: 450px;
    overflow-y: auto;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.95);
    z-index: 1050;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
#appointmentsWidget h5 { margin-bottom: 10px; color: var(--primary-blue); }
#appointmentsList li {
    margin-bottom: 8px;
    border-radius: 8px;
    padding: 10px;
    background: rgba(227, 242, 253, 0.5);
}

/* Footer */
.footer {
    background-color: rgba(0, 0, 0, 0.85);
    color: #fff;
    padding: 40px 0;
    text-align: center;
    margin-top: 50px;
}
.footer a { color: #42a5f5; text-decoration: none; }
.footer a:hover { text-decoration: underline; }

/* Profile Modal */
.profile-img-container { position: relative; width: 150px; margin: 0 auto 20px; }
.profile-img {
    width: 150px; height: 150px; border-radius: 50%; object-fit: cover;
    border: 4px solid var(--primary-blue);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}
.profile-change-btn {
    position: absolute; bottom: 10px; right: 10px;
    background: white; width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    color: var(--primary-blue); cursor: pointer;
}

/* Navbar Pills */
.nav-pills-custom .nav-link {
    color: var(--text-dark);
    border-radius: 10px;
    margin-bottom: 10px;
    padding: 12px 20px;
    transition: all 0.3s ease;
    text-align: center;
}
.nav-pills-custom .nav-link.active {
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
    color: white;
}
.nav-pills-custom .nav-link:hover:not(.active) { background: rgba(2, 102, 209, 0.1); }

/* Section Titles */
.section-title {
    color: var(--primary-blue);
    border-bottom: 2px solid var(--light-blue);
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-weight: 700;
}

/* Responsive Design */
@media (max-width: 768px) {
    #appointmentsWidget { width: 90%; right: 5%; bottom: 20px; top: auto; }
    .hero { padding: 40px 15px; }
    .hero h1 { font-size: 2.2rem; }
    .booking-progress { padding: 0 10px; }
    .progress-step { width: 50px; }
    .progress-step::before { width: 30px; height: 30px; }
    .step-title { font-size: 0.7rem; }
}
#bookingModal,
#bookingModal .modal-content,
#bookingModal .modal-header,
#bookingModal .modal-body,
#bookingModal .form-label,
#bookingModal .form-control,
#bookingModal .form-select,
#bookingModal .step-title,
#bookingModal .btn,
#bookingModal h4,
#bookingModal h2,
#bookingModal h6 {
    font-family: 'Inter', 'Poppins', 'Segoe UI', sans-serif;
}

/* Modal general */
#bookingModal .modal-content {
    border-radius: 20px;
    background: rgba(255,255,255,0.95);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    padding: 30px;
    overflow: hidden;
    position: relative;
}

/* Modal header */
#bookingModal .modal-header {
    border-bottom: none;
    padding-bottom: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#bookingModal .modal-header h2 {
    font-weight: 700;
    font-size: 1.8rem;
    color: #0266D1;
}

#bookingModal .modal-header i {
    color: var(--primary-blue);
}

/* Close button */
#bookingModal .btn-close {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f5f5f5;
    border: none;
    transition: all 0.3s ease;
}
#bookingModal .btn-close:hover {
    background-color: #0266D1;
    transform: rotate(90deg);
}

/* Booking progress steps */
.booking-progress {
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
    position: relative;
}
.booking-progress::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    height: 4px;
    background-color: #e9ecef;
    z-index: 1;
}
.progress-step {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 70px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.progress-step::before {
    content: '';
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}
.progress-step.active::before {
    background: linear-gradient(135deg, #0266D1, #1a7eff);
    color: white;
    box-shadow: 0 0 0 4px rgba(2,102,209,0.2);
}
.progress-step.completed::before {
    background: linear-gradient(135deg, #0266D1, #1a7eff);
    color: white;
    content: '✓';
}
.progress-step .step-title {
    font-size: 0.8rem;
    color: #6c757d;
    transition: all 0.3s ease;
    text-align: center;
}
.progress-step.active .step-title {
    color: #0266D1;
    font-weight: 600;
}

/* Booking steps */
.booking-step {
    display: none;
    animation: fadeIn 0.5s ease forwards;
}
.booking-step.active { display: block; }

/* Fade animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Navigation buttons */
.navigation-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}
.navigation-buttons .btn {
    border-radius: 50px;
    font-weight: 600;
    padding: 10px 25px;
    transition: all 0.3s ease;
}
.navigation-buttons .btn.btn-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(2,102,209,0.3);
}
.navigation-buttons .btn.btn-secondary:hover {
    background-color: #1a7eff;
    color: #fff;
}

/* Payment options */
.payment-option {
    border: 2px solid #e9ecef;
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 20px;
    background: #f8f9fa;
}
.payment-option:hover {
    border-color: #0266D1;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(2,102,209,0.15);
}
.payment-option.selected {
    border-color: #0266D1;
    background: rgba(2,102,209,0.05);
}

/* Card details */
#cardDetails input {
    border-radius: 10px;
    padding: 10px;
}

/* Appointment confirmation card */
.appointment-card {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
}
.appointment-detail {
    display: flex;
    justify-content: space-between;
    padding-bottom: 8px;
    margin-bottom: 10px;
    border-bottom: 1px dashed #dee2e6;
}
.detail-label { font-weight: 600; color: #2d3748; }

/* Form labels & inputs */
#bookingModal .form-label {
    font-weight: 600;
    color: #2d3748;
}
#bookingModal .form-control,
#bookingModal .form-select,
#bookingModal textarea {
    border-radius: 10px;
    padding: 10px;
    border: 1px solid #ced4da;
    transition: all 0.3s ease;
}
#bookingModal .form-control:focus,
#bookingModal .form-select:focus,
#bookingModal textarea:focus {
    border-color: #0266D1;
    box-shadow: 0 0 0 0.2rem rgba(2,102,209,0.2);
}

/* Responsive */
@media(max-width: 768px) {
    #bookingModal .modal-content { padding: 20px; }
    .progress-step { width: 50px; }
    .progress-step::before { width: 30px; height: 30px; }
    .step-title { font-size: 0.7rem; }
}
/* Widget container */
#appointmentsWidget {
    position: fixed;
    top: 100px;
    right: 20px;
    width: 320px;
    max-height: 450px;
    overflow-y: auto;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    z-index: 1050;
    padding: 15px;
    transition: all 0.4s ease-in-out;
    font-family: 'Poppins', sans-serif;
}

/* Header */
#appointmentsWidget h5 {
    font-size: 1.1rem;
    color: #0266D1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

/* Toggle button */
.toggle-widget {
    background: transparent;
    border: none;
    cursor: pointer;
    color: #0266D1;
    transition: transform 0.3s ease;
}
.toggle-widget:hover {
    transform: rotate(90deg);
}

/* Appointment list */
#appointmentsList {
    list-style: none;
    padding: 0;
    margin: 0;
}
#appointmentsList li {
    margin-bottom: 10px;
    border-radius: 10px;
    padding: 10px;
    background: rgba(2, 102, 209, 0.05);
    transition: all 0.3s ease;
}
#appointmentsList li:hover {
    background: rgba(2, 102, 209, 0.15);
    transform: translateY(-2px);
}

/* Collapsed state */
#appointmentsWidget.collapsed {
    width: 50px;
    height: 50px;
    overflow: hidden;
    padding: 5px;
    border-radius: 50%;
}
#appointmentsWidget.collapsed h5,
#appointmentsWidget.collapsed #appointmentsList {
    display: none;
}

/* Responsive */
@media(max-width:768px) {
    #appointmentsWidget {
        width: 90%;
        right: 5%;
        top: auto;
        bottom: 20px;
        max-height: 350px;
    }
}

</style>
</head>

<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <!-- Logo + Clinic Name -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="../assets/images/life.png" alt="Life Path Logo" class="logo-img"
                style="height: 40px; margin-right: 8px;">
            Life Path
        </a>

        <!-- Toggler (mobile menu button) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Center Menu -->
            <ul class="navbar-nav mx-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="../doctors/specialists/specialists.php">Our Doctors</a></li>
                <li class="nav-item"><a class="nav-link" href="#bookingModal" data-bs-toggle="modal">Book Appointment</a></li>
            </ul>

            <!-- Right Side (Profile + Logout) -->
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Profile -->
                <li class="nav-item">
                    <a href="#" class="d-flex align-items-center nav-link profile-link" data-bs-toggle="modal"
                        data-bs-target="#profileModal">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=0266D1&color=fff"
                            class="user-avatar me-2 rounded-circle" style="height: 35px; width: 35px;"
                            id="navbarUserAvatar">
                        <span>Hello, John</span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a class="btn btn-outline-primary ms-3 logout-btn" href="../index.php">
                        <i class="fa-solid fa-right-from-bracket me-1"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <div class="container">
        <div class="hero mb-5">
            <h1>Welcome, John!</h1>
            <p class="lead">Your mental well-being is our priority. Explore our services and book your session today.
            </p>
            <button class="btn btn-custom mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <i class="fa-solid fa-calendar-plus me-2"></i>Book Appointment
            </button>
        </div>

        <!-- Stats Section -->
        <div class="row mb-5">
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="stats-number">3</div>
                    <div class="stats-label">Upcoming Appointments</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="stats-number">7</div>
                    <div class="stats-label">Completed Sessions</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="stats-number">2</div>
                    <div class="stats-label">This Month</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-card">
                    <div class="stats-number">4.8</div>
                    <div class="stats-label">Satisfaction Rate</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar-days fa-3x text-primary mb-3"></i>
                        <h5>Appointment History</h5>
                        <p class="text-muted">View your past and upcoming appointments</p>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#appointmentsModal">
                            View Appointments
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user-doctor fa-3x text-primary mb-3"></i>
                        <h5>Our Doctors</h5>
                        <p class="text-muted">Meet our team of specialists</p>
                        <a href="../doctors/specialists/specialists.php"" class=" btn btn-outline-primary">View
                            Doctors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-file-medical fa-3x text-primary mb-3"></i>
                        <h5>Medical Records</h5>
                        <p class="text-muted">Access your health information</p>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#profileModal">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- لوحة المواعيد الجانبية -->
<div id="appointmentsWidget">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0">
                <i class="fa-solid fa-calendar-days me-2"></i>Upcoming Appointments
                <button class="toggle-widget ms-2" onclick="toggleAppointmentsWidget()">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </h5>
        </div>
        
        <div class="widget-content">
            <ul class="list-group list-group-flush" id="appointmentsList">
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <strong>2025-09-15 10:00 AM</strong><br>
                            <small>Dr. Sarah Johnson | Online</small>
                        </div>
                        <span class="appointment-badge bg-success">Confirmed</span>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <strong>2025-09-22 2:30 PM</strong><br>
                            <small>Dr. Ahmed Ali | In-Clinic</small>
                        </div>
                        <span class="appointment-badge bg-warning text-dark">Pending</span>
                    </div>
                </li>
            </ul>
            
            <div class="text-center mt-3">
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
                    <i class="fa-solid fa-plus me-1"></i>New Appointment
                </button>
            </div>
        </div>
    </div>


    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="profile-img-container">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=0266D1&color=fff"
                            class="profile-img" id="modalProfileImg">
                        <div class="profile-change-btn" onclick="document.getElementById('profilePhotoInput').click()">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                        <input type="file" id="profilePhotoInput" class="d-none" accept="image/*">
                    </div>

                    <ul class="nav nav-pills nav-pills-custom mb-4 justify-content-center" id="profileTabs"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="pill" data-bs-target="#info"
                                type="button" role="tab">
                                <i class="fa-solid fa-user me-2"></i>Personal Info
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="appointments-tab" data-bs-toggle="pill"
                                data-bs-target="#appointments" type="button" role="tab">
                                <i class="fa-solid fa-calendar-days me-2"></i>Appointments
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="health-tab" data-bs-toggle="pill" data-bs-target="#health"
                                type="button" role="tab">
                                <i class="fa-solid fa-heart-pulse me-2"></i>Health Data
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Personal Info Tab -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <form id="profileForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" value="John Doe" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" value="johndoe@example.com"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" value="+1234567890">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" value="1990-01-01">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" id="address"
                                            rows="2">123 Main St, City, Country</textarea>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-custom">
                                        <i class="fa-solid fa-floppy-disk me-2"></i>Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Appointments Tab -->
                        <div class="tab-pane fade" id="appointments" role="tabpanel">
                            <h5 class="mb-3">Your Appointments</h5>
                            <div class="table-responsive">
                                <table class="table table-striped align-middle text-center">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Doctor</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2025-09-03</td>
                                            <td>10:00 AM</td>
                                            <td>Dr. Sarah Johnson</td>
                                            <td>In-Clinic</td>
                                            <td><span class="badge bg-success">Confirmed</span></td>
                                        </tr>
                                        <tr>
                                            <td>2025-09-10</td>
                                            <td>2:00 PM</td>
                                            <td>Dr. Ahmed Ali</td>
                                            <td>Online</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Health Data Tab -->
                        <div class="tab-pane fade" id="health" role="tabpanel">
                            <div class="mb-4">
                                <h6>Treatment Plan</h6>
                                <p class="text-muted">Cognitive Behavioral Therapy (CBT) - Weekly sessions</p>
                            </div>
                            <div class="mb-4">
                                <h6>Medications</h6>
                                <p class="text-muted">Sertraline 50mg - Once daily</p>
                            </div>
                            <div class="mb-4">
                                <h6>Last Visit</h6>
                                <p class="text-muted">August 28, 2025 - Dr. Sarah Johnson</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h2 class="modal-title" id="bookingModalLabel">
                        <i class="fa-solid fa-calendar-check me-2"></i>Book Your Appointment
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- مؤشر التقدم -->
                    <div class="booking-progress mb-5">
                        <div class="progress-step active" id="step1Indicator">
                            <span class="step-title">Information</span>
                        </div>
                        <div class="progress-step" id="step2Indicator">
                            <span class="step-title">Appointment</span>
                        </div>
                        <div class="progress-step" id="step3Indicator">
                            <span class="step-title">Payment</span>
                        </div>
                        <div class="progress-step" id="step4Indicator">
                            <span class="step-title">Confirmation</span>
                        </div>
                    </div>

                    <!-- الخطوة 1: المعلومات الشخصية -->
                    <div class="booking-step active" id="step1">
                        <h4 class="mb-4">Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="bookingFullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="bookingFullName" name="bookingFullName"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bookingEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="bookingEmail" name="bookingEmail" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bookingPhone" class="form-label">Telephone Number</label>
                                <input type="tel" class="form-control" id="bookingPhone" name="bookingPhone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bookingAge" class="form-label">Age</label>
                                <input type="number" class="form-control" id="bookingAge" name="bookingAge" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="bookingNotes" class="form-label">Notes (optional)</label>
                                <textarea class="form-control" id="bookingNotes" name="bookingNotes"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="navigation-buttons">
                            <div></div> <!-- Empty alignment element -->
                            <button type="button" class="btn btn-custom" onclick="nextStep(1)">Next</button>
                        </div>
                    </div>

                    <!-- الخطوة 2: تفاصيل الموعد -->
                    <div class="booking-step" id="step2">
                        <h4 class="mb-4">Appointment Details</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Session Type</label>
                                <select class="form-select" id="appointmentType" name="appointmentType" required>
                                    <option value="">Select type...</option>
                                    <option value="In-Clinic">In-Clinic</option>
                                    <option value="Online (Video Session)">Online (Video Session)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Doctor</label>
                                <select class="form-select" id="doctor" name="doctor" required>
                                    <option value="">Select doctor...</option>
                                    <option value="Dr. Sarah Johnson">Dr. Sarah Johnson</option>
                                    <option value="Dr. Ahmed Ali">Dr. Ahmed Ali</option>
                                    <option value="Dr. Lina Haddad">Dr. Lina Haddad</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Date</label>
                                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Time</label>
                                <select class="form-select" id="appointmentTime" name="appointmentTime" required>
                                    <option value="">Select time...</option>
                                    <option value="09:00">09:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="14:00">02:00 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                    <option value="16:00">04:00 PM</option>
                                    <option value="17:00">05:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="navigation-buttons">
                            <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
                            <button type="button" class="btn btn-custom" onclick="nextStep(2)">Next</button>
                        </div>
                    </div>

                    <!-- Step 3: Payment Method -->
                    <div class="booking-step" id="step3">
                        <h4 class="mb-4">Payment Method</h4>

                        <!-- Payment Options Cards -->
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="card payment-option text-center p-3" onclick="selectPayment('card')">
                                    <i class="fa-solid fa-credit-card fa-2x mb-2"></i>
                                    <h6>Credit/Debit Card</h6>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card payment-option text-center p-3" onclick="selectPayment('paypal')">
                                    <i class="fa-brands fa-paypal fa-2x mb-2"></i>
                                    <h6>PayPal</h6>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card payment-option text-center p-3" onclick="selectPayment('cash')">
                                    <i class="fa-solid fa-money-bill-wave fa-2x mb-2"></i>
                                    <h6>Cash (at clinic)</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Card Details Form (Hidden by default) -->
                        <div id="cardDetails" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text" class="form-control" id="cardNumber"
                                        placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="123">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cardHolder" class="form-label">Card Holder Name</label>
                                    <input type="text" class="form-control" id="cardHolder" placeholder="John Doe">
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="navigation-buttons">
                            <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
                            <button type="button" class="btn btn-custom" onclick="nextStep(3)">Next</button>
                        </div>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div class="booking-step" id="step4">
                        <h4 class="mb-4">Booking Confirmation</h4>
                        <div class="appointment-card" id="confirmationCard">
                            <h4>Appointment Details</h4>
                            <div class="appointment-detail">
                                <span class="detail-label">Name:</span>
                                <span id="confirmName"></span>
                            </div>
                            <div class="appointment-detail">
                                <span class="detail-label">Email:</span>
                                <span id="confirmEmail"></span>
                            </div>
                            <div class="appointment-detail">
                                <span class="detail-label">Phone:</span>
                                <span id="confirmPhone"></span>
                            </div>
                            <div class="appointment-detail">
                                <span class="detail-label">Doctor:</span>
                                <span id="confirmDoctor"></span>
                            </div>
                            <div class="appointment-detail">
                                <span class="detail-label">Session Type:</span>
                                <span id="confirmType"></span>
                            </div>
                            <div class="appointment-detail">
                                <span class="detail-label">Date & Time:</span>
                                <span id="confirmDateTime"></span>
                            </div>
                            <div class="appointment-detail">
                                <span class="detail-label">Payment Method:</span>
                                <span id="confirmPayment"></span>
                            </div>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                            <label class="form-check-label" for="termsAgreement">
                                I agree to the terms and conditions
                            </label>
                        </div>
                        <div class="navigation-buttons mt-4">
                            <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Previous</button>
                            <button type="button" class="btn btn-success" id="confirmBooking">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
<footer class="footer mt-5">
    <div class="container">
        <div class="row align-items-start">
            <!-- Left Side: Contact Info -->
            <div class="col-md-4 text-md-start mb-4 mb-md-0">
                <h5 class="mb-3">Life Path Clinic</h5>
                <p>&copy; 2025 Life Path Clinic. All rights reserved.</p>
                <p><strong>Address:</strong> 123 Main Street, Cityville, Country</p>
                <p><strong>Phone:</strong> +1 234 567 890</p>
                <p><strong>Email:</strong> <a href="mailto:info@lifepathclinic.com">info@lifepathclinic.com</a></p>
                <p><strong>Working Hours:</strong> Mon-Fri: 8:00 AM - 6:00 PM | Sat: 9:00 AM - 3:00 PM</p>
                <p>
                    <a href="#"><i class="fa-brands fa-facebook me-2"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter me-2"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram me-2"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin me-2"></i></a>
                </p>
            </div>

            <!-- Middle Side: Quick Links -->
            <div class="col-md-2 text-md-start mb-4 mb-md-0">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Doctors</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Book Appointment</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Right Side: Map -->
            <div class="col-md-6 text-md-end">
                <h5 class="mb-3">Find Us Here</h5>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.548692888106!2d100.492615!3d13.736717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ed13a9c90f3%3A0x6a70a4d1d0e3b9de!2sBangkok!5e0!3m2!1sen!2sth!4v1694475910594!5m2!1sen!2sth"
                    width="100%" height="250" style="border:0; border-radius:10px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Bottom Row: Newsletter -->
        <div class="row mt-4">
            <div class="col-md-6 text-md-start mb-3 mb-md-0">
                <h5 class="mb-2">Subscribe to our Newsletter</h5>
                <form class="d-flex">
                    <input type="email" class="form-control me-2" placeholder="Your email" required>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">Designed by <a href="#">Life Path Team</a></p>
            </div>
        </div>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // تحميل الصورة الشخصية وتحديثها في كل مكان
        document.getElementById('profilePhotoInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // تحديث الصورة في المودال
                    document.getElementById('modalProfileImg').src = e.target.result;

                    // تحديث الصورة في شريط التنقل
                    document.getElementById('navbarUserAvatar').src = e.target.result;

                    // حفظ في localStorage
                    localStorage.setItem('profilePhoto', e.target.result);

                    // عرض إشعار
                    showNotification('Profile photo updated successfully!');
                };
                reader.readAsDataURL(file);
            }
        });

        // تحميل الصورة المحفوظة عند فتح الصفحة
        window.addEventListener('DOMContentLoaded', function () {
            const savedPhoto = localStorage.getItem('profilePhoto');
            if (savedPhoto) {
                document.getElementById('modalProfileImg').src = savedPhoto;
                document.getElementById('navbarUserAvatar').src = savedPhoto;
            }
        });

        // حفظ التغييرات في الملف الشخصي
        document.getElementById('profileForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // محاكاة حفظ البيانات
            setTimeout(function () {
                showNotification('Profile information saved successfully!');

                // تحديث الاسم في الصفحة الرئيسية إذا تم تغييره
                const fullName = document.getElementById('fullName').value;
                document.querySelector('.hero h1').textContent = `Welcome, ${fullName.split(' ')[0]}!`;
                document.querySelector('.navbar span').textContent = `Hello, ${fullName.split(' ')[0]}`;
            }, 500);
        });

        // دالة عرض الإشعارات
        function showNotification(message, type = 'success') {
            // إنشاء عنصر toast ديناميكيًا
            const toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';

            const toastEl = document.createElement('div');
            toastEl.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0`;
            toastEl.setAttribute('role', 'alert');
            toastEl.setAttribute('aria-live', 'assertive');
            toastEl.setAttribute('aria-atomic', 'true');

            toastEl.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;

            toastContainer.appendChild(toastEl);
            document.body.appendChild(toastContainer);

            const toast = new bootstrap.Toast(toastEl);
            toast.show();

            // إزالة العنصر بعد الاختفاء
            toastEl.addEventListener('hidden.bs.toast', function () {
                toastContainer.remove();
            });
        }

        // إضافة بعض المواعيد الافتراضية لواجهة المستخدم
        document.addEventListener('DOMContentLoaded', function () {
            const appointments = [
                { date: '2025-09-15', time: '10:00 AM', doctor: 'Dr. Sarah Johnson', type: 'Online' },
                { date: '2025-09-22', time: '2:30 PM', doctor: 'Dr. Ahmed Ali', type: 'In-Clinic' }
            ];

            const appointmentsList = document.getElementById('appointmentsList');

            if (appointments.length > 0) {
                appointmentsList.innerHTML = '';

                appointments.forEach(appointment => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item';
                    li.innerHTML = `
                        <strong>${appointment.date} ${appointment.time}</strong><br>
                        <small>${appointment.doctor} | ${appointment.type}</small>
                    `;
                    appointmentsList.appendChild(li);
                });
            }
        });

        // وظائف الحجز
        let currentStep = 1;
        let selectedPayment = '';

        function nextStep(step) {
            // التحقق من صحة البيانات قبل الانتقال
            if (step === 1) {
                const name = document.getElementById('bookingFullName').value;
                const email = document.getElementById('bookingEmail').value;
                const phone = document.getElementById('bookingPhone').value;
                const age = document.getElementById('bookingAge').value;

                if (!name || !email || !phone || !age) {
                    showNotification('Please fill all required fields', 'error');
                    return;
                }
            } else if (step === 2) {
                const type = document.getElementById('appointmentType').value;
                const doctor = document.getElementById('doctor').value;
                const date = document.getElementById('appointmentDate').value;
                const time = document.getElementById('appointmentTime').value;

                if (!type || !doctor || !date || !time) {
                    showNotification('Please fill all appointment details', 'error');
                    return;
                }
            } else if (step === 3) {
                if (!selectedPayment) {
                    showNotification('Please select a payment method', 'error');
                    return;
                }

                // إذا كان الدفع ببطاقة، تحقق من التفاصيل
                if (selectedPayment === 'card') {
                    const cardNumber = document.getElementById('cardNumber').value;
                    const expiryDate = document.getElementById('expiryDate').value;
                    const cvv = document.getElementById('cvv').value;
                    const cardHolder = document.getElementById('cardHolder').value;

                    if (!cardNumber || !expiryDate || !cvv || !cardHolder) {
                        showNotification('Please fill all card details', 'error');
                        return;
                    }
                }

                // ملء تفاصيل التأكيد
                document.getElementById('confirmName').textContent = document.getElementById('bookingFullName').value;
                document.getElementById('confirmEmail').textContent = document.getElementById('bookingEmail').value;
                document.getElementById('confirmPhone').textContent = document.getElementById('bookingPhone').value;
                document.getElementById('confirmDoctor').textContent = document.getElementById('doctor').value;
                document.getElementById('confirmType').textContent = document.getElementById('appointmentType').value;
                document.getElementById('confirmDateTime').textContent = document.getElementById('appointmentDate').value + ' ' + document.getElementById('appointmentTime').value;
                document.getElementById('confirmPayment').textContent = selectedPayment === 'card' ? 'Credit/Debit Card' :
                    selectedPayment === 'paypal' ? 'PayPal' : 'Cash (at clinic)';
            }

            // الانتقال للخطوة التالية
            document.getElementById(`step${currentStep}`).classList.remove('active');
            document.getElementById(`step${currentStep}Indicator`).classList.remove('active');

            currentStep++;

            document.getElementById(`step${currentStep}`).classList.add('active');
            document.getElementById(`step${currentStep}Indicator`).classList.add('active');

            // تحديث مؤشر التقدم
            for (let i = 1; i < currentStep; i++) {
                document.getElementById(`step${i}Indicator`).classList.add('completed');
            }
        }

        function prevStep(step) {
            document.getElementById(`step${currentStep}`).classList.remove('active');
            document.getElementById(`step${currentStep}Indicator`).classList.remove('active');

            currentStep--;

            document.getElementById(`step${currentStep}`).classList.add('active');
            document.getElementById(`step${currentStep}Indicator`).classList.add('active');
        }

        function selectPayment(method) {
            selectedPayment = method;

            // إزالة التحديد من جميع الخيارات
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });

            // إضافة التحديد للخيار المحدد
            event.currentTarget.classList.add('selected');

            // إظهار/إخفاء تفاصيل البطاقة
            if (method === 'card') {
                document.getElementById('cardDetails').style.display = 'block';
            } else {
                document.getElementById('cardDetails').style.display = 'none';
            }
        }

        // تأكيد الحجز
        document.getElementById('confirmBooking').addEventListener('click', function () {
            if (!document.getElementById('termsAgreement').checked) {
                showNotification('Please agree to the terms and conditions', 'error');
                return;
            }

            // محاكاة عملية الحجز
            showNotification('Appointment booked successfully!');

            // إغلاق المودال بعد تأكيد الحجز
            setTimeout(() => {
                const modal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
                modal.hide();

                // إعادة تعيين النموذج
                document.getElementById('bookingFullName').value = '';
                document.getElementById('bookingEmail').value = '';
                document.getElementById('bookingPhone').value = '';
                document.getElementById('bookingAge').value = '';
                document.getElementById('bookingNotes').value = '';
                document.getElementById('appointmentType').value = '';
                document.getElementById('doctor').value = '';
                document.getElementById('appointmentDate').value = '';
                document.getElementById('appointmentTime').value = '';
                document.getElementById('termsAgreement').checked = false;

                // إعادة تعيين مؤشر التقدم
                currentStep = 1;
                document.querySelectorAll('.booking-step').forEach(step => {
                    step.classList.remove('active');
                });
                document.getElementById('step1').classList.add('active');

                document.querySelectorAll('.progress-step').forEach(step => {
                    step.classList.remove('active', 'completed');
                });
                document.getElementById('step1Indicator').classList.add('active');
            }, 1500);
        });
        // Toggle widget open/close
function toggleAppointmentsWidget() {
    const widget = document.getElementById('appointmentsWidget');
    widget.classList.toggle('collapsed');

    // Change the chevron icon dynamically
    const icon = widget.querySelector('.toggle-widget i');
    if (widget.classList.contains('collapsed')) {
        icon.classList.remove('fa-chevron-right');
        icon.classList.add('fa-chevron-left');
    } else {
        icon.classList.remove('fa-chevron-left');
        icon.classList.add('fa-chevron-right');
    }
}

// Optional: auto-collapse after a few seconds of inactivity
let collapseTimeout;
document.getElementById('appointmentsWidget').addEventListener('mouseenter', () => {
    clearTimeout(collapseTimeout);
});
document.getElementById('appointmentsWidget').addEventListener('mouseleave', () => {
    collapseTimeout = setTimeout(() => {
        const widget = document.getElementById('appointmentsWidget');
        if(!widget.classList.contains('collapsed')) {
            toggleAppointmentsWidget();
        }
    }, 7000); // auto-collapse after 7 seconds
});

    </script>
</body>

</html>