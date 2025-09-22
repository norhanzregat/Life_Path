// ملف lang.js
document.addEventListener('DOMContentLoaded', function () {
    // عناصر واجهة اختيار اللغة
    const languageButton = document.getElementById('languageButton');
    const languageDropdown = document.getElementById('languageDropdown');
    const currentLanguageElement = document.getElementById('currentLanguage');
    const chevronIcon = languageButton.querySelector('.bi-chevron-down');

    // حالة اللغة الحالية (الافتراضية: العربية)
    let currentLanguage = 'ar';

    // بيانات الترجمة
    let translations = {};

    // تهيئة النظام
    function initLanguageSystem() {
        // تحميل اللغة المحفوظة إذا وجدت
        const savedLanguage = localStorage.getItem('selectedLanguage');
        if (savedLanguage) {
            currentLanguage = savedLanguage;
            updateLanguageIndicator();
        }

        // تحميل الترجمة المناسبة
        loadTranslation(currentLanguage);

        // إعداد مستمعي الأحداث
        setupEventListeners();
    }

    // تحميل ملف الترجمة
    function loadTranslation(lang) {
        const translationFile = `locales/${lang}.json`;

        fetch(translationFile)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Failed to load translation file: ${translationFile}`);
                }
                return response.json();
            })
            .then(data => {
                translations = data;
                applyTranslations();
                updatePageDirection(lang);
            })
            .catch(error => {
                console.error('Error loading translation:', error);
                // المحاولة بتحميل اللغة الافتراضية عند الفشل
                if (lang !== 'ar') {
                    loadTranslation('ar');
                }
            });
    }

    // تطبيق الترجمة على جميع العناصر
    function applyTranslations() {
        // العناصر التي تحتوي على سمة data-translate
        const translatableElements = document.querySelectorAll('[data-translate]');

        translatableElements.forEach(element => {
            const key = element.getAttribute('data-translate');

            if (translations[key]) {
                if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                    element.placeholder = translations[key];
                } else if (element.tagName === 'OPTION') {
                    element.textContent = translations[key];
                } else if (element.hasAttribute('title')) {
                    element.setAttribute('title', translations[key]);
                } else if (element.hasAttribute('alt')) {
                    element.setAttribute('alt', translations[key]);
                } else {
                    element.textContent = translations[key];
                }
            }
        });

        // تحديث مؤشر اللغة الحالية
        updateLanguageIndicator();
    }

    // تحديث اتجاه الصفحة بناءً على اللغة
    function updatePageDirection(lang) {
        if (lang === 'ar') {
            document.documentElement.dir = 'rtl';
            document.documentElement.lang = 'ar';
            document.body.classList.add('rtl');
            document.body.classList.remove('ltr');
        } else {
            document.documentElement.dir = 'ltr';
            document.documentElement.lang = 'en';
            document.body.classList.add('ltr');
            document.body.classList.remove('rtl');
        }
    }

    // تحديث مؤشر اللغة في واجهة المستخدم
    function updateLanguageIndicator() {
        currentLanguageElement.textContent = (currentLanguage === 'ar') ? 'العربية' : 'English';
    }

    // إعداد مستمعي الأحداث
    function setupEventListeners() {
        // فتح/إغلاق قائمة اللغة
        languageButton.addEventListener('click', function (e) {
            e.stopPropagation();
            languageDropdown.classList.toggle('show');
            languageButton.classList.toggle('open'); // عشان ندور السهم
        });

        // اختيار لغة جديدة
        const languageOptions = document.querySelectorAll('.language-option');
        languageOptions.forEach(option => {
            option.addEventListener('click', function () {
                const selectedLang = this.getAttribute('data-lang');
                if (selectedLang !== currentLanguage) {
                    currentLanguage = selectedLang;
                    localStorage.setItem('selectedLanguage', currentLanguage);
                    loadTranslation(currentLanguage);
                    languageDropdown.classList.remove('show');
                    languageButton.classList.remove('open');
                }
            });
        });

        // إغلاق قائمة اللغة عند النقر خارجها
        document.addEventListener('click', function (e) {
            if (!languageButton.contains(e.target) && !languageDropdown.contains(e.target)) {
                languageDropdown.classList.remove('show');
                languageButton.classList.remove('open');
            }
        });
    }

    // بدء تشغيل نظام الترجمة
    initLanguageSystem();
});
