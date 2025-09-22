<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - إدارة المدفوعات</title>
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                    <a class="nav-link active" href="payments.php">
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
        
        <!-- Payments Management Content -->
        <div class="container-fluid py-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800" data-ar="إدارة المدفوعات" data-en="Payments Management">إدارة المدفوعات</h1>
                <div>
                    <button class="btn btn-success me-2" onclick="exportPayments()">
                        <i class="fas fa-download me-2"></i>
                        <span data-ar="تصدير التقرير" data-en="Export Report">تصدير التقرير</span>
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                        <i class="fas fa-plus me-2"></i>
                        <span data-ar="إضافة دفعة" data-en="Add Payment">إضافة دفعة</span>
                    </button>
                </div>
            </div>
            
            <!-- Financial Stats -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-success">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" data-ar="الإيرادات الشهرية" data-en="Monthly Revenue">
                                        الإيرادات الشهرية
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$45,670</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card border-start-primary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" data-ar="المدفوعات المكتملة" data-en="Completed Payments">
                                        المدفوعات المكتملة
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">234</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-circle fa-2x text-primary"></i>
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
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" data-ar="مدفوعات معلقة" data-en="Pending Payments">
                                        مدفوعات معلقة
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
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
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" data-ar="مدفوعات فاشلة" data-en="Failed Payments">
                                        مدفوعات فاشلة
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-times-circle fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Revenue Chart -->
            <div class="row mb-4">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary" data-ar="تطور الإيرادات" data-en="Revenue Trends">تطور الإيرادات</h6>
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
                            <h6 class="m-0 font-weight-bold text-primary" data-ar="طرق الدفع" data-en="Payment Methods">طرق الدفع</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="paymentMethodsChart"></canvas>
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
                                <input type="text" class="form-control" placeholder="البحث..." id="searchPayment">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" id="dateFromFilter" placeholder="من تاريخ">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" id="dateToFilter" placeholder="إلى تاريخ">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">جميع الحالات</option>
                                <option value="completed">مكتمل</option>
                                <option value="pending">معلق</option>
                                <option value="failed">فاشل</option>
                                <option value="refunded">مسترد</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="methodFilter">
                                <option value="">جميع الطرق</option>
                                <option value="cash">نقدي</option>
                                <option value="card">بطاقة ائتمان</option>
                                <option value="bank">تحويل بنكي</option>
                                <option value="online">دفع إلكتروني</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-outline-primary w-100" onclick="filterPayments()">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payments Table -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th data-ar="رقم الفاتورة" data-en="Invoice #">رقم الفاتورة</th>
                                    <th data-ar="المريض" data-en="Patient">المريض</th>
                                    <th data-ar="الطبيب" data-en="Doctor">الطبيب</th>
                                    <th data-ar="المبلغ" data-en="Amount">المبلغ</th>
                                    <th data-ar="طريقة الدفع" data-en="Payment Method">طريقة الدفع</th>
                                    <th data-ar="التاريخ" data-en="Date">التاريخ</th>
                                    <th data-ar="الحالة" data-en="Status">الحالة</th>
                                    <th data-ar="الإجراءات" data-en="Actions">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="paymentsTableBody">
                                <tr>
                                    <td>
                                        <strong>INV-001</strong>
                                        <br><small class="text-muted">كود الدفع: PAY123456</small>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">أحمد محمد</h6>
                                            <small class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="92f3fafff7f6d2f7fff3fbfebcf1fdff">[email&#160;protected]</a></small>
                                        </div>
                                    </td>
                                    <td>د. سارة أحمد</td>
                                    <td>
                                        <strong class="text-success">$150.00</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">بطاقة ائتمان</span>
                                    </td>
                                    <td>2024-01-20</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPayment(1)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="printInvoice(1)">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" onclick="refundPayment(1)">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>INV-002</strong>
                                        <br><small class="text-muted">كود الدفع: PAY123457</small>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">فاطمة علي</h6>
                                            <small class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0b6d6a7f62666a4b6e666a626725686466">[email&#160;protected]</a></small>
                                        </div>
                                    </td>
                                    <td>د. محمد حسن</td>
                                    <td>
                                        <strong class="text-warning">$120.00</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">نقدي</span>
                                    </td>
                                    <td>2024-01-19</td>
                                    <td><span class="badge bg-warning">معلق</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPayment(2)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="confirmPayment(2)">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="cancelPayment(2)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>INV-003</strong>
                                        <br><small class="text-muted">كود الدفع: PAY123458</small>
                                    </td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">خالد أحمد</h6>
                                            <small class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0863606964616c486d65696164266b6765">[email&#160;protected]</a></small>
                                        </div>
                                    </td>
                                    <td>د. نور الدين</td>
                                    <td>
                                        <strong class="text-success">$200.00</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">تحويل بنكي</span>
                                    </td>
                                    <td>2024-01-18</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPayment(3)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="printInvoice(3)">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" onclick="refundPayment(3)">
                                                <i class="fas fa-undo"></i>
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
    
    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-ar="إضافة دفعة جديدة" data-en="Add New Payment">إضافة دفعة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPaymentForm">
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
                                    <label class="form-label" data-ar="المبلغ" data-en="Amount">المبلغ</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="طريقة الدفع" data-en="Payment Method">طريقة الدفع</label>
                                    <select class="form-select" required>
                                        <option value="">اختر طريقة الدفع</option>
                                        <option value="cash">نقدي</option>
                                        <option value="card">بطاقة ائتمان</option>
                                        <option value="bank">تحويل بنكي</option>
                                        <option value="online">دفع إلكتروني</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="تاريخ الدفع" data-en="Payment Date">تاريخ الدفع</label>
                                    <input type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-ar="رقم المرجع" data-en="Reference Number">رقم المرجع</label>
                                    <input type="text" class="form-control" placeholder="اختياري">
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
                    <button type="button" class="btn btn-primary" onclick="addPayment()" data-ar="إضافة الدفعة" data-en="Add Payment">إضافة الدفعة</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>