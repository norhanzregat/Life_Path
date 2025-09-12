
    // التبديل بين تسجيل الدخول والتسجيل
    function switchToRegister() {
      document.getElementById('login-tab').classList.remove('active');
      document.getElementById('register-tab').classList.add('active');
      document.getElementById('loginForm').style.display = 'none';
      document.getElementById('registerForm').style.display = 'block';
    }

    function switchToLogin() {
      document.getElementById('register-tab').classList.remove('active');
      document.getElementById('login-tab').classList.add('active');
      document.getElementById('registerForm').style.display = 'none';
      document.getElementById('loginForm').style.display = 'block';
    }

    document.getElementById('login-tab').addEventListener('click', switchToLogin);
    document.getElementById('register-tab').addEventListener('click', switchToRegister);

    // إرسال النماذج
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('تم تسجيل الدخول بنجاح! سيتم توجيهك إلى صفحة الحجز.');
      setTimeout(function () {
        window.location.href = 'booking.html';
      }, 1000);
    });

    document.getElementById('registerForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('تم إنشاء الحساب بنجاح! يمكنك الآن تسجيل الدخول.');
      switchToLogin();
    });

    // منتقي اللغة المخصص
    document.getElementById('languageButton').addEventListener('click', function () {
      document.getElementById('languageDropdown').classList.toggle('show');
    });

    document.querySelectorAll('.language-option').forEach(option => {
      option.addEventListener('click', function () {
        const lang = this.getAttribute('data-lang');
        setLanguage(lang);
      });
    });

    function setLanguage(lang) {
      const langText = document.getElementById('currentLanguage');
      const langBtn = document.querySelector('.language-btn');

      if (lang === 'ar') {
        langText.textContent = 'العربية';
        langBtn.innerHTML = '<i class="bi bi-translate me-1"></i> العربية';
        document.documentElement.dir = 'rtl';
        document.documentElement.lang = 'ar';
        alert('تم تغيير اللغة إلى العربية');
      } else if (lang === 'en') {
        langText.textContent = 'English';
        langBtn.innerHTML = '<i class="bi bi-translate me-1"></i> English';
        document.documentElement.dir = 'ltr';
        document.documentElement.lang = 'en';
        alert('Language changed to English');
      }

      // إغلاق القائمة المنسدلة
      document.getElementById('languageDropdown').classList.remove('show');
    }

    // إغلاق منتقي اللغة عند النقر خارجها
    window.addEventListener('click', function (e) {
      const dropdown = document.getElementById('languageDropdown');
      const selector = document.querySelector('.language-selector');

      if (!selector.contains(e.target) && dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
      }
    });

    // منتقي الدولة للهاتف
    const countrySelect = document.getElementById('countrySelect');
    const countryDropdown = document.getElementById('countryDropdown');
    const countryCodeSpan = document.getElementById('countryCode');
    const countryFlagSpan = countrySelect.querySelector('.flag-icon');

    // فتح وإغلاق القائمة
    countrySelect.addEventListener('click', (e) => {
      e.stopPropagation();
      countryDropdown.classList.toggle('show');
    });

    // اختيار الدولة من القائمة
    document.querySelectorAll('.country-option').forEach(option => {
      option.addEventListener('click', () => {
        const code = option.getAttribute('data-code');
        const flag = option.getAttribute('data-flag');
        const flagClass = `flag-icon-${flag}`;

        countryCodeSpan.textContent = code;
        countryFlagSpan.className = `flag-icon ${flagClass}`;
        countryDropdown.classList.remove('show');
      });
    });

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener('click', function (event) {
      if (!countrySelect.contains(event.target) && !countryDropdown.contains(event.target)) {
        countryDropdown.classList.remove('show');
      }
    });

    // تعيين تاريخ أقصى لتاريخ الميلاد
    document.getElementById('dob').max = new Date().toISOString().split("T")[0];
