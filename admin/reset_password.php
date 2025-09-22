<?php
include 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT id, reset_expiry FROM users WHERE reset_token=? LIMIT 1");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (strtotime($user['reset_expiry']) > time()) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $stmt = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, reset_expiry=NULL WHERE id=?");
                $stmt->bind_param("si", $newPassword, $user['id']);
                $stmt->execute();

                echo "تم تغيير كلمة المرور بنجاح. <a href='index.php'>تسجيل الدخول</a>";
                exit();
            }
        } else {
            echo "انتهت صلاحية الرابط.";
            exit();
        }
    } else {
        echo "رابط غير صالح.";
        exit();
    }
} else {
    echo "رابط غير صالح.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إعادة تعيين كلمة المرور</title>
</head>
<body>
    <h2>أدخل كلمة مرور جديدة</h2>
    <form method="POST">
        <input type="password" name="password" required>
        <button type="submit">حفظ</button>
    </form>
</body>
</html>
