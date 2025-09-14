<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path Clinic - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style_booking.css">

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
                <ul class="navbar-nav mx-auto align-items-center"
                    style="padding:15px; margin:15px; display:flex; gap:20px;">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../doctors/specialists/specialists.php">Our
                            Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                            data-bs-target="#profileModal">Profile</a></li>
                </ul>


                <!-- Right Side (Profile + Logout) -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Profile -->
                    <li class="nav-item">
                        <a href="#" class="d-flex align-items-center nav-link profile-link" data-bs-toggle="modal"
                            data-bs-target="#profileModal">
                            <img src="https://ui-avatars.com/api/?name=Norhan+Ahmed&background=2563eb&color=fff"
                                class="user-avatar me-2 rounded-circle" style="height: 35px; width: 35px;"
                                id="navbarUserAvatar">
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


        <!-- Hero Section -->
        <div class="hero">
            <h2>Welcome Norhan</h2>
            <h3>Start booking your appointment now</h3>
            <p class="lead">Your mental health is our priority. Choose the department and doctor and schedule an
                appointment that suits you.</p>
        </div>

        <!-- Booking Section -->
        <div class="booking-container col-12" id="bookingPage">
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
                        <input type="text" class="form-control" id="bookingNationalID" name="bookingNationalID"
                            required>
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
                            <p class="text-center text-muted py-4">Please select a department to view available doctors
                            </p>
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

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('credit-card')">
                            <i class="fa-solid fa-credit-card"></i>
                            <h5>Credit Card</h5>
                            <p>Pay with your bank credit card</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('mada')">
                            <i class="fa-solid fa-credit-card"></i>
                            <h5>Mada</h5>
                            <p>Pay with Mada card</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('cash')">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            <h5>Cash</h5>
                            <p>Pay in person at the clinic</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('orange')">
                            <i class="fa-solid fa-mobile-alt"></i>
                            <h5>Orange Money</h5>
                            <p>Pay with Orange Wallet</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('bank-transfer')">
                            <i class="fa-solid fa-building-columns"></i>
                            <h5>Bank Transfer</h5>
                            <p>Transfer to our bank account</p>
                        </div>
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
                            <input type="text" class="form-control" id="madaCardNumber"
                                placeholder="1234 5678 9012 3456">
                        </div>
                    </div>
                </div>

                <!-- Bank Transfer Details -->
                <div class="payment-details" id="bankTransferDetails">
                    <h5 class="mb-3">Bank Transfer Information</h5>
                    <div class="appointment-card">
                        <div class="appointment-detail">
                            <span class="detail-label">Bank Name:</span>
                            <span>Jordan Islamic Bank</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label">Account Name:</span>
                            <span>Life Path Clinic</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label">Account Number:</span>
                            <span>JO85 JIBA 0000 0000 0000 0000 1234</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label">IBAN:</span>
                            <span>JO94 JIBA 0000 0000 0000 0000 1234 56</span>
                        </div>
                    </div>
                    <div class="upload-receipt mt-3" onclick="document.getElementById('receiptUpload').click()">
                        <i class="fa-solid fa-upload"></i>
                        <h5>Upload Transfer Receipt</h5>
                        <p>Click to upload your bank transfer receipt</p>
                        <input type="file" id="receiptUpload" class="d-none" accept="image/*">
                    </div>
                </div>

                <!-- Orange Money Details -->
                <div class="payment-details" id="orangeDetails">
                    <h5 class="mb-3">Orange Money Payment</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="orangeNumber" class="form-label">Orange Money Number</label>
                            <input type="text" class="form-control" id="orangeNumber" placeholder="07X XXX XXXX">
                        </div>
                    </div>
                </div>

                <!-- Cash Payment Details -->
                <div class="payment-details" id="cashDetails">
                    <h5 class="mb-3">Cash Payment</h5>
                    <div class="alert alert-info">
                        <i class="fa-solid fa-info-circle me-2"></i>
                        You have selected to pay in cash. Please bring the exact amount (150 SAR) to your appointment.
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
                </table>ي
            </div>
        </div>
    </div>
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

        <a href="https://wa.me/962775346699" target="_blank" class="whatsapp-float">
  <i class="fab fa-whatsapp"></i>
</a>

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
                        <img src="https://ui-avatars.com/api/?name=Norhan+Ahmed&background=2563eb&color=fff"
                            class="profile-img" id="modalProfileImg">
                        <div class="mt-3">
                            <input type="file" id="profilePhotoInput" class="d-none" accept="image/*">
                            <button class="btn btn-outline-primary"
                                onclick="document.getElementById('profilePhotoInput').click()">
                                <i class="fa-solid fa-camera me-2"></i>Change Photo
                            </button>
                        </div>
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
                                        <input type="text" class="form-control" id="fullName" value="Norhan Ahmed"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" value="norhan@example.com"
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

    <script src="booking.js"></script>
</body>

</html>