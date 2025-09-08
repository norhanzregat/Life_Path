<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Admin Dashboard</title>

    <!-- إضافة Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- إضافة Font Awesome لأيقونات الكاميرا -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- إضافة مكتبة Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <table border="0" width="100%" class="main-layout">
        <tr>
            <!-- Sidebar column -->
            <td class="sidebar-column" style="vertical-align: top; width: 250px;">
                <table border="0" class="profile-container">
                    <tr>
                        <td class="profile-img-cell">
                                        <label for="profileImageInput" class="profile-image-wrapper" title="Update Profile Picture" style="display: flex; align-items: center; justify-content: center;">
                                <!-- Placeholder (Default) -->
                                <div id="profilePlaceholder" class="profile-placeholder" style="
                                    width: 100px;
                                    height: 100px;
                                    aspect-ratio: 1 / 1;
                                    border-radius: 50%;
                                    background: #fff;
                                    color: #1a75d1;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 3.2rem;
                                    position: relative;
                                    cursor: pointer;
                                    border: 4px solid #1a75d1;
                                    transition: box-shadow 0.3s, border-color 0.3s;
                                    overflow: hidden;
                                ">
                                    <i class="fas fa-user-circle" style="font-size: 3.2rem; color: #2193b0; background: #fff;"></i>
                                </div>

                                <!-- Profile Image -->
                                <img id="profileImage" src="" class="profile-img" style="
                                    display:none;
                                    width: 100px;
                                    height: 100px;
                                    aspect-ratio: 1 / 1;
                                    object-fit: cover;
                                    border-radius: 50%;
                                    box-shadow: 0 4px 16px #1a75d1;
                                    border: 4px solid #1a75d1;
                                    background: #e0e0e0;
                                    position: relative;
                                    overflow: hidden;
                                " />
                            </label>
                            <input type="file" id="profileImageInput" accept="image/*" style="display:none;" />
                            <script>
                                // تغيير الصورة عند الرفع
                                document.getElementById("profileImageInput").addEventListener("change", function (event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById("profileImage").src = e.target.result;
                                            document.getElementById("profileImage").style.display = "block";
                                            document.getElementById("profilePlaceholder").style.display = "none";
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                });
                                // Clicking on the image also opens file input
                                document.getElementById("profileImage").onclick = function() {
                                    document.getElementById("profileImageInput").click();
                                };
                            </script>
                            <input type="file" id="profileImageInput" accept="image/*" style="display:none;" />
                        </td>
                        <td class="profile-info-cell">
                            <p class="profile-title">Administrator</p>
                            <p class="profile-subtitle">admin@edoc.com</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="logout-cell">
                            <a href="../logout.php">
                                <input type="button" value="Logout" class="logout-btn" />
                            </a>
                        </td>
                    </tr>
                </table>

                <!-- قائمة التنقل -->
                <table border="0" class="menu-list">
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-dashboard menu-active">
                            <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                                <i class="fas fa-tachometer-alt"></i> <span class="menu-text">Dashboard</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-doctor">
                            <a href="../doctors/index_doctor.php" class="non-style-link-menu">
                                <i class="fas fa-user-md"></i> <span class="menu-text">Doctors</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-schedule">
                            <a href="schedule.php" class="non-style-link-menu">
                                <i class="fas fa-calendar-alt"></i> <span class="menu-text">Schedule</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-appointment">
                            <a href="appointment.php" class="non-style-link-menu">
                                <i class="fas fa-calendar-check"></i> <span class="menu-text">Appointment</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-patient">
                            <a href="../patients/index_patients.php" class="non-style-link-menu">
                                <i class="fas fa-procedures"></i> <span class="menu-text">Patients</span>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- Main content column -->
            <td class="main-content-column" style="vertical-align: top; padding: 20px;">
                <div class="search-time-wrapper">
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search..." />
                        <button class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="datetime-box">
                        <i class="fas fa-calendar-alt calendar-icon"></i>
                        <span id="dateTimeDisplay">Loading...</span>
                    </div>
                </div>

                <!-- Dashboard content -->
                <h2>Dashboard Overview</h2>

                <!-- Stats section -->
                <div id="statsSection">
                    <div class="stat-box">
                        <i class="fas fa-user-md stat-icon"></i>
                        <div>
                            <p class="stat-title">Total Doctors</p>
                            <span id="totalDoctors">15</span>
                        </div>
                    </div>

                    <div class="stat-box">
                        <i class="fas fa-procedures stat-icon"></i>
                        <div>
                            <p class="stat-title">Total Patients</p>
                            <span id="totalPatients">120</span>
                        </div>
                    </div>

                    <div class="stat-box">
                        <i class="fas fa-calendar-check stat-icon"></i>
                        <div>
                            <p class="stat-title">Upcoming Appointments</p>
                            <span id="totalAppointments">30</span>
                        </div>
                    </div>

                    <div class="stat-box">
                        <i class="fas fa-user-plus stat-icon"></i>
                        <div>
                            <p class="stat-title">New Patients This Week</p>
                            <span id="newPatientsThisWeek">5</span>
                        </div>
                    </div>
                </div>


                <!-- Chart section -->

                <div class="chart-card">
                    <div class="chart-header">
                        <i class="fas fa-chart-bar chart-icon"></i>
                        <span>Appointments per Day (Last Week)</span>
                    </div>
                    <canvas id="appointmentsChart" width="400" height="150"></canvas>
                </div>


                <!-- Upcoming appointments list -->
                <div class="appointments-card">
                    <h3 class="appointments-title">Upcoming Appointments</h3>
                    <ul id="upcomingAppointmentsList" class="appointments-list">
                        <!-- المواعيد ستُضاف تلقائيًا من الجافا سكربت -->
                    </ul>
                </div>


                <!-- Patients table -->
                <h3>Patients List</h3>
                <div class="patients-card">
                    <h3>Patients List</h3>
                    <table border="1" width="100%" id="patientsTable">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>P001</td>
                                <td>Ali Hassan</td>
                                <td>30</td>
                                <td>+96288556666</td>
                            </tr>
                            <tr>
                                <td>P002</td>
                                <td>Fatima Noor</td>
                                <td>25</td>
                                <td>+9625874556</td>
                            </tr>
                            <tr>
                                <td>P003</td>
                                <td>Omar Khalid</td>
                                <td>40</td>
                                <td>+962192837465</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </td>
        </tr>
    </table>

    <script>
        const profileImageInput = document.getElementById('profileImageInput');
        const profileImage = document.getElementById('profileImage');

        profileImageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function () {
                    profileImage.src = reader.result;
                });

                reader.readAsDataURL(file);
            }
        });

        function updateDateTime() {
            const now = new Date();
            const dateTimeDisplay = document.getElementById("dateTimeDisplay");
            const options = {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            dateTimeDisplay.textContent = now.toLocaleDateString('en-US', options);
        }

        updateDateTime();
        setInterval(updateDateTime, 60000); // تحديث كل دقيقة

        // Chart.js رسم بياني للمواعيد
        const ctx = document.getElementById('appointmentsChart').getContext('2d');
        const appointmentsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Appointments',
                    data: [5, 7, 3, 8, 6, 4, 2],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
    <script>
        const ctx = document.getElementById('appointmentsChart').getContext('2d');

        const appointmentsChart = new Chart(ctx, {
            type: 'bar', // نوع الرسم (bar = أعمدة)
            data: {
                labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'], // أيام الأسبوع
                datasets: [{
                    label: 'Appointments',
                    data: [5, 8, 4, 9, 6, 7, 3], // بيانات وهمية (عدد المواعيد في كل يوم)
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Weekly Appointments Overview',
                        font: { size: 16 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
    <script>
        // بيانات المواعيد القادمة
        const upcomingAppointments = [
            { name: "Norhan Zregat", date: "2025-07-22", time: "10:00 AM" },
            { name: "Salma Shdaifat", date: "2025-07-22", time: "11:00 AM" },
            { name: "Batool Jaber", date: "2025-07-23", time: "09:30 AM" }
        ];

        // توليد قائمة المواعيد ديناميكيًا
        const listElement = document.getElementById("upcomingAppointmentsList");

        upcomingAppointments.forEach(appointment => {
            const li = document.createElement("li");
            li.innerHTML = `
    <span>${appointment.name}</span>
    <span>${appointment.date} - ${appointment.time}</span>
  `;
            listElement.appendChild(li);
        });

    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>