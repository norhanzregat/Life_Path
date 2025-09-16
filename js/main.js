// ===== Global Variables =====
let currentLanguage = localStorage.getItem('language') || 'ar';
let translations = {};
let currentBookingStep = 1;
let bookingData = {};
let teamMembers = [];
let services = [];

// ===== DOM Content Loaded =====
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

// ===== App Initialization =====
async function initializeApp() {
    showLoadingScreen();
    
    try {
        await loadTranslations();
        initializeLanguage();
        initializeNavigation();
        initializeModals();
        initializeBookingSystem();
        initializeForms();
        initializeAnimations();
        await loadInitialData();
        
        
        setTimeout(hideLoadingScreen, 1500);
    } catch (error) {
        console.error('App initialization error:', error);
        hideLoadingScreen();
    }
}

// ===== Loading Screen =====
function showLoadingScreen() {
    const loadingScreen = document.getElementById('loading-screen');
    if (loadingScreen) {
        loadingScreen.style.display = 'flex';
    }
}

function hideLoadingScreen() {
    const loadingScreen = document.getElementById('loading-screen');
    if (loadingScreen) {
        loadingScreen.style.opacity = '0';
        setTimeout(() => {
            loadingScreen.style.display = 'none';
        }, 500);
    }
}

// ===== Language System =====
async function loadTranslations() {
    try {
        const arResponse = await fetch('language/ar.json');
        const enResponse = await fetch('language/en.json');
        
        if (!arResponse.ok || !enResponse.ok) {
            throw new Error('Failed to load translations');
        }
        
        translations.ar = await arResponse.json();
        translations.en = await enResponse.json();
    } catch (error) {
        console.error('Error loading translations:', error);
        // Fallback translations
        translations = {
            ar: {
                site_title: "Life Path - عيادة مسار الحياة النفسية",
                nav_home: "الرئيسية",
                nav_about: "عن العيادة",
                nav_services: "خدماتنا",
                nav_team: "فريقنا",
                nav_contact: "اتصل بنا",
                login: "تسجيل الدخول",
                register: "إنشاء حساب",
                hero_title: "ابدأ رحلة التعافي مع Life Path",
                hero_subtitle: "نحن هنا لنساعدك في رحلتك نحو الصحة النفسية والتوازن الداخلي، مع فريق من الأخصائيين النفسيين ذوي الخبرة والكفاءة.",
                book_appointment: "احجز موعدك الآن",
                learn_more: "اعرف المزيد"
            },
            en: {
                site_title: "Life Path - Psychological Clinic",
                nav_home: "Home",
                nav_about: "About",
                nav_services: "Services",
                nav_team: "Team",
                nav_contact: "Contact",
                login: "Login",
                register: "Register",
                hero_title: "Start Your Recovery Journey with Life Path",
                hero_subtitle: "We are here to help you on your journey towards mental health and inner balance, with a team of experienced and competent psychologists.",
                book_appointment: "Book Your Appointment Now",
                learn_more: "Learn More"
            }
        };
    }
}

function initializeLanguage() {
    setLanguage(currentLanguage);
    updateLanguageButton();
}

function setLanguage(lang) {
    currentLanguage = lang;
    localStorage.setItem('language', lang);
    
    // Update HTML attributes
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
    
    // Update font family
    document.body.style.fontFamily = lang === 'ar' ? 'var(--font-family-ar)' : 'var(--font-family-en)';
    
    // Translate all elements
    translatePage();
    updateLanguageButton();
}

function translatePage() {
    const elements = document.querySelectorAll('[data-translate]');
    elements.forEach(element => {
        const key = element.getAttribute('data-translate');
        const translation = translations[currentLanguage]?.[key];
        
        if (translation) {
            if (element.tagName === 'INPUT' && element.type === 'submit') {
                element.value = translation;
            } else if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                element.placeholder = translation;
            } else {
                element.textContent = translation;
            }
        }
    });
}

