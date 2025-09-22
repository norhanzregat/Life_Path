<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول - Life Path</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4" style="max-width: 400px; width:100%">
        <h3 class="text-center mb-3">تسجيل الدخول</h3>
        <form method="POST" action="process_login.php">
            <div class="mb-3">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" class="form-control" name="email" required>
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
            <button type="submit" class="btn btn-primary w-100">دخول</button>
        </form>
        <div class="text-center mt-3">
            <a href="forgot_password.php">نسيت كلمة المرور؟</a>
        </div>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger mt-2"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
