<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - الإعدادات</title>
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="admin.css">
</head>
<body class="dashboard-page">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-brain text-primary"></i>
                <h4>Life Path</h4>
            </div>
            <button class="btn btn-sm btn-outline-light d-lg-none" id="sidebarToggle">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span data-ar="لوحة التحكم" data-en="Dashboard">لوحة التحكم</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctors.php">
                        <i class="fas fa-user-md"></i>
                        <span data-ar="الأطباء" data-en="Doctors">الأطباء</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patients.php">
                        <i class="fas fa-users"></i>
                        <span data-ar="المرضى" data-en="Patients">المرضى</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="appointments.php">
                        <i class="fas fa-calendar-alt"></i>
                        <span data-ar="المواعيد" data-en="Appointments">المواعيد</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payments.php">
                        <i class="fas fa-credit-card"></i>
                        <span data-ar="المدفوعات" data-en="Payments">المدفوعات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="settings.php">
                        <i class="fas fa-cog"></i>
                        <span data-ar="الإعدادات" data-en="Settings">الإعدادات</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-outline-primary d-lg-none me-3" id="sidebarToggleTop">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-globe me-2"></i>
                            <span id="currentLang">العربية</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="switchLanguage('ar')">العربية</a></li>
                            <li><a class="dropdown-item" href="#" onclick="switchLanguage('en')">English</a></li>
                        </ul>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="user-avatar">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <span class="ms-2" data-ar="المدير العام" data-en="Admin">المدير العام</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i><span data-ar="الملف الشخصي" data-en="Profile">الملف الشخصي</span></a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i><span data-ar="الإعدادات" data-en="Settings">الإعدادات</span></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php"><i class="fas fa-sign-out-alt me-2"></i><span data-ar="تسجيل الخروج" data-en="Logout">تسجيل الخروج</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Settings Content -->
        <div class="container-fluid py-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800" data-ar="إعدادات النظام" data-en="System Settings">إعدادات النظام</h1>
            </div>
            
            <div class="row">
                <!-- Settings Navigation -->
                <div class="col-lg-3 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#general" class="list-group-item list-group-item-action active" data-bs-toggle="pill">
                                    <i class="fas fa-cog me-2"></i>
                                    <span data-ar="الإعدادات العامة" data-en="General Settings">الإعدادات العامة</span>
                                </a>
                                <a href="#clinic" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                                    <i class="fas fa-hospital me-2"></i>
                                    <span data-ar="معلومات العيادة" data-en="Clinic Information">معلومات العيادة</span>
                                </a>
                                <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                                    <i class="fas fa-bell me-2"></i>
                                    <span data-ar="الإشعارات" data-en="Notifications">الإشعارات</span>
                                </a>
                                <a href="#payments-settings" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                                    <i class="fas fa-credit-card me-2"></i>
                                    <span data-ar="إعدادات الدفع" data-en="Payment Settings">إعدادات الدفع</span>
                                </a>
                                <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                                    <i class="fas fa-shield-alt me-2"></i>
                                    <span data-ar="الأمان" data-en="Security">الأمان</span>
                                </a>
                                <a href="#backup" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                                    <i class="fas fa-database me-2"></i>
                                    <span data-ar="النسخ الاحتياطي" data-en="Backup">النسخ الاحتياطي</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Settings Content -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <!-- General Settings -->
                        <div class="tab-pane fade show active" id="general">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="mb-0" data-ar="الإعدادات العامة" data-en="General Settings">الإعدادات العامة</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="اسم النظام" data-en="System Name">اسم النظام</label>
                                                    <input type="text" class="form-control" value="Life Path">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="اللغة الافتراضية" data-en="Default Language">اللغة الافتراضية</label>
                                                    <select class="form-select">
                                                        <option value="ar" selected>العربية</option>
                                                        <option value="en">English</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="المنطقة الزمنية" data-en="Timezone">المنطقة الزمنية</label>
                                                    <select class="form-select">
                                                        <option value="Asia/Riyadh" selected>الرياض (GMT+3)</option>
                                                        <option value="Asia/Dubai">دبي (GMT+4)</option>
                                                        <option value="Africa/Cairo">القاهرة (GMT+2)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="تنسيق التاريخ" data-en="Date Format">تنسيق التاريخ</label>
                                                    <select class="form-select">
                                                        <option value="dd/mm/yyyy" selected>يوم/شهر/سنة</option>
                                                        <option value="mm/dd/yyyy">شهر/يوم/سنة</option>
                                                        <option value="yyyy-mm-dd">سنة-شهر-يوم</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="maintenanceMode">
                                                <label class="form-check-label" for="maintenanceMode" data-ar="وضع الصيانة" data-en="Maintenance Mode">
                                                    وضع الصيانة
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" data-ar="حفظ التغييرات" data-en="Save Changes">حفظ التغييرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Clinic Information -->
                        <div class="tab-pane fade" id="clinic">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="mb-0" data-ar="معلومات العيادة" data-en="Clinic Information">معلومات العيادة</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="اسم العيادة" data-en="Clinic Name">اسم العيادة</label>
                                                    <input type="text" class="form-control" value="Life Path Psychology Clinic">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="رقم الترخيص" data-en="License Number">رقم الترخيص</label>
                                                    <input type="text" class="form-control" value="LP-2024-001">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" data-ar="العنوان" data-en="Address">العنوان</label>
                                            <textarea class="form-control" rows="3">شارع الملك فهد، الرياض، المملكة العربية السعودية</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="رقم الهاتف" data-en="Phone Number">رقم الهاتف</label>
                                                    <input type="tel" class="form-control" value="+966 11 123 4567">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="البريد الإلكتروني" data-en="Email">البريد الإلكتروني</label>
                                                    <input type="email" class="form-control" value="info@lifepath.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="ساعات العمل" data-en="Working Hours">ساعات العمل</label>
                                                    <input type="text" class="form-control" value="8:00 ص - 8:00 م">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="أيام العمل" data-en="Working Days">أيام العمل</label>
                                                    <input type="text" class="form-control" value="السبت - الخميس">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" data-ar="حفظ التغييرات" data-en="Save Changes">حفظ التغييرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Notifications -->
                        <div class="tab-pane fade" id="notifications">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="mb-0" data-ar="إعدادات الإشعارات" data-en="Notification Settings">إعدادات الإشعارات</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-4">
                                            <h6 data-ar="إشعارات البريد الإلكتروني" data-en="Email Notifications">إشعارات البريد الإلكتروني</h6>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailAppointments" checked>
                                                <label class="form-check-label" for="emailAppointments" data-ar="تأكيد المواعيد" data-en="Appointment Confirmations">
                                                    تأكيد المواعيد
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailPayments" checked>
                                                <label class="form-check-label" for="emailPayments" data-ar="إشعارات الدفع" data-en="Payment Notifications">
                                                    إشعارات الدفع
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailReminders">
                                                <label class="form-check-label" for="emailReminders" data-ar="تذكيرات المواعيد" data-en="Appointment Reminders">
                                                    تذكيرات المواعيد
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <h6 data-ar="إشعارات الرسائل النصية" data-en="SMS Notifications">إشعارات الرسائل النصية</h6>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsAppointments" checked>
                                                <label class="form-check-label" for="smsAppointments" data-ar="تأكيد المواعيد" data-en="Appointment Confirmations">
                                                    تأكيد المواعيد
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsReminders" checked>
                                                <label class="form-check-label" for="smsReminders" data-ar="تذكيرات المواعيد" data-en="Appointment Reminders">
                                                    تذكيرات المواعيد
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" data-ar="وقت إرسال التذكيرات" data-en="Reminder Time">وقت إرسال التذكيرات</label>
                                            <select class="form-select">
                                                <option value="24" selected>24 ساعة قبل الموعد</option>
                                                <option value="12">12 ساعة قبل الموعد</option>
                                                <option value="2">ساعتان قبل الموعد</option>
                                                <option value="1">ساعة واحدة قبل الموعد</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" data-ar="حفظ التغييرات" data-en="Save Changes">حفظ التغييرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Settings -->
                        <div class="tab-pane fade" id="payments-settings">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="mb-0" data-ar="إعدادات الدفع" data-en="Payment Settings">إعدادات الدفع</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-4">
                                            <h6 data-ar="طرق الدفع المقبولة" data-en="Accepted Payment Methods">طرق الدفع المقبولة</h6>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="cashPayment" checked>
                                                <label class="form-check-label" for="cashPayment" data-ar="الدفع النقدي" data-en="Cash Payment">
                                                    الدفع النقدي
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="cardPayment" checked>
                                                <label class="form-check-label" for="cardPayment" data-ar="بطاقات الائتمان" data-en="Credit Cards">
                                                    بطاقات الائتمان
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="bankTransfer" checked>
                                                <label class="form-check-label" for="bankTransfer" data-ar="التحويل البنكي" data-en="Bank Transfer">
                                                    التحويل البنكي
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="onlinePayment">
                                                <label class="form-check-label" for="onlinePayment" data-ar="الدفع الإلكتروني" data-en="Online Payment">
                                                    الدفع الإلكتروني
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="العملة الافتراضية" data-en="Default Currency">العملة الافتراضية</label>
                                                    <select class="form-select">
                                                        <option value="SAR" selected>ريال سعودي (SAR)</option>
                                                        <option value="USD">دولار أمريكي (USD)</option>
                                                        <option value="EUR">يورو (EUR)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="رسوم الإلغاء (%)" data-en="Cancellation Fee (%)">رسوم الإلغاء (%)</label>
                                                    <input type="number" class="form-control" value="10" min="0" max="100">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="autoInvoice" checked>
                                                <label class="form-check-label" for="autoInvoice" data-ar="إنشاء الفواتير تلقائياً" data-en="Auto Generate Invoices">
                                                    إنشاء الفواتير تلقائياً
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" data-ar="حفظ التغييرات" data-en="Save Changes">حفظ التغييرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Security -->
                        <div class="tab-pane fade" id="security">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="mb-0" data-ar="إعدادات الأمان" data-en="Security Settings">إعدادات الأمان</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-4">
                                            <h6 data-ar="كلمة المرور" data-en="Password Settings">كلمة المرور</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" data-ar="كلمة المرور الحالية" data-en="Current Password">كلمة المرور الحالية</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" data-ar="كلمة المرور الجديدة" data-en="New Password">كلمة المرور الجديدة</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" data-ar="تأكيد كلمة المرور" data-en="Confirm Password">تأكيد كلمة المرور</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <h6 data-ar="إعدادات الأمان" data-en="Security Options">إعدادات الأمان</h6>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="twoFactor">
                                                <label class="form-check-label" for="twoFactor" data-ar="المصادقة الثنائية" data-en="Two-Factor Authentication">
                                                    المصادقة الثنائية
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="loginNotifications" checked>
                                                <label class="form-check-label" for="loginNotifications" data-ar="إشعارات تسجيل الدخول" data-en="Login Notifications">
                                                    إشعارات تسجيل الدخول
                                                </label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="sessionTimeout" checked>
                                                <label class="form-check-label" for="sessionTimeout" data-ar="انتهاء الجلسة التلقائي" data-en="Auto Session Timeout">
                                                    انتهاء الجلسة التلقائي
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" data-ar="مدة انتهاء الجلسة (بالدقائق)" data-en="Session Timeout (minutes)">مدة انتهاء الجلسة (بالدقائق)</label>
                                            <select class="form-select">
                                                <option value="30" selected>30 دقيقة</option>
                                                <option value="60">60 دقيقة</option>
                                                <option value="120">120 دقيقة</option>
                                                <option value="240">240 دقيقة</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" data-ar="حفظ التغييرات" data-en="Save Changes">حفظ التغييرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Backup -->
                        <div class="tab-pane fade" id="backup">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="mb-0" data-ar="النسخ الاحتياطي" data-en="Backup & Restore">النسخ الاحتياطي</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h6 data-ar="النسخ الاحتياطي التلقائي" data-en="Automatic Backup">النسخ الاحتياطي التلقائي</h6>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="autoBackup" checked>
                                            <label class="form-check-label" for="autoBackup" data-ar="تفعيل النسخ الاحتياطي التلقائي" data-en="Enable Automatic Backup">
                                                تفعيل النسخ الاحتياطي التلقائي
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="تكرار النسخ الاحتياطي" data-en="Backup Frequency">تكرار النسخ الاحتياطي</label>
                                                    <select class="form-select">
                                                        <option value="daily" selected>يومياً</option>
                                                        <option value="weekly">أسبوعياً</option>
                                                        <option value="monthly">شهرياً</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" data-ar="وقت النسخ الاحتياطي" data-en="Backup Time">وقت النسخ الاحتياطي</label>
                                                    <input type="time" class="form-control" value="02:00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 data-ar="النسخ الاحتياطي اليدوي" data-en="Manual Backup">النسخ الاحتياطي اليدوي</h6>
                                        <p class="text-muted" data-ar="قم بإنشاء نسخة احتياطية فورية من البيانات" data-en="Create an immediate backup of your data">
                                            قم بإنشاء نسخة احتياطية فورية من البيانات
                                        </p>
                                        <button type="button" class="btn btn-success" onclick="createBackup()">
                                            <i class="fas fa-download me-2"></i>
                                            <span data-ar="إنشاء نسخة احتياطية الآن" data-en="Create Backup Now">إنشاء نسخة احتياطية الآن</span>
                                        </button>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 data-ar="استعادة البيانات" data-en="Restore Data">استعادة البيانات</h6>
                                        <p class="text-muted" data-ar="استعادة البيانات من نسخة احتياطية سابقة" data-en="Restore data from a previous backup">
                                            استعادة البيانات من نسخة احتياطية سابقة
                                        </p>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" accept=".sql,.zip">
                                        </div>
                                        <button type="button" class="btn btn-warning" onclick="restoreBackup()">
                                            <i class="fas fa-upload me-2"></i>
                                            <span data-ar="استعادة البيانات" data-en="Restore Data">استعادة البيانات</span>
                                        </button>
                                    </div>
                                    
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <span data-ar="آخر نسخة احتياطية: 2024-01-20 02:00:00" data-en="Last backup: 2024-01-20 02:00:00">آخر نسخة احتياطية: 2024-01-20 02:00:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>