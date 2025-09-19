<?php
session_start();
header('Content-Type: application/json');

// تدمير جميع بيانات الجلسة
$_SESSION = array();

// إذا كنت تريد إنهاء الجلسة، قم أيضًا بحذف كوكي الجلسة
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// أخيرًا، تدمير الجلسة
session_destroy();

// حذف كوكي التذكر إن وجد
setcookie('remember_token', '', time() - 3600, "/");

$response = array('status' => 'success', 'message' => 'تم تسجيل الخروج بنجاح');
echo json_encode($response);
?>