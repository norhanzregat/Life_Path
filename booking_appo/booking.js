// بيانات الأطباء حسب القسم
const doctorsByDepartment = {
    psychology: [
        { id: 1, name: "د. سارة يوسف", specialty: "أخصائية العلاج النفسي", image: "../assets/images/doc1.jpeg", availableSlots: ["09:00", "10:00", "11:00", "14:00", "15:00"] },
        { id: 2, name: "د. أحمد علي", specialty: "استشاري الصحة النفسية", image: "../assets/images/doc3.jpeg", availableSlots: ["10:00", "11:00", "12:00", "16:00", "17:00"] }
    ],
    autism: [
        { id: 3, name: "د. ليلى حسن", specialty: "أخصائية اضطراب التوحد", image: "../assets/images/doc3.jpeg", availableSlots: ["08:00", "09:00", "10:30", "14:00", "15:30"] },
        { id: 4, name: "د. محمد السعدي", specialty: "التوحد وتطور الطفل", image: "../assets/images/doc4.jpeg", availableSlots: ["09:30", "11:00", "13:00", "14:30", "16:00"] }
    ],
    neurology: [
        { id: 5, name: "د. خالد الرحمن", specialty: "استشاري علم الأعصاب", image: "../assets/images/doc3.jpeg", availableSlots: ["08:30", "10:00", "11:30", "15:00", "16:30"] },
        { id: 6, name: "د. منى عبدالله", specialty: "أخصائية علم الأعصاب", image: "../assets/images/doc4.jpeg", availableSlots: ["09:00", "10:30", "12:00", "14:00", "15:30"] }
    ],
    rehabilitation: [
        { id: 7, name: "د. فهد الشمري", specialty: "أخصائي التأهيل الطبي", image: "https://via.placeholder.com/80", availableSlots: ["08:00", "09:30", "11:00", "13:30", "15:00"] },
        { id: 8, name: "د. نورة القحطاني", specialty: "استشارية العلاج الطبيعي", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:00", "11:00", "14:00", "16:00"] }
    ]
};

// متغيرات للحالة الحالية
let currentStep = 1;
let selectedDepartment = '';
let selectedDoctor = null;
let selectedDate = '';
let selectedTime = '';
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let selectedPaymentMethod = '';
let currentBooking = null;

// Global variables to store booking data
let bookingData = {
    full_name: '',
    email: '',
    phone: '',
    national_id: '',
    age: '',
    notes: '',
    department: '',
    doctor: '',
    appointment_date: '',
    appointment_time: '',
    payment_method: ''
};

// تهيئة الصفحة
document.addEventListener('DOMContentLoaded', function() {
    generateCalendar(currentMonth, currentYear);
    
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
                showNotification('تم تحديث صورة الملف الشخصي بنجاح!');
            };
            reader.readAsDataURL(file);
        }
    });
    
    // حفظ التغييرات في الملف الشخصي
    document.getElementById('profileForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // محاكاة حفظ البيانات
        setTimeout(function() {
            showNotification('تم حفظ معلومات الملف الشخصي بنجاح!');
            
            // تحديث الاسم في الصفحة الرئيسية
            const fullName = document.getElementById('fullName').value;
            document.querySelector('.hero h2').textContent = `مرحباً ${fullName.split(' ')[0]}!`;
            document.querySelector('.profile-link span:last-child').textContent = fullName.split(' ')[0];
        }, 500);
    });
    
    // تأكيد الحجز والانتقال للدفع
    document.getElementById('completePayment').addEventListener('click', function() {
        if (selectedPaymentMethod === 'credit-card' || selectedPaymentMethod === 'mada') {
            if (!document.getElementById('paymentAgreement').checked) {
                alert('يرجى الموافقة على خصم المبلغ من بطاقتك البنكية');
                return;
            }
        }
        
        if (!selectedPaymentMethod) {
            alert('يرجى اختيار طريقة الدفع أولاً');
            return;
        }
        
        // إذا كان الدفع ببطاقة، تحقق من التفاصيل
        if (selectedPaymentMethod === 'credit-card') {
            const cardNumber = document.getElementById('cardNumber').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;
            const cardHolder = document.getElementById('cardHolder').value;
            
            if (!cardNumber || !expiryDate || !cvv || !cardHolder) {
                alert('يرجى ملء جميع تفاصيل البطاقة');
                return;
            }
        } else if (selectedPaymentMethod === 'mada') {
            const madaCardNumber = document.getElementById('madaCardNumber').value;
            if (!madaCardNumber) {
                alert('يرجى إدخال رقم بطاقة مدى');
                return;
            }
        } else if (selectedPaymentMethod === 'orange') {
            const orangeNumber = document.getElementById('orangeNumber').value;
            if (!orangeNumber) {
                alert('يرجى إدخال رقم أورانج ماني');
                return;
            }
        }
        
        // إرسال بيانات الحجز إلى الخادم
        const formData = new FormData();
        for (const key in bookingData) {
            formData.append(key, bookingData[key]);
        }
        formData.append('payment_method', selectedPaymentMethod);
        
        // إرسال طلب AJAX
        fetch('process_booking.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // إرسال رسالة تأكيد
                sendConfirmationSMS();
                
                // الانتقال إلى صفحة النجاح
                showSuccessPage(data.booking_id);
            } else {
                alert('حدث خطأ أثناء معالجة الحجز: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء الاتصال بالخادم');
        });
    });
});