function updateLanguageButton() {
    const currentLanguageSpan = document.getElementById('currentLanguage');
    const languageButton = document.getElementById('languageButton');
    
    if (currentLanguageSpan && languageButton) {
        if (currentLanguage === 'ar') {
            currentLanguageSpan.textContent = 'العربية';
            languageButton.innerHTML = '<i class="bi bi-translate"></i><span>العربية</span><i class="bi bi-chevron-down"></i>';
        } else {
            currentLanguageSpan.textContent = 'English';
            languageButton.innerHTML = '<i class="bi bi-translate"></i><span>English</span><i class="bi bi-chevron-down"></i>';
        }
    }
}

// ===== Navigation =====
function initializeNavigation() {
    // Navbar scroll effect
    window.addEventListener('scroll', handleNavbarScroll);
    
    // Language selector
    const languageButton = document.getElementById('languageButton');
    const languageDropdown = document.getElementById('languageDropdown');
    const languageOptions = document.querySelectorAll('.language-option');
    
    if (languageButton && languageDropdown) {
        languageButton.addEventListener('click', (e) => {
            e.stopPropagation();
            languageDropdown.classList.toggle('show');
        });
        
        languageOptions.forEach(option => {
            option.addEventListener('click', () => {
                const lang = option.getAttribute('data-lang');
                setLanguage(lang);
                languageDropdown.classList.remove('show');
            });
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!languageButton.contains(e.target) && !languageDropdown.contains(e.target)) {
                languageDropdown.classList.remove('show');
            }
        });
    }
    
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            scrollToSection(targetId);
        });
    });
    
    // Active navigation highlighting
    window.addEventListener('scroll', updateActiveNavigation);
}

function handleNavbarScroll() {
    const navbar = document.getElementById('mainNavbar');
    if (navbar) {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
}

function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        const offsetTop = section.offsetTop - 80;
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

function updateActiveNavigation() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    
    let currentSection = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        const sectionHeight = section.offsetHeight;
        
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
            currentSection = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href').substring(1);
        if (href === currentSection) {
            link.classList.add('active');
        }
    });
}

// ===== Modals =====
function initializeModals() {
    // Auth modal tabs
    const loginTab = document.getElementById('loginTab');
    const registerTab = document.getElementById('registerTab');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    
    if (loginTab && registerTab && loginForm && registerForm) {
        loginTab.addEventListener('click', () => {
            switchAuthTab('login');
        });
        
        registerTab.addEventListener('click', () => {
            switchAuthTab('register');
        });
    }
}

function switchAuthTab(tab) {
    const loginTab = document.getElementById('loginTab');
    const registerTab = document.getElementById('registerTab');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    
    if (tab === 'login') {
        loginTab.classList.add('active');
        registerTab.classList.remove('active');
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
    } else {
        registerTab.classList.add('active');
        loginTab.classList.remove('active');
        registerForm.style.display = 'block';
        loginForm.style.display = 'none';
    }
}

// ===== Forms =====
function initializeForms() {
    // Contact form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }
    
    // Auth forms
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    
    if (loginForm) {
        loginForm.addEventListener('submit', handleLoginForm);
    }
    
    if (registerForm) {
        registerForm.addEventListener('submit', handleRegisterForm);
    }
    
    // Set max date for date of birth
    const dobInput = document.getElementById('registerDob');
    if (dobInput) {
        const today = new Date().toISOString().split('T')[0];
        dobInput.max = today;
    }
}

