<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - إدارة الأطباء</title>
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
                    <a class="nav-link active" href="doctors.php">
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
        
        <!-- Doctors Management Content -->
        <div class="container-fluid py-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800" data-ar="إدارة الأطباء" data-en="Doctors Management">إدارة الأطباء</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    <i class="fas fa-plus me-2"></i>
                    <span data-ar="إضافة طبيب جديد" data-en="Add New Doctor">إضافة طبيب جديد</span>
                </button>
            </div>
            
            <!-- Search and Filter -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="البحث عن طبيب..." id="searchDoctor">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="specialtyFilter">
                                <option value="">جميع التخصصات</option>
                                <option value="psychiatry">طب نفسي</option>
                                <option value="psychology">علم نفس</option>
                                <option value="behavioral">علاج سلوكي</option>
                                <option value="counseling">استشارات نفسية</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">جميع الحالات</option>
                                <option value="active">نشط</option>
                                <option value="inactive">غير نشط</option>
                                <option value="pending">في الانتظار</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary w-100" onclick="filterDoctors()">
                                <i class="fas fa-filter me-2"></i>تصفية
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Doctors Table -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th data-ar="الصورة" data-en="Photo">الصورة</th>
                                    <th data-ar="الاسم" data-en="Name">الاسم</th>
                                    <th data-ar="التخصص" data-en="Specialty">التخصص</th>
                                    <th data-ar="البريد الإلكتروني" data-en="Email">البريد الإلكتروني</th>
                                    <th data-ar="الهاتف" data-en="Phone">الهاتف</th>
                                    <th data-ar="المرضى" data-en="Patients">المرضى</th>
                                    <th data-ar="الحالة" data-en="Status">الحالة</th>
                                    <th data-ar="الإجراءات" data-en="Actions">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="doctorsTableBody">
                                <tr>
                                    <td>
                                        <div class="user-avatar">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">د. سارة أحمد</h6>
                                            <small class="text-muted">دكتوراه في الطب النفسي</small>
                                        </div>
                                    </td>
                                    <td>طب نفسي</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ff8c9e8d9ed19e97929a9bbf9396999a8f9e8b97d19c9092">[email&#160;protected]</a></td>
                                    <td>+966 50 123 4567</td>
                                    <td><span class="badge bg-primary">45</span></td>
                                    <td><span class="badge bg-success">نشط</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewDoctor(1)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editDoctor(1)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="deleteDoctor(1)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-avatar">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">د. محمد حسن</h6>
                                            <small class="text-muted">ماجستير في العلاج السلوكي</small>
                                        </div>
                                    </td>
                                    <td>علاج سلوكي</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a6cbc9cec7cbc3c288cec7d5d5c7c8e6cacfc0c3d6c7d2ce88c5c9cb">[email&#160;protected]</a></td>
                                    <td>+966 50 234 5678</td>
                                    <td><span class="badge bg-primary">38</span></td>
                                    <td><span class="badge bg-success">نشط</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewDoctor(2)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editDoctor(2)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="deleteDoctor(2)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-avatar">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">د. نور الدين</h6>
                                            <small class="text-muted">دكتوراه في علم النفس</small>
                                        </div>
                                    </td>
                                    <td>استشارات نفسية</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="305e5f45421e515c5455555e705c595655405144581e535f5d">[email&#160;protected]</a></td>
                                    <td>+966 50 345 6789</td>
                                    <td><span class="badge bg-primary">32</span></td>
                                    <td><span class="badge bg-warning">في الانتظار</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewDoctor(3)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="editDoctor(3)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="deleteDoctor(3)">
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
    
    <!-- Add Doctor Modal -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-ar="إضافة طبيب جديد" data-en="Add New Doctor">إضافة طبيب جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addDoctorForm">
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="التخصص" data-en="Specialty">التخصص</label>
                                    <select class="form-select" required>
                                        <option value="">اختر التخصص</option>
                                        <option value="psychiatry">طب نفسي</option>
                                        <option value="psychology">علم نفس</option>
                                        <option value="behavioral">علاج سلوكي</option>
                                        <option value="counseling">استشارات نفسية</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="سنوات الخبرة" data-en="Years of Experience">سنوات الخبرة</label>
                                    <input type="number" class="form-control" min="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-ar="المؤهلات" data-en="Qualifications">المؤهلات</label>
                            <textarea class="form-control" rows="3" placeholder="اكتب المؤهلات والشهادات..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-ar="نبذة تعريفية" data-en="Bio">نبذة تعريفية</label>
                            <textarea class="form-control" rows="4" placeholder="اكتب نبذة تعريفية عن الطبيب..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-ar="إلغاء" data-en="Cancel">إلغاء</button>
                    <button type="button" class="btn btn-primary" onclick="addDoctor()" data-ar="إضافة الطبيب" data-en="Add Doctor">إضافة الطبيب</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>