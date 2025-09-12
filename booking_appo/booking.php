<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام حجز المواعيد الطبية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style_booking.css">

</head>
<body>
    <div class="container py-4">
        <div class="booking-container">
            <div class="booking-header">
                <h2><i class="fa-solid fa-calendar-check me-2"></i>حجز المواعيد الطبية</h2>
                <p class="text-muted">اختر القسم والطبيب وحدد الموعد المناسب لك</p>
            </div>
            
            <!-- مؤشر التقدم -->
            <div class="booking-progress mb-5">
                <div class="progress-step active" id="step1Indicator">
                    <div class="step-number">1</div>
                    <span class="step-title">المعلومات الشخصية</span>
                </div>
                <div class="progress-step" id="step2Indicator">
                    <div class="step-number">2</div>
                    <span class="step-title">اختيار القسم والطبيب</span>
                </div>
                <div class="progress-step" id="step3Indicator">
                    <div class="step-number">3</div>
                    <span class="step-title">تحديد الموعد</span>
                </div>
                <div class="progress-step" id="step4Indicator">
                    <div class="step-number">4</div>
                    <span class="step-title">تأكيد الحجز</span>
                </div>
            </div>

            <!-- الخطوة 1: المعلومات الشخصية -->
            <div class="booking-step active" id="step1">
                <h4 class="section-title">المعلومات الشخصية</h4>
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
                        <label for="bookingNationalID" class="form-label">رقم الهوية الوطنية</label>
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

            <!-- الخطوة 2: اختيار القسم والطبيب -->
            <div class="booking-step" id="step2">
                <h4 class="section-title">اختيار القسم والطبيب</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="form-label">اختر القسم</label>
                        <select class="form-select" id="department" name="department" required onchange="loadDoctors()">
                            <option value="">اختر القسم...</option>
                            <option value="psychology">قسم العلاج النفسي</option>
                            <option value="autism">قسم اضطراب التوحد</option>
                            <option value="neurology">قسم الأمراض العصبية</option>
                            <option value="rehabilitation">قسم التأهيل الطبي</option>
                        </select>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label">اختر الطبيب</label>
                        <div id="doctorsContainer">
                            <p class="text-center text-muted py-4">يرجى اختيار القسم أولاً لعرض الأطباء المتاحين</p>
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(2)">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(2)">التالي</button>
                </div>
            </div>

            <!-- الخطوة 3: تحديد الموعد -->
            <div class="booking-step" id="step3">
                <h4 class="section-title">تحديد الموعد</h4>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="calendar-container">
                            <div class="calendar-navigation">
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(-1)">
                                    <i class="fa-solid fa-chevron-right"></i> الشهر السابق
                                </button>
                                <h5 id="currentMonth">شهر 2023</h5>
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeMonth(1)">
                                    الشهر التالي <i class="fa-solid fa-chevron-left"></i>
                                </button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- سيتم ملء التقويم عبر JavaScript -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label">المواعيد المتاحة</label>
                        <div class="time-slots" id="timeSlots">
                            <!-- سيتم ملء المواعيد عبر JavaScript -->
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)">السابق</button>
                    <button type="button" class="btn btn-custom" onclick="nextStep(3)">التالي</button>
                </div>
            </div>

            <!-- الخطوة 4: تأكيد الحجز -->
            <div class="booking-step" id="step4">
                <h4 class="section-title">تأكيد الحجز</h4>
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
                        <span class="detail-label">رقم الهاتف:</span>
                        <span id="confirmPhone"></span>
                    </div>
                    <div class="appointment-detail">
                        <span class="detail-label">رقم الهوية:</span>
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
                </div>
                
                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                    <label class="form-check-label" for="termsAgreement">
                        أوافق على الشروط والأحكام
                    </label>
                </div>
                
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)">السابق</button>
                    <button type="button" class="btn btn-success" id="confirmBooking">تأكيد الحجز</button>
                </div>
            </div>
        </div>
        
        <!-- جدول الحجوزات -->
        <div class="booking-container mt-4">
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
                        <!-- سيتم ملء الحجوزات عبر JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="booking.js"></script>
</body>
</html>