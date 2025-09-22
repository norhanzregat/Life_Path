<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - لوحة التحكم الرئيسية</title>
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
                    <a class="nav-link active" href="dashboard.php">
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
        
        <!-- Dashboard Content -->
        <div class="container-fluid py-4">
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-primary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" data-ar="إجمالي الأطباء" data-en="Total Doctors">
                                        إجمالي الأطباء
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-md fa-2x text-primary"></i>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" data-ar="إجمالي المرضى" data-en="Total Patients">
                                        إجمالي المرضى
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">1,247</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-success"></i>
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1" data-ar="المواعيد اليوم" data-en="Today's Appointments">
                                        المواعيد اليوم
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">89</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-check fa-2x text-info"></i>
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
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" data-ar="الإيرادات الشهرية" data-en="Monthly Revenue">
                                        الإيرادات الشهرية
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$45,670</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts Row -->
            <div class="row mb-4">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary" data-ar="نظرة عامة على الإيرادات" data-en="Revenue Overview">نظرة عامة على الإيرادات</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary" data-ar="توزيع التخصصات" data-en="Specialties Distribution">توزيع التخصصات</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="specialtiesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activities -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" data-ar="المواعيد الأخيرة" data-en="Recent Appointments">المواعيد الأخيرة</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">أحمد محمد</h6>
                                        <p class="mb-1 text-muted">د. سارة أحمد - علاج نفسي</p>
                                        <small>10:00 ص</small>
                                    </div>
                                    <span class="badge bg-success rounded-pill">مكتمل</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">فاطمة علي</h6>
                                        <p class="mb-1 text-muted">د. محمد حسن - استشارة</p>
                                        <small>11:30 ص</small>
                                    </div>
                                    <span class="badge bg-warning rounded-pill">قيد الانتظار</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">خالد أحمد</h6>
                                        <p class="mb-1 text-muted">د. نور الدين - علاج سلوكي</p>
                                        <small>2:00 م</small>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">مؤكد</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" data-ar="الأطباء الأكثر نشاطاً" data-en="Most Active Doctors">الأطباء الأكثر نشاطاً</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">د. سارة أحمد</h6>
                                            <small class="text-muted">طب نفسي</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">45 مريض</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">د. محمد حسن</h6>
                                            <small class="text-muted">علاج سلوكي</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">38 مريض</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">د. نور الدين</h6>
                                            <small class="text-muted">استشارات نفسية</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">32 مريض</span>
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