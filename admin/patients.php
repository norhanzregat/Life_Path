<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - إدارة المرضى</title>
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
                    <a class="nav-link active" href="patients.php">
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
                            <li><a class="dropdown-item" href="index.html"><i class="fas fa-sign-out-alt me-2"></i><span data-ar="تسجيل الخروج" data-en="Logout">تسجيل الخروج</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Patients Management Content -->
        <div class="container-fluid py-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800" data-ar="إدارة المرضى" data-en="Patients Management">إدارة المرضى</h1>
                <div>
                    <button class="btn btn-success me-2" onclick="exportPatients()">
                        <i class="fas fa-download me-2"></i>
                        <span data-ar="تصدير البيانات" data-en="Export Data">تصدير البيانات</span>
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                        <i class="fas fa-plus me-2"></i>
                        <span data-ar="إضافة مريض جديد" data-en="Add New Patient">إضافة مريض جديد</span>
                    </button>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-primary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" data-ar="إجمالي المرضى" data-en="Total Patients">
                                        إجمالي المرضى
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">1,247</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-primary"></i>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" data-ar="المرضى النشطون" data-en="Active Patients">
                                        المرضى النشطون
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">892</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1" data-ar="مرضى جدد هذا الشهر" data-en="New This Month">
                                        مرضى جدد هذا الشهر
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">67</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-plus fa-2x text-info"></i>
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
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" data-ar="في قائمة الانتظار" data-en="Waiting List">
                                        في قائمة الانتظار
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clock fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Search and Filter -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="البحث عن مريض..." id="searchPatient">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="genderFilter">
                                <option value="">جميع الأجناس</option>
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">جميع الحالات</option>
                                <option value="active">نشط</option>
                                <option value="inactive">غير نشط</option>
                                <option value="waiting">في الانتظار</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="doctorFilter">
                                <option value="">جميع الأطباء</option>
                                <option value="1">د. سارة أحمد</option>
                                <option value="2">د. محمد حسن</option>
                                <option value="3">د. نور الدين</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary w-100" onclick="filterPatients()">
                                <i class="fas fa-filter me-2"></i>تصفية
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Patients Table -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th data-ar="الاسم" data-en="Name">الاسم</th>
                                    <th data-ar="العمر" data-en="Age">العمر</th>
                                    <th data-ar="الجنس" data-en="Gender">الجنس</th>
                                    <th data-ar="البريد الإلكتروني" data-en="Email">البريد الإلكتروني</th>
                                    <th data-ar="الهاتف" data-en="Phone">الهاتف</th>
                                    <th data-ar="الطبيب المعالج" data-en="Doctor">الطبيب المعالج</th>
                                    <th data-ar="آخر زيارة" data-en="Last Visit">آخر زيارة</th>
                                    <th data-ar="الحالة" data-en="Status">الحالة</th>
                                    <th data-ar="الإجراءات" data-en="Actions">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="patientsTableBody">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">أحمد محمد علي</h6>
                                                <small class="text-muted">ID: P001</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>28 سنة</td>
                                    <td>ذكر</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ef8e87828a8bc18280878e828a8baf8a828e8683c18c8082">[email&#160;protected]</a></td>
                                    <td>+966 50 123 4567</td>
                                    <td>د. سارة أحمد</td>
                                    <td>2024-01-15</td>
                                    <td><span class="badge bg-success">نشط</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPatient(1)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editPatient(1)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" onclick="viewMedicalHistory(1)">
                                                <i class="fas fa-file-medical"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="deletePatient(1)">
                                                <i class="fas fa-trash"></i>
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
                                                <h6 class="mb-0">فاطمة علي حسن</h6>
                                                <small class="text-muted">ID: P002</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>35 سنة</td>
                                    <td>أنثى</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="01676075686c602f606d6841646c60686d2f626e6c">[email&#160;protected]</a></td>
                                    <td>+966 50 234 5678</td>
                                    <td>د. محمد حسن</td>
                                    <td>2024-01-12</td>
                                    <td><span class="badge bg-success">نشط</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPatient(2)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editPatient(2)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" onclick="viewMedicalHistory(2)">
                                                <i class="fas fa-file-medical"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="deletePatient(2)">
                                                <i class="fas fa-trash"></i>
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
                                                <h6 class="mb-0">خالد أحمد محمد</h6>
                                                <small class="text-muted">ID: P003</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>42 سنة</td>
                                    <td>ذكر</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3b8bbb2bfbab7fdb2bbbeb6b793b6beb2babffdb0bcbe">[email&#160;protected]</a></td>
                                    <td>+966 50 345 6789</td>
                                    <td>د. نور الدين</td>
                                    <td>2024-01-10</td>
                                    <td><span class="badge bg-warning">في الانتظار</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPatient(3)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editPatient(3)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info" onclick="viewMedicalHistory(3)">
                                                <i class="fas fa-file-medical"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="deletePatient(3)">
                                                <i class="fas fa-trash"></i>
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
    
    <!-- Add Patient Modal -->
    <div class="modal fade" id="addPatientModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-ar="إضافة مريض جديد" data-en="Add New Patient">إضافة مريض جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPatientForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="الاسم الأول" data-en="First Name">الاسم الأول</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="الاسم الأخير" data-en="Last Name">الاسم الأخير</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="البريد الإلكتروني" data-en="Email">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="رقم الهاتف" data-en="Phone Number">رقم الهاتف</label>
                                    <input type="tel" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="تاريخ الميلاد" data-en="Date of Birth">تاريخ الميلاد</label>
                                    <input type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="الجنس" data-en="Gender">الجنس</label>
                                    <select class="form-select" required>
                                        <option value="">اختر الجنس</option>
                                        <option value="male">ذكر</option>
                                        <option value="female">أنثى</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="الطبيب المعالج" data-en="Assigned Doctor">الطبيب المعالج</label>
                                    <select class="form-select" required>
                                        <option value="">اختر الطبيب</option>
                                        <option value="1">د. سارة أحمد</option>
                                        <option value="2">د. محمد حسن</option>
                                        <option value="3">د. نور الدين</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-ar="العنوان" data-en="Address">العنوان</label>
                            <textarea class="form-control" rows="2" placeholder="اكتب العنوان الكامل..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-ar="ملاحظات طبية" data-en="Medical Notes">ملاحظات طبية</label>
                            <textarea class="form-control" rows="3" placeholder="اكتب أي ملاحظات طبية مهمة..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-ar="إلغاء" data-en="Cancel">إلغاء</button>
                    <button type="button" class="btn btn-primary" onclick="addPatient()" data-ar="إضافة المريض" data-en="Add Patient">إضافة المريض</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>