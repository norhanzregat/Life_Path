<?php
session_start();

// تدمير جميع بيانات الجلسة
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// حذف كوكي التذكر إن وجد
setcookie('remember_token', '', time() - 3600, "/");

// عرض رسالة مباشرة باستخدام JavaScript
echo "<script>
        alert('تم تسجيل الخروج بنجاح');
        window.location.href = '../index.php'; // اختياري: توجيه المستخدم للصفحة الرئيسية
      </script>";
exit;
?>
