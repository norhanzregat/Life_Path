  
        // بيانات الأطباء حسب الأقسام
        const doctorsByDepartment = {
            psychology: [
                { id: 1, name: "د. سارة أحمد", specialty: "أخصائية العلاج النفسي", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:00", "11:00", "14:00", "15:00"] },
                { id: 2, name: "د. محمد الخالد", specialty: "استشاري الصحة النفسية", image: "https://via.placeholder.com/80", availableSlots: ["10:00", "11:00", "12:00", "16:00", "17:00"] }
            ],
            autism: [
                { id: 3, name: "د. لينا عبدالله", specialty: "أخصائية اضطراب التوحد", image: "https://via.placeholder.com/80", availableSlots: ["08:00", "09:00", "10:30", "14:00", "15:30"] },
                { id: 4, name: "د. أحمد السعد", specialty: "استشاري التوحد وتطور الأطفال", image: "https://via.placeholder.com/80", availableSlots: ["09:30", "11:00", "13:00", "14:30", "16:00"] }
            ],
            neurology: [
                { id: 5, name: "د. خالد العمري", specialty: "استشاري الأمراض العصبية", image: "https://via.placeholder.com/80", availableSlots: ["08:30", "10:00", "11:30", "15:00", "16:30"] },
                { id: 6, name: "د. نورا السليمان", specialty: "أخصائية الأعصاب", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:30", "12:00", "14:00", "15:30"] }
            ],
            rehabilitation: [
                { id: 7, name: "د. فهد الرشيد", specialty: "أخصائي التأهيل الطبي", image: "https://via.placeholder.com/80", availableSlots: ["08:00", "09:30", "11:00", "13:30", "15:00"] },
                { id: 8, name: "د. منى العتيبي", specialty: "استشارية العلاج الطبيعي", image: "https://via.placeholder.com/80", availableSlots: ["09:00", "10:00", "11:00", "14:00", "16:00"] }
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
        
        // تهيئة الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            generateCalendar(currentMonth, currentYear);
            updateBookingsTable();
            
            // تأكيد الحجز
            document.getElementById('confirmBooking').addEventListener('click', function() {
                if (!document.getElementById('termsAgreement').checked) {
                    alert('يرجى الموافقة على الشروط والأحكام أولاً');
                    return;
                }
                
                // إنشاء الحجز
                const booking = {
                    id: generateBookingId(),
                    name: document.getElementById('bookingFullName').value,
                    email: document.getElementById('bookingEmail').value,
                    phone: document.getElementById('bookingPhone').value,
                    nationalId: document.getElementById('bookingNationalID').value,
                    department: document.getElementById('department').value,
                    doctor: selectedDoctor.name,
                    date: selectedDate,
                    time: selectedTime,
                    status: 'pending',
                    timestamp: new Date()
                };
                
                // إضافة الحجز إلى القائمة
                bookings.push(booking);
                
                // حفظ في localStorage
                localStorage.setItem('bookings', JSON.stringify(bookings));
                
                // تحديث الجدول
                updateBookingsTable();
                
                // عرض رسالة النجاح
                alert('تم حجز الموعد بنجاح! رقم الحجز: ' + booking.id);
                
                // إعادة تعيين النموذج
                resetForm();
            });
        });
        
        // توليد معرف فريد للحجز
        function generateBookingId() {
            return 'BK' + Date.now().toString().substr(-6);
        }
        
        // تحميل الأطباء حسب القسم
        function loadDoctors() {
            const department = document.getElementById('department').value;
            selectedDepartment = department;
            const doctorsContainer = document.getElementById('doctorsContainer');
            
            if (!department) {
                doctorsContainer.innerHTML = '<p class="text-center text-muted py-4">يرجى اختيار القسم أولاً لعرض الأطباء المتاحين</p>';
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
            const daysOfWeek = ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'];
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
                alert('يرجى اختيار الطبيب أولاً');
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
            
            // تحديث مؤشر التقدم
            document.getElementById(`step${step}Indicator`).classList.remove('active');
            document.getElementById(`step${step}Indicator`).classList.add('completed');
            document.getElementById(`step${step + 1}Indicator`).classList.add('active');
            
            // إخفاء الخطوة الحالية وإظهار التالية
            document.getElementById(`step${step}`).classList.remove('active');
            document.getElementById(`step${step + 1}`).classList.add('active');
            
            currentStep = step + 1;
            
            // إذا كانت الخطوة الأخيرة، تعبئة بيانات التأكيد
            if (step === 3) {
                fillConfirmationData();
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
            const formattedDate = dateObj.toLocaleDateString('ar-SA', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            document.getElementById('confirmDateTime').textContent = `${formattedDate} - ${selectedTime}`;
        }
        
        // تحديث جدول الحجوزات
        function updateBookingsTable() {
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
                        statusText = 'تم التأكيد';
                    } else if (booking.status === 'completed') {
                        statusClass = 'status-completed';
                        statusText = 'مكتمل';
                    }
                    
                    html += `
                        <tr>
                            <td>${booking.id}</td>
                            <td>${booking.doctor}</td>
                            <td>${booking.date}</td>
                            <td>${booking.time}</td>
                            <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">تفاصيل</button>
                                <button class="btn btn-sm btn-outline-danger">إلغاء</button>
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
            
            selectedDepartment = '';
            selectedDoctor = null;
            selectedDate = '';
            selectedTime = '';
            
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
