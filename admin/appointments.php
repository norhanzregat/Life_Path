<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - إدارة المواعيد</title>
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
                    <a class="nav-link active" href="appointments.php">
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
                    <a class="nav-link" href="settings.php">
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
        
        <!-- Appointments Management Content -->
        <div class="container-fluid py-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800" data-ar="إدارة المواعيد" data-en="Appointments Management">إدارة المواعيد</h1>
                <div>
                    <button class="btn btn-info me-2" onclick="viewCalendar()">
                        <i class="fas fa-calendar me-2"></i>
                        <span data-ar="عرض التقويم" data-en="Calendar View">عرض التقويم</span>
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
                        <i class="fas fa-plus me-2"></i>
                        <span data-ar="حجز موعد جديد" data-en="New Appointment">حجز موعد جديد</span>
                    </button>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-primary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" data-ar="مواعيد اليوم" data-en="Today's Appointments">
                                        مواعيد اليوم
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-day fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-success">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" data-ar="مواعيد مكتملة" data-en="Completed">
                                        مواعيد مكتملة
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-circle fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-warning">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" data-ar="في الانتظار" data-en="Pending">
                                        في الانتظار
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clock fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-danger">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" data-ar="ملغية" data-en="Cancelled">
                                        ملغية
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-times-circle fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Filters -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="البحث..." id="searchAppointment">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" id="dateFilter">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="doctorFilter">
                                <option value="">جميع الأطباء</option>
                                <option value="1">د. سارة أحمد</option>
                                <option value="2">د. محمد حسن</option>
                                <option value="3">د. نور الدين</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">جميع الحالات</option>
                                <option value="confirmed">مؤكد</option>
                                <option value="pending">في الانتظار</option>
                                <option value="completed">مكتمل</option>
                                <option value="cancelled">ملغي</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="timeFilter">
                                <option value="">جميع الأوقات</option>
                                <option value="morning">صباحي</option>
                                <option value="afternoon">بعد الظهر</option>
                                <option value="evening">مسائي</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-outline-primary w-100" onclick="filterAppointments()">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Appointments Table -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th data-ar="المريض" data-en="Patient">المريض</th>
                                    <th data-ar="الطبيب" data-en="Doctor">الطبيب</th>
                                    <th data-ar="التاريخ" data-en="Date">التاريخ</th>
                                    <th data-ar="الوقت" data-en="Time">الوقت</th>
                                    <th data-ar="نوع الجلسة" data-en="Session Type">نوع الجلسة</th>
                                    <th data-ar="المدة" data-en="Duration">المدة</th>
                                    <th data-ar="الحالة" data-en="Status">الحالة</th>
                                    <th data-ar="الإجراءات" data-en="Actions">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="appointmentsTableBody">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">أحمد محمد</h6>
                                                <small class="text-muted">+966 50 123 4567</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">د. سارة أحمد</h6>
                                            <small class="text-muted">طب نفسي</small>
                                        </div>
                                    </td>
                                    <td>2024-01-20</td>
                                    <td>10:00 ص</td>
                                    <td>استشارة أولية</td>
                                    <td>60 دقيقة</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewAppointment(1)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editAppointment(1)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" onclick="rescheduleAppointment(1)">
                                                <i class="fas fa-calendar-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="cancelAppointment(1)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">فاطمة علي</h6>
                                                <small class="text-muted">+966 50 234 5678</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">د. محمد حسن</h6>
                                            <small class="text-muted">علاج سلوكي</small>
                                        </div>
                                    </td>
                                    <td>2024-01-20</td>
                                    <td>11:30 ص</td>
                                    <td>جلسة متابعة</td>
                                    <td>45 دقيقة</td>
                                    <td><span class="badge bg-warning">في الانتظار</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewAppointment(2)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editAppointment(2)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" onclick="rescheduleAppointment(2)">
                                                <i class="fas fa-calendar-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="cancelAppointment(2)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">خالد أحمد</h6>
                                                <small class="text-muted">+966 50 345 6789</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">د. نور الدين</h6>
                                            <small class="text-muted">استشارات نفسية</small>
                                        </div>
                                    </td>
                                    <td>2024-01-20</td>
                                    <td>2:00 م</td>
                                    <td>علاج جماعي</td>
                                    <td>90 دقيقة</td>
                                    <td><span class="badge bg-primary">مؤكد</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewAppointment(3)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editAppointment(3)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" onclick="rescheduleAppointment(3)">
                                                <i class="fas fa-calendar-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="cancelAppointment(3)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">السابق</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">التالي</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Appointment Modal -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-ar="حجز موعد جديد" data-en="New Appointment">حجز موعد جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addAppointmentForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="المريض" data-en="Patient">المريض</label>
                                    <select class="form-select" required>
                                        <option value="">اختر المريض</option>
                                        <option value="1">أحمد محمد علي</option>
                                        <option value="2">فاطمة علي حسن</option>
                                        <option value="3">خالد أحمد محمد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="الطبيب" data-en="Doctor">الطبيب</label>
                                    <select class="form-select" required>
                                        <option value="">اختر الطبيب</option>
                                        <option value="1">د. سارة أحمد</option>
                                        <option value="2">د. محمد حسن</option>
                                        <option value="3">د. نور الدين</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="التاريخ" data-en="Date">التاريخ</label>
                                    <input type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="الوقت" data-en="Time">الوقت</label>
                                    <input type="time" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="نوع الجلسة" data-en="Session Type">نوع الجلسة</label>
                                    <select class="form-select" required>
                                        <option value="">اختر نوع الجلسة</option>
                                        <option value="consultation">استشارة أولية</option>
                                        <option value="followup">جلسة متابعة</option>
                                        <option value="therapy">جلسة علاج</option>
                                        <option value="group">علاج جماعي</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="المدة (بالدقائق)" data-en="Duration (minutes)">المدة (بالدقائق)</label>
                                    <select class="form-select" required>
                                        <option value="">اختر المدة</option>
                                        <option value="30">30 دقيقة</option>
                                        <option value="45">45 دقيقة</option>
                                        <option value="60">60 دقيقة</option>
                                        <option value="90">90 دقيقة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-ar="ملاحظات" data-en="Notes">ملاحظات</label>
                            <textarea class="form-control" rows="3" placeholder="اكتب أي ملاحظات إضافية..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-ar="إلغاء" data-en="Cancel">إلغاء</button>
                    <button type="button" class="btn btn-primary" onclick="addAppointment()" data-ar="حجز الموعد" data-en="Book Appointment">حجز الموعد</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>