<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Notifications</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .notif-header {
      background: #fff;
      padding: 15px 20px;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.08);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .notif-card {
      background: #fff;
      border-radius: 12px;
      padding: 15px 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      margin-bottom: 12px;
      transition: all 0.2s;
      cursor: pointer;
      display: flex;
      align-items: flex-start;
    }
    .notif-card.unread {
      border-left: 4px solid #0d6efd;
      background: #eef6ff;
    }
    .notif-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .filter-btn.active {
      font-weight: bold;
      border-bottom: 2px solid #0d6efd;
      color: #0d6efd;
    }
    .notif-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #e6f2ff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      flex-shrink: 0;
    }
    .notif-icon.appointment {
      background: #e6f2ff;
      color: #0d6efd;
    }
    .notif-icon.prescription {
      background: #e6ffe6;
      color: #198754;
    }
    .notif-icon.message {
      background: #fff0e6;
      color: #fd7e14;
    }
    .notif-icon.system {
      background: #f2e6ff;
      color: #6f42c1;
    }
    .notif-content {
      flex-grow: 1;
    }
    .notif-actions {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }
    .time-filter {
      background: #fff;
      padding: 10px 15px;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      margin-bottom: 15px;
    }
    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: #6c757d;
    }
    .empty-state i {
      font-size: 60px;
      margin-bottom: 15px;
      opacity: 0.5;
    }
    [dir="rtl"] .notif-icon {
      margin-right: 0;
      margin-left: 15px;
    }
    [dir="rtl"] .notif-card.unread {
      border-left: none;
      border-right: 4px solid #0d6efd;
    }
  </style>
</head>
<body>
<div class="container py-4">

  <!-- Header -->
  <div class="notif-header">
    <h4 id="pageTitle" class="m-0">Notifications</h4>
    <div>
      <button class="btn btn-sm btn-outline-primary me-2" id="markAllRead">
        <i class="fas fa-check-double me-1"></i> <span>Mark all as read</span>
      </button>
      <button class="btn btn-sm btn-outline-danger me-2" id="deleteAll">
        <i class="fas fa-trash me-1"></i> <span>Delete all</span>
      </button>
      <button id="langToggle" class="btn btn-sm btn-outline-secondary">العربية</button>
    </div>
  </div>

  <!-- Filters -->
  <div class="d-flex justify-content-between mb-3 flex-wrap">
    <div>
      <button type="button" class="btn btn-link filter-btn active" data-filter="all">All</button>
      <button type="button" class="btn btn-link filter-btn" data-filter="unread">Unread</button>
      <button type="button" class="btn btn-link filter-btn" data-filter="read">Read</button>
    </div>
    
    <!-- Time Filter -->
    <div class="time-filter">
      <span class="me-2">Time:</span>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-sm btn-outline-secondary time-filter-btn active" data-time="all">All</button>
        <button type="button" class="btn btn-sm btn-outline-secondary time-filter-btn" data-time="today">Today</button>
        <button type="button" class="btn btn-sm btn-outline-secondary time-filter-btn" data-time="week">This Week</button>
        <button type="button" class="btn btn-sm btn-outline-secondary time-filter-btn" data-time="month">This Month</button>
      </div>
    </div>
  </div>

  <!-- Notifications List -->
  <div id="notifContainer">
    <!-- Notifications will be loaded here -->
  </div>
</div>