// توليد رقم حجز فريد
function generateBookingId() {
    const now = new Date();
    const year = now.getFullYear().toString().substr(-2);
    const month = (now.getMonth() + 1).toString().padStart(2, '0');
    const day = now.getDate().toString().padStart(2, '0');
    
    let departmentPrefix = 'GN';
    
    if (selectedDepartment === 'psychology') departmentPrefix = 'PSY';
    else if (selectedDepartment === 'autism') departmentPrefix = 'AUT';
    else if (selectedDepartment === 'neurology') departmentPrefix = 'NEU';
    else if (selectedDepartment === 'rehabilitation') departmentPrefix = 'REH';
    
    return `${departmentPrefix}${year}${month}${day}${Math.floor(Math.random() * 10000).toString().padStart(4, '0')}`;
}

// تحميل الأطباء حسب القسم
function loadDoctors() {
    const department = document.getElementById('department').value;
    selectedDepartment = department;
    const doctorsContainer = document.getElementById('doctorsContainer');
    
    if (!department) {
        doctorsContainer.innerHTML = '<p class="text-center text-muted py-4">الرجاء اختيار القسم لعرض الأطباء المتاحين</p>';
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
            
            // تخزين بيانات الطبيب في bookingData
            bookingData.doctor = selectedDoctor.name;
            bookingData.department = department;
        });
    });
}

// توليد التقويم
function generateCalendar(month, year) {
    const calendarGrid = document.getElementById('calendarGrid');
    const monthNames = ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
                       "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"];
    
    document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
    
    // أول يوم من الشهر
    const firstDay = new Date(year, month, 1).getDay();
    // عدد أيام الشهر
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    
    // تهيئة التقويم
    calendarGrid.innerHTML = '';
    
    // إضافة أيام الأسبوع
    const daysOfWeek = ['أحد', 'إثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'];
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
    
    // تخزين التاريخ في bookingData
    bookingData.appointment_date = selectedDate;
    
    // عرض المواعيد المتاحة
    showAvailableTimeSlots();
}

// عرض المواعيد المتاحة
function showAvailableTimeSlots() {
    if (!selectedDoctor) {
        alert('يرجى اختيار الطبيب أولاً');
        return;
    }
    
    const timeSlotsContainer = document.getElementById('timeSlots');
    let html = '';
    
    selectedDoctor.availableSlots.forEach(slot => {
        html += `
            <div class="time-slot" data-time="${slot}">
                ${slot}
            </div>
        `;
    });
    
    timeSlotsContainer.innerHTML = html;
    
    // إضافة مستمعي الأحداث للمواعيد المتاحة
    document.querySelectorAll('.time-slot').forEach(slot => {
        slot.addEventListener('click', function() {
            document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
            this.classList.add('selected');
            selectedTime = this.getAttribute('data-time');
            
            // تخزين الوقت في bookingData
            bookingData.appointment_time = selectedTime;
        });
    });
}

