// Life Path Admin Dashboard JavaScript

// Global Variables
let currentLanguage = 'ar';
let sidebarCollapsed = false;

// Initialize Dashboard
document.addEventListener('DOMContentLoaded', function() {
    initializeLanguage();
    initializeSidebar();
    initializeCharts();
    initializeEventListeners();
    initializeTooltips();
    setCurrentDate();
});

// Language Management
function initializeLanguage() {
    const savedLang = localStorage.getItem('lifepath_language') || 'ar';
    switchLanguage(savedLang);
}

function switchLanguage(lang) {
    currentLanguage = lang;
    localStorage.setItem('lifepath_language', lang);
    
    // Update HTML attributes
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
    
    // Update all text elements
    const elements = document.querySelectorAll('[data-ar][data-en]');
    elements.forEach(element => {
        if (lang === 'ar') {
            element.textContent = element.getAttribute('data-ar');
        } else {
            element.textContent = element.getAttribute('data-en');
        }
    });
    
    // Update current language display
    const currentLangElement = document.getElementById('currentLang');
    if (currentLangElement) {
        currentLangElement.textContent = lang === 'ar' ? 'العربية' : 'English';
    }
    
    // Update language toggle text
    const langText = document.getElementById('langText');
    if (langText) {
        langText.textContent = lang === 'ar' ? 'English' : 'العربية';
    }
    
    // Update Bootstrap RTL classes
    updateBootstrapRTL(lang);
}

function updateBootstrapRTL(lang) {
    const body = document.body;
    if (lang === 'ar') {
        body.classList.add('rtl');
        body.classList.remove('ltr');
    } else {
        body.classList.add('ltr');
        body.classList.remove('rtl');
    }
}

// Sidebar Management
function initializeSidebar() {
    const sidebarToggleTop = document.getElementById('sidebarToggleTop');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarToggleTop) {
        sidebarToggleTop.addEventListener('click', toggleSidebar);
    }
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 992) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggleTop');
            
            if (sidebar && !sidebar.contains(event.target) && 
                sidebarToggle && !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
}

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar) {
        sidebar.classList.toggle('show');
    }
}

// Charts Initialization
function initializeCharts() {
    initializeRevenueChart();
    initializeSpecialtiesChart();
    initializePaymentMethodsChart();
}

function initializeRevenueChart() {
    const ctx = document.getElementById('revenueChart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
            datasets: [{
                label: 'الإيرادات',
                data: [12000, 19000, 15000, 25000, 22000, 30000],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

function initializeSpecialtiesChart() {
    const ctx = document.getElementById('specialtiesChart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['طب نفسي', 'علم نفس', 'علاج سلوكي', 'استشارات'],
            datasets: [{
                data: [40, 30, 20, 10],
                backgroundColor: [
                    '#2563eb',
                    '#10b981',
                    '#f59e0b',
                    '#ef4444'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
}

function initializePaymentMethodsChart() {
    const ctx = document.getElementById('paymentMethodsChart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['بطاقة ائتمان', 'نقدي', 'تحويل بنكي', 'دفع إلكتروني'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: [
                    '#2563eb',
                    '#10b981',
                    '#f59e0b',
                    '#06b6d4'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
}

// Event Listeners
function initializeEventListeners() {
    // Login form
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }
    
    // Password toggle
    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }
    
    // Language toggle
    const langToggle = document.getElementById('langToggle');
    if (langToggle) {
        langToggle.addEventListener('click', function() {
            const newLang = currentLanguage === 'ar' ? 'en' : 'ar';
            switchLanguage(newLang);
        });
    }
}

// Initialize Tooltips
function initializeTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

// Set Current Date
function setCurrentDate() {
    const dateInputs = document.querySelectorAll('input[type="date"]');
    const today = new Date().toISOString().split('T')[0];
    
    dateInputs.forEach(input => {
        if (!input.value) {
            input.value = today;
        }
    });
}

// Login Handler
function handleLogin(event) {
    event.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    // Simple validation (replace with actual authentication)
    if (email && password) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            window.location.href = 'dashboard.html';
        }, 1500);
    } else {
        showAlert('يرجى ملء جميع الحقول', 'error');
    }
}

// Doctor Management Functions
function addDoctor() {
    const form = document.getElementById('addDoctorForm');
    if (form && form.checkValidity()) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم إضافة الطبيب بنجاح', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addDoctorModal'));
            modal.hide();
            form.reset();
            // Refresh doctors table
            loadDoctorsTable();
        }, 1000);
    } else {
        showAlert('يرجى ملء جميع الحقول المطلوبة', 'error');
    }
}

