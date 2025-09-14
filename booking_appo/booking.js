
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
                if (selectedPaymentMethod === 'credit-card' || selectedPaymentMethod === 'mada') {
                    if (!document.getElementById('paymentAgreement').checked) {
                        alert('Please agree to authorize deduction from your bank card');
                        return;
                    }
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
                } else if (selectedPaymentMethod === 'orange') {
                    const orangeNumber = document.getElementById('orangeNumber').value;
                    if (!orangeNumber) {
                        alert('Please fill Orange Money number');
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
                                <button class="btn btn-sm btn-outline-primary" onclick="showBookingDetails('${booking.id}')">Details</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="cancelBooking('${booking.id}')">Cancel</button>
                            </td>
                        </tr>
                    `;
                });
            }
            
            tableBody.innerHTML = html;
        }
        
        // عرض تفاصيل الحجز
        function showBookingDetails(bookingId) {
            const booking = bookings.find(b => b.id === bookingId);
            if (booking) {
                alert(`Booking Details:\n
ID: ${booking.id}
Name: ${booking.name}
Email: ${booking.email}
Phone: ${booking.phone}
Doctor: ${booking.doctor}
Date: ${booking.date}
Time: ${booking.time}
Status: ${booking.status}
Payment: ${booking.paymentStatus}`);
            }
        }
        
        // إلغاء الحجز
        function cancelBooking(bookingId) {
            if (confirm('Are you sure you want to cancel this booking?')) {
                bookings = bookings.filter(b => b.id !== bookingId);
                localStorage.setItem('bookings', JSON.stringify(bookings));
                updateBookingsTable();
                showNotification('Booking has been cancelled');
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
 