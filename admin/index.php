<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindCare Clinic - Doctor Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #1a75d1;
            --light-blue: #e6f0ff;
            --dark-blue: #0d4d8c;
            --accent-blue: #2193b0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .sidebar {
            background: linear-gradient(to bottom, var(--primary-blue), var(--dark-blue));
            color: white;
            height: 100vh;
            position: fixed;
            width: 250px;
            padding: 0;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .profile-section {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            margin-bottom: 15px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 20px;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid white;
        }
        
        .nav-link i {
            width: 25px;
        }
        
        .logout-btn {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        .header {
            background-color: white;
            border-radius: 10px;
            padding: 15px 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .search-box {
            background-color: #f5f7fa;
            border-radius: 20px;
            padding: 8px 15px;
            width: 300px;
            border: 1px solid #e0e0e0;
        }
        
        .search-box input {
            border: none;
            background: transparent;
            width: 85%;
        }
        
        .search-box input:focus {
            outline: none;
        }
        
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card {
            text-align: center;
            padding: 20px;
        }
        
        .stat-icon {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--dark-blue);
        }
        
        .stat-title {
            color: #666;
            font-size: 0.9rem;
        }
        
        .tab-content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .nav-tabs .nav-link {
            border: none;
            border-radius: 5px;
            color: #666;
            padding: 10px 20px;
            margin-right: 5px;
        }
        
        .nav-tabs .nav-link.active {
            background-color: var(--primary-blue);
            color: white;
        }
        
        .table th {
            background-color: var(--light-blue);
            color: var(--dark-blue);
            border-top: none;
        }
        
        .badge-success {
            background-color: #28a745;
        }
        
        .badge-warning {
            background-color: #ffc107;
        }
        
        .badge-danger {
            background-color: #dc3545;
        }
        
        .evaluation-item {
            border-left: 4px solid var(--primary-blue);
            padding-left: 15px;
            margin-bottom: 15px;
        }
        
        .rating {
            color: #ffc107;
        }
        
        .doctor-permissions {
            background-color: var(--light-blue);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .permission-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .permission-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
        }
        
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            color: white;
        }


        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }
        
        .notification-icon {
            position: relative;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .main-content {
                margin-left: 70px;
            }
            .profile-info, .menu-text {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile-section">
            <img src="https://ui-avatars.com/api/?name=Dr.+Smith&background=2193b0&color=fff" alt="Doctor" class="profile-img">
            <div class="profile-info">
                <h5 class="mb-0">Dr. Smith</h5>
                <small>Psychiatrist</small>
                <small>dr.smith@mindcare.com</small>
            </div>
        </div>

        <div class="navigation">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="doctor_dashboard.php">
                        <i class="fas fa-tachometer-alt"></i> <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_appointments.php">
                        <i class="fas fa-calendar-check"></i> <span class="menu-text">Appointments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_patients.php">
                        <i class="fas fa-procedures"></i> <span class="menu-text">My Patients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_schedule.php">
                        <i class="fas fa-calendar-alt"></i> <span class="menu-text">Schedule</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_prescriptions.php">
                        <i class="fas fa-prescription"></i> <span class="menu-text">Prescriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_evaluations.php">
                        <i class="fas fa-star"></i> <span class="menu-text">Evaluations</span>
                        <span class="notification-badge">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_reports.php">
                        <i class="fas fa-chart-bar"></i> <span class="menu-text">Reports</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-4 p-3">
            <a href="../logout.php" class="btn logout-btn">
                <i class="fas fa-sign-out-alt"></i> <span class="menu-text">Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h4 class="mb-0">Doctor Dashboard</h4>
            <div class="d-flex align-items-center">
                <div class="search-box me-3">
                    <i class="fas fa-search text-muted"></i>
                    <input type="text" placeholder="Search patients, appointments...">
                </div>
                <div class="me-3 notification-icon">
                    <i class="fas fa-bell fa-lg text-primary-blue"></i>
                    <span class="notification-badge">5</span>
                </div>
                <div class="datetime-box bg-light-blue px-3 py-2 rounded">
                    <i class="fas fa-calendar-alt me-2 text-primary-blue"></i>
                    <span id="currentDateTime">Loading...</span>
                </div>
            </div>
        </div>

        <!-- Doctor Stats Section -->
        <div class="row">
            <div class="col-md-3">
                <div class="card stat-card">
                    <i class="fas fa-calendar-check stat-icon"></i>
                    <div class="stat-number">8</div>
                    <div class="stat-title">Today's Appointments</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <i class="fas fa-procedures stat-icon"></i>
                    <div class="stat-number">42</div>
                    <div class="stat-title">My Patients</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <i class="fas fa-prescription stat-icon"></i>
                    <div class="stat-number">5</div>
                    <div class="stat-title">Prescriptions Today</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <i class="fas fa-star stat-icon"></i>
                    <div class="stat-number">4.8</div>
                    <div class="stat-title">Average Rating</div>
                </div>
            </div>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs mt-4" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab">Today</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="patients-tab" data-bs-toggle="tab" data-bs-target="#patients" type="button" role="tab">My Patients</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="evaluations-tab" data-bs-toggle="tab" data-bs-target="#evaluations" type="button" role="tab">Evaluations</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="prescriptions-tab" data-bs-toggle="tab" data-bs-target="#prescriptions" type="button" role="tab">Prescriptions</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="dashboardTabsContent">
            <!-- Today Tab -->
            <div class="tab-pane fade show active" id="today" role="tabpanel">
                <h5 class="mb-4">Today's Appointments</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Patient</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Example PHP code to fetch today's appointments from database
                            /*
                            $doctor_id = $_SESSION['doctor_id'];
                            $today = date('Y-m-d');
                            $sql = "SELECT a.*, p.name as patient_name, p.phone 
                                    FROM appointments a 
                                    JOIN patients p ON a.patient_id = p.id 
                                    WHERE a.doctor_id = $doctor_id AND a.appointment_date = '$today'
                                    ORDER BY a.appointment_time";
                            $result = mysqli_query($conn, $sql);
                            
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>".$row['appointment_time']."</td>
                                    <td>".$row['patient_name']."</td>
                                    <td>".$row['reason']."</td>
                                    <td><span class='badge bg-".getStatusColor($row['status'])."'>".$row['status']."</span></td>
                                    <td>
                                        <button class='btn btn-sm btn-outline-primary'><i class='fas fa-eye'></i></button>
                                        <button class='btn btn-sm btn-outline-success'><i class='fas fa-check'></i></button>
                                    </td>
                                </tr>";
                            }
                            */
                            ?>
                            <tr>
                                <td>09:00 AM</td>
                                <td>Ali Hassan</td>
                                <td>Anxiety follow-up</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>10:30 AM</td>
                                <td>Fatima Noor</td>
                                <td>Initial consultation</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>02:15 PM</td>
                                <td>Omar Khalid</td>
                                <td>Depression therapy</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Patients Tab -->
            <div class="tab-pane fade" id="patients" role="tabpanel">
                <h5 class="mb-4">My Patients</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Last Visit</th>
                                <th>Next Appointment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Example PHP code to fetch doctor's patients from database
                            /*
                            $doctor_id = $_SESSION['doctor_id'];
                            $sql = "SELECT p.*, MAX(a.appointment_date) as last_visit, 
                                    (SELECT appointment_date FROM appointments 
                                     WHERE patient_id = p.id AND appointment_date > CURDATE() 
                                     ORDER BY appointment_date LIMIT 1) as next_appointment
                                    FROM patients p
                                    JOIN appointments a ON p.id = a.patient_id
                                    WHERE a.doctor_id = $doctor_id
                                    GROUP BY p.id";
                            $result = mysqli_query($conn, $sql);
                            
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".calculateAge($row['dob'])."</td>
                                    <td>".$row['last_visit']."</td>
                                    <td>".$row['next_appointment']."</td>
                                    <td><span class='badge bg-success'>Active</span></td>
                                </tr>";
                            }
                            */
                            ?>
                            <tr>
                                <td>P001</td>
                                <td>Ali Hassan</td>
                                <td>30</td>
                                <td>2023-10-15</td>
                                <td>2023-11-15</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>P002</td>
                                <td>Fatima Noor</td>
                                <td>25</td>
                                <td>2023-10-18</td>
                                <td>2023-11-18</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>P003</td>
                                <td>Omar Khalid</td>
                                <td>40</td>
                                <td>2023-10-12</td>
                                <td>2023-11-12</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Evaluations Tab -->
            <div class="tab-pane fade" id="evaluations" role="tabpanel">
                <h5 class="mb-4">Patient Evaluations</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6>My Rating</h6>
                                <div class="rating mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-2">4.8/5</span>
                                </div>
                                <p class="text-muted">Based on 38 reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6>Evaluation Form</h6>
                                <p>Share this form with patients after appointments:</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="https://forms.gle/mindcare-dr-smith" readonly>
                                    <button class="btn btn-primary" id="copyFormLink">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="mt-4">Recent Evaluations</h6>
                <div class="evaluation-item">
                    <div class="d-flex justify-content-between">
                        <h6>Ali Hassan</h6>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="mb-1">"Dr. Smith was very understanding and helpful. Really helped me with my anxiety issues."</p>
                    <small class="text-muted">October 15, 2023</small>
                </div>

                <div class="evaluation-item">
                    <div class="d-flex justify-content-between">
                        <h6>Fatima Noor</h6>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <p class="mb-1">"Good experience overall, but the waiting time was a bit long."</p>
                    <small class="text-muted">October 14, 2023</small>
                </div>
            </div>

            <!-- Prescriptions Tab -->
            <div class="tab-pane fade" id="prescriptions" role="tabpanel">
                <h5 class="mb-4">Recent Prescriptions</h5>
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>New Prescription
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Medication</th>
                                <th>Dosage</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-10-15</td>
                                <td>Ali Hassan</td>
                                <td>Sertraline</td>
                                <td>50mg daily</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-print"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-10-14</td>
                                <td>Omar Khalid</td>
                                <td>Escitalopram</td>
                                <td>10mg daily</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-print"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-10-10</td>
                                <td>Fatima Noor</td>
                                <td>Lorazepam</td>
                                <td>1mg as needed</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-print"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update date and time
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'short', 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric',
                hour: '2-digit', 
                minute: '2-digit'
            };
            document.getElementById('currentDateTime').textContent = now.toLocaleDateString('en-US', options);
        }
        
        updateDateTime();
        setInterval(updateDateTime, 60000);
        
        // Copy form link functionality
        document.getElementById('copyFormLink').addEventListener('click', function() {
            const input = document.querySelector('#evaluations .input-group input');
            input.select();
            document.execCommand('copy');
            alert('Form link copied to clipboard!');
        });

        // Sample notification system
        document.querySelector('.notification-icon').addEventListener('click', function() {
            alert('You have 5 unread notifications');
        });

        // Sample search functionality
        document.querySelector('.search-box input').addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                alert('Searching for: ' + this.value);
            }
        });
    </script>

    <!-- زر واتساب -->
    <a href="https://wa.me/962775346699" target="_blank" class="whatsapp-float">
    <i class="fab fa-whatsapp"></i>
    </a>
</body>

</html>