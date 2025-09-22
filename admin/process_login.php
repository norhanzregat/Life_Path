<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "كلمة المرور خاطئة.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = "المستخدم غير موجود.";
        header("Location: index.php");
    }
}