function viewDoctor(id) {
    showAlert(`عرض تفاصيل الطبيب رقم ${id}`, 'info');
}

function editDoctor(id) {
    showAlert(`تعديل الطبيب رقم ${id}`, 'info');
}

function deleteDoctor(id) {
    if (confirm('هل أنت متأكد من حذف هذا الطبيب؟')) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم حذف الطبيب بنجاح', 'success');
            loadDoctorsTable();
        }, 1000);
    }
}

function filterDoctors() {
    const search = document.getElementById('searchDoctor').value;
    const specialty = document.getElementById('specialtyFilter').value;
    const status = document.getElementById('statusFilter').value;
    
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تطبيق الفلتر بنجاح', 'info');
        // Apply filters to table
    }, 500);
}

// Patient Management Functions
function addPatient() {
    const form = document.getElementById('addPatientForm');
    if (form && form.checkValidity()) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم إضافة المريض بنجاح', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addPatientModal'));
            modal.hide();
            form.reset();
            loadPatientsTable();
        }, 1000);
    } else {
        showAlert('يرجى ملء جميع الحقول المطلوبة', 'error');
    }
}

function viewPatient(id) {
    showAlert(`عرض تفاصيل المريض رقم ${id}`, 'info');
}

function editPatient(id) {
    showAlert(`تعديل المريض رقم ${id}`, 'info');
}

function deletePatient(id) {
    if (confirm('هل أنت متأكد من حذف هذا المريض؟')) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم حذف المريض بنجاح', 'success');
            loadPatientsTable();
        }, 1000);
    }
}

function viewMedicalHistory(id) {
    showAlert(`عرض التاريخ الطبي للمريض رقم ${id}`, 'info');
}

function filterPatients() {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تطبيق الفلتر بنجاح', 'info');
    }, 500);
}

function exportPatients() {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تصدير بيانات المرضى بنجاح', 'success');
    }, 1500);
}

// Appointment Management Functions
function addAppointment() {
    const form = document.getElementById('addAppointmentForm');
    if (form && form.checkValidity()) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم حجز الموعد بنجاح', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addAppointmentModal'));
            modal.hide();
            form.reset();
            loadAppointmentsTable();
        }, 1000);
    } else {
        showAlert('يرجى ملء جميع الحقول المطلوبة', 'error');
    }
}

function viewAppointment(id) {
    showAlert(`عرض تفاصيل الموعد رقم ${id}`, 'info');
}

function editAppointment(id) {
    showAlert(`تعديل الموعد رقم ${id}`, 'info');
}

function rescheduleAppointment(id) {
    showAlert(`إعادة جدولة الموعد رقم ${id}`, 'info');
}

function cancelAppointment(id) {
    if (confirm('هل أنت متأكد من إلغاء هذا الموعد؟')) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم إلغاء الموعد بنجاح', 'success');
            loadAppointmentsTable();
        }, 1000);
    }
}

function filterAppointments() {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تطبيق الفلتر بنجاح', 'info');
    }, 500);
}

function viewCalendar() {
    showAlert('عرض التقويم', 'info');
}

// Payment Management Functions
function addPayment() {
    const form = document.getElementById('addPaymentForm');
    if (form && form.checkValidity()) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم إضافة الدفعة بنجاح', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addPaymentModal'));
            modal.hide();
            form.reset();
            loadPaymentsTable();
        }, 1000);
    } else {
        showAlert('يرجى ملء جميع الحقول المطلوبة', 'error');
    }
}

function viewPayment(id) {
    showAlert(`عرض تفاصيل الدفعة رقم ${id}`, 'info');
}

function printInvoice(id) {
    showAlert(`طباعة الفاتورة رقم ${id}`, 'info');
    // Implement print functionality
    window.print();
}

function refundPayment(id) {
    if (confirm('هل أنت متأكد من استرداد هذه الدفعة؟')) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم استرداد الدفعة بنجاح', 'success');
            loadPaymentsTable();
        }, 1000);
    }
}

function confirmPayment(id) {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تأكيد الدفعة بنجاح', 'success');
        loadPaymentsTable();
    }, 1000);
}

function cancelPayment(id) {
    if (confirm('هل أنت متأكد من إلغاء هذه الدفعة؟')) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم إلغاء الدفعة بنجاح', 'success');
            loadPaymentsTable();
        }, 1000);
    }
}

function filterPayments() {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تطبيق الفلتر بنجاح', 'info');
    }, 500);
}

function exportPayments() {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم تصدير تقرير المدفوعات بنجاح', 'success');
    }, 1500);
}

// Settings Functions
function createBackup() {
    showLoadingSpinner();
    
    setTimeout(() => {
        hideLoadingSpinner();
        showAlert('تم إنشاء النسخة الاحتياطية بنجاح', 'success');
    }, 2000);
}