// الخطوة التالية
function nextStep(step) {
    // التحقق من صحة البيانات قبل الانتقال
    if (step === 1 && !validateStep1()) {
        alert('يرجى ملء جميع الحقول المطلوبة في المعلومات الشخصية');
        return;
    }
    
    if (step === 2 && !validateStep2()) {
        alert('يرجى اختيار القسم والطبيب');
        return;
    }
    
    if (step === 3 && !validateStep3()) {
        alert('يرجى اختيار التاريخ والوقت');
        return;
    }
    
    if (step === 4 && !validateStep4()) {
        alert('يرجى الموافقة على الشروط والأحكام');
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
    
    // إذا كانت الخطوة 4 (الانتقال إلى الدفع)، تعبئة بيانات الدفع
    if (step === 4) {
        fillPaymentData();
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
    
    if (!fullName || !email || !phone || !nationalId || !age) {
        return false;
    }
    
    // تخزين البيانات في bookingData
    bookingData.full_name = fullName;
    bookingData.email = email;
    bookingData.phone = phone;
    bookingData.national_id = nationalId;
    bookingData.age = age;
    bookingData.notes = document.getElementById('bookingNotes').value;
    
    return true;
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
    document.getElementById('confirmName').textContent = bookingData.full_name;
    document.getElementById('confirmEmail').textContent = bookingData.email;
    document.getElementById('confirmPhone').textContent = bookingData.phone;
    document.getElementById('confirmNationalID').textContent = bookingData.national_id;
    
    const departmentSelect = document.getElementById('department');
    const departmentText = departmentSelect.options[departmentSelect.selectedIndex].text;
    document.getElementById('confirmDepartment').textContent = departmentText;
    
    document.getElementById('confirmDoctor').textContent = selectedDoctor.name;
    
    const dateObj = new Date(selectedDate);
    const formattedDate = dateObj.toLocaleDateString('ar-SA', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    document.getElementById('confirmDateTime').textContent = `${formattedDate} - ${selectedTime}`;
    
    // عرض رقم الحجز المولد
    const bookingId = generateBookingId();
    document.getElementById('confirmBookingId').textContent = bookingId;
}

// تعبئة بيانات الدفع
function fillPaymentData() {
    document.getElementById('paymentBookingId').textContent = document.getElementById('confirmBookingId').textContent;
    document.getElementById('paymentName').textContent = bookingData.full_name;
    document.getElementById('paymentDoctor').textContent = selectedDoctor.name;
    
    const dateObj = new Date(selectedDate);
    const formattedDate = dateObj.toLocaleDateString('ar-SA', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    document.getElementById('paymentDateTime').textContent = `${formattedDate} - ${selectedTime}`;
}

// اختيار طريقة الدفع
function selectPayment(method) {
    selectedPaymentMethod = method;
    
    // إلغاء تحديد جميع الخيارات
    document.querySelectorAll('.payment-option-large').forEach(option => {
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
    } else if (method === 'bank-transfer') {
        document.getElementById('bankTransferDetails').style.display = 'block';
    } else if (method === 'orange') {
        document.getElementById('orangeDetails').style.display = 'block';
    } else if (method === 'cash') {
        document.getElementById('cashDetails').style.display = 'block';
    }
    
    // تخزين طريقة الدفع في bookingData
    bookingData.payment_method = method;
}

// عرض صفحة النجاح
function showSuccessPage(bookingId) {
    document.getElementById('bookingPage').style.display = 'none';
    document.getElementById('successPage').style.display = 'block';
    
    // تعبئة بيانات النجاح
    document.getElementById('successBookingId').textContent = bookingId;
    document.getElementById('successName').textContent = bookingData.full_name;
    document.getElementById('successDoctor').textContent = selectedDoctor.name;
    
    const dateObj = new Date(selectedDate);
    const formattedDate = dateObj.toLocaleDateString('ar-SA', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    document.getElementById('successDateTime').textContent = `${formattedDate} - ${selectedTime}`;
    
    // تحديث جدول الحجوزات
    updateBookingsTable();
}

// إرسال رسالة تأكيد
function sendConfirmationSMS() {
    // محاكاة إرسال رسالة SMS
    const phone = document.getElementById('bookingPhone').value;
    const message = `تم تأكيد موعدك مع ${selectedDoctor.name} في ${selectedDate} الساعة ${selectedTime}. رقم الحجز: ${document.getElementById('confirmBookingId').textContent}`;
    
    console.log(`Sending SMS to ${phone}: ${message}`);
    showNotification('تم إرسال رسالة التأكيد إلى هاتفك');
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
    // جلب الحجوزات من الخادم
    fetch('get_bookings.php')
    .then(response => response.json())
    .then(bookings => {
        const tableBody = document.getElementById('bookingsTableBody');
        let html = '';
        
        if (bookings.length === 0) {
            html = '<tr><td colspan="6" class="text-center py-4">لا توجد حجوزات سابقة</td></tr>';
        } else {
            bookings.forEach(booking => {
                let statusClass = '';
                let statusText = '';
                
                if (booking.status === 'pending') {
                    statusClass = 'status-pending';
                    statusText = 'قيد الانتظار';
                } else if (booking.status === 'confirmed') {
                    statusClass = 'status-confirmed';
                    statusText = 'مؤكد';
                } else if (booking.status === 'completed') {
                    statusClass = 'status-completed';
                    statusText = 'مكتمل';
                } else if (booking.status === 'cancelled') {
                    statusClass = 'status-cancelled';
                    statusText = 'ملغى';
                }
                
                html += `
                    <tr>
                        <td>${booking.booking_id}</td>
                        <td>${booking.doctor}</td>
                        <td>${booking.appointment_date}</td>
                        <td>${booking.appointment_time}</td>
                        <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" onclick="showBookingDetails('${booking.booking_id}')">تفاصيل</button>
                            ${booking.status === 'pending' ? `<button class="btn btn-sm btn-outline-danger" onclick="cancelBooking('${booking.booking_id}')">إلغاء</button>` : ''}
                        </td>
                    </tr>
                `;
            });
        }
        
        tableBody.innerHTML = html;
    })
    .catch(error => {
        console.error('Error fetching bookings:', error);
    });
}

// عرض تفاصيل الحجز
function showBookingDetails(bookingId) {
    // جلب تفاصيل الحجز من الخادم
    fetch(`get_booking_details.php?booking_id=${bookingId}`)
    .then(response => response.json())
    .then(booking => {
        if (booking) {
            Swal.fire({
                title: 'تفاصيل الحجز',
                html: `
                    <div style="text-align:right;direction:rtl;">
                        <p><b>رقم الحجز:</b> ${booking.booking_id}</p>
                        <p><b>الاسم:</b> ${booking.full_name}</p>
                        <p><b>البريد الإلكتروني:</b> ${booking.email}</p>
                        <p><b>الهاتف:</b> ${booking.phone}</p>
                        <p><b>الطبيب:</b> ${booking.doctor}</p>
                        <p><b>التاريخ:</b> ${booking.appointment_date}</p>
                        <p><b>الوقت:</b> ${booking.appointment_time}</p>
                        <p><b>الحالة:</b> ${booking.status}</p>
                        <p><b>حالة الدفع:</b> ${booking.payment_status}</p>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'إغلاق',
                confirmButtonColor: '#3085d6'
            });
        }
    })
    .catch(error => {
        console.error('Error fetching booking details:', error);
    });
}

// إلغاء الحجز
function cancelBooking(bookingId) {
    if (confirm('هل أنت متأكد من إلغاء هذا الحجز؟')) {
        // إرسال طلب إلغاء إلى الخادم
        fetch('cancel_booking.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ booking_id: bookingId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showNotification('تم إلغاء الحجز');
                updateBookingsTable();
            } else {
                alert('حدث خطأ أثناء إلغاء الحجز: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء الاتصال بالخادم');
        });
    }
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
    document.querySelectorAll('.payment-option-large').forEach(option => {
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
    
    // إعادة تعيين bookingData
    bookingData = {
        full_name: '',
        email: '',
        phone: '',
        national_id: '',
        age: '',
        notes: '',
        department: '',
        doctor: '',
        appointment_date: '',
        appointment_time: '',
        payment_method: ''
    };
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

// نظام الترجمة بين العربية والإنجليزية
function setLanguage(lang) {
    const langText = document.getElementById('currentLanguage');
    const langBtn = document.querySelector('.language-btn');

    if (lang === 'ar') {
        langText.textContent = 'العربية';
        langBtn.innerHTML = '<i class="fas fa-language me-1"></i> العربية';
        document.documentElement.dir = 'rtl';
        document.documentElement.lang = 'ar';
        translateToArabic();
    } else if (lang === 'en') {
        langText.textContent = 'English';
        langBtn.innerHTML = '<i class="fas fa-language me-1"></i> English';
        document.documentElement.dir = 'ltr';
        document.documentElement.lang = 'en';
        translateToEnglish();
    }

    // إغلاق القائمة المنسدلة
    document.getElementById('languageDropdown').classList.remove('show');
}

// وظائف الترجمة (مثال مبسط)
function translateToArabic() {
    document.querySelector('title').textContent = 'Life Path Clinic - نظام الحجوزات';
    document.querySelector('.hero h2').textContent = 'مرحباً نورهان';
    document.querySelector('.hero h3').textContent = 'ابدأ بحجز موعدك الآن';
    document.querySelector('.hero p').textContent = 'صحتك النفسية هي أولويتنا. اختر القسم والطبيب وحدد موعداً يناسبك.';
    // يمكن إضافة المزيد من الترجمة هنا لكل العناصر
}

function translateToEnglish() {
    document.querySelector('title').textContent = 'Life Path Clinic - Booking System';
    document.querySelector('.hero h2').textContent = 'Welcome Norhan';
    document.querySelector('.hero h3').textContent = 'Start booking your appointment now';
    document.querySelector('.hero p').textContent = 'Your mental health is our priority. Choose the department and doctor and schedule an appointment that suits you.';
    // يمكن إضافة المزيد من الترجمة هنا لكل العناصر
}

// إعداد مستمعي الأحداث للترجمة
document.getElementById('languageButton').addEventListener('click', function() {
    document.getElementById('languageDropdown').classList.toggle('show');
});

document.querySelectorAll('.language-option').forEach(option => {
    option.addEventListener('click', function() {
        const lang = this.getAttribute('data-lang');
        setLanguage(lang);
    });
});

// إغلاق منتقي اللغة عند النقر خارجها
window.addEventListener('click', function(e) {
    const dropdown = document.getElementById('languageDropdown');
    const selector = document.querySelector('.language-selector');

    if (!selector.contains(e.target) && dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
    }
});

// تحديث جدول الحجوزات عند تحميل الصفحة
updateBookingsTable();