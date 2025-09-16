<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path - لوحة تحكم الإدارة</title>
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="admin.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-brain text-primary"></i>
                    <h2>Life Path</h2>
                </div>
                <p class="subtitle" data-ar="لوحة تحكم الإدارة" data-en="Admin Dashboard">لوحة تحكم الإدارة</p>
            </div>
            
            <form class="login-form" id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label" data-ar="البريد الإلكتروني" data-en="Email">البريد الإلكتروني</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label" data-ar="كلمة المرور" data-en="Password">كلمة المرور</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember" data-ar="تذكرني" data-en="Remember me">
                        تذكرني
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 mb-3" data-ar="تسجيل الدخول" data-en="Login">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    تسجيل الدخول
                </button>
                
                <div class="text-center">
                    <a href="#" class="forgot-password" data-ar="نسيت كلمة المرور؟" data-en="Forgot Password?">نسيت كلمة المرور؟</a>
                </div>
            </form>
            
            <div class="language-switch">
                <button class="btn btn-outline-primary btn-sm" id="langToggle">
                    <i class="fas fa-globe me-1"></i>
                    <span id="langText">English</span>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>