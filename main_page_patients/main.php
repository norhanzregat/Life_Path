<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path Clinic - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #93c5fd;
            --secondary-color: #0ea5e9;
            --accent-color: #f97316;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background: var(--bg-white);
            box-shadow: var(--shadow-sm);
            padding: 0.75rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .navbar-brand:hover {
            transform: scale(1.03);
        }

        .logo-img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .nav-link {
            font-weight: 600;
            color: var(--text-dark);
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .navbar .nav-link:hover {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
        }

        .navbar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .logout-btn {
            font-weight: 600;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .logout-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .profile-link {
            font-weight: 600;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .profile-link:hover {
            background: rgba(37, 99, 235, 0.1);
        }

        /* Stats Section */
        .stats-section {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            height: 100%;
            border: 1px solid var(--border-color);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stats-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--text-light);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Hero Section */
        .hero {
            background: rgba(255, 255, 255, 0.9);
            padding: 3rem 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            text-align: center;
            margin-bottom: 3rem;
        }

        .hero h1 {
            font-weight: 800;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .hero h2 {
            font-weight: 600;
            font-size: 1.5rem;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            transition: var(--transition);
            border: none;
        }

        .btn-custom:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Booking Section */
        .booking-container {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
        }

        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .booking-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .booking-progress::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 4px;
            background-color: var(--border-color);
            z-index: 1;
        }

        .progress-step {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80px;
        }

        .progress-step::before {
            content: '';
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }

        .progress-step.active::before {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
        }

        .progress-step.completed::before {
            background: var(--primary-color);
            color: white;
            content: '✓';
        }

        .step-title {
            font-size: 0.8rem;
            color: var(--text-light);
            text-align: center;
            font-weight: 500;
        }

        .progress-step.active .step-title {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: var(--radius-md);
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.2);
        }

        /* Navigation Buttons */
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .btn-secondary {
            background-color: var(--text-light);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-secondary:hover {
            background-color: var(--text-dark);
            color: white;
        }

        /* Doctor Cards */
        .doctor-card {
            background: var(--bg-light);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .doctor-card:hover, .doctor-card.selected {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        /* Calendar */
        .calendar-container {
            background: var(--bg-light);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .calendar-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-day {
            text-align: center;
            padding: 0.5rem;
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition);
        }

        .calendar-day:hover {
            background-color: var(--primary-light);
        }

        .calendar-day.selected {
            background-color: var(--primary-color);
            color: white;
        }

        .calendar-day.disabled {
            color: var(--text-light);
            cursor: not-allowed;
        }

        .calendar-day.today {
            background-color: var(--accent-color);
            color: white;
        }

        /* Time Slots */
        .time-slots {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 0.5rem;
        }

        .time-slot {
            text-align: center;
            padding: 0.75rem;
            background: var(--bg-light);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .time-slot:hover, .time-slot.selected {
            background-color: var(--primary-color);
            color: white;
        }

        .time-slot.unavailable {
            background-color: var(--border-color);
            color: var(--text-light);
            cursor: not-allowed;
        }

        /* Appointment Card */
        .appointment-card {
            background: var(--bg-light);
            border-radius: var(--radius-md);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .appointment-detail {
            display: flex;
            justify-content: space-between;
            padding-bottom: 0.75rem;
            margin-bottom: 0.75rem;
            border-bottom: 1px dashed var(--border-color);
        }

        .detail-label {
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Payment Options */
        .payment-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .payment-option {
            background: var(--bg-light);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .payment-option:hover, .payment-option.selected {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background-color: var(--text-dark);
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }

        .footer a {
            color: var(--primary-light);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer a:hover {
            color: white;
            text-decoration: underline;
        }

        .footer h5 {
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                padding: 2rem 1rem;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero h2 {
                font-size: 1.25rem;
            }
            
            .progress-step {
                width: 60px;
            }
            
            .progress-step::before {
                width: 30px;
                height: 30px;
            }
            
            .step-title {
                font-size: 0.7rem;
            }
            
            .time-slots {
                grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            }
            
            .payment-options {
                grid-template-columns: 1fr;
            }
        }

        /* Success Page */
        .payment-success {
            text-align: center;
            padding: 2rem 0;
        }

        .payment-success i {
            font-size: 4rem;
            color: var(--success-color);
            margin-bottom: 1.5rem;
        }

        /* Table Styles */
        .bookings-table {
            width: 100%;
            border-collapse: collapse;
        }

        .bookings-table th, .bookings-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .bookings-table th {
            font-weight: 600;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.2);
            color: var(--warning-color);
        }

        .status-confirmed {
            background-color: rgba(16, 185, 129, 0.2);
            color: var(--success-color);
        }

        .status-completed {
            background-color: rgba(37, 99, 235, 0.2);
            color: var(--primary-color);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .nav-pills-custom .nav-link {
            color: var(--text-dark);
            border-radius: var(--radius-md);
            margin-bottom: 0.5rem;
            padding: 0.75rem 1rem;
            transition: var(--transition);
        }

        .nav-pills-custom .nav-link.active {
            background: var(--primary-color);
            color: white;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary-color);
            box-shadow: var(--shadow-md);
        }

        /* Toast Notification */
        .toast-container {
            z-index: 9999;
        }

        /* Payment Page */
        .payment-page {
            display: none;
        }

        .payment-details {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo + Clinic Name -->
            <a class="navbar-brand" href="#">
                <img src="../assets/images/life.png" alt="Life Path Logo" class="logo-img">
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
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../doctors/specialists/specialists.php">Our Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                </ul>

                <!-- Right Side (Profile + Logout) -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Profile -->
                    <li class="nav-item">
                        <a href="#" class="d-flex align-items-center nav-link profile-link" data-bs-toggle="modal" data-bs-target="#profileModal">
                            <img src="https://ui-avatars.com/api/?name=Norhan+Ahmed&background=2563eb&color=fff" class="user-avatar me-2 rounded-circle" style="height: 35px; width: 35px;" id="navbarUserAvatar">
                            <span>Hello, Norhan</span>
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

    <div class="container">
        <!-- Stats Section -->
        <div class="row stats-section">
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

        <!-- Hero Section -->
        <div class="hero">
            <h1>Welcome Norhan</h1>
            <h2>Start booking your appointment now</h2>
            <p class="lead">Your mental health is our priority. Choose the department and doctor and schedule an appointment that suits you.</p>
        </div>

        <!-- Booking Section -->
        <div class="booking-container" id="bookingPage">
            <h2 class="section-title">Book an Appointment</h2>
            
            <!-- Progress Indicator -->
            <div class="booking-progress">
                <div class="progress-step active" id="step1Indicator">
                    <div class="step-number">1</div>
                    <span class="step-title">Personal Info</span>
                </div>
                <div class="progress-step" id="step2Indicator">
                    <div class="step-number">2</div>
                    <span class="step-title">Select Doctor</span>
                </div>
                <div class="progress-step" id="step3Indicator">
                    <div class="step-number">3</div>
                    <span class="step-title">Choose Time</span>
                </div>
                <div class="progress-step" id="step4Indicator">
                    <div class="step-number">4</div>
                    <span class="step-title">Confirm</span>
                </div>
                <div class="progress-step" id="step5Indicator">
                    <div class="step-number">5</div>
                    <span class="step-title">Payment</span>
                </div>
            </div>

            <!-- Step 1: Personal Information -->
            <div class="booking-step active" id="step1">
                <h4 class="mb-4">Personal Information</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="bookingFullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="bookingFullName" name="bookingFullName" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="bookingEmail" name="bookingEmail" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="bookingPhone" name="bookingPhone" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingNationalID" class="form-label">National ID</label>
                        <input type="text" class="form-control" id="bookingNationalID" name="bookingNationalID" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="bookingAge" name="bookingAge" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="bookingNotes" class="form-label">Notes (optional)</label>
                        <textarea class="form-control" id="bookingNotes" name="bookingNotes" rows="3"></textarea>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <div></div>
                    <button type="button" class="btn btn-custom" onclick="nextStep(1)">Next</button>
                </div>
            </div>

            <!-- Step 2: Department & Doctor -->
            <div class="booking-step" id="step2">
                <h4 class="mb-4">Select Department & Doctor</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Choose Department</label>
                        <select class="form-select" id="department" name="department" required onchange="loadDoctors()">
                            <option value="">Select department...</option>
                            <option value="psychology">Psychology</option>
                            <option value="autism">Autism Disorder</option>
                            <option value="neurology">Neurology</option>
                            <option value="rehabilitation">Medical Rehabilitation</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Choose Doctor</label>
                        <div id="doctorsContainer">
                            <p class="text-center text-muted py-4">Please select a department to view available doctors</p>
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(2)">Next</button>
                </div>
            </div>

            <!-- Step 3: Appointment -->
            <div class="booking-step" id="step3">
                <h4 class="mb-4">Choose Appointment</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="calendar-container">
                            <div class="calendar-navigation">
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(-1)">
                                    <i class="fa-solid fa-chevron-left me-1"></i> Previous Month
                                </button>
                                <h5 id="currentMonth" class="mb-0">Month 2023</h5>
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(1)">
                                    Next Month <i class="fa-solid fa-chevron-right ms-1"></i>
                                </button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Calendar generated via JS -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Available Time Slots</label>
                        <div class="time-slots" id="timeSlots">
                            <!-- Time slots generated via JS -->
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(3)">Next</button>
                </div>
            </div>

            <!-- Step 4: Confirm Booking -->
            <div class="booking-step" id="step4">
                <h4 class="mb-4">Confirm Booking</h4>
                <div class="appointment-card">
                    <h5 class="mb-3">Appointment Details</h5>
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
                        <span class="detail-label">National ID:</span>
                        <span id="confirmNationalID"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Department:</span>
                        <span id="confirmDepartment"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Doctor:</span>
                        <span id="confirmDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Date & Time:</span>
                        <span id="confirmDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Booking ID:</span>
                        <span id="confirmBookingId" class="booking-id-display"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Status:</span>
                        <span class="status-badge status-pending">Pending Payment</span>
                    </div>
                </div>

                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                    <label class="form-check-label" for="termsAgreement">
                        I agree to the terms and conditions
                    </label>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Previous</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(4)">Proceed to Payment</button>
                </div>
            </div>

            <!-- Step 5: Payment -->
            <div class="booking-step" id="step5">
                <h4 class="mb-4">Complete Payment</h4>
                
                <div class="appointment-card mb-4">
                    <h5 class="mb-3">Booking Information</h5>
                    <div class="appointment-detail">
                        <span class="detail-label">Booking ID:</span>
                        <span id="paymentBookingId"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Name:</span>
                        <span id="paymentName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Doctor:</span>
                        <span id="paymentDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Date & Time:</span>
                        <span id="paymentDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Amount Due:</span>
                        <span class="fw-bold text-success">150 SAR</span>
                    </div>
                </div>

                <h5 class="mb-3">Select Payment Method</h5>

                <div class="payment-options mb-4">
                    <div class="payment-option" onclick="selectPayment('credit-card')">
                        <i class="fa-solid fa-credit-card fa-2x mb-2"></i>
                        <h6>Credit Card</h6>
                    </div>
                    <div class="payment-option" onclick="selectPayment('mada')">
                        <i class="fa-solid fa-credit-card fa-2x mb-2"></i>
                        <h6>Mada</h6>
                    </div>
                    <div class="payment-option" onclick="selectPayment('apple-pay')">
                        <i class="fa-brands fa-apple-pay fa-2x mb-2"></i>
                        <h6>Apple Pay</h6>
                    </div>
                </div>

                <!-- Credit Card Details -->
                <div class="payment-details" id="creditCardDetails">
                    <h5 class="mb-3">Card Information</h5>
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
                            <label for="cardHolder" class="form-label">Card Holder</label>
                            <input type="text" class="form-control" id="cardHolder" placeholder="John Doe">
                        </div>
                    </div>
                </div>

                <!-- Mada Card Details -->
                <div class="payment-details" id="madaDetails">
                    <h5 class="mb-3">Mada Card Information</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="madaCardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="madaCardNumber" placeholder="1234 5678 9012 3456">
                        </div>
                    </div>
                </div>

                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="paymentAgreement" required>
                    <label class="form-check-label" for="paymentAgreement">
                        I authorize deduction from my bank card
                    </label>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(5)">Previous</button>
                    <button type="button" class="btn btn-success" id="completePayment">Complete Payment</button>
                </div>
            </div>
        </div>

        <!-- Success Page (hidden initially) -->
        <div class="booking-container mt-4" id="successPage" style="display: none;">
            <div class="payment-success">
                <i class="fa-solid fa-check-circle"></i>
                <h3 class="text-success">Payment Successful!</h3>
                <p class="lead">Your appointment has been confirmed</p>

                <div class="appointment-card mt-4 mx-auto" style="max-width: 500px;">
                    <h5 class="mb-3">Booking Details</h5>
                    <div class="appointment-detail">
                        <span class="detail-label">Booking ID:</span>
                        <span id="successBookingId"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Name:</span>
                        <span id="successName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Doctor:</span>
                        <span id="successDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Date & Time:</span>
                        <span id="successDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">Payment Status:</span>
                        <span class="badge bg-success">Completed</span>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-primary me-2" onclick="printBooking()">Print Details</button>
                    <button type="button" class="btn btn-outline-primary" onclick="newBooking()">New Booking</button>
                </div>
            </div>
        </div>

        <!-- Previous Bookings -->
        <div class="booking-container">
            <h4 class="section-title">Previous Bookings</h4>
            <div class="table-responsive">
                <table class="bookings-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bookingsTableBody">
                        <!-- Filled via JavaScript -->
                    </tbody>
                </table>
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
                    <div class="profile-img-container text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Norhan+Ahmed&background=2563eb&color=fff" class="profile-img" id="modalProfileImg">
                        <div class="mt-3">
                            <input type="file" id="profilePhotoInput" class="d-none" accept="image/*">
                            <button class="btn btn-outline-primary" onclick="document.getElementById('profilePhotoInput').click()">
                                <i class="fa-solid fa-camera me-2"></i>Change Photo
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-pills nav-pills-custom mb-4 justify-content-center" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="pill" data-bs-target="#info" type="button" role="tab">
                                <i class="fa-solid fa-user me-2"></i>Personal Info
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="appointments-tab" data-bs-toggle="pill" data-bs-target="#appointments" type="button" role="tab">
                                <i class="fa-solid fa-calendar-days me-2"></i>Appointments
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="health-tab" data-bs-toggle="pill" data-bs-target="#health" type="button" role="tab">
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
                                        <input type="text" class="form-control" id="fullName" value="Norhan Ahmed" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" value="norhan@example.com" required>
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
                                        <textarea class="form-control" id="address" rows="2">123 Main St, City, Country</textarea>
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-start">
                <!-- Left Side: Contact Info -->
                <div class="col-md-4 text-md-start mb-4 mb-md-0">
                    <h5>Life Path Clinic</h5>
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
                    <h5>Quick Links</h5>
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
                    <h5>Find Us Here</h5>
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
        // بيانات الأطباء حسب الأقسام
        const doctorsByDepartment = {
            psychology: [
                { id: 1, name: "Dr. Sarah Johnson", specialty: "Psychotherapy Specialist", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:00", "11:00", "14:00", "15:00"] },
                { id: 2, name: "Dr. Michael Brown", specialty: "Mental Health Consultant", image: "https://via.placeholder.com/80", availableSlots: ["10:00", "11:00", "12:00", "16:00", "17:00"] }
            ],
            autism: [
                { id: 3, name: "Dr. Emily Wilson", specialty: "Autism Disorder Specialist", image: "https://via.placeholder.com/80", availableSlots: ["08:00", "09:00", "10:30", "14:00", "15:30"] },
                { id: 4, name: "Dr. James Anderson", specialty: "Autism & Child Development", image: "https://via.placeholder.com/80", availableSlots: ["09:30", "11:00", "13:00", "14:30", "16:00"] }
            ],
            neurology: [
                { id: 5, name: "Dr. Robert Taylor", specialty: "Neurology Consultant", image: "https://via.placeholder.com/80", availableSlots: ["08:30", "10:00", "11:30", "15:00", "16:30"] },
                { id: 6, name: "Dr. Lisa Martinez", specialty: "Neurology Specialist", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:30", "12:00", "14:00", "15:30"] }
            ],
            rehabilitation: [
                { id: 7, name: "Dr. David Clark", specialty: "Medical Rehabilitation Specialist", image: "https://via.placeholder.com/80", availableSlots: ["08:00", "09:30", "11:00", "13:30", "15:00"] },
                { id: 8, name: "Dr. Jennifer Lee", specialty: "Physical Therapy Consultant", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:00", "11:00", "14:00", "16:00"] }
            ]
        };
        
        // بيانات الحجوزات (سيتم تخزينها محلياً)
        let bookings = JSON.parse(localStorage.getItem('bookings')) || [];
        
        // متغيرات للحالة الحالية
        let currentStep = 1;
        let selectedDepartment = '';
        let selectedDoctor = null;
        let selectedDate = '';
        let selectedTime = '';
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        let lastBookingId = parseInt(localStorage.getItem('lastBookingId')) || 0;
        let selectedPaymentMethod = '';
        let currentBooking = null;
        
        // تهيئة الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            generateCalendar(currentMonth, currentYear);
            updateBookingsTable();
            
            // تحميل الصورة المحفوظة
            const savedPhoto = localStorage.getItem('profilePhoto');
            if (savedPhoto) {
                document.getElementById('modalProfileImg').src = savedPhoto;
                document.getElementById('navbarUserAvatar').src = savedPhoto;
            }
            
            // إعداد مستمع حدث لرفع الصورة
            document.getElementById('profilePhotoInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
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
            
            // حفظ التغييرات في الملف الشخصي
            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // محاكاة حفظ البيانات
                setTimeout(function() {
                    showNotification('Profile information saved successfully!');
                    
                    // تحديث الاسم في الصفحة الرئيسية
                    const fullName = document.getElementById('fullName').value;
                    document.querySelector('.hero h1').textContent = `Welcome, ${fullName.split(' ')[0]}!`;
                    document.querySelector('.navbar span').textContent = `Hello, ${fullName.split(' ')[0]}`;
                }, 500);
            });
            
            // تأكيد الحجز والانتقال للدفع
            document.getElementById('completePayment').addEventListener('click', function() {
                if (!document.getElementById('paymentAgreement').checked) {
                    alert('Please agree to authorize deduction from your bank card');
                    return;
                }
                
                if (!selectedPaymentMethod) {
                    alert('Please select a payment method first');
                    return;
                }
                
                // إذا كان الدفع ببطاقة، تحقق من التفاصيل
                if (selectedPaymentMethod === 'credit-card') {
                    const cardNumber = document.getElementById('cardNumber').value;
                    const expiryDate = document.getElementById('expiryDate').value;
                    const cvv = document.getElementById('cvv').value;
                    const cardHolder = document.getElementById('cardHolder').value;
                    
                    if (!cardNumber || !expiryDate || !cvv || !cardHolder) {
                        alert('Please fill all card details');
                        return;
                    }
                } else if (selectedPaymentMethod === 'mada') {
                    const madaCardNumber = document.getElementById('madaCardNumber').value;
                    if (!madaCardNumber) {
                        alert('Please fill Mada card number');
                        return;
                    }
                }
                
                // تحديث حالة الدفع
                currentBooking.paymentStatus = 'paid';
                currentBooking.paymentMethod = selectedPaymentMethod;
                currentBooking.paymentDate = new Date();
                currentBooking.status = 'confirmed';
                
                // إضافة الحجز إلى القائمة
                bookings.push(currentBooking);
                
                // حفظ في localStorage
                localStorage.setItem('bookings', JSON.stringify(bookings));
                localStorage.setItem('lastBookingId', lastBookingId);
                
                // تحديث الجدول
                updateBookingsTable();
                
                // إرسال رسالة تأكيد
                sendConfirmationSMS();
                
                // الانتقال إلى صفحة النجاح
                showSuccessPage();
            });
        });
        
        // توليد رقم حجز فريد
        function generateBookingId() {
            lastBookingId++;
            
            const now = new Date();
            const year = now.getFullYear().toString().substr(-2);
            const month = (now.getMonth() + 1).toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');
            
            let departmentPrefix = 'GN';
            
            if (selectedDepartment === 'psychology') departmentPrefix = 'PSY';
            else if (selectedDepartment === 'autism') departmentPrefix = 'AUT';
            else if (selectedDepartment === 'neurology') departmentPrefix = 'NEU';
            else if (selectedDepartment === 'rehabilitation') departmentPrefix = 'REH';
            
            return `${departmentPrefix}${year}${month}${day}${lastBookingId.toString().padStart(4, '0')}`;
        }
        
        // تحميل الأطباء حسب القسم
        function loadDoctors() {
            const department = document.getElementById('department').value;
            selectedDepartment = department;
            const doctorsContainer = document.getElementById('doctorsContainer');
            
            if (!department) {
                doctorsContainer.innerHTML = '<p class="text-center text-muted py-4">Please select a department to view available doctors</p>';
                return;
            }
            
            const doctors = doctorsByDepartment[department];
            let html = '<div class="row">';
            
            doctors.forEach(doctor => {
                html += `
                    <div class="col-md-6 mb-3">
                        <div class="doctor-card" data-id="${doctor.id}">
                            <div class="d-flex align-items-center">
                                <img src="${doctor.image}" alt="${doctor.name}" class="rounded-circle me-3" width="60" height="60">
                                <div>
                                    <h6 class="mb-1">${doctor.name}</h6>
                                    <p class="mb-0 text-muted small">${doctor.specialty}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            html += '</div>';
            doctorsContainer.innerHTML = html;
            
            // إضافة مستمعي الأحداث لبطاقات الأطباء
            document.querySelectorAll('.doctor-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.doctor-card').forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');
                    
                    const doctorId = parseInt(this.getAttribute('data-id'));
                    selectedDoctor = doctorsByDepartment[department].find(d => d.id === doctorId);
                });
            });
        }
        
        // توليد التقويم
        function generateCalendar(month, year) {
            const calendarGrid = document.getElementById('calendarGrid');
            const monthNames = ["January", "February", "March", "April", "May", "June",
                               "July", "August", "September", "October", "November", "December"];
            
            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
            
            // أول يوم من الشهر
            const firstDay = new Date(year, month, 1).getDay();
            // عدد أيام الشهر
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            // تهيئة التقويم
            calendarGrid.innerHTML = '';
            
            // إضافة أيام الأسبوع
            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            daysOfWeek.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day fw-bold';
                dayElement.textContent = day;
                calendarGrid.appendChild(dayElement);
            });
            
            // الفراغات قبل أول يوم
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day disabled';
                calendarGrid.appendChild(emptyDay);
            }
            
            // أيام الشهر
            const today = new Date();
            for (let i = 1; i <= daysInMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                
                // تحديد إذا كان اليوم الحالي
                if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dayElement.classList.add('today');
                }
                
                // تحديد إذا كان التاريخ في الماضي
                const currentDate = new Date(year, month, i);
                if (currentDate < today.setHours(0, 0, 0, 0)) {
                    dayElement.classList.add('disabled');
                } else {
                    dayElement.addEventListener('click', function() {
                        selectDate(currentDate);
                    });
                }
                
                dayElement.textContent = i;
                calendarGrid.appendChild(dayElement);
            }
        }
        
        // تغيير الشهر
        function changeMonth(direction) {
            currentMonth += direction;
            
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            } else if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            
            generateCalendar(currentMonth, currentYear);
        }
        
        // اختيار تاريخ
        function selectDate(date) {
            selectedDate = date.toISOString().split('T')[0];
            
            // تحديث المظهر
            document.querySelectorAll('.calendar-day').forEach(day => {
                day.classList.remove('selected');
            });
            
            event.target.classList.add('selected');
            
            // عرض المواعيد المتاحة
            showAvailableTimeSlots();
        }
        
        // عرض المواعيد المتاحة
        function showAvailableTimeSlots() {
            if (!selectedDoctor) {
                alert('Please select a doctor first');
                return;
            }
            
            const timeSlotsContainer = document.getElementById('timeSlots');
            let html = '';
            
            selectedDoctor.availableSlots.forEach(slot => {
                // التحقق إذا كان الموعد محجوزاً مسبقاً
                const isBooked = bookings.some(booking => 
                    booking.doctor === selectedDoctor.name && 
                    booking.date === selectedDate && 
                    booking.time === slot
                );
                
                html += `
                    <div class="time-slot ${isBooked ? 'unavailable' : ''}" data-time="${slot}">
                        ${slot}
                    </div>
                `;
            });
            
            timeSlotsContainer.innerHTML = html;
            
            // إضافة مستمعي الأحداث للمواعيد المتاحة
            document.querySelectorAll('.time-slot:not(.unavailable)').forEach(slot => {
                slot.addEventListener('click', function() {
                    document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedTime = this.getAttribute('data-time');
                });
            });
        }
        
        // الخطوة التالية
        function nextStep(step) {
            // التحقق من صحة البيانات قبل الانتقال
            if (step === 1 && !validateStep1()) {
                alert('Please fill all required fields in personal information');
                return;
            }
            
            if (step === 2 && !validateStep2()) {
                alert('Please select a department and doctor');
                return;
            }
            
            if (step === 3 && !validateStep3()) {
                alert('Please select date and time');
                return;
            }
            
            if (step === 4 && !validateStep4()) {
                alert('Please agree to the terms and conditions');
                return;
            }
            
            // تحديث مؤشر التقدم
            document.getElementById(`step${step}Indicator`).classList.remove('active');
            document.getElementById(`step${step}Indicator`).classList.add('completed');
            document.getElementById(`step${step + 1}Indicator`).classList.add('active');
            
            // إخفاء الخطوة الحالية وإظهار التالية
            document.getElementById(`step${step}`).classList.remove('active');
            document.getElementById(`step${step + 1}`).classList.add('active');
            
            currentStep = step + 1;
            
            // إذا كانت الخطوة 4 (التأكيد)، تعبئة بيانات التأكيد
            if (step === 3) {
                fillConfirmationData();
            }
            
            // إذا كانت الخطوة 4 (الانتقال إلى الدفع)، إنشاء الحجز
            if (step === 4) {
                // إنشاء الحجز
                const bookingId = generateBookingId();
                currentBooking = {
                    id: bookingId,
                    name: document.getElementById('bookingFullName').value,
                    email: document.getElementById('bookingEmail').value,
                    phone: document.getElementById('bookingPhone').value,
                    nationalId: document.getElementById('bookingNationalID').value,
                    department: document.getElementById('department').value,
                    doctor: selectedDoctor.name,
                    date: selectedDate,
                    time: selectedTime,
                    status: 'pending',
                    paymentStatus: 'unpaid',
                    timestamp: new Date()
                };
                
                // تعبئة بيانات الدفع
                document.getElementById('paymentBookingId').textContent = currentBooking.id;
                document.getElementById('paymentName').textContent = currentBooking.name;
                document.getElementById('paymentDoctor').textContent = currentBooking.doctor;
                
                const dateObj = new Date(currentBooking.date);
                const formattedDate = dateObj.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                
                document.getElementById('paymentDateTime').textContent = `${formattedDate} - ${currentBooking.time}`;
            }
        }
        
        // الخطوة السابقة
        function prevStep(step) {
            // تحديث مؤشر التقدم
            document.getElementById(`step${step}Indicator`).classList.remove('active');
            document.getElementById(`step${step - 1}Indicator`).classList.add('active');
            document.getElementById(`step${step - 1}Indicator`).classList.remove('completed');
            
            // إخفاء الخطوة الحالية وإظهار السابقة
            document.getElementById(`step${step}`).classList.remove('active');
            document.getElementById(`step${step - 1}`).classList.add('active');
            
            currentStep = step - 1;
        }
        
        // التحقق من صحة الخطوة 1
        function validateStep1() {
            const fullName = document.getElementById('bookingFullName').value;
            const email = document.getElementById('bookingEmail').value;
            const phone = document.getElementById('bookingPhone').value;
            const nationalId = document.getElementById('bookingNationalID').value;
            const age = document.getElementById('bookingAge').value;
            
            return fullName && email && phone && nationalId && age;
        }
        
        // التحقق من صحة الخطوة 2
        function validateStep2() {
            return selectedDepartment && selectedDoctor;
        }
        
        // التحقق من صحة الخطوة 3
        function validateStep3() {
            return selectedDate && selectedTime;
        }
        
        // التحقق من صحة الخطوة 4
        function validateStep4() {
            return document.getElementById('termsAgreement').checked;
        }
        
        // تعبئة بيانات التأكيد
        function fillConfirmationData() {
            document.getElementById('confirmName').textContent = document.getElementById('bookingFullName').value;
            document.getElementById('confirmEmail').textContent = document.getElementById('bookingEmail').value;
            document.getElementById('confirmPhone').textContent = document.getElementById('bookingPhone').value;
            document.getElementById('confirmNationalID').textContent = document.getElementById('bookingNationalID').value;
            
            const departmentSelect = document.getElementById('department');
            const departmentText = departmentSelect.options[departmentSelect.selectedIndex].text;
            document.getElementById('confirmDepartment').textContent = departmentText;
            
            document.getElementById('confirmDoctor').textContent = selectedDoctor.name;
            
            const dateObj = new Date(selectedDate);
            const formattedDate = dateObj.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            document.getElementById('confirmDateTime').textContent = `${formattedDate} - ${selectedTime}`;
            
            // عرض رقم الحجز المولد
            document.getElementById('confirmBookingId').textContent = generateBookingId();
        }
        
        // اختيار طريقة الدفع
        function selectPayment(method) {
            selectedPaymentMethod = method;
            
            // إلغاء تحديد جميع الخيارات
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // تحديد الخيار المحدد
            event.currentTarget.classList.add('selected');
            
            // إخفاء جميع تفاصيل الدفع
            document.querySelectorAll('.payment-details').forEach(detail => {
                detail.style.display = 'none';
            });
            
            // إظهار تفاصيل طريقة الدفع المحددة
            if (method === 'credit-card') {
                document.getElementById('creditCardDetails').style.display = 'block';
            } else if (method === 'mada') {
                document.getElementById('madaDetails').style.display = 'block';
            }
        }
        
        // عرض صفحة النجاح
        function showSuccessPage() {
            document.getElementById('bookingPage').style.display = 'none';
            document.getElementById('successPage').style.display = 'block';
            
            // تعبئة بيانات النجاح
            document.getElementById('successBookingId').textContent = currentBooking.id;
            document.getElementById('successName').textContent = currentBooking.name;
            document.getElementById('successDoctor').textContent = currentBooking.doctor;
            
            const dateObj = new Date(currentBooking.date);
            const formattedDate = dateObj.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            document.getElementById('successDateTime').textContent = `${formattedDate} - ${currentBooking.time}`;
        }
        
        // إرسال رسالة تأكيد
        function sendConfirmationSMS() {
            // محاكاة إرسال رسالة SMS
            const phone = document.getElementById('bookingPhone').value;
            const message = `Your appointment with ${currentBooking.doctor} on ${currentBooking.date} at ${currentBooking.time} has been confirmed. Booking ID: ${currentBooking.id}`;
            
            console.log(`Sending SMS to ${phone}: ${message}`);
            showNotification('Confirmation message has been sent to your phone');
        }
        
        // طباعة تفاصيل الحجز
        function printBooking() {
            window.print();
        }
        
        // حجز جديد
        function newBooking() {
            resetForm();
            document.getElementById('successPage').style.display = 'none';
            document.getElementById('bookingPage').style.display = 'block';
        }
        
        // تحديث جدول الحجوزات
        function updateBookingsTable() {
            const tableBody = document.getElementById('bookingsTableBody');
            let html = '';
            
            if (bookings.length === 0) {
                html = '<tr><td colspan="6" class="text-center py-4">No previous bookings</td></tr>';
            } else {
                bookings.forEach(booking => {
                    let statusClass = '';
                    let statusText = '';
                    
                    if (booking.status === 'pending') {
                        statusClass = 'status-pending';
                        statusText = 'Pending';
                    } else if (booking.status === 'confirmed') {
                        statusClass = 'status-confirmed';
                        statusText = 'Confirmed';
                    } else if (booking.status === 'completed') {
                        statusClass = 'status-completed';
                        statusText = 'Completed';
                    }
                    
                    html += `
                        <tr>
                            <td>${booking.id}</td>
                            <td>${booking.doctor}</td>
                            <td>${booking.date}</td>
                            <td>${booking.time}</td>
                            <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Details</button>
                                <button class="btn btn-sm btn-outline-danger">Cancel</button>
                            </td>
                        </tr>
                    `;
                });
            }
            
            tableBody.innerHTML = html;
        }
        
        // إعادة تعيين النموذج
        function resetForm() {
            document.getElementById('bookingFullName').value = '';
            document.getElementById('bookingEmail').value = '';
            document.getElementById('bookingPhone').value = '';
            document.getElementById('bookingNationalID').value = '';
            document.getElementById('bookingAge').value = '';
            document.getElementById('bookingNotes').value = '';
            document.getElementById('department').value = '';
            document.getElementById('termsAgreement').checked = false;
            document.getElementById('paymentAgreement').checked = false;
            
            selectedDepartment = '';
            selectedDoctor = null;
            selectedDate = '';
            selectedTime = '';
            selectedPaymentMethod = '';
            
            // إخفاء تفاصيل الدفع
            document.querySelectorAll('.payment-details').forEach(detail => {
                detail.style.display = 'none';
            });
            
            // إلغاء تحديد خيارات الدفع
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // إعادة إلى الخطوة الأولى
            document.querySelectorAll('.booking-step').forEach(step => {
                step.classList.remove('active');
            });
            document.getElementById('step1').classList.add('active');
            
            document.querySelectorAll('.progress-step').forEach(step => {
                step.classList.remove('active', 'completed');
            });
            document.getElementById('step1Indicator').classList.add('active');
            
            currentStep = 1;
            
            // تحديث واجهة الأطباء والمواعيد
            loadDoctors();
            generateCalendar(currentMonth, currentYear);
        }
        
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
            toastEl.addEventListener('hidden.bs.toast', function() {
                toastContainer.remove();
            });
        }
    </script>
</body>

</html>