async function handleContactForm(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    try {
        showFormLoading(e.target);
        
        // Simulate API call for demo
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        showSuccessMessage(getTranslation('contact_success', 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.'));
        e.target.reset();
    } catch (error) {
        console.error('Contact form error:', error);
        showErrorMessage(getTranslation('contact_error', 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.'));
    } finally {
        hideFormLoading(e.target);
    }
}

async function handleLoginForm(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    try {
        showFormLoading(e.target);
        
        // Simulate API call for demo
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        const user = {
            id: 1,
            name: 'مستخدم تجريبي',
            email: data.email
        };
        
        localStorage.setItem('user', JSON.stringify(user));
        showSuccessMessage(getTranslation('login_success', 'تم تسجيل الدخول بنجاح!'));
        
        // Close modal and update UI
        const authModal = bootstrap.Modal.getInstance(document.getElementById('authModal'));
        if (authModal) {
            authModal.hide();
        }
        
        updateUserInterface(user);
    } catch (error) {
        console.error('Login error:', error);
        showErrorMessage(getTranslation('login_error', 'خطأ في البريد الإلكتروني أو كلمة المرور.'));
    } finally {
        hideFormLoading(e.target);
    }
}

async function handleRegisterForm(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    try {
        showFormLoading(e.target);
        
        // Simulate API call for demo
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        showSuccessMessage(getTranslation('register_success', 'تم إنشاء الحساب بنجاح! يمكنك الآن تسجيل الدخول.'));
        switchAuthTab('login');
        e.target.reset();
    } catch (error) {
        console.error('Register error:', error);
        showErrorMessage(getTranslation('register_error', 'حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.'));
    } finally {
        hideFormLoading(e.target);
    }
}

// ===== Booking System =====
function initializeBookingSystem() {
    const bookingForm = document.getElementById('bookingForm');
    const nextStepBtn = document.getElementById('nextStep');
    const prevStepBtn = document.getElementById('prevStep');
    
    if (nextStepBtn) {
        nextStepBtn.addEventListener('click', nextBookingStep);
    }
    
    if (prevStepBtn) {
        prevStepBtn.addEventListener('click', prevBookingStep);
    }
    
    if (bookingForm) {
        bookingForm.addEventListener('submit', handleBookingForm);
    }
    
    // Initialize booking modal when opened
    const bookingModal = document.getElementById('bookingModal');
    if (bookingModal) {
        bookingModal.addEventListener('show.bs.modal', initializeBookingModal);
    }
}

function initializeBookingModal() {
    currentBookingStep = 1;
    bookingData = {};
    updateBookingStep();
    loadBookingServices();
}

function nextBookingStep() {
    if (validateCurrentBookingStep()) {
        if (currentBookingStep < 4) {
            currentBookingStep++;
            updateBookingStep();
            
            if (currentBookingStep === 2) {
                loadBookingDoctors();
            } else if (currentBookingStep === 3) {
                loadBookingCalendar();
            } else if (currentBookingStep === 4) {
                displayBookingSummary();
            }
        }
    }
}

function prevBookingStep() {
    if (currentBookingStep > 1) {
        currentBookingStep--;
        updateBookingStep();
    }
}

function updateBookingStep() {
    // Update step indicators
    const steps = document.querySelectorAll('.step');
    const stepContents = document.querySelectorAll('.booking-step-content');
    const nextBtn = document.getElementById('nextStep');
    const prevBtn = document.getElementById('prevStep');
    const confirmBtn = document.getElementById('confirmBooking');
    
    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        step.classList.remove('active', 'completed');
        
        if (stepNumber === currentBookingStep) {
            step.classList.add('active');
        } else if (stepNumber < currentBookingStep) {
            step.classList.add('completed');
        }
    });
    
    // Update step content
    stepContents.forEach((content, index) => {
        content.classList.remove('active');
        if (index + 1 === currentBookingStep) {
            content.classList.add('active');
        }
    });
    
    // Update buttons
    if (prevBtn) {
        prevBtn.style.display = currentBookingStep > 1 ? 'inline-flex' : 'none';
    }
    
    if (nextBtn && confirmBtn) {
        if (currentBookingStep === 4) {
            nextBtn.style.display = 'none';
            confirmBtn.style.display = 'inline-flex';
        } else {
            nextBtn.style.display = 'inline-flex';
            confirmBtn.style.display = 'none';
        }
    }
}

function validateCurrentBookingStep() {
    switch (currentBookingStep) {
        case 1:
            return bookingData.service_id ? true : (showErrorMessage('يرجى اختيار الخدمة'), false);
        case 2:
            return bookingData.doctor_id ? true : (showErrorMessage('يرجى اختيار الطبيب'), false);
        case 3:
            return bookingData.date && bookingData.time ? true : (showErrorMessage('يرجى اختيار التاريخ والوقت'), false);
        default:
            return true;
    }
}

function loadBookingServices() {
    // Demo services data
    services = [
        {
            id: 1,
            name: 'استشارة نفسية فردية',
            name_en: 'Individual Psychological Consultation',
            description: 'جلسة استشارية فردية مع أخصائي نفسي',
            description_en: 'Individual consultation session with a psychologist',
            price: 50,
            icon: 'bi bi-person-fill'
        },
        {
            id: 2,
            name: 'علاج نفسي للأطفال',
            name_en: 'Child Psychology Therapy',
            description: 'جلسات علاج نفسي متخصصة للأطفال',
            description_en: 'Specialized psychological therapy sessions for children',
            price: 60,
            icon: 'bi bi-emoji-smile-fill'
        },
        {
            id: 3,
            name: 'استشارة أسرية',
            name_en: 'Family Counseling',
            description: 'جلسات استشارية للأزواج والعائلات',
            description_en: 'Counseling sessions for couples and families',
            price: 80,
            icon: 'bi bi-people-fill'
        },
        {
            id: 4,
            name: 'تقييم نفسي شامل',
            name_en: 'Comprehensive Psychological Assessment',
            description: 'تقييم شامل للحالة النفسية',
            description_en: 'Comprehensive psychological assessment',
            price: 100,
            icon: 'bi bi-clipboard-data-fill'
        }
    ];
    
    displayBookingServices();
}

function displayBookingServices() {
    const servicesGrid = document.getElementById('servicesGrid');
    if (!servicesGrid) return;
    
    servicesGrid.innerHTML = services.map(service => `
        <div class="service-option" data-service-id="${service.id}" onclick="selectBookingService(${service.id})">
            <div class="service-option-icon">
                <i class="${service.icon}"></i>
            </div>
            <h6>${currentLanguage === 'ar' ? service.name : service.name_en}</h6>
            <p>${currentLanguage === 'ar' ? service.description : service.description_en}</p>
            <div class="service-option-price">${service.price} ${currentLanguage === 'ar' ? 'دينار' : 'JOD'}</div>
        </div>
    `).join('');
}

function selectBookingService(serviceId) {
    bookingData.service_id = serviceId;
    
    // Update UI
    const serviceOptions = document.querySelectorAll('.service-option');
    serviceOptions.forEach(option => {
        option.classList.remove('selected');
        if (parseInt(option.dataset.serviceId) === serviceId) {
            option.classList.add('selected');
        }
    });
}

function loadBookingDoctors() {
    // Demo doctors data
    const doctors = teamMembers.filter(member => member.id <= 3);
    displayBookingDoctors(doctors);
}

function displayBookingDoctors(doctors) {
    const doctorsGrid = document.getElementById('doctorsGrid');
    if (!doctorsGrid) return;
    
    doctorsGrid.innerHTML = doctors.map(doctor => `
        <div class="doctor-option" data-doctor-id="${doctor.id}" onclick="selectBookingDoctor(${doctor.id})">
            <img src="${doctor.image}" alt="${currentLanguage === 'ar' ? doctor.name : doctor.name_en}" class="doctor-option-image">
            <h6>${currentLanguage === 'ar' ? doctor.name : doctor.name_en}</h6>
            <p>${currentLanguage === 'ar' ? doctor.specialization : doctor.specialization_en}</p>
            <div class="doctor-option-rating">
                <div class="stars">
                    ${generateStars(doctor.rating)}
                </div>
                <span>(${doctor.reviews_count} ${getTranslation('reviews', 'تقييم')})</span>
            </div>
        </div>
    `).join('');
}

function selectBookingDoctor(doctorId) {
    bookingData.doctor_id = doctorId;
    
    // Update UI
    const doctorOptions = document.querySelectorAll('.doctor-option');
    doctorOptions.forEach(option => {
        option.classList.remove('selected');
        if (parseInt(option.dataset.doctorId) === doctorId) {
            option.classList.add('selected');
        }
    });
}

function loadBookingCalendar() {
    // Generate available dates for next 30 days (excluding weekends)
    const availableDates = [];
    const today = new Date();
    
    for (let i = 1; i <= 30; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        
        // Skip weekends (Friday = 5, Saturday = 6)
        if (date.getDay() !== 5 && date.getDay() !== 6) {
            availableDates.push(date.toISOString().split('T')[0]);
        }
    }
    
    displayBookingCalendar(availableDates);
}

function displayBookingCalendar(availableDates) {
    const calendarContainer = document.getElementById('calendarContainer');
    if (!calendarContainer) return;
    
    // Generate calendar for next 30 days
    const today = new Date();
    const calendar = [];
    
    for (let i = 0; i < 30; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        
        const dateStr = date.toISOString().split('T')[0];
        const isAvailable = availableDates.includes(dateStr);
        
        calendar.push({
            date: dateStr,
            day: date.getDate(),
            month: date.getMonth(),
            year: date.getFullYear(),
            dayName: date.toLocaleDateString(currentLanguage === 'ar' ? 'ar' : 'en', { weekday: 'short' }),
            available: isAvailable
        });
    }
    
    calendarContainer.innerHTML = calendar.map(day => `
        <div class="calendar-day ${day.available ? 'available' : 'unavailable'}" 
             data-date="${day.date}" 
             onclick="${day.available ? `selectBookingDate('${day.date}')` : ''}">
            <div class="day-name">${day.dayName}</div>
            <div class="day-number">${day.day}</div>
        </div>
    `).join('');
}

function selectBookingDate(date) {
    bookingData.date = date;
    
    // Update UI
    const calendarDays = document.querySelectorAll('.calendar-day');
    calendarDays.forEach(day => {
        day.classList.remove('selected');
        if (day.dataset.date === date) {
            day.classList.add('selected');
        }
    });
    
    // Load available time slots
    const timeSlots = [
        { time: '09:00', available: true },
        { time: '10:00', available: true },
        { time: '11:00', available: false },
        { time: '12:00', available: true },
        { time: '14:00', available: true },
        { time: '15:00', available: true },
        { time: '16:00', available: false },
        { time: '17:00', available: true }
    ];
    
    displayTimeSlots(timeSlots);
}

function displayTimeSlots(timeSlots) {
    const timeSlotsContainer = document.getElementById('timeSlots');
    if (!timeSlotsContainer) return;
    
    timeSlotsContainer.innerHTML = timeSlots.map(slot => `
        <div class="time-slot ${slot.available ? 'available' : 'unavailable'}" 
             data-time="${slot.time}" 
             onclick="${slot.available ? `selectBookingTime('${slot.time}')` : ''}">
            ${slot.time}
        </div>
    `).join('');
}

function selectBookingTime(time) {
    bookingData.time = time;
    
    // Update UI
    const timeSlots = document.querySelectorAll('.time-slot');
    timeSlots.forEach(slot => {
        slot.classList.remove('selected');
        if (slot.dataset.time === time) {
            slot.classList.add('selected');
        }
    });
}

function displayBookingSummary() {
    const summaryContainer = document.getElementById('bookingSummary');
    if (!summaryContainer) return;
    
    const service = services.find(s => s.id === bookingData.service_id);
    const doctor = teamMembers.find(d => d.id === bookingData.doctor_id);
    const selectedDate = new Date(bookingData.date);
    const formattedDate = selectedDate.toLocaleDateString(currentLanguage === 'ar' ? 'ar' : 'en', { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
    
    summaryContainer.innerHTML = `
        <div class="booking-summary-card">
            <div class="summary-item">
                <strong>${getTranslation('service', 'الخدمة')}:</strong>
                <span>${currentLanguage === 'ar' ? service?.name : service?.name_en || ''}</span>
            </div>
            <div class="summary-item">
                <strong>${getTranslation('doctor', 'الطبيب')}:</strong>
                <span>${currentLanguage === 'ar' ? doctor?.name : doctor?.name_en || ''}</span>
            </div>
            <div class="summary-item">
                <strong>${getTranslation('date', 'التاريخ')}:</strong>
                <span>${formattedDate}</span>
            </div>
            <div class="summary-item">
                <strong>${getTranslation('time', 'الوقت')}:</strong>
                <span>${bookingData.time}</span>
            </div>
            <div class="summary-item">
                <strong>${getTranslation('price', 'السعر')}:</strong>
                <span>${service?.price || 0} ${currentLanguage === 'ar' ? 'دينار' : 'JOD'}</span>
            </div>
        </div>
    `;
}

async function handleBookingForm(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const patientData = Object.fromEntries(formData.entries());
    
    const completeBookingData = {
        ...bookingData,
        ...patientData
    };
    
    try {
        showFormLoading(e.target);
        
        // Simulate API call for demo
        await new Promise(resolve => setTimeout(resolve, 1500));
        
        showSuccessMessage(getTranslation('booking_success', 'تم حجز موعدك بنجاح! سنتواصل معك قريباً لتأكيد الموعد.'));
        
        // Close modal
        const bookingModal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
        if (bookingModal) {
            bookingModal.hide();
        }
        
        // Reset form
        e.target.reset();
        currentBookingStep = 1;
        bookingData = {};
    } catch (error) {
        console.error('Booking error:', error);
        showErrorMessage(getTranslation('booking_error', 'حدث خطأ أثناء حجز الموعد. يرجى المحاولة مرة أخرى.'));
    } finally {
        hideFormLoading(e.target);
    }
}

// ===== Data Loading =====
async function loadInitialData() {
    await Promise.all([
        loadTeamMembers()
    ]);
}

async function loadTeamMembers() {
    try {
        // Fallback data for demo
        teamMembers = [
            {
                id: 1,
                name: 'د. أحمد علي',
                name_en: 'Dr. Ahmed Ali',
                specialization: 'أخصائي نفسي إكلينيكي',
                specialization_en: 'Clinical Psychologist',
                bio: 'خبرة أكثر من 15 عاماً في العلاج النفسي واضطرابات القلق.',
                bio_en: 'Over 15 years of experience in psychotherapy and anxiety disorders.',
                image: 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                rating: 4.9,
                reviews_count: 127
            },
            {
                id: 2,
                name: 'د. سارة يوسف',
                name_en: 'Dr. Sarah Youssef',
                specialization: 'معالجة نفسية',
                specialization_en: 'Psychotherapist',
                bio: 'متخصصة في العلاج السلوكي المعرفي والعلاج الأسري.',
                bio_en: 'Specialized in Cognitive Behavioral Therapy and Family Therapy.',
                image: 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                rating: 4.8,
                reviews_count: 89
            },
            {
                id: 3,
                name: 'د. ليلى حسن',
                name_en: 'Dr. Layla Hassan',
                specialization: 'استشارية أسرة',
                specialization_en: 'Family Counselor',
                bio: 'خبيرة في حل المشكلات الأسرية واستشارات ما قبل الزواج.',
                bio_en: 'Expert in family problem solving and pre-marital counseling.',
                image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                rating: 4.7,
                reviews_count: 156
            }
        ];
        displayTeamMembers();
    } catch (error) {
        console.error('Error loading team members:', error);
    }
}

function displayTeamMembers() {
    const teamContainer = document.getElementById('teamContainer');
    if (!teamContainer) return;
    
    const displayMembers = teamMembers.slice(0, 3); // Show first 3 members
    
    teamContainer.innerHTML = displayMembers.map(member => `
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="${member.id * 100}">
            <div class="team-card">
                <img src="${member.image}" alt="${currentLanguage === 'ar' ? member.name : member.name_en}" class="team-avatar">
                <h5>${currentLanguage === 'ar' ? member.name : member.name_en}</h5>
                <div class="position">${currentLanguage === 'ar' ? member.specialization : member.specialization_en}</div>
                <p class="bio">${currentLanguage === 'ar' ? member.bio : member.bio_en}</p>
                <div class="team-rating">
                    <div class="stars">
                        ${generateStars(member.rating)}
                    </div>
                    <span>(${member.reviews_count} ${getTranslation('reviews', 'تقييم')})</span>
                </div>
            </div>
        </div>
    `).join('');
}

function loadMoreDoctors() {
    // This would typically open a dedicated doctors page or modal
    showSuccessMessage(getTranslation('feature_coming_soon', 'هذه الميزة قادمة قريباً!'));
}

// ===== Animations =====
function initializeAnimations() {
    // Initialize AOS (Animate On Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
    
    // Add scroll-triggered animations
    window.addEventListener('scroll', handleScrollAnimations);
}

function handleScrollAnimations() {
    // Add any custom scroll animations here
}

// ===== Utility Functions =====
function generateStars(rating) {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 !== 0;
    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
    
    let stars = '';
    
    // Full stars
    for (let i = 0; i < fullStars; i++) {
        stars += '<i class="bi bi-star-fill"></i>';
    }
    
    // Half star
    if (hasHalfStar) {
        stars += '<i class="bi bi-star-half"></i>';
    }
    
    // Empty stars
    for (let i = 0; i < emptyStars; i++) {
        stars += '<i class="bi bi-star"></i>';
    }
    
    return stars;
}

function getTranslation(key, fallback = '') {
    return translations[currentLanguage]?.[key] || fallback;
}

function showSuccessMessage(message) {
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    const successMessage = document.getElementById('successMessage');
    
    if (successMessage) {
        successMessage.textContent = message;
    }
    
    successModal.show();
}

function showErrorMessage(message) {
    // Simple alert for demo - you can implement a custom error modal
    alert(message);
}

function showFormLoading(form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> ' + getTranslation('loading', 'جاري التحميل...');
    }
}

function hideFormLoading(form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.disabled = false;
        // Restore original button text based on form type
        if (form.id === 'contactForm') {
            submitBtn.innerHTML = '<i class="bi bi-send"></i> ' + getTranslation('send_message', 'إرسال الرسالة');
        } else if (form.id === 'loginForm') {
            submitBtn.innerHTML = '<i class="bi bi-box-arrow-in-right"></i> ' + getTranslation('login', 'تسجيل الدخول');
        } else if (form.id === 'registerForm') {
            submitBtn.innerHTML = '<i class="bi bi-person-plus"></i> ' + getTranslation('register', 'إنشاء حساب');
        } else if (form.id === 'bookingForm') {
            submitBtn.innerHTML = '<i class="bi bi-check-circle"></i> ' + getTranslation('confirm_booking', 'تأكيد الحجز');
        }
    }
}

function updateUserInterface(user) {
    // Update login button to show user name
    const loginBtn = document.querySelector('.login-btn');
    if (loginBtn && user) {
        loginBtn.innerHTML = `
            <i class="bi bi-person-check"></i>
            <span>مرحباً، ${user.name}</span>
        `;
        loginBtn.onclick = () => {
            // Show user menu or logout
            if (confirm('هل تريد تسجيل الخروج؟')) {
                localStorage.removeItem('user');
                location.reload();
            }
        };
    }
}

// Check if user is logged in on page load
window.addEventListener('load', () => {
    const user = JSON.parse(localStorage.getItem('user') || 'null');
    if (user) {
        updateUserInterface(user);
    }
});