<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafas Clinic - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>

        .payment-option {
    border-radius: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
    background-color: #f7f9fc;
}
.payment-option:hover {
    border: 2px solid #0288d1;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}
.payment-option i {
    color: #0288d1;
}
.payment-option h6 {
    margin: 0;
    font-weight: 600;
}
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #e0f7fa, #b3e5fc, #81d4fa, #4fc3f7);
            background-size: 300% 300%;
            animation: calmGradient 25s ease infinite;
            color: #333;
        }

        @keyframes calmGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
        }

        .navbar-brand {
            color: #0d6efd !important;
        }

        .hero {
            background: rgba(255, 255, 255, 0.7);
            color: #0d47a1;
            padding: 80px 20px;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(8px);
            text-align: center;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 2.8rem;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .btn-custom {
            background-color: #42a5f5;
            color: #fff;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #1e88e5;
            color: #fff;
        }

        .card-section {
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-section:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.2);
        }

        .icon-lg {
            font-size: 2.8rem;
        }

        h3,
        h2 {
            color: #0d47a1;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #0d47a1;
        }

        .modal-content {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.85);
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .footer a {
            color: #42a5f5;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* لوحة المواعيد الجانبية */
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

        #appointmentsWidget h5 {
            margin-bottom: 10px;
        }

        #appointmentsList li {
            margin-bottom: 8px;
        }

        /* تقدم الحجز */
        .booking-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            position: relative;
        }

        .booking-progress::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 4px;
            background-color: #e9ecef;
            z-index: 1;
        }

        .progress-step {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: relative;
            z-index: 2;
        }

        .progress-step.active {
            background-color: #42a5f5;
            color: white;
        }

        .progress-step.completed {
            background-color: #28a745;
            color: white;
        }

        .step-title {
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.8rem;
            color: #0d47a1;
        }

        /* خطوات الحجز */
        .booking-step {
            display: none;
        }

        .booking-step.active {
            display: block;
        }

        /* بطاقة الموعد */
        .appointment-card {
            border-radius: 15px;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .appointment-card h4 {
            color: #1565c0;
            border-bottom: 2px solid #64b5f6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .appointment-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 8px;
        }

        .detail-label {
            font-weight: bold;
            color: #0d47a1;
        }

        /* أزرار التنقل */
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* إشعارات */
        .notification-toast {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1060;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Nafas Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bookingModal" data-bs-toggle="modal">Book
                            Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile-patients/profile.php">Profile</a></li>
                    <li class="nav-item"><a class="btn btn-primary ms-2" href="#">Logout</a></li>
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

        <!-- Services Section -->
        <section id="services">
            <h3>Our Services</h3>
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card p-4 text-center card-section">
                        <i class="fa-solid fa-user-doctor text-primary icon-lg mb-3"></i>
                        <h5>Counseling</h5>
                        <p>Individual & group therapy sessions tailored to your needs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 text-center card-section">
                        <i class="fa-solid fa-video text-success icon-lg mb-3"></i>
                        <h5>Telemedicine</h5>
                        <p>Virtual video sessions from the comfort of your home.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 text-center card-section">
                        <i class="fa-solid fa-book-medical text-warning icon-lg mb-3"></i>
                        <h5>Workshops</h5>
                        <p>Educational workshops and mental health awareness sessions.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="mb-5">
            <h3 class="text-center mb-4">Meet Our Team</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-section p-4 text-center shadow-sm" style="height: 100%;">
                        <img src="https://www.ihospitalapp.com/IHospital-Api2/api/File/get2/30b2d4c9-ba38-4679-9a19-df2e146d9879.jpeg"
                            class="rounded-circle mb-3" alt="Dr. Sarah Johnson"
                            style="width:150px; height:150px; object-fit:cover; margin:auto;">
                        <h5>Dr. Sarah Johnson</h5>
                        <p>Psychologist</p>
                        <p><i class="fa-solid fa-envelope me-1"></i> sarah.johnson@example.com</p>
                        <p><i class="fa-solid fa-phone me-1"></i> +1 234 567 890</p>
                        <a href="../doctors/profile_doctor/profile_view.php" class="btn btn-custom mt-2">
                            Read More
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-section p-4 text-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm0nr9Q6P2RkYkG4bGr8DZDDDyDR_B5miAfg&s"
                            class="rounded-circle mb-3"
                            style="width:150px; height:150px; object-fit:cover; margin:auto;" alt="Dr. Ahmed Ali">
                        <h5>Dr. Ahmed Ali</h5>
                        <p>Psychiatrist</p>
                        <p><i class="fa-solid fa-envelope"></i> ahmed@example.com</p>
                        <p><i class="fa-solid fa-phone"></i> +1 234 567 8902</p>
                        <a href="../doctors/profile_doctor/profile_view.php" class="btn btn-custom mt-2">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-section p-4 text-center">
                        <img src="https://jfranews.com.jo/assets/2020-12-23/images/296960_56_1608738850.jpg"
                            class="rounded-circle mb-3"
                            style="width:150px; height:150px; object-fit:cover; margin:auto;" alt="Dr. Lina Haddad">
                        <h5>Dr. Lina Haddad</h5>
                        <p>Therapist</p>
                        <p><i class="fa-solid fa-envelope"></i> lina@example.com</p>
                        <p><i class="fa-solid fa-phone"></i> +1 234 567 8903</p>
                        <a href="../doctors/profile_doctor/profile_view.php" class="btn btn-custom mt-2">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- لوحة المواعيد الجانبية -->
    <div id="appointmentsWidget" class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0">Upcoming Appointments</h5>
            <i class="fa-solid fa-bell text-warning" id="notificationBell" style="cursor:pointer;"></i>
        </div>
        <ul class="list-group list-group-flush" id="appointmentsList">
            <li class="list-group-item text-center text-muted">No appointments yet</li>
        </ul>
    </div>

    <!-- Modal Booking Form -->
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
                            1
                            <span class="step-title">Information</span>
                        </div>
                        <div class="progress-step" id="step2Indicator">
                            2
                            <span class="step-title">Appointment</span>
                        </div>
                        <div class="progress-step" id="step3Indicator">
                            3
                            <span class="step-title">Payment</span>
                        </div>
                        <div class="progress-step" id="step4Indicator">
                            4
                            <span class="step-title">Confirmation</span>
                        </div>
                    </div>

                    <!-- الخطوة 1: المعلومات الشخصية -->
                    <div class="booking-step active" id="step1">
                        <h4 class="mb-4">Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Telephone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="notes" class="form-label">Notes (optional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
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
                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
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
    <div class="d-flex justify-content-between mt-4">
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
                            <button type="submit" class="btn btn-success" id="confirmBooking">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast للإشعارات -->
    <div class="toast notification-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
        data-bs-delay="5000">
        <div class="toast-header">
            <i class="fa-solid fa-bell text-warning me-2"></i>
            <strong class="me-auto">Nafas Clinic</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage"></div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Psych Clinic. All rights reserved.</p>
        <p>Contact us: <a href="mailto:info@psychclinic.com">info@psychclinic.com</a> | +1 234 567 890</p>
        <p>
            <a href="#"><i class="fa-brands fa-facebook me-2"></i></a>
            <a href="#"><i class="fa-brands fa-twitter me-2"></i></a>
            <a href="#"><i class="fa-brands fa-instagram me-2"></i></a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // عناصر DOM
        const appointmentsList = document.getElementById('appointmentsList');
        const toastEl = document.querySelector('.toast');
        const toastMessage = document.getElementById('toastMessage');
        const toast = new bootstrap.Toast(toastEl);
        const paymentMethod = document.getElementById('paymentMethod');
        const cardDetails = document.getElementById('cardDetails');

        // إظهار/إخفاء تفاصيل البطاقة عند اختيار طريقة الدفع
        paymentMethod.addEventListener('change', function () {
            if (this.value === 'card') {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
        });

        // إدارة خطوات الحجز
        let currentStep = 1;

        function showStep(stepNumber) {
            // إخفاء جميع الخطوات
            document.querySelectorAll('.booking-step').forEach(step => {
                step.classList.remove('active');
            });

            // إظهار الخطوة الحالية
            document.getElementById(`step${stepNumber}`).classList.add('active');

            // تحديث مؤشر التقدم
            document.querySelectorAll('.progress-step').forEach((indicator, index) => {
                indicator.classList.remove('active', 'completed');
                if (index + 1 < stepNumber) {
                    indicator.classList.add('completed');
                } else if (index + 1 === stepNumber) {
                    indicator.classList.add('active');
                }
            });

            currentStep = stepNumber;
        }

        function nextStep(current) {
            // التحقق من صحة البيانات في الخطوة الحالية
            let isValid = true;

            if (current === 1) {
                // التحقق من صحة البيانات الشخصية
                const fullName = document.getElementById('fullName').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const age = document.getElementById('age').value;

                if (!fullName || !email || !phone || !age) {
                    showNotification('Please fill all required fields', 'error');
                    isValid = false;
                }
            } else if (current === 2) {
                // التحقق من صحة بيانات الموعد
                const appointmentType = document.getElementById('appointmentType').value;
                const doctor = document.getElementById('doctor').value;
                const appointmentDate = document.getElementById('appointmentDate').value;
                const appointmentTime = document.getElementById('appointmentTime').value;

                if (!appointmentType || !doctor || !appointmentDate || !appointmentTime) {
                    showNotification('Please fill all appointment details', 'error');
                    isValid = false;
                }
            } else if (current === 3) {
                // التحقق من صحة بيانات الدفع
                const paymentMethodVal = document.getElementById('paymentMethod').value;

                if (!paymentMethodVal) {
                    showNotification('Please select a payment method', 'error');
                    isValid = false;
                }

                // إذا كانت طريقة الدفع بطاقة، التحقق من تفاصيل البطاقة
                if (paymentMethodVal === 'card') {
                    const cardNumber = document.getElementById('cardNumber').value;
                    const expiryDate = document.getElementById('expiryDate').value;
                    const cvv = document.getElementById('cvv').value;
                    const cardHolder = document.getElementById('cardHolder').value;

                    if (!cardNumber || !expiryDate || !cvv || !cardHolder) {
                        showNotification('Please fill all card details', 'error');
                        isValid = false;
                    }
                }

                // إذا كانت كل شيء صحيح، قم بملء بطاقة التأكيد
                if (isValid) {
                    fillConfirmationCard();
                }
            }

            if (isValid) {
                showStep(current + 1);
            }
        }

        function prevStep(current) {
            showStep(current - 1);
        }

        // ملء بطاقة التأكيد
        function fillConfirmationCard() {
            document.getElementById('confirmName').textContent = document.getElementById('fullName').value;
            document.getElementById('confirmEmail').textContent = document.getElementById('email').value;
            document.getElementById('confirmPhone').textContent = document.getElementById('phone').value;
            document.getElementById('confirmDoctor').textContent = document.getElementById('doctor').value;
            document.getElementById('confirmType').textContent = document.getElementById('appointmentType').value;

            const date = document.getElementById('appointmentDate').value;
            const time = document.getElementById('appointmentTime').value;
            document.getElementById('confirmDateTime').textContent = `${date} ${time}`;

            document.getElementById('confirmPayment').textContent = document.getElementById('paymentMethod').options[document.getElementById('paymentMethod').selectedIndex].text;
        }

        // إضافة موعد إلى القائمة الجانبية
        function addAppointmentToWidget(appointment) {
            if (appointmentsList.children.length === 1 && appointmentsList.children[0].textContent.includes('No appointments')) {
                appointmentsList.innerHTML = '';
            }

            const li = document.createElement('li');
            li.className = 'list-group-item';
            li.innerHTML = `
                <strong>${appointment.date} ${appointment.time}</strong><br>
                ${appointment.doctor} | ${appointment.type}
                <button class="btn btn-sm btn-outline-danger float-end" onclick="cancelAppointment(this)">
                    <i class="fa-solid fa-trash"></i>
                </button>
            `;
            appointmentsList.appendChild(li);

            // إشعار قبل يوم من الموعد
            const today = new Date();
            const appDateTime = new Date(appointment.date + 'T' + appointment.time);
            const diff = (appDateTime - today) / (1000 * 60 * 60 * 24);
            if (diff >= 0 && diff < 1) {
                showNotification(`Reminder: You have an appointment with ${appointment.doctor} tomorrow at ${appointment.time}`);
            }
        }

        // إلغاء موعد
        function cancelAppointment(button) {
            const listItem = button.parentElement;
            listItem.remove();

            if (appointmentsList.children.length === 0) {
                const emptyMessage = document.createElement('li');
                emptyMessage.className = 'list-group-item text-center text-muted';
                emptyMessage.textContent = 'No appointments yet';
                appointmentsList.appendChild(emptyMessage);
            }

            showNotification('Appointment cancelled successfully');
        }

        // عرض الإشعارات
        function showNotification(message, type = 'success') {
            toastMessage.textContent = message;

            if (type === 'error') {
                toastEl.querySelector('.toast-header').classList.add('bg-danger', 'text-white');
            } else {
                toastEl.querySelector('.toast-header').classList.remove('bg-danger', 'text-white');
            }

            toast.show();
        }

        // تأكيد الحجز
        document.getElementById('confirmBooking').addEventListener('click', function (e) {
            e.preventDefault();

            if (!document.getElementById('termsAgreement').checked) {
                showNotification('Please agree to the terms and conditions', 'error');
                return;
            }

            const date = document.getElementById('appointmentDate').value;
            const time = document.getElementById('appointmentTime').value;

            const newAppointment = {
                date: date,
                time: time,
                doctor: document.getElementById('doctor').value,
                type: document.getElementById('appointmentType').value
            };

            addAppointmentToWidget(newAppointment);

            showNotification('Appointment booked successfully!');

            // إغلاق المودال بعد تأكيد الحجز
            const modal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
            modal.hide();

            // إعادة تعيين النموذج
            document.querySelectorAll('input, select, textarea').forEach(element => {
                element.value = '';
            });

            // العودة إلى الخطوة الأولى
            showStep(1);
        });

        // إشعار عند النقر على الجرس
        document.getElementById('notificationBell').addEventListener('click', function () {
            showNotification('You will receive reminders for your appointments 24 hours in advance');
        });

         let selectedPayment = '';

    function selectPayment(method) {
        selectedPayment = method;
        document.getElementById('cardDetails').style.display = (method === 'card') ? 'block' : 'none';

        // Highlight selected card
        document.querySelectorAll('.payment-option').forEach(card => {
            card.style.border = '1px solid #ddd';
            card.style.boxShadow = 'none';
        });

        if (method === 'card') {
            document.querySelector('.payment-option:nth-child(1)').style.border = '2px solid #0288d1';
            document.querySelector('.payment-option:nth-child(1)').style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
        } else if (method === 'paypal') {
            document.querySelector('.payment-option:nth-child(2)').style.border = '2px solid #0288d1';
            document.querySelector('.payment-option:nth-child(2)').style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
        } else if (method === 'cash') {
            document.querySelector('.payment-option:nth-child(3)').style.border = '2px solid #0288d1';
            document.querySelector('.payment-option:nth-child(3)').style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
        }
    }

    </script>
</body>

</html>