<!-- Modal for Notification Details -->
<div class="modal fade" id="notifModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Notification Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Notification details will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="markAsReadBtn">Mark as Read</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ====== Translations ======
  const translations = {
    en: {
      pageTitle: "Notifications",
      all: "All",
      unread: "Unread",
      read: "Read",
      markAll: "Mark all as read",
      deleteAll: "Delete all",
      lang: "العربية",
      today: "Today",
      week: "This Week",
      month: "This Month",
      time: "Time:",
      noNotifications: "No notifications available",
      appointment: "Appointment",
      prescription: "Prescription",
      message: "Message",
      system: "System",
      confirmDelete: "Are you sure you want to delete all notifications?",
      confirmMarkRead: "Are you sure you want to mark all notifications as read?"
    },
    ar: {
      pageTitle: "الإشعارات",
      all: "الكل",
      unread: "غير المقروءة",
      read: "المقروءة",
      markAll: "تحديد الكل كمقروء",
      deleteAll: "حذف الكل",
      lang: "English",
      today: "اليوم",
      week: "هذا الأسبوع",
      month: "هذا الشهر",
      time: "الوقت:",
      noNotifications: "لا توجد إشعارات",
      appointment: "موعد",
      prescription: "وصفة طبية",
      message: "رسالة",
      system: "النظام",
      confirmDelete: "هل أنت متأكد أنك تريد حذف جميع الإشعارات؟",
      confirmMarkRead: "هل أنت متأكد أنك تريد تحديد جميع الإشعارات كمقروءة؟"
    }
  };

  let currentLang = localStorage.getItem("notifLang") || "en";
  let notifications = [];
  let currentFilter = "all";
  let currentTimeFilter = "all";
  let modal = new bootstrap.Modal(document.getElementById('notifModal'));
  let selectedNotifId = null;

  // ====== Initialize the page ======
  document.addEventListener('DOMContentLoaded', function() {
    applyLang(currentLang);
    loadNotifications();
    setupEventListeners();
  });

  // ====== Language Functions ======
  function applyLang(lang) {
    document.getElementById("pageTitle").textContent = translations[lang].pageTitle;
    document.querySelector("[data-filter='all']").textContent = translations[lang].all;
    document.querySelector("[data-filter='unread']").textContent = translations[lang].unread;
    document.querySelector("[data-filter='read']").textContent = translations[lang].read;
    document.querySelector("#markAllRead span").textContent = translations[lang].markAll;
    document.querySelector("#deleteAll span").textContent = translations[lang].deleteAll;
    document.getElementById("langToggle").textContent = translations[lang].lang;
    
    document.querySelector(".time-filter span").textContent = translations[lang].time;
    document.querySelector("[data-time='all']").textContent = translations[lang].all;
    document.querySelector("[data-time='today']").textContent = translations[lang].today;
    document.querySelector("[data-time='week']").textContent = translations[lang].week;
    document.querySelector("[data-time='month']").textContent = translations[lang].month;

    document.documentElement.lang = lang;
    document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
  }

  // ====== Event Listeners ======
  function setupEventListeners() {
    // Language toggle
    document.getElementById("langToggle").addEventListener("click", () => {
      currentLang = currentLang === "en" ? "ar" : "en";
      localStorage.setItem("notifLang", currentLang);
      applyLang(currentLang);
    });

    // Filter buttons
    document.querySelectorAll(".filter-btn").forEach(btn => {
      btn.addEventListener("click", () => {
        document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");
        currentFilter = btn.getAttribute("data-filter");
        renderNotifications();
      });
    });

    // Time filter buttons
    document.querySelectorAll(".time-filter-btn").forEach(btn => {
      btn.addEventListener("click", () => {
        document.querySelectorAll(".time-filter-btn").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");
        currentTimeFilter = btn.getAttribute("data-time");
        renderNotifications();
      });
    });

    // Mark all as read
    document.getElementById("markAllRead").addEventListener("click", () => {
      if (confirm(translations[currentLang].confirmMarkRead)) {
        markAllAsRead();
      }
    });

    // Delete all
    document.getElementById("deleteAll").addEventListener("click", () => {
      if (confirm(translations[currentLang].confirmDelete)) {
        deleteAllNotifications();
      }
    });

    // Mark as read button in modal
    document.getElementById("markAsReadBtn").addEventListener("click", () => {
      if (selectedNotifId !== null) {
        markAsRead(selectedNotifId);
        modal.hide();
      }
    });
  }

  // ====== Notification Functions ======
  function loadNotifications() {
    // In a real application, this would be an API call to your backend
    // For demonstration, we're using localStorage or generating sample data
    
    const savedNotifications = localStorage.getItem('doctorNotifications');
    
    if (savedNotifications) {
      notifications = JSON.parse(savedNotifications);
    } else {
      // Generate sample notifications if none exist
      generateSampleNotifications();
    }
    
    renderNotifications();
  }

  function generateSampleNotifications() {
    const now = new Date();
    const types = ['appointment', 'prescription', 'message', 'system'];
    
    notifications = [
      {
        id: 1,
        type: 'appointment',
        title: 'New Appointment Booking',
        message: 'Patient: Ahmed Mohammed\nDate: Tomorrow at 10:00 AM\nService: General Consultation',
        time: new Date(now.getTime() - 30 * 60000), // 30 minutes ago
        status: 'unread',
        patientId: 123
      },
      {
        id: 2,
        type: 'prescription',
        title: 'Prescription Request',
        message: 'Patient: Sara Ali requested a renewal of her medication prescription.',
        time: new Date(now.getTime() - 2 * 3600 * 1000), // 2 hours ago
        status: 'unread',
        patientId: 456
      },
      {
        id: 3,
        type: 'appointment',
        title: 'Appointment Reminder',
        message: 'You have an appointment with Patient: Omar Khaled in 1 hour.',
        time: new Date(now.getTime() - 5 * 3600 * 1000), // 5 hours ago
        status: 'read',
        patientId: 789
      },
      {
        id: 4,
        type: 'system',
        title: 'System Update',
        message: 'The clinic management system will be updated tonight at 2:00 AM. Expect 30 minutes of downtime.',
        time: new Date(now.getTime() - 24 * 3600 * 1000), // 1 day ago
        status: 'read'
      },
      {
        id: 5,
        type: 'message',
        title: 'New Message',
        message: 'You have a new message from Patient: Layla Mahmoud regarding test results.',
        time: new Date(now.getTime() - 2 * 24 * 3600 * 1000), // 2 days ago
        status: 'read',
        patientId: 101
      }
    ];
    
    saveNotifications();
  }

  function saveNotifications() {
    localStorage.setItem('doctorNotifications', JSON.stringify(notifications));
  }

  function renderNotifications() {
    const container = document.getElementById('notifContainer');
    
    if (notifications.length === 0) {
      container.innerHTML = `
        <div class="empty-state">
          <i class="far fa-bell"></i>
          <h4>${translations[currentLang].noNotifications}</h4>
        </div>
      `;
      return;
    }
    
    let filteredNotifications = filterNotifications();
    
    if (filteredNotifications.length === 0) {
      container.innerHTML = `
        <div class="empty-state">
          <i class="fas fa-filter"></i>
          <h4>No notifications match your filters</h4>
        </div>
      `;
      return;
    }
    
    container.innerHTML = '';
    
    filteredNotifications.forEach(notif => {
      const notifElement = createNotificationElement(notif);
      container.appendChild(notifElement);
    });
  }

  function filterNotifications() {
    return notifications.filter(notif => {
      // Status filter
      if (currentFilter !== 'all' && notif.status !== currentFilter) {
        return false;
      }
      
      // Time filter
      if (currentTimeFilter !== 'all') {
        const now = new Date();
        const notifTime = new Date(notif.time);
        
        if (currentTimeFilter === 'today') {
          const isToday = notifTime.toDateString() === now.toDateString();
          if (!isToday) return false;
        }
        else if (currentTimeFilter === 'week') {
          const oneWeekAgo = new Date(now.getTime() - 7 * 24 * 3600 * 1000);
          if (notifTime < oneWeekAgo) return false;
        }
        else if (currentTimeFilter === 'month') {
          const oneMonthAgo = new Date(now.getTime() - 30 * 24 * 3600 * 1000);
          if (notifTime < oneMonthAgo) return false;
        }
      }
      
      return true;
    }).sort((a, b) => new Date(b.time) - new Date(a.time)); // Sort by time, newest first
  }

  function createNotificationElement(notif) {
    const notifElement = document.createElement('div');
    notifElement.className = `notif-card ${notif.status === 'unread' ? 'unread' : ''}`;
    notifElement.setAttribute('data-id', notif.id);
    notifElement.setAttribute('data-status', notif.status);
    
    const iconClass = getIconClass(notif.type);
    const timeAgo = getTimeAgo(notif.time);
    const typeText = translations[currentLang][notif.type] || notif.type;
    
    notifElement.innerHTML = `
      <div class="notif-icon ${notif.type}">
        <i class="${iconClass}"></i>
      </div>
      <div class="notif-content">
        <strong class="notif-title">${notif.title}</strong>
        <p class="notif-body mb-1">${notif.message.split('\n')[0]}</p>
        <small class="text-muted">${timeAgo} • ${typeText}</small>
      </div>
    `;
    
    notifElement.addEventListener('click', () => {
      showNotificationDetails(notif.id);
    });
    
    return notifElement;
  }

  function getIconClass(type) {
    switch(type) {
      case 'appointment': return 'far fa-calendar-check';
      case 'prescription': return 'fas fa-prescription';
      case 'message': return 'far fa-comment';
      case 'system': return 'fas fa-cog';
      default: return 'far fa-bell';
    }
  }

  function getTimeAgo(timestamp) {
    const now = new Date();
    const time = new Date(timestamp);
    const diffInSeconds = Math.floor((now - time) / 1000);
    
    if (diffInSeconds < 60) {
      return currentLang === 'en' ? 'Just now' : 'الآن';
    }
    
    const diffInMinutes = Math.floor(diffInSeconds / 60);
    if (diffInMinutes < 60) {
      return currentLang === 'en' 
        ? `${diffInMinutes} min ago` 
        : `منذ ${diffInMinutes} دقيقة`;
    }
    
    const diffInHours = Math.floor(diffInMinutes / 60);
    if (diffInHours < 24) {
      return currentLang === 'en' 
        ? `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago` 
        : `منذ ${diffInHours} ساعة`;
    }
    
    const diffInDays = Math.floor(diffInHours / 24);
    if (diffInDays < 7) {
      return currentLang === 'en' 
        ? `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago` 
        : `منذ ${diffInDays} يوم`;
    }
    
    return time.toLocaleDateString(currentLang === 'en' ? 'en-US' : 'ar-SA');
  }

  function showNotificationDetails(id) {
    const notif = notifications.find(n => n.id === id);
    if (!notif) return;
    
    selectedNotifId = id;
    
    document.getElementById('modalTitle').textContent = notif.title;
    document.getElementById('modalBody').textContent = notif.message;
    
    // Show the modal
    modal.show();
    
    // Mark as read when viewing
    if (notif.status === 'unread') {
      markAsRead(id);
    }
  }

  function markAsRead(id) {
    const index = notifications.findIndex(n => n.id === id);
    if (index !== -1) {
      notifications[index].status = 'read';
      saveNotifications();
      renderNotifications();
    }
  }

  function markAllAsRead() {
    notifications = notifications.map(notif => ({
      ...notif,
      status: 'read'
    }));
    
    saveNotifications();
    renderNotifications();
  }

  function deleteAllNotifications() {
    notifications = [];
    saveNotifications();
    renderNotifications();
  }

  // ====== Simulate New Appointment Notification ======
  // This function would be called when a new appointment is booked
  function simulateNewAppointment(patientName, appointmentTime) {
    const newNotif = {
      id: Date.now(), // Using timestamp as ID
      type: 'appointment',
      title: 'New Appointment Booking',
      message: `Patient: ${patientName}\nDate: ${appointmentTime}\nService: General Consultation`,
      time: new Date(),
      status: 'unread',
      patientId: Math.floor(Math.random() * 1000) // Random patient ID for demo
    };
    
    notifications.unshift(newNotif); // Add to beginning of array
    saveNotifications();
    renderNotifications();
    
    // Show alert for new notification
    if ('Notification' in window && Notification.permission === 'granted') {
      new Notification('New Appointment', {
        body: `You have a new appointment with ${patientName}`
      });
    }
  }

  // Request notification permission
  if ('Notification' in window) {
    Notification.requestPermission();
  }

  // ====== Demo: Add sample notification after 5 seconds ======
  setTimeout(() => {
    simulateNewAppointment('Rana Hassan', 'Tomorrow at 2:00 PM');
  }, 5000);
</script>
</body>
</html>