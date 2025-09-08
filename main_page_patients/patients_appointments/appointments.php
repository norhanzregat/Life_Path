<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment - Psych Clinic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(120deg, #e0f7fa, #b3e5fc, #81d4fa, #4fc3f7);
      background-size: 300% 300%;
      animation: calmGradient 25s ease infinite;
    }

    @keyframes calmGradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .booking-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(8px);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    h2 {
      color: #0d47a1;
      font-weight: bold;
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 600;
      color: #0d47a1;
    }

    .btn-custom {
      background-color: #42a5f5;
      color: white;
      font-weight: 600;
      border-radius: 50px;
      padding: 10px 20px;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #1e88e5;
    }

    .navbar {
      background: rgba(255, 255, 255, 0.95);
    }

    .navbar-brand {
      color: #0d6efd !important;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Psych Clinic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link active fw-bold" href="#">Book Appointment</a></li>
          <li class="nav-item"><a class="nav-link" href="#">My Appointments</a></li>
          <li class="nav-item"><a class="btn btn-primary ms-2" href="#">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Booking Form -->
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-lg-7 col-md-9">
      <div class="booking-card">
        <h2 class="text-center mb-4"><i class="fa-solid fa-calendar-check me-2"></i>Book Your Appointment</h2>

        <form>
          <!-- Patient Info -->
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
          </div>

          <!-- Appointment Type -->
          <div class="mb-3">
            <label class="form-label">Appointment Type</label>
            <select class="form-select" required>
              <option value="">Choose type...</option>
              <option value="clinic">In-Clinic</option>
              <option value="online">Online (Video Session)</option>
            </select>
          </div>

          <!-- Doctor -->
          <div class="mb-3">
            <label class="form-label">Select Doctor</label>
            <select class="form-select" required>
              <option value="">Choose doctor...</option>
              <option>Dr. Sarah Johnson (Psychologist)</option>
              <option>Dr. Ahmed Ali (Psychiatrist)</option>
              <option>Dr. Lina Haddad (Therapist)</option>
            </select>
          </div>

          <!-- Date & Time -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Date</label>
              <input type="date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Time</label>
              <input type="time" class="form-control" required>
            </div>
          </div>

          <!-- Payment -->
          <div class="mb-4">
            <label class="form-label">Payment Method</label>
            <select class="form-select" required>
              <option value="">Choose method...</option>
              <option value="card">Credit/Debit Card</option>
              <option value="paypal">PayPal</option>
              <option value="cash">Cash (In Clinic)</option>
            </select>
          </div>

          <!-- Submit -->
          <div class="text-center">
            <button onclick="location.href='../patients_appointments/payment/Payment_gateway.php'"
              type="button" class="btn btn-custom btn-lg">
              <i class="fa-solid fa-credit-card me-2"></i>Proceed to Payment
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>