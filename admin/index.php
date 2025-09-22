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
            <div class="mb-3">
                <label for="password">كلمة المرور</label>
                <input type="password" class="form-control" name="password" required>
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
