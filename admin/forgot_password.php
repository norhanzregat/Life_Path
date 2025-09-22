<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1) {
        $token = bin2hex(random_bytes(16));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $stmt = $conn->prepare("UPDATE users SET reset_token=?, reset_expiry=? WHERE email=?");
        $stmt->bind_param("sss", $token, $expiry, $email);
        $stmt->execute();

        $reset_link = "http://localhost/admin/reset_password.php?token=" . $token;
        echo "تم إرسال رابط إعادة التعيين: <a href='$reset_link'>$reset_link</a>";
    } else {
        echo "الإيميل غير موجود.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>نسيت كلمة المرور</title>
</head>
<body>
    <h2>إعادة تعيين كلمة المرور</h2>
    <form method="POST">
        <label>أدخل بريدك:</label>
        <input type="email" name="email" required>
        <button type="submit">إرسال</button>
    </form>
</body>
</html>