function restoreBackup() {
    if (confirm('هل أنت متأكد من استعادة البيانات؟ سيتم استبدال البيانات الحالية.')) {
        showLoadingSpinner();
        
        setTimeout(() => {
            hideLoadingSpinner();
            showAlert('تم استعادة البيانات بنجاح', 'success');
        }, 3000);
    }
}

// Table Loading Functions
function loadDoctorsTable() {
    // Simulate loading doctors data
    console.log('Loading doctors table...');
}

function loadPatientsTable() {
    // Simulate loading patients data
    console.log('Loading patients table...');
}

function loadAppointmentsTable() {
    // Simulate loading appointments data
    console.log('Loading appointments table...');
}

function loadPaymentsTable() {
    // Simulate loading payments data
    console.log('Loading payments table...');
}

// Utility Functions
function showAlert(message, type = 'info') {
    const alertTypes = {
        success: 'alert-success',
        error: 'alert-danger',
        warning: 'alert-warning',
        info: 'alert-info'
    };
    
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert ${alertTypes[type]} alert-dismissible fade show position-fixed`;
    alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(alertDiv);
    
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.parentNode.removeChild(alertDiv);
        }
    }, 5000);
}

function showLoadingSpinner() {
    const spinner = document.createElement('div');
    spinner.id = 'loadingSpinner';
    spinner.className = 'position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center';
    spinner.style.cssText = 'background: rgba(0,0,0,0.5); z-index: 9999;';
    spinner.innerHTML = '<div class="spinner"></div>';
    
    document.body.appendChild(spinner);
}

function hideLoadingSpinner() {
    const spinner = document.getElementById('loadingSpinner');
    if (spinner) {
        spinner.parentNode.removeChild(spinner);
    }
}

function formatCurrency(amount, currency = 'SAR') {
    return new Intl.NumberFormat('ar-SA', {
        style: 'currency',
        currency: currency
    }).format(amount);
}

function formatDate(date, locale = 'ar-SA') {
    return new Intl.DateTimeFormat(locale).format(new Date(date));
}

// Login Form
const loginForm = document.getElementById('loginForm');
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');

loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    // بيانات تسجيل دخول 
    const adminEmail = "admin@example.com";
    const adminPassword = "123456";

    if(email === adminEmail && password === adminPassword){
        window.location.href = "dashboard.php";
    } else {
        alert("البريد الإلكتروني أو كلمة المرور خاطئة");
    }
});

// زر اظهار/اخفاء كلمة المرور
togglePassword.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
});
document.addEventListener("DOMContentLoaded", function() {
    // عناصر الملف الشخصي
    const profileImage = document.getElementById('profileImage');
    const imageInput = document.getElementById('imageInput');
    const changePasswordBtn = document.getElementById('changePasswordBtn');

    // عند النقر على الصورة لاختيار صورة جديدة
    profileImage.addEventListener('click', () => {
        imageInput.click();
    });

    // عند اختيار صورة جديدة
    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result; // عرض الصورة الجديدة فورًا
            }
            reader.readAsDataURL(file);
        }
    });

    // زر تغيير كلمة المرور
    changePasswordBtn.addEventListener('click', () => {
        alert("هنا يمكنك فتح صفحة تغيير كلمة المرور أو إدخال النموذج");
        // لاحقًا: window.location.href = "change-password.php";
    });

});



// Export functions for global access
window.switchLanguage = switchLanguage;
window.addDoctor = addDoctor;
window.viewDoctor = viewDoctor;
window.editDoctor = editDoctor;
window.deleteDoctor = deleteDoctor;
window.filterDoctors = filterDoctors;
window.addPatient = addPatient;
window.viewPatient = viewPatient;
window.editPatient = editPatient;
window.deletePatient = deletePatient;
window.viewMedicalHistory = viewMedicalHistory;
window.filterPatients = filterPatients;
window.exportPatients = exportPatients;
window.addAppointment = addAppointment;
window.viewAppointment = viewAppointment;
window.editAppointment = editAppointment;
window.rescheduleAppointment = rescheduleAppointment;
window.cancelAppointment = cancelAppointment;
window.filterAppointments = filterAppointments;
window.viewCalendar = viewCalendar;
window.addPayment = addPayment;
window.viewPayment = viewPayment;
window.printInvoice = printInvoice;
window.refundPayment = refundPayment;
window.confirmPayment = confirmPayment;
window.cancelPayment = cancelPayment;
window.filterPayments = filterPayments;
window.exportPayments = exportPayments;
window.createBackup = createBackup;
window.restoreBackup = restoreBackup;