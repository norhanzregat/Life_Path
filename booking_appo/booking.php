<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path Clinic - نظام الحجوزات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_booking.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">
                <img src="../assets/images/life.png" alt="Life Path Logo" class="logo-img">
                <span class="ms-2">Life Path</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="../doctors/specialists/specialists.php">أطباؤنا</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">الملف الشخصي</a></li>
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
             <a href="#" class="d-flex align-items-center nav-link profile-link" data-bs-toggle="modal" data-bs-target="#profileModal">
                        <img src="https://ui-avatars.com/api/?name=نورهان+أحمد&background=2563eb&color=fff" class="user-avatar me-2 rounded-circle" style="height: 35px; width: 35px;" id="navbarUserAvatar">
                        <span data-translate="hello">مرحباً</span>, <span id="userFirstName">نورهان</span>
                    </a>

                    <!-- Logout -->
                    <a class="btn btn-outline-primary ms-3 logout-btn" href="../index.html">
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
                    <div class="stats-number">3</div>
                    <div class="stats-label">المواعيد القادمة</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number">7</div>
                    <div class="stats-label">الجلسات المكتملة</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number">2</div>
                    <div class="stats-label">هذا الشهر</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-card">
                    <div class="stats-number">4.8</div>
                    <div class="stats-label">معدل الرضا</div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="hero">
            <h2>مرحباً نورهان</h2>
            <h3>ابدأ بحجز موعدك الآن</h3>
            <p class="lead">صحتك النفسية هي أولويتنا. اختر القسم والطبيب وحدد موعداً يناسبك.</p>
        </div>

        <!-- Booking Section -->
        <div class="booking-container" id="bookingPage">
            <h2 class="section-title">حجز موعد</h2>

            <!-- Progress Indicator -->
            <div class="booking-progress">
                <div class="progress-step active" id="step1Indicator">
                    <div class="step-number">1</div>
                    <span class="step-title">المعلومات الشخصية</span>
                </div>
                <div class="progress-step" id="step2Indicator">
                    <div class="step-number">2</div>
                    <span class="step-title">اختيار الطبيب</span>
                </div>
                <div class="progress-step" id="step3Indicator">
                    <div class="step-number">3</div>
                    <span class="step-title">اختيار الوقت</span>
                </div>
                <div class="progress-step" id="step4Indicator">
                    <div class="step-number">4</div>
                    <span class="step-title">التأكيد</span>
                </div>
                <div class="progress-step" id="step5Indicator">
                    <div class="step-number">5</div>
                    <span class="step-title">الدفع</span>
                </div>
            </div>

            <!-- Step 1: Personal Information -->
            <div class="booking-step active" id="step1">
                <h4 class="mb-4">المعلومات الشخصية</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="bookingFullName" class="form-label">الاسم الكامل</label>
                        <input type="text" class="form-control" id="bookingFullName" name="bookingFullName" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingEmail" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="bookingEmail" name="bookingEmail" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingPhone" class="form-label">رقم الهاتف</label>
                        <input type="tel" class="form-control" id="bookingPhone" name="bookingPhone" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingNationalID" class="form-label">الهوية الوطنية</label>
                        <input type="text" class="form-control" id="bookingNationalID" name="bookingNationalID" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bookingAge" class="form-label">العمر</label>
                        <input type="number" class="form-control" id="bookingAge" name="bookingAge" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="bookingNotes" class="form-label">ملاحظات (اختياري)</label>
                        <textarea class="form-control" id="bookingNotes" name="bookingNotes" rows="3"></textarea>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <div></div>
                    <button type="button" class="btn btn-custom" onclick="nextStep(1)">التالي</button>
                </div>
            </div>

            <!-- Step 2: Department & Doctor -->
            <div class="booking-step" id="step2">
                <h4 class="mb-4">اختيار القسم والطبيب</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="form-label">اختر القسم</label>
                        <select class="form-select" id="department" name="department" required onchange="loadDoctors()">
                            <option value="">اختر القسم...</option>
                            <option value="psychology">علم النفس</option>
                            <option value="autism">اضطراب التوحد</option>
                            <option value="neurology">علم الأعصاب</option>
                            <option value="rehabilitation">التأهيل الطبي</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">اختر الطبيب</label>
                        <div id="doctorsContainer">
                            <p class="text-center text-muted py-4">الرجاء اختيار القسم لعرض الأطباء المتاحين</p>
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
                <h4 class="mb-4">اختيار الموعد</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="calendar-container">
                            <div class="calendar-navigation">
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(-1)">
                                    <i class="fas fa-chevron-right me-1"></i> الشهر السابق
                                </button>
                                <h5 id="currentMonth" class="mb-0">شهر 2023</h5>
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(1)">
                                    الشهر التالي <i class="fas fa-chevron-left ms-1"></i>
                                </button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Calendar generated via JS -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">المواعيد المتاحة</label>
                        <div class="time-slots" id="timeSlots">
                            <!-- Time slots generated via JS -->
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(3)">التالي</button>
                </div>
            </div>

            <!-- Step 4: Confirm Booking -->
            <div class="booking-step" id="step4">
                <h4 class="mb-4">تأكيد الحجز</h4>
                <div class="appointment-card">
                    <h5 class="mb-3">تفاصيل الموعد</h5>
                    <div class="appointment-detail">
                        <span class="detail-label">الاسم:</span>
                        <span id="confirmName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">البريد الإلكتروني:</span>
                        <span id="confirmEmail"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الهاتف:</span>
                        <span id="confirmPhone"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الهوية الوطنية:</span>
                        <span id="confirmNationalID"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">القسم:</span>
                        <span id="confirmDepartment"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الطبيب:</span>
                        <span id="confirmDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">التاريخ والوقت:</span>
                        <span id="confirmDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">رقم الحجز:</span>
                        <span id="confirmBookingId" class="booking-id-display"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الحالة:</span>
                        <span class="status-badge status-pending">بانتظار الدفع</span>
                    </div>
                </div>

                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                    <label class="form-check-label" for="termsAgreement">
                        أوافق على الشروط والأحكام
                    </label>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(4)">المتابعة للدفع</button>
                </div>
            </div>

            <!-- Step 5: Payment -->
            <div class="booking-step" id="step5">
                <h4 class="mb-4">إتمام الدفع</h4>

                <div class="appointment-card mb-4">
                    <h5 class="mb-3">معلومات الحجز</h5>
                    <div class="appointment-detail">
                        <span class="detail-label">رقم الحجز:</span>
                        <span id="paymentBookingId"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الاسم:</span>
                        <span id="paymentName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الطبيب:</span>
                        <span id="paymentDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">التاريخ والوقت:</span>
                        <span id="paymentDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">المبلغ المستحق:</span>
                        <span class="fw-bold text-success">150 ريال سعودي</span>
                    </div>
                </div>

                <h5 class="mb-3">اختر طريقة الدفع</h5>

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('credit-card')">
                            <i class="fas fa-credit-card"></i>
                            <h5>بطاقة ائتمان</h5>
                            <p>الدفع ببطاقة الائتمان</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('mada')">
                            <i class="fas fa-credit-card"></i>
                            <h5>مدى</h5>
                            <p>الدفع ببطاقة مدى</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('cash')">
                            <i class="fas fa-money-bill-wave"></i>
                            <h5>نقدي</h5>
                            <p>الدفع نقداً في العيادة</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('orange')">
                            <i class="fas fa-mobile-alt"></i>
                            <h5>أورانج ماني</h5>
                            <p>الدفع من خلال أورانج ماني</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option-large" onclick="selectPayment('bank-transfer')">
                            <i class="fas fa-building-columns"></i>
                            <h5>تحويل بنكي</h5>
                            <p>تحويل إلى حسابنا البنكي</p>
                        </div>
                    </div>
                </div>

                <!-- Credit Card Details -->
                <div class="payment-details" id="creditCardDetails">
                    <h5 class="mb-3">معلومات البطاقة</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cardNumber" class="form-label">رقم البطاقة</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="expiryDate" class="form-label">تاريخ الانتهاء</label>
                            <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cardHolder" class="form-label">اسم صاحب البطاقة</label>
                            <input type="text" class="form-control" id="cardHolder" placeholder="John Doe">
                        </div>
                    </div>
                </div>

                <!-- Mada Card Details -->
                <div class="payment-details" id="madaDetails">
                    <h5 class="mb-3">معلومات بطاقة مدى</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="madaCardNumber" class="form-label">رقم البطاقة</label>
                            <input type="text" class="form-control" id="madaCardNumber" placeholder="1234 5678 9012 3456">
                        </div>
                    </div>
                </div>

                <!-- Bank Transfer Details -->
                <div class="payment-details" id="bankTransferDetails">
                    <h5 class="mb-3">معلومات التحويل البنكي</h5>
                    <div class="appointment-card">
                        <div class="appointment-detail">
                            <span class="detail-label">اسم البنك:</span>
                            <span>البنك الأهلي السعودي</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label">اسم الحساب:</span>
                            <span>عيادة مسار الحياة</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label">رقم الحساب:</span>
                            <span>SA85 1000 0000 0000 0000 1234</span>
                        </div>
                        <div class="appointment-detail">
                            <span class="detail-label">IBAN:</span>
                            <span>SA94 1000 0000 0000 0000 1234 56</span>
                        </div>
                    </div>
                    <div class="upload-receipt mt-3" onclick="document.getElementById('receiptUpload').click()">
                        <i class="fas fa-upload"></i>
                        <h5>رفع إيصال التحويل</h5>
                        <p>انقر لرفع إيصال التحويل البنكي</p>
                        <input type="file" id="receiptUpload" class="d-none" accept="image/*">
                    </div>
                </div>

                <!-- Orange Money Details -->
                <div class="payment-details" id="orangeDetails">
                    <h5 class="mb-3">الدفع عبر أورانج ماني</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="orangeNumber" class="form-label">رقم أورانج ماني</label>
                            <input type="text" class="form-control" id="orangeNumber" placeholder="07X XXX XXXX">
                        </div>
                    </div>
                </div>

                <!-- Cash Payment Details -->
                <div class="payment-details" id="cashDetails">
                    <h5 class="mb-3">الدفع نقداً</h5>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        لقد اخترت الدفع نقداً. يرجى إحضار المبلغ المطلوب (150 ريال سعودي) إلى موعدك.
                    </div>
                </div>

                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="paymentAgreement" required>
                    <label class="form-check-label" for="paymentAgreement">
                        أوافق على خصم المبلغ من بطاقتي البنكية
                    </label>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(5)">السابق</button>
                    <button type="button" class="btn btn-success" id="completePayment">إتمام الدفع</button>
                </div>
            </div>
        </div>

        <!-- Success Page (hidden initially) -->
        <div class="booking-container mt-4" id="successPage" style="display: none;">
            <div class="payment-success">
                <i class="fas fa-check-circle"></i>
                <h3 class="text-success">تم الدفع بنجاح!</h3>
                <p class="lead">تم تأكيد موعدك بنجاح</p>

                <div class="appointment-card mt-4 mx-auto" style="max-width: 500px;">
                    <h5 class="mb-3">تفاصيل الحجز</h5>
                    <div class="appointment-detail">
                        <span class="detail-label">رقم الحجز:</span>
                        <span id="successBookingId"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الاسم:</span>
                        <span id="successName"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">الطبيب:</span>
                        <span id="successDoctor"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">التاريخ والوقت:</span>
                        <span id="successDateTime"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">حالة الدفع:</span>
                        <span class="badge bg-success">مكتمل</span>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-primary me-2" onclick="printBooking()">طباعة التفاصيل</button>
                    <button type="button" class="btn btn-outline-primary" onclick="newBooking()">حجز جديد</button>
                </div>
            </div>
        </div>

        <!-- Previous Bookings -->
        <div class="booking-container">
            <h4 class="section-title">الحجوزات السابقة</h4>
            <div class="table-responsive">
                <table class="bookings-table">
                    <thead>
                        <tr>
                            <th>رقم الحجز</th>
                            <th>الطبيب</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="bookingsTableBody">
                        <!-- Filled via JavaScript -->
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
                    <h5 class="modal-title" id="profileModalLabel">ملفك الشخصي</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="profile-img-container text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=نورهان+أحمد&background=2563eb&color=fff" class="profile-img" id="modalProfileImg">
                        <div class="mt-3">
                            <input type="file" id="profilePhotoInput" class="d-none" accept="image/*">
                            <button class="btn btn-outline-primary" onclick="document.getElementById('profilePhotoInput').click()">
                                <i class="fas fa-camera me-2"></i>تغيير الصورة
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-pills nav-pills-custom mb-4 justify-content-center" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="pill" data-bs-target="#info" type="button" role="tab">
                                <i class="fas fa-user me-2"></i>المعلومات الشخصية
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="appointments-tab" data-bs-toggle="pill" data-bs-target="#appointments" type="button" role="tab">
                                <i class="fas fa-calendar-days me-2"></i>المواعيد
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="health-tab" data-bs-toggle="pill" data-bs-target="#health" type="button" role="tab">
                                <i class="fas fa-heart-pulse me-2"></i>البيانات الصحية
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Personal Info Tab -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <form id="profileForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">الاسم الكامل</label>
                                        <input type="text" class="form-control" id="fullName" value="نورهان أحمد" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="email" value="norhan@example.com" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="phone" value="+966512345678">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">تاريخ الميلاد</label>
                                        <input type="date" class="form-control" id="dob" value="1990-01-01">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">العنوان</label>
                                        <textarea class="form-control" id="address" rows="2">الرياض، السعودية</textarea>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-custom">
                                        <i class="fas fa-save me-2"></i>حفظ التغييرات
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Appointments Tab -->
                        <div class="tab-pane fade" id="appointments" role="tabpanel">
                            <h5 class="mb-3">مواعيدك</h5>
                            <div class="table-responsive">
                                <table class="table table-striped align-middle text-center">
                                    <thead>
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>الوقت</th>
                                            <th>الطبيب</th>
                                            <th>النوع</th>
                                            <th>الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2025-09-03</td>
                                            <td>10:00 صباحاً</td>
                                            <td>د. سارة يوسف</td>
                                            <td>في العيادة</td>
                                            <td><span class="badge bg-success">مؤكد</span></td>
                                        </tr>
                                        <tr>
                                            <td>2025-09-10</td>
                                            <td>2:00 مساءً</td>
                                            <td>د. أحمد علي</td>
                                            <td>أونلاين</td>
                                            <td><span class="badge bg-warning text-dark">قيد الانتظار</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Health Data Tab -->
                        <div class="tab-pane fade" id="health" role="tabpanel">
                            <div class="mb-4">
                                <h6>خطة العلاج</h6>
                                <p class="text-muted">العلاج السلوكي المعرفي (CBT) - جلسات أسبوعية</p>
                            </div>
                            <div class="mb-4">
                                <h6>الأدوية</h6>
                                <p class="text-muted">سيرترالين 50 مجم - مرة يومياً</p>
                            </div>
                            <div class="mb-4">
                                <h6>آخر زيارة</h6>
                                <p class="text-muted">28 أغسطس 2025 - د. سارة يوسف</p>
                            </div>
                            <div class="mb-4">
                                <h6>التشخيص</h6>
                                <p class="text-muted">قلق عام، نوبات هلع متوسطة</p>
                            </div>
                            <div class="mb-4">
                                <h6>التقدم</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <h5>عيادة مسار الحياة</h5>
                    <p>&copy; 2025 عيادة مسار الحياة. جميع الحقوق محفوظة.</p>
                    <p><strong>العنوان:</strong> الرياض، السعودية</p>
                    <p><strong>الهاتف:</strong> +966 12 345 6789</p>
                    <p><strong>البريد الإلكتروني:</strong> <a href="mailto:info@lifepathclinic.com">info@lifepathclinic.com</a></p>
                    <p><strong>ساعات العمل:</strong> الأحد - الخميس: 8 صباحاً - 6 مساءً | الجمعة: 9 صباحاً - 3 مساءً</p>
                    <p>
                        <a href="#"><i class="fab fa-facebook me-2"></i></a>
                        <a href="#"><i class="fab fa-twitter me-2"></i></a>
                        <a href="#"><i class="fab fa-instagram me-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin me-2"></i></a>
                    </p>
                </div>

                <!-- Middle Side: Quick Links -->
                <div class="col-md-2 text-md-start mb-4 mb-md-0">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">أطباؤنا</a></li>
                        <li><a href="#">الخدمات</a></li>
                        <li><a href="#">حجز موعد</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>

                <!-- Right Side: Map -->
                <div class="col-md-6 text-md-end">
                    <h5>موقعنا</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.9512418072525!2d46.67238227599624!3d24.84406354800035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3e8a92f7f61%3A0x6745cf0c55434152!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1694475910594!5m2!1sen!2sus"
                        width="100%" height="250" style="border:0; border-radius:10px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Bottom Row: Newsletter -->
            <div class="row mt-4">
                <div class="col-md-6 text-md-start mb-3 mb-md-0">
                    <h5 class="mb-2">اشترك في نشرتنا الإخبارية</h5>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="بريدك الإلكتروني" required>
                        <button type="submit" class="btn btn-primary">اشتراك</button>
                    </form>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">صمم بواسطة <a href="#">فريق مسار الحياة</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="booking.js"></script>
</body>

</html>