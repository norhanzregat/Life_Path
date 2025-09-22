<?php
session_start();
header('Content-Type: application/json');

include_once '../connection.php';

$database = new Database();
$db = $database->getConnection();

$response = array('status' => 'error', 'message' => '');

if (!isset($_SESSION['user_id'])) {
    $response['message'] = 'يجب تسجيل الدخول أولاً';
    echo json_encode($response);
    exit;
}

$user_id = $_SESSION['user_id'];

// Get form data
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$national_id = $_POST['national_id'] ?? '';
$age = $_POST['age'] ?? '';
$notes = $_POST['notes'] ?? '';
$department = $_POST['department'] ?? '';
$doctor = $_POST['doctor'] ?? '';
$appointment_date = $_POST['appointment_date'] ?? '';
$appointment_time = $_POST['appointment_time'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';

// Validate required fields
if (empty($full_name) || empty($email) || empty($phone) || empty($national_id) || empty($age) || empty($department) || empty($doctor) || empty($appointment_date) || empty($appointment_time)) {
    $response['message'] = 'جميع الحقول المطلوبة يجب ملؤها';
    echo json_encode($response);
    exit;
}

// Generate a unique booking ID
$booking_id = 'BK' . uniqid();
var_dump($_POST);
var_dump($appointment_date, $appointment_time, $age);
exit;

// Insert into database
try {
    $query = "INSERT INTO appointments (user_id, full_name, email, phone, national_id, age, notes, department, doctor, appointment_date, appointment_time, booking_id, payment_method) 
              VALUES (:user_id, :full_name, :email, :phone, :national_id, :age, :notes, :department, :doctor, :appointment_date, :appointment_time, :booking_id, :payment_method)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':national_id', $national_id);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':notes', $notes);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':doctor', $doctor);
    $stmt->bindParam(':appointment_date', $appointment_date);
    $stmt->bindParam(':appointment_time', $appointment_time);
    $stmt->bindParam(':booking_id', $booking_id);
    $stmt->bindParam(':payment_method', $payment_method);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'تم حجز الموعد بنجاح';
        $response['booking_id'] = $booking_id;
    } else {
        $response['message'] = 'حدث خطأ أثناء حجز الموعد';
    }
} catch (PDOException $e) {
    $response['message'] = 'خطأ في قاعدة البيانات: ' . $e->getMessage();
}

echo json_encode($response);
?>