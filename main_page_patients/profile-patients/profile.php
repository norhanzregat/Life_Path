<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile - Nafas Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0288d1;
            --primary-light: #e3f2fd;
            --secondary-color: #26a69a;
            --text-dark: #333;
            --text-light: #555;
            --shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(120deg, #c3e8f5, #8fd4f7, #60c0f9);
            background-size: 400% 400%;
            animation: gradientAnimation 20s ease infinite;
            color: var(--text-dark);
            min-height: 100vh;
            padding-bottom: 50px;
        }
        
        @keyframes gradientAnimation {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
        
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            padding-top: 30px;
        }
        
        .profile-photo {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--primary-color);
            margin-right: 30px;
            transition: transform 0.3s ease;
            box-shadow: var(--shadow);
        }
        
        .profile-photo:hover {
            transform: scale(1.05);
        }
        
        .profile-details h2 {
            margin-bottom: 5px;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .profile-details p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: var(--text-light);
        }
        
        .card-profile {
            border-radius: 20px;
            background: rgba(255,255,255,0.95);
            padding: 30px;
            box-shadow: var(--shadow);
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
        
        .card-profile:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        
        .nav-tabs {
            border-bottom: 2px solid var(--primary-light);
            margin-bottom: 25px;
        }
        
        .nav-tabs .nav-link {
            border: none;
            color: var(--text-light);
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 15px 25px;
            border-radius: 10px 10px 0 0;
        }
        
        .nav-tabs .nav-link:hover {
            color: var(--primary-color);
            background-color: var(--primary-light);
        }
        
        .nav-tabs .nav-link.active {
            background-color: var(--primary-color);
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        
        .btn-custom {
            background-color: var(--primary-color);
            color: #fff;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 25px;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-custom:hover {
            background-color: #0277bd;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(2, 136, 209, 0.3);
        }
        
        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-custom:hover {
            background-color: var(--primary-color);
            color: #fff;
        }
        
        .table thead {
            background-color: var(--primary-color);
            color: #fff;
        }
        
        .table tbody tr:hover {
            background-color: rgba(2, 136, 209, 0.1);
        }
        
        .badge-success {
            background-color: #28a745;
        }
        
        .badge-warning {
            background-color: #ffc107;
            color: #212529;
        }
        
        .badge-danger {
            background-color: #dc3545;
        }
        
        .badge-info {
            background-color: #17a2b8;
        }
        
        .stat-card {
            text-align: center;
            padding: 20px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-light), #e1f5fe);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0;
        }
        
        .stat-label {
            font-size: 1rem;
            color: var(--text-light);
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(2, 136, 209, 0.25);
        }
        
        .notification-toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
        
        .health-metric {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .health-metric h6 {
            color: #388e3c;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-photo {
                margin-right: 0;
                margin-bottom: 20px;
            }
            
            .stat-card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Profile Header -->
        <div class="profile-container">
            <img src="assets/images/default-user.png" alt="Patient Photo" id="profilePhoto" class="profile-photo">
            <div class="profile-details text-center text-md-start">
                <h2 id="patientName">John Doe</h2>
                <p id="patientEmail">johndoe@example.com</p>
                <p id="patientId">Patient ID: <span>PT-2023-001</span></p>
                <button class="btn btn-custom mb-2" onclick="document.getElementById('photoInput').click()">
                    <i class="fa-solid fa-camera me-2"></i>Change Photo
                </button>
                <input type="file" id="photoInput" class="d-none" accept="image/*">
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row mb-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <p class="stat-number" id="totalAppointments">5</p>
                    <p class="stat-label">Total Appointments</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <p class="stat-number" id="upcomingAppointments">2</p>
                    <p class="stat-label">Upcoming</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <p class="stat-number" id="completedSessions">3</p>
                    <p class="stat-label">Completed</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <p class="stat-number">4.8</p>
                    <p class="stat-label">Satisfaction Rate</p>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4 justify-content-center" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">
                    <i class="fa-solid fa-user me-2"></i>Personal Info
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="appointments-tab" data-bs-toggle="tab" data-bs-target="#appointments" type="button" role="tab">
                    <i class="fa-solid fa-calendar-days me-2"></i>Appointments
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="health-tab" data-bs-toggle="tab" data-bs-target="#health" type="button" role="tab">
                    <i class="fa-solid fa-heart-pulse me-2"></i>Health Data
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                    <i class="fa-solid fa-shield-alt me-2"></i>Security
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Personal Info Tab -->
            <div class="tab-pane fade show active" id="info" role="tabpanel">
                <div class="card card-profile">
                    <h4 class="section-title"><i class="fa-solid fa-user me-2"></i>Personal Information</h4>
                    <form id="profileForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" value="John Doe" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" value="johndoe@example.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" value="+1234567890">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" value="1990-01-01">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select" id="gender">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="emergencyContact" value="Jane Doe (+1987654321)">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="2">123 Main St, City, Country</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Medical Notes</label>
                                <textarea class="form-control" id="medicalNotes" rows="3">Mild anxiety, prefers afternoon sessions.</textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-custom btn-lg">
                                <i class="fa-solid fa-floppy-disk me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Appointments Tab -->
            <div class="tab-pane fade" id="appointments" role="tabpanel">
                <div class="card card-profile">
                    <h4 class="section-title"><i class="fa-solid fa-calendar-days me-2"></i>Your Appointments</h4>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5>Upcoming Appointments</h5>
                        <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#bookingModal">
                            <i class="fa-solid fa-plus me-2"></i>Book New Appointment
                        </button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped align-middle text-center">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Doctor</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="appointmentsTable">
                                <tr>
                                    <td>2025-09-03</td>
                                    <td>10:00 AM</td>
                                    <td>Dr. Sarah Johnson</td>
                                    <td>In-Clinic</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-custom me-1" data-bs-toggle="modal" data-bs-target="#rescheduleModal">
                                            <i class="fa-solid fa-calendar-alt"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="cancelAppointment(this)">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-09-10</td>
                                    <td>2:00 PM</td>
                                    <td>Dr. Ahmed Ali</td>
                                    <td>Online</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-custom me-1" data-bs-toggle="modal" data-bs-target="#rescheduleModal">
                                            <i class="fa-solid fa-calendar-alt"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="cancelAppointment(this)">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h5 class="mt-5">Appointment History</h5>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle text-center">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-08-20</td>
                                    <td>Dr. Lina Haddad</td>
                                    <td>Online</td>
                                    <td>60 mins</td>
                                    <td><button class="btn btn-sm btn-outline-custom">View Notes</button></td>
                                </tr>
                                <tr>
                                    <td>2025-08-13</td>
                                    <td>Dr. Sarah Johnson</td>
                                    <td>In-Clinic</td>
                                    <td>45 mins</td>
                                    <td><button class="btn btn-sm btn-outline-custom">View Notes</button></td>
                                </tr>
                                <tr>
                                    <td>2025-08-06</td>
                                    <td>Dr. Ahmed Ali</td>
                                    <td>Online</td>
                                    <td>60 mins</td>
                                    <td><button class="btn btn-sm btn-outline-custom">View Notes</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Health Data Tab -->
            <div class="tab-pane fade" id="health" role="tabpanel">
                <div class="card card-profile">
                    <h4 class="section-title"><i class="fa-solid fa-heart-pulse me-2"></i>Health Information</h4>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="health-metric">
                                <h6>Anxiety Level</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Moderate - Last updated: 2025-08-20</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="health-metric">
                                <h6>Stress Level</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mild - Last updated: 2025-08-20</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="health-metric">
                                <h6>Sleep Quality</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Good - Last updated: 2025-08-20</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="health-metric">
                                <h6>Mood Tracking</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Generally Positive - Last updated: 2025-08-20</small>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mb-3">Treatment Plan</h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6>Cognitive Behavioral Therapy (CBT)</h6>
                            <p>Weekly sessions focusing on anxiety management techniques and cognitive restructuring.</p>
                            <div class="d-flex justify-content-between">
                                <small>Start Date: 2025-08-01</small>
                                <small>Dr. Sarah Johnson</small>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mb-3">Medications</h5>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle text-center">
                            <thead>
                                <tr>
                                    <th>Medication</th>
                                    <th>Dosage</th>
                                    <th>Frequency</th>
                                    <th>Prescribed On</th>
                                    <th>Prescribed By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sertraline</td>
                                    <td>50mg</td>
                                    <td>Once daily</td>
                                    <td>2025-08-01</td>
                                    <td>Dr. Sarah Johnson</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Security Tab -->
            <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="card card-profile">
                    <h4 class="section-title"><i class="fa-solid fa-shield-alt me-2"></i>Security Settings</h4>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <form id="passwordForm">
                                <h5 class="mb-3">Change Password</h5>
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" required>
                                    <div class="form-text">Password must be at least 8 characters long and include a number.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-custom">Update Password</button>
                            </form>
                            
                            <hr class="my-4">
                            
                            <h5 class="mb-3">Two-Factor Authentication</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0">Add an extra layer of security to your account</p>
                                    <small class="text-muted">Status: <span class="text-danger">Inactive</span></small>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="twoFactorSwitch">
                                    <label class="form-check-label" for="twoFactorSwitch"></label>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h5 class="mb-3">Login Activity</h5>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Device</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2025-08-28 14:30</td>
                                            <td>Chrome, Windows</td>
                                            <td>New York, USA</td>
                                            <td><span class="badge bg-success">Successful</span></td>
                                        </tr>
                                        <tr>
                                            <td>2025-08-27 09:15</td>
                                            <td>Safari, iPhone</td>
                                            <td>New York, USA</td>
                                            <td><span class="badge bg-success">Successful</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-info-circle me-2"></i>Security Tips</h6>
                                    <ul class="ps-3">
                                        <li class="mb-2">Use a unique password for your account</li>
                                        <li class="mb-2">Enable two-factor authentication</li>
                                        <li class="mb-2">Never share your login credentials</li>
                                        <li class="mb-2">Log out from shared devices</li>
                                        <li>Review login activity regularly</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast notification-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
        <div class="toast-header">
            <i class="fa-solid fa-bell text-primary me-2"></i>
            <strong class="me-auto">Nafas Clinic</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage"></div>
    </div>

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select New Date</label>
                        <input type="date" class="form-control" id="rescheduleDate">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select New Time</label>
                        <select class="form-select" id="rescheduleTime">
                            <option value="">Choose time...</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="17:00">05:00 PM</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom" onclick="rescheduleAppointment()">Reschedule</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize toast
        const toastEl = document.querySelector('.toast');
        const toastMessage = document.getElementById('toastMessage');
        const toast = new bootstrap.Toast(toastEl);
        
        // Function to show notification
        function showNotification(message, type = 'success') {
            toastMessage.textContent = message;
            
            if (type === 'error') {
                toastEl.querySelector('.toast-header').classList.add('bg-danger', 'text-white');
            } else {
                toastEl.querySelector('.toast-header').classList.remove('bg-danger', 'text-white');
            }
            
            toast.show();
        }
        
        // Change profile photo
        document.getElementById('photoInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('profilePhoto');
                output.src = reader.result;
                
                // Save to local storage or database
                localStorage.setItem('profilePhoto', reader.result);
                
                showNotification('Profile photo updated successfully!');
            };
            reader.readAsDataURL(event.target.files[0]);
        });
        
        // Load profile photo from local storage if available
        window.addEventListener('DOMContentLoaded', function() {
            const savedPhoto = localStorage.getItem('profilePhoto');
            if (savedPhoto) {
                document.getElementById('profilePhoto').src = savedPhoto;
            }
        });

        // Update name dynamically
        document.getElementById('fullName').addEventListener('input', function() {
            document.getElementById('patientName').textContent = this.value;
        });

        // Save profile
        document.getElementById('profileForm').addEventListener('submit', function(e){
            e.preventDefault();
            
            // Simulate saving to database
            setTimeout(function() {
                showNotification('Profile information saved successfully!');
            }, 500);
        });
        
        // Change password
        document.getElementById('passwordForm').addEventListener('submit', function(e){
            e.preventDefault();
            
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (newPassword !== confirmPassword) {
                showNotification('Passwords do not match!', 'error');
                return;
            }
            
            if (newPassword.length < 8) {
                showNotification('Password must be at least 8 characters long!', 'error');
                return;
            }
            
            // Simulate saving to database
            setTimeout(function() {
                showNotification('Password updated successfully!');
                document.getElementById('passwordForm').reset();
            }, 500);
        });
        
        // Cancel appointment
        function cancelAppointment(button) {
            const row = button.closest('tr');
            const appointmentDate = row.cells[0].textContent;
            const doctorName = row.cells[2].textContent;
            
            if (confirm(`Are you sure you want to cancel your appointment with ${doctorName} on ${appointmentDate}?`)) {
                row.remove();
                
                // Update appointment counts
                document.getElementById('upcomingAppointments').textContent = 
                    parseInt(document.getElementById('upcomingAppointments').textContent) - 1;
                
                showNotification('Appointment cancelled successfully!');
            }
        }
        
        // Reschedule appointment
        function rescheduleAppointment() {
            const date = document.getElementById('rescheduleDate').value;
            const time = document.getElementById('rescheduleTime').value;
            
            if (!date || !time) {
                showNotification('Please select both date and time!', 'error');
                return;
            }
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('rescheduleModal'));
            modal.hide();
            
            showNotification('Appointment rescheduled successfully!');
        }
        
        // Two-factor authentication toggle
        document.getElementById('twoFactorSwitch').addEventListener('change', function() {
            if (this.checked) {
                showNotification('Two-factor authentication enabled!');
            } else {
                showNotification('Two-factor authentication disabled!');
            }
        });
    </script>
</body>
</html>