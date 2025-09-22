// التحقق من تسجيل الدخول عند تحميل الصفحة

<script>
window.addEventListener('load', () => {
    fetch('auth/check_session.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success' && data.user) {
                // المستخدم مسجل دخول → توجيه لصفحة الحجوزات
                window.location.href = "../booking_appo/booking.php";
            } 
            // إذا مش مسجل دخول → يبقى في نفس الصفحة
        })
        .catch(error => {
            console.error('Session check error:', error);
        });
});

</script>

