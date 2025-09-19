<?php
session_start();
header('Content-Type: application/json');

// تحميل ملف الاتصال بقاعدة البيانات
include_once '../connection.php';

// إنشاء كائن الاتصال بقاعدة البيانات
$database = new Database();
$db = $database->getConnection();

// تهيئة مصفوفة للرد
$response = array('status' => 'error', 'message' => '', 'errors' => array());

// التحقق من أن الطريقة المستخدمة هي POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $response['message'] = "طريقة الطلب غير صحيحة.";
    echo json_encode($response);
    exit;
}

// جمع البيانات من النموذج مع حماية XSS
$first_name = htmlspecialchars(trim($_POST['first_name'] ?? ''));
$last_name = htmlspecialchars(trim($_POST['last_name'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
$country_code = htmlspecialchars(trim($_POST['countryCode'] ?? ''));
$gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
$dob = htmlspecialchars(trim($_POST['dob'] ?? ''));
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$terms = isset($_POST['terms']) ? true : false;

// التحقق من صحة البيانات
$errors = array();

if (empty($first_name)) {
    $errors['first_name'] = "الاسم الأول مطلوب.";
} elseif (strlen($first_name) < 2) {
    $errors['first_name'] = "الاسم الأول يجب أن يكون على الأقل حرفين.";
}

if (empty($last_name)) {
    $errors['last_name'] = "الاسم الأخير مطلوب.";
} elseif (strlen($last_name) < 2) {
    $errors['last_name'] = "الاسم الأخير يجب أن يكون على الأقل حرفين.";
}

if (empty($email)) {
    $errors['email'] = "البريد الإلكتروني مطلوب.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "صيغة البريد الإلكتروني غير صحيحة.";
} else {
    // التحقق من أن البريد الإلكتروني غير مسجل مسبقاً
    $query = "SELECT id FROM users WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    
    try {
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $errors['email'] = "البريد الإلكتروني مسجل مسبقاً.";
        }
    } catch (PDOException $e) {
        error_log("Email check error: " . $e->getMessage());
        $errors['email'] = "حدث خطأ أثناء التحقق من البريد الإلكتروني.";
    }
}

if (empty($phone)) {
    $errors['phone'] = "رقم الهاتف مطلوب.";
} elseif (!preg_match('/^[0-9]{7,12}$/', $phone)) {
    $errors['phone'] = "رقم الهاتف يجب أن يكون بين 7 و 12 رقم.";
}

if (empty($gender) || !in_array($gender, ['male', 'female'])) {
    $errors['gender'] = "الجنس مطلوب.";
}

if (empty($dob)) {
    $errors['dob'] = "تاريخ الميلاد مطلوب.";
} else {
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    
    if ($age < 13) {
        $errors['dob'] = "يجب أن يكون عمرك 13 سنة على الأقل.";
    }
}

if (empty($password)) {
    $errors['password'] = "كلمة المرور مطلوبة.";
} elseif (strlen($password) < 8) {
    $errors['password'] = "كلمة المرور يجب أن تكون على الأقل 8 أحرف.";
} elseif (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
    $errors['password'] = "كلمة المرور يجب أن تحتوي على أحرف وأرقام.";
}

if ($password !== $confirm_password) {
    $errors['confirm_password'] = "كلمة المرور غير متطابقة.";
}

if (!$terms) {
    $errors['terms'] = "يجب الموافقة على الشروط والأحكام.";
}

// إذا كانت هناك أخطاء، نعيدها
if (!empty($errors)) {
    $response['errors'] = $errors;
    $response['message'] = "يوجد أخطاء في البيانات المدخلة.";
    echo json_encode($response);
    exit;
}

// إذا لم تكن هناك أخطاء، نقوم بتسجيل المستخدم
try {
    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // إعداد استعلام الإدخال
    $query = "INSERT INTO users 
              (first_name, last_name, email, phone, country_code, gender, dob, password, created_at) 
              VALUES 
              (:first_name, :last_name, :email, :phone, :country_code, :gender, :dob, :password, NOW())";
    
    $stmt = $db->prepare($query);
    
    // ربط القيم
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':country_code', $country_code);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':password', $hashed_password);
    
    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = "تم إنشاء الحساب بنجاح! يمكنك الآن تسجيل الدخول.";
    } else {
        $errorInfo = $stmt->errorInfo();
        error_log("Database error: " . print_r($errorInfo, true));
        $response['message'] = "حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.";
    }
} catch(PDOException $exception) {
    error_log("Database exception: " . $exception->getMessage());
    $response['message'] = "حدث خطأ في النظام. يرجى المحاولة مرة أخرى.";
}

echo json_encode($response);
?>