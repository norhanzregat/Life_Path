<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafas Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
    font-family: 'Roboto', sans-serif;
    background: #e6f0ff; /* أفتح وأجمل للعين */
    color: #0b3d91; /* أزرق داكن وحيوي */
    transition: all 0.3s;
}

body.dark-mode {
    background: #0a0f2a; /* داكن وعميق */
    color: #90c3ff; /* أزرق فاتح وواضح للنص */
}

body.dark-mode .navbar {
    background-color: #111738 !important;
}

body.dark-mode .hero {
    background: linear-gradient(rgba(11, 61, 145, 0.8), rgba(11, 61, 145, 0.8)), url('https://images.unsplash.com/photo-1588776814546-3f3f72edbba0') center/cover no-repeat;
}

body.dark-mode .service-card,
body.dark-mode .team-card {
    background-color: #111738;
    color: #90c3ff;
}

body.dark-mode .team-card p {
    color: #b0d0ff;
}

body.dark-mode footer {
    background-color: #0d1330;
    color: #90c3ff;
}

.navbar {
    background-color: #ffffff;
    transition: all 0.3s;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.navbar-brand {
    color: #0b3d91 !important;
    font-weight: 700;
    font-size: 1.6rem;
}

.nav-link {
    color: #333 !important;
    font-weight: 500;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #0741c2 !important;
    text-decoration: underline;
}

.hero {
    background: linear-gradient(rgba(11, 61, 145, 0.6), rgba(11, 61, 145, 0.6)), url('https://images.unsplash.com/photo-1588776814546-3f3f72edbba0') center/cover no-repeat;
    color: #ffffff;
    text-align: center;
    padding: 120px 20px;
    border-radius: 0 0 60px 60px;
    transition: all 0.3s;
}

.hero h1 {
    font-size: 3.2rem;
    font-weight: 700;
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    margin-bottom: 15px;
}

.hero p {
    font-size: 1.3rem;
    text-shadow: 0 1px 8px rgba(0,0,0,0.4);
    margin-bottom: 25px;
}

.hero .btn {
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 50px;
    background: linear-gradient(90deg, #0b3d91, #0741c2);
    color: #fff;
    border: none;
    transition: all 0.3s;
}

.hero .btn:hover {
    background: linear-gradient(90deg, #0741c2, #05277a);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.service-card,
.team-card {
    border-radius: 20px;
    padding: 30px 20px;
    background: #ffffff;
    color: #0b3d91;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: all 0.3s;
}

.service-card:hover,
.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.15);
    background: linear-gradient(135deg, #e6f0ff, #cce0ff);
}

.team-card .rounded-circle {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #0b3d91, #0741c2);
    margin-bottom: 15px;
    transition: all 0.3s;
}

.team-card .rounded-circle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(11,61,145,0.4);
}

.team-card h5 {
    font-weight: 700;
    margin-bottom: 5px;
}

.team-card p {
    color: #444;
    font-size: 0.95rem;
}

footer {
    background-color: #0d1330;
    color: #ffffff;
    padding: 60px 0 30px;
    transition: all 0.3s;
}

footer a {
    color: #0b3d91;
    text-decoration: none;
    margin-right: 15px;
    transition: color 0.3s;
}

footer a:hover {
    color: #0741c2;
    text-decoration: underline;
}

.toggle-icon {
    cursor: pointer;
    font-size: 1.4rem;
    color: #0b3d91;
    margin-left: 15px;
    transition: color 0.3s;
}

.toggle-icon:hover {
    color: #0741c2;
}

.login-icon {
    cursor: pointer;
    font-size: 1.5rem;
    color: #0b3d91;
    transition: color 0.3s;
}

.login-icon:hover {
    color: #0741c2;
}

.modal-content {
    border-radius: 20px;
    background: #f0f4ff;
    transition: all 0.3s;
}

.modal-content:hover {
    box-shadow: 0 12px 30px rgba(11,61,145,0.3);
}

@media (max-width:768px) {
    .hero h1 {
        font-size: 2.2rem;
    }
    .hero p {
        font-size: 1rem;
    }
    .team-card .rounded-circle {
        width: 100px;
        height: 100px;
    }
}

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Nafas Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <!-- Login Icon -->
                    <span class="login-icon" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                            class="bi bi-person-circle"></i></span>
                    <span class="toggle-icon" onclick="toggleMode()"><i class="bi bi-moon"></i></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Your peace of mind starts with mental health</h1>
            <p>We are here to support you in your journey towards mental health and inner balance.</p>
            <a href="#services" class="btn btn-light btn-lg">Book Your Appointment Now</a>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-primary">Login to Your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body px-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label">Remember me</label>
                            </div>
                            <a href="#" class="text-decoration-none">Forgot Password?</a>
                        </div>
                        <button type="button" onclick="window.location.href='main_page_patients/main.php'"
                            class="btn btn-primary w-100 rounded-pill">
                            Login
                        </button>
                    </form>
                    <p class="text-center mt-3 mb-0">Don't have an account? <a href="#" class="fw-bold">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Services -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="service-card text-center h-100">Psychological Consultations</div>
                </div>
                <div class="col-md-3">
                    <div class="service-card text-center h-100">Individual Therapy Sessions</div>
                </div>
                <div class="col-md-3">
                    <div class="service-card text-center h-100">Children & Adolescent Therapy</div>
                </div>
                <div class="col-md-3">
                    <div class="service-card text-center h-100">Comprehensive Psychological Assessment</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="team" class="py-5">
        <div class="container">
            <h2 class="text-center">Medical Team</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="team-card text-center">
                        <div class="rounded-circle mx-auto"></div>
                        <h5>Dr. Ahmed Ali</h5>
                        <p>Psychologist</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card text-center">
                        <div class="rounded-circle mx-auto"></div>
                        <h5>Dr. Sara Youssef</h5>
                        <p>Therapist</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card text-center">
                        <div class="rounded-circle mx-auto"></div>
                        <h5>Dr. Laila Hassan</h5>
                        <p>Family Consultant</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" style="padding:50px 20px;">
        <div class="container" style="max-width:600px;margin:auto;">
            <h2 class="text-center mb-4">Contact Us</h2>
            <form>
                <div class="mb-3">
                    <label for="contactEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="contactEmail">
                </div>
                <div class="mb-3">
                    <label for="contactMessage" class="form-label">Message</label>
                    <textarea class="form-control" id="contactMessage" rows="4"
                        placeholder="Write your message"></textarea>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="contactCheck">
                    <label class="form-check-label">I agree to the terms</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h5>Nafas Clinic</h5>
                        <p>We care about your psychological comfort</p>
                    </div>
                    <div class="mb-4">
                        <h5>Contact Us</h5>
                        <p>📞 +962 7 9999 9999</p>
                        <p>📧 info@nafasclinic.com</p>
                        <p>📍 Amman - Jordan</p>
                        <p><a href="https://maps.app.goo.gl/pjSwFZk1VNRYjK837" target="_blank">View on Map</a></p>
                    </div>
                    <div>
                        <h5>Follow Us</h5>
                        <div class="d-flex gap-3 mt-2">
                            <a href="#" style="color:#0d6efd; font-size:1.5rem;"><i class="bi bi-facebook"></i></a>
                            <a href="#" style="color:#0d6efd; font-size:1.5rem;"><i class="bi bi-instagram"></i></a>
                            <a href="#" style="color:#0d6efd; font-size:1.5rem;"><i class="bi bi-linkedin"></i></a>
                            <a href="#" style="color:#0d6efd; font-size:1.5rem;"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps?q=31.963158,35.930359&hl=en;z=14&output=embed" width="100%"
                        height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <p class="text-center mt-4 mb-0">© 2025 Nafas Clinic. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>

</html>