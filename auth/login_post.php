<?php
session_start();
header('Content-Type: application/json');

include_once '../connection.php';

$database = new Database();
$db = $database->getConnection();

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $response['message'] = "طريقة الطلب غير صحيحة.";
    echo json_encode($response);
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = isset($_POST['remember']) ? true : false;

if (empty($email)) {
    $response['message'] = "البريد الإلكتروني مطلوب.";
    echo json_encode($response);
    exit;
}

if (empty($password)) {
    $response['message'] = "كلمة المرور مطلوبة.";
    echo json_encode($response);
    exit;
}

try {
    $query = "SELECT id, first_name, last_name, email, password FROM users WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['first_name'] . ' ' . $row['last_name'];

            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $expiry = date('Y-m-d H:i:s', strtotime('+30 days'));

                $query = "UPDATE users SET remember_token = :token, token_expiry = :expiry WHERE id = :id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':token', $token);
                $stmt->bindParam(':expiry', $expiry);
                $stmt->bindParam(':id', $row['id']);
                $stmt->execute();

                setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), "/");
            }

            $response['status'] = 'success';
            $response['message'] = "تم تسجيل الدخول بنجاح!";
            $response['redirect'] = "../booking_appo/booking.php";
        } else {
            $response['message'] = "كلمة المرور غير صحيحة.";
        }
    } else {
        $response['message'] = "لا يوجد حساب مرتبط بهذا البريد الإلكتروني.";
    }
} catch(PDOException $exception) {
    error_log("Database error: " . $exception->getMessage());
    $response['message'] = "حدث خطأ في النظام. يرجى المحاولة مرة أخرى.";
}

echo json_encode($response);
?>