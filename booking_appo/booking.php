<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login_post.php");
    exit;
}

// Include the database connection
include_once '../connection.php';
$database = new Database();
$db = $database->getConnection();

// Get user information
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// We might also want to fetch the user's phone and other details from the database
$query = "SELECT * FROM users WHERE id = :user_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch user's previous appointments
$query = "SELECT * FROM appointments WHERE user_id = :user_id ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path Clinic - نظام الحجوزات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="style_booking.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">
                <img src="../assets/images/life.png" alt="Life Path Logo" class="logo-img">
                <span class="ms-2" data-translate="booking_title">Life Path Clinic</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#" data-translate="nav_home">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="../doctors/specialists/specialists.php"
                            data-translate="nav_team">فريقنا</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                            data-bs-target="#profileModal" data-translate="nav_profile">الملف الشخصي</a></li>
                </ul>

                <div class="d-flex align-items-center gap-3 me-3">
                    <!-- Language Selector -->
                    <div class="language-selector">
                        <button class="language-btn" id="languageButton">
                            <i class="fas fa-language me-1"></i> <span id="currentLanguage">العربية</span>
                        </button>
                        <div class="language-dropdown" id="languageDropdown">
                            <div class="language-option" data-lang="ar">
                                <span class="language-flag">🇸🇦</span>
                                العربية
                            </div>
                            <div class="language-option" data-lang="en">
                                <span class="language-flag">🇺🇸</span>
                                English
                            </div>
                        </div>
                    </div>

                    <!-- User Profile -->
                    <a href="#" class="d-flex align-items-center nav-link profile-link" data-bs-toggle="modal"
                        data-bs-target="#profileModal">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user_name); ?>&background=2563eb&color=fff"
                            class="user-avatar me-2 rounded-circle" style="height: 35px; width: 35px;"
                            id="navbarUserAvatar">
                        <span data-translate="hello">مرحباً</span>, <span id="userFirstName"><?php echo explode(' ', $user_name)[0]; ?></span>
                    </a>

                    <!-- Logout -->
                    <a class="btn btn-outline-primary ms-3 logout-btn" href="../auth/logout.php">
                        <i data-translate="logout" class="fas fa-sign-out-alt me-1"></i>تسجيل الخروج
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Stats Section -->
        <div class="row stats-section">
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number"><?php 
                        $upcoming = 0;
                        foreach ($appointments as $app) {
                            if (strtotime($app['appointment_date']) > time() && $app['status'] == 'confirmed') {
                                $upcoming++;
                            }
                        }
                        echo $upcoming;
                    ?></div>
                    <div class="stats-label" data-translate="upcoming_appointments">المواعيد القادمة</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number"><?php 
                        $completed = 0;
                        foreach ($appointments as $app) {
                            if ($app['status'] == 'completed') {
                                $completed++;
                            }
                        }
                        echo $completed;
                    ?></div>
                    <div class="stats-label" data-translate="completed_sessions">الجلسات المكتملة</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number"><?php 
                        $this_month = 0;
                        $current_month = date('m');
                        foreach ($appointments as $app) {
                            if (date('m', strtotime($app['appointment_date'])) == $current_month) {
                                $this_month++;
                            }
                        }
                        echo $this_month;
                    ?></div>
                    <div class="stats-label" data-translate="this_month">هذا الشهر</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number">4.8</div>
                    <div class="stats-label" data-translate="satisfaction_rate">معدل الرضا</div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="hero">
            <h2 data-translate="hello_name">مرحباً <?php echo $user_name; ?></h2>
            <h3 data-translate="booking_prompt">ابدأ بحجز موعدك الآن</h3>
            <p class="lead" data-translate="booking_description">صحتك النفسية هي أولويتنا. اختر القسم والطبيب وحدد
                موعداً يناسبك.</p>
        </div>

        <!-- Booking Section -->
        <div class="booking-container" id="bookingPage">
            <h2 class="section-title" data-translate="booking_title">حجز موعد</h2>

            <!-- Progress Indicator -->
            <div class="booking-progress">
                <div class="progress-step active" id="step1Indicator">
                    <div class="step-number">1</div>
                    <span class="step-title" data-translate="personal_information">المعلومات الشخصية</span>
                </div>
                <div class="progress-step" id="step2Indicator">
                    <div class="step-number">2</div>
                    <span class="step-title" data-translate="doctor_selection">اختيار الطبيب</span>
                </div>
                <div class="progress-step" id="step3Indicator">
                    <div class="step-number">3</div>
                    <span class="step-title" data-translate="time_selection">اختيار الوقت</span>
                </div>
                <div class="progress-step" id="step4Indicator">
                    <div class="step-number">4</div>
                    <span class="step-title" data-translate="confirmation">التأكيد</span>
                </div>
                <div class="progress-step" id="step5Indicator">
                    <div class="step-number">5</div>
                    <span class="step-title" data-translate="payment">الدفع</span>
                </div>
            </div>

            <!-- Step 1: Personal Information -->
            <div class="booking-step active" id="step1">
                <h4 class="mb-4" data-translate="personal_information">المعلومات الشخصية</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="bookingFullName" class="form-label" data-translate="full_name">الاسم الكامل</label>
                        <input type="text" class="form-control" id="bookingFullName" name="bookingFullName" value="<?php echo $user_name; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingEmail" class="form-label" data-translate="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="bookingEmail" name="bookingEmail" value="<?php echo $user_email; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingPhone" class="form-label" data-translate="phone">رقم الهاتف</label>
                        <input type="tel" class="form-control" id="bookingPhone" name="bookingPhone" value="<?php echo $user['phone'] ?? ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingNationalID" class="form-label" data-translate="national_id">الهوية
                            الوطنية</label>
                        <input type="text" class="form-control" id="bookingNationalID" name="bookingNationalID"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingAge" class="form-label" data-translate="age">العمر</label>
                        <input type="number" class="form-control" id="bookingAge" name="bookingAge" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="bookingNotes" class="form-label" data-translate="notes">ملاحظات (اختياري)</label>
                        <textarea class="form-control" id="bookingNotes" name="bookingNotes" rows="3"></textarea>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <div></div>
                    <button type="button" class="btn btn-custom" onclick="nextStep(1)"
                        data-translate="next">التالي</button>
                </div>
            </div>

            <!-- Step 2: Department & Doctor -->
            <div class="booking-step" id="step2">
                <h4 class="mb-4" data-translate="select_department_doctor">اختيار القسم والطبيب</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="form-label" data-translate="select_department">اختر القسم</label>
                        <select class="form-select" id="department" name="department" required onchange="loadDoctors()">
                            <option value="" data-translate="select_department">اختر القسم...</option>
                            <option value="psychology" data-translate="psychology">علم النفس</option>
                            <option value="autism" data-translate="autism">اضطراب التوحد</option>
                            <option value="neurology" data-translate="neurology">علم الأعصاب</option>
                            <option value="rehabilitation" data-translate="rehabilitation">التأهيل الطبي</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" data-translate="select_doctor">اختر الطبيب</label>
                        <div id="doctorsContainer">
                            <p class="text-center text-muted py-4" data-translate="select_doctor_prompt">الرجاء اختيار
                                القسم لعرض الأطباء المتاحين</p>
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(2)">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(2)">التالي</button>
                </div>
            </div>

            <!-- Step 3: Appointment -->
            <div class="booking-step" id="step3">
                <h4 class="mb-4" data-translate="select_appointment">اختيار الموعد</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="calendar-container">
                            <div class="calendar-navigation">
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(-1)">
                                    <i class="fas fa-chevron-right me-1" data-translate="prev_month"></i> الشهر السابق
                                </button>
                                <h5 id="currentMonth" class="mb-0" data-translate="current_2023">شهر 2023</h5>
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(1)"
                                    data-translate="next_month">
                                    الشهر التالي <i class="fas fa-chevron-left ms-1" data-translate="next_month"></i>
                                </button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Calendar generated via JS -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" data-translate="available_appointments">المواعيد المتاحة</label>
                        <div class="time-slots" id="timeSlots">
                            <!-- Time slots generated via JS -->
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)"
                        data-translate="back">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(3)"
                        data-translate="next">التالي</button>
                </div>
            </div>

            <!-- Step 4: Confirm Booking -->
            <div class="booking-step" id="step4">
                <h4 class="mb-4" data-translate="confirm_booking">تأكيد الحجز</h4>
                <div class="appointment-card">
                    <h5 class="mb-3" data-translate="appointment_details">تفاصيل الموعد</h5>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="name">الاسم:</span>
                        <span id="confirmName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="email">البريد الإلكتروني:</span>
                        <span id="confirmEmail"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="phone">الهاتف:</span>
                        <span id="confirmPhone"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="national_id">الهوية الوطنية:</span>
                        <span id="confirmNationalID"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="department">القسم:</span>
                        <span id="confirmDepartment"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="doctor">الطبيب:</span>
                        <span id="confirmDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="date_time">التاريخ والوقت:</span>
                        <span id="confirmDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="booking_id">رقم الحجز:</span>
                        <span id="confirmBookingId" class="booking-id-display"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="status">الحالة:</span>
                        <span class="status-badge status-pending" data-translate="pending_payment">بانتظار الدفع</span>
                    </div>
                </div>

                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                    <label class="form-check-label" for="termsAgreement" data-translate="terms_agreement">
                        أوافق على الشروط والأحكام
                    </label>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)"
                        data-translate="previous">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(4)"
                        data-translate="continue_to_payment">المتابعة للدفع</button>
                </div>
            </div>

            <!-- Step 5: Payment -->
            <div class="booking-step" id="step5">
                <h4 class="mb-4" data-translate="payment_completion">إتمام الدفع</h4>

                <div class="appointment-card mb-4">
                    <h5 class="mb-3" data-translate="booking_information">معلومات الحجز</h5>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="booking_id">رقم الحجز:</span>
                        <span id="paymentBookingId"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="name">الاسم:</span>
                        <span id="paymentName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="doctor">الطبيب:</span>
                        <span id="paymentDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="date_time">التاريخ والوقت:</span>
                        <span id="paymentDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="amount_due">المبلغ المستحق:</span>
                        <span class="fw-bold text-success">90 دينار أردني</span>
                    </div>
                </div>

                <h5 class="mb-3" data-translate="select_payment_method">اختر طريقة الدفع</h5>

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('credit-card')">
                            <i class="fas fa-credit-card"></i>
                            <h5 data-translate="credit_card">بطاقة ائتمان</h5>
                            <p data-translate="credit_card_description">الدفع ببطاقة الائتمان</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('mada')">
                            <i class="fas fa-credit-card"></i>
                            <h5 data-translate="mada">مدى</h5>
                            <p data-translate="mada_description">الدفع ببطاقة مدى</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('cash')">
                            <i class="fas fa-money-bill-wave"></i>
                            <h5 data-translate="cash">نقدي</h5>
                            <p data-translate="cash_description">الدفع نقداً في العيادة</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('orange')">
                            <i class="fas fa-mobile-alt"></i>
                            <h5 data-translate="orange_money">أورانج ماني</h5>
                            <p data-translate="orange_money_description">الدفع من خلال أورانج ماني</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('bank-transfer')">
                            <i class="fas fa-building-columns"></i>
                            <h5 data-translate="bank_transfer">تحويل بنكي</h5>
                            <p data-translate="bank_transfer_description">تحويل إلى حسابنا البنكي</p>
                        </div>
                    </div>
                </div>

                <!-- Credit Card Details -->
                <div class="payment-details" id="creditCardDetails">
                    <h5 class="mb-3" data-translate="card_information">معلومات البطاقة</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cardNumber" class="form-label" data-translate="card_number">رقم البطاقة</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="expiryDate" class="form-label" data-translate="expiry_date">تاريخ
                                الانتهاء</label>
                            <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cvv" class="form-label" data-translate="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cardHolder" class="form-label" data-translate="card_holder">اسم صاحب
                                البطاقة</label>
                            <input type="text" class="form-control" id="cardHolder" placeholder="John Doe">
                        </div>
                    </div>
                </div>

                <!-- Mada Card Details -->
                <div class="payment-details" id="madaDetails">
                    <h5 class="mb-3" data-translate="mada_information">معلومات بطاقة مدى</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="madaCardNumber" class="form-label" data-translate="mada_card_number">رقم
                                البطاقة</label>
                            <input type="text" class="form-control" id="madaCardNumber"
                                placeholder="1234 5678 9012 3456">
                        </div>
                    </div>
                </div>

                <!-- Bank Transfer Details -->
                <div class="payment-details" id="bankTransferDetails">
                    <h5 class="mb-3" data-translate="bank_transfer">معلومات التحويل البنكي</h5>
                    <div class="appointment-card">
                        <div class="appointment-detail">
                            <span class="detail-label" data-translate="bank_name">اسم البنك:</span>
                            <span>البنك الأهلي السعودي</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label" data-translate="account_name">اسم الحساب:</span>
                            <span>عيادة مسار الحياة</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label" data-translate="account_number">رقم الحساب:</span>
                            <span>SA85 1000 0000 0000 0000 1234</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label" data-translate="iban">IBAN:</span>
                            <span>SA94 1000 0000 0000 0000 1234 56</span>
                        </div>
                    </div>
                    <div class="upload-receipt mt-3" onclick="document.getElementById('receiptUpload').click()">
                        <i class="fas fa-upload"></i>
                        <h5 class="" data-translate="upload_receipt">رفع إيصال التحويل</h5>
                        <p data-translate="click_to_upload">انقر لرفع إيصال التحويل البنكي</p>
                        <input type="file" id="receiptUpload" class="d-none" accept="image/*">
                    </div>
                </div>

                <!-- Orange Money Details -->
                <div class="payment-details" id="orangeDetails">
                    <h5 class="mb-3" data-translate="orange_money">الدفع عبر أورانج ماني</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="orangeNumber" class="form-label" data-translate="orange_number">رقم أورانج
                                ماني</label>
                            <input type="text" class="form-control" id="orangeNumber" placeholder="07X XXX XXXX">
                        </div>
                    </div>
                </div>

                <!-- Cash Payment Details -->
                <div class="payment-details" id="cashDetails">
                    <h5 class="mb-3" data-translate="cash_payment">الدفع نقداً</h5>
                    <div class="alert alert-info" data-translate="cash_payment_info">
                        <i class="fas fa-info-circle me-2"></i>
                        لقد اخترت الدفع نقداً. يرجى إحضار المبلغ المطلوب (150دينار أردني) إلى موعدك.
                    </div>
                </div>

                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="paymentAgreement" required>
                    <label class="form-check-label" for="paymentAgreement" data-translate="payment_agreement">
                        أوافق على خصم المبلغ من بطاقتي البنكية
                    </label>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(5)"
                        data-translate="previous">السابق</button>
                    <button type="button" class="btn btn-success" id="completePayment"
                        data-translate="complete_payment">إتمام الدفع</button>
                </div>
            </div>
        </div>

        <!-- Success Page (hidden initially) -->
        <div class="booking-container mt-4" id="successPage" style="display: none;">
            <div class="payment-success">
                <i class="fas fa-check-circle"></i>
                <h3 class="text-success" data-translate="payment_success">تم الدفع بنجاح!</h3>
                <p class="lead" data-translate="booking_confirmed">تم تأكيد موعدك بنجاح</p>

                <div class="appointment-card mt-4 mx-auto" style="max-width: 500px;">
                    <h5 class="mb-3" data-translate="booking_details">تفاصيل الحجز</h5>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="booking_id">رقم الحجز:</span>
                        <span id="successBookingId"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="full_name">الاسم:</span>
                        <span id="successName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="doctor">الطبيب:</span>
                        <span id="successDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="date_time">التاريخ والوقت:</span>
                        <span id="successDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label" data-translate="payment_status">حالة الدفع:</span>
                        <span class="badge bg-success" data-translate="completed">مكتمل</span>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-primary me-2" onclick="printBooking()"
                        data-translate="print_details">طباعة التفاصيل</button>
                    <button type="button" class="btn btn-outline-primary" onclick="newBooking()"
                        data-translate="new_booking">حجز جديد</button>
                </div>
            </div>
        </div>

        <!-- Previous Bookings -->
        <div class="booking-container">
            <h4 class="section-title" data-translate="previous_bookings">الحجوزات السابقة</h4>
            <div class="table-responsive">
                <table class="bookings-table">
                    <thead>
                        <tr>
                            <th data-translate="booking_id">رقم الحجز</th>
                            <th data-translate="doctor">الطبيب</th>
                            <th data-translate="date">التاريخ</th>
                            <th data-translate="time">الوقت</th>
                            <th data-translate="status">الحالة</th>
                            <th data-translate="actions">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="bookingsTableBody">
                        <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?php echo $appointment['booking_id']; ?></td>
                            <td><?php echo $appointment['doctor']; ?></td>
                            <td><?php echo $appointment['appointment_date']; ?></td>
                            <td><?php echo date('H:i', strtotime($appointment['appointment_time'])); ?></td>
                            <td>
                                <span class="status-badge 
                                    <?php 
                                    if ($appointment['status'] == 'confirmed') echo 'status-confirmed';
                                    elseif ($appointment['status'] == 'completed') echo 'status-completed';
                                    elseif ($appointment['status'] == 'cancelled') echo 'status-cancelled';
                                    else echo 'status-pending';
                                    ?>
                                ">
                                    <?php 
                                    if ($appointment['status'] == 'confirmed') echo 'مؤكد';
                                    elseif ($appointment['status'] == 'completed') echo 'مكتمل';
                                    elseif ($appointment['status'] == 'cancelled') echo 'ملغى';
                                    else echo 'قيد الانتظار';
                                    ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" onclick="viewBooking('<?php echo $appointment['booking_id']; ?>')">
                                    <i class="fas fa-eye"></i> عرض
                                </button>
                                <?php if ($appointment['status'] == 'pending'): ?>
                                <button class="btn btn-sm btn-outline-danger" onclick="cancelBooking('<?php echo $appointment['booking_id']; ?>')">
                                    <i class="fas fa-times"></i> إلغاء
                                </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/966123456789" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel" data-translate="profile">ملفك الشخصي</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="profile-img-container text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user_name); ?>&background=2563eb&color=fff"
                            class="profile-img" id="modalProfileImg">
                        <div class="mt-3">
                            <input type="file" id="profilePhotoInput" class="d-none" accept="image/*">
                            <button class="btn btn-outline-primary"
                                onclick="document.getElementById('profilePhotoInput').click()">
                                <i class="fas fa-camera me-2" data-translate="change_profile_picture"></i>تغيير الصورة
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-pills nav-pills-custom mb-4 justify-content-center" id="profileTabs"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="pill" data-bs-target="#info"
                                type="button" role="tab">
                                <i class="fas fa-user me-2" data-translate="personal_information"></i>المعلومات الشخصية
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="appointments-tab" data-bs-toggle="pill"
                                data-bs-target="#appointments" type="button" role="tab">
                                <i class="fas fa-calendar-days me-2" data-translate="appointments"></i>المواعيد
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="health-tab" data-bs-toggle="pill" data-bs-target="#health"
                                type="button" role="tab">
                                <i class="fas fa-heart-pulse me-2" data-translate="health_data"></i>البيانات الصحية
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Personal Info Tab -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <form id="profileForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" data-translate="full_name">الاسم الكامل</label>
                                        <input type="text" class="form-control" id="fullName" value="<?php echo $user_name; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" data-translate="email">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="email" value="<?php echo $user_email; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" data-translate="phone">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="phone" value="<?php echo $user['phone'] ?? ''; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" data-translate="date_of_birth">تاريخ الميلاد</label>
                                        <input type="date" class="form-control" id="dob" value="<?php echo $user['dob'] ?? ''; ?>">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" data-translate="address">العنوان</label>
                                        <textarea class="form-control" id="address" rows="2"><?php echo $user['address'] ?? ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-custom">
                                        <i class="fas fa-save me-2" data-translate="save_changes"></i>حفظ التغييرات
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Appointments Tab -->
                        <div class="tab-pane fade" id="appointments" role="tabpanel">
                            <h5 class="mb-3" data-translate="your_appointments">مواعيدك</h5>
                            <div class="table-responsive">
                                <table class="table table-striped align-middle text-center">
                                    <thead>
                                        <tr>
                                            <th data-translate="date">التاريخ</th>
                                            <th data-translate="time">الوقت</th>
                                            <th data-translate="doctor">الطبيب</th>
                                            <th data-translate="type">النوع</th>
                                            <th data-translate="status">الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($appointments as $appointment): ?>
                                        <tr>
                                            <td><?php echo $appointment['appointment_date']; ?></td>
                                            <td><?php echo date('H:i', strtotime($appointment['appointment_time'])); ?></td>
                                            <td><?php echo $appointment['doctor']; ?></td>
                                            <td>في العيادة</td>
                                            <td>
                                                <span class="badge 
                                                    <?php 
                                                    if ($appointment['status'] == 'confirmed') echo 'bg-success';
                                                    elseif ($appointment['status'] == 'completed') echo 'bg-secondary';
                                                    elseif ($appointment['status'] == 'cancelled') echo 'bg-danger';
                                                    else echo 'bg-warning text-dark';
                                                    ?>
                                                ">
                                                    <?php 
                                                    if ($appointment['status'] == 'confirmed') echo 'مؤكد';
                                                    elseif ($appointment['status'] == 'completed') echo 'مكتمل';
                                                    elseif ($appointment['status'] == 'cancelled') echo 'ملغى';
                                                    else echo 'قيد الانتظار';
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Health Data Tab -->
                        <div class="tab-pane fade" id="health" role="tabpanel">
                            <div class="mb-4">
                                <h6 data-translate="treatment_plan">خطة العلاج</h6>
                                <p class="text-muted">العلاج السلوكي المعرفي (CBT) - جلسات أسبوعية</p>
                            </div>
                            <div class="mb-4">
                                <h6 data-translate="medications">الأدوية</h6>
                                <p class="text-muted">سيرترالين 50 مجم - مرة يومياً</p>
                            </div>
                            <div class="mb-4">
                                <h6 data-translate="last_visit">آخر زيارة</h6>
                                <p class="text-muted">28 أغسطس 2025 - د. سارة يوسف</p>
                            </div>
                            <div class="mb-4">
                                <h6 data-translate="diagnosis">التشخيص</h6>
                                <p class="text-muted">قلق عام، نوبات هلع متوسطة</p>
                            </div>
                            <div class="mb-4">
                                <h6 data-translate="progress">التقدم</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted">75% من خطة العلاج مكتملة</p>
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
                    <h5 data-translate="clinic_name">عيادة مسار الحياة</h5>
                    <p data-translate="copyright">&copy; 2025 عيادة مسار الحياة. جميع الحقوق محفوظة.</p>
                    <p data-translate="address"><strong>العنوان:</strong> عمان، الأردن</p>
                    <p data-translate="phone"><strong> الهاتف:</strong> +966 12 345 6789</p>
                    <p data-translate="email"><strong>البريد الإلكتروني:</strong> <a
                            href="mailto:info@lifepathclinic.com">info@lifepathclinic.com</a></p>
                    <p data-translate="working_hours_clinic"><strong data-translate="working_hours_sub">ساعات
                            العمل:</strong>
                        الأحد - الخميس: 8 صباحاً - 6 مساءً | الجمعة: 9 صباحاً - 3 مساءً</p>
                    <p>
                        <a href="#"><i class="fab fa-facebook me-2"></i></a>
                        <a href="#"><i class="fab fa-twitter me-2"></i></a>
                        <a href="#"><i class="fab fa-instagram me-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin me-2"></i></a>
                    </p>
                </div>

                <!-- Middle Side: Quick Links -->
                <div class="col-md-2 text-md-start mb-4 mb-md-0">
                    <h5 data-translate="quick_links">روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" data-translate="home">الرئيسية</a></li>
                        <li><a href="#" data-translate="our_doctors">أطباؤنا</a></li>
                        <li><a href="#" data-translate="services">الخدمات</a></li>
                        <li><a href="#" data-translate="book_appointment">حجز موعد</a></li>
                        <li><a href="#" data-translate="contact_us">اتصل بنا</a></li>
                    </ul>
                </div>

                <!-- Right Side: Map -->
                <div class="col-md-6 text-md-end">
                    <h5 data-translate="our_location">موقعنا</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.9512418072525!2d46.67238227599624!3d24.84406354800035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3e8a92f7f61%3A0x6745cf0c55434152!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1694475910594!5m2!1sen!2sus"
                        width="100%" height="250" style="border:0; border-radius:10px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Bottom Row: Newsletter -->
            <div class="row mt-4">
                <div class="col-md-6 text-md-start mb-3 mb-md-0">
                    <h5 class="mb-2" data-translate="subscribe_newsletter">اشترك في نشرتنا الإخبارية</h5>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="بريدك الإلكتروني" required>
                        <button type="submit" class="btn btn-primary" data-translate="subscribe">اشتراك</button>
                    </form>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0" data-translate="designed_by">صمم بواسطة <a href="#">فريق مسار الحياة</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // JavaScript variables for user data
    const userId = <?php echo $user_id; ?>;
    const userFullName = "<?php echo $user_name; ?>";
    const userEmail = "<?php echo $user_email; ?>";
    const userPhone = "<?php echo $user['phone'] ?? ''; ?>";
    </script>
<script>
    
</script>
    <script src="booking.js"></script>
    <script src="../js/lang.js"></script>

</body>

</html>