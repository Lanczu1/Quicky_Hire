<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - QuickyHire</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/about.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }
    .section {
      padding: 60px 0;
    }
    .section-title {
      font-weight: bold;
      margin-bottom: 30px;
      color: #2c3e50;
    }
    .icon-box {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      transition: 0.3s;
    }
    .icon-box:hover {
      transform: translateY(-5px);
    }
    .icon-box i {
      font-size: 2rem;
      color: #3498db;
      margin-bottom: 15px;
    }
    .filter-sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            height: 100%;
            width: 250px;
            background-color: #ffffff;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            z-index: 1000;
            transition: left 0.3s ease-in-out;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .filter-sidebar .sidebar-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 14px;
        }

        .filter-sidebar .list-group-item {
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            }

        .filter-sidebar .list-group-item:hover {
            background-color: #f1f1f1;
            }
        .navbar-toggler {
            border: none;
            }
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
        }
        
        
        .hero-section {
            padding: 60px 0;
        }
        
        .job-card {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        
        .job-card:hover {
            transform: translateY(-5px);
        }
        
        .job-card .badge {
            font-size: 0.8rem;
        }
        
        .footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 40px 0;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
  </style>
</head>
<body>
<!-- Loading Screen -->
<div id="loading-screen" style="position: fixed; width: 100%; height: 100%; background: white; z-index: 2000; display: flex; align-items: center; justify-content: center;">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
</div>
   
    <!-- Navigation Bar -->
    <nav class="navbar navbar-light bg-secondary bg-opacity-10 px-3 border-bottom border-secondary nav-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo + Title -->
            <div class="d-flex align-items-center gap-1">
            <button id="burgerBtn" class="burger-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z"/>
        </svg>

        </button>
            <a class="navbar-brand d-flex align-items-center" href="homepage.php">
                <img src="images/logo.jpg" alt="Logo" class="logo" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 5px;">
                <span class="fw-bold">Quicky</span><span class="fw-bold" style="color: darkblue;">Hire</span>
            </a>
        </div>
            <!-- Categories / Filter Menu (Collapsible Sidebar) -->
            <div id="filterSidebar" class="filter-sidebar">
                <div>
                    <!-- Top part: Navigation links -->
                    <div class="list-group">
                        <a href="homepage.php" class="list-group-item list-group-item-action d-flex align-items-center">🏠 Home</a>
                        <a href="index.php" id="browseJobs" class="list-group-item list-group-item-action d-flex align-items-center">🌐 Browse Jobs</a>
                        <a href="about.php" class="list-group-item list-group-item-action d-flex align-items-center">ℹ️ About </a>
                        <a href="contact.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2">✉️ Contact </a>
                    </div>
                </div>

                <!-- Bottom-fixed footer -->
                <div class="sidebar-footer">
                    <p class="mb-2"><strong>User ID:</strong> <?php echo isset($userId) ? htmlspecialchars($userId) : 'Guest'; ?></p>
                    <ul class="list-unstyled">
                        <li><a href="terms.php" class="text-decoration-none d-block py-1">📜 Terms & Policies</a></li>
                        <li><a href="faq.php" class="text-decoration-none d-block py-1">❓ FAQ</a></li>
                        <li><a href="help.php" class="text-decoration-none d-block py-1">🆘 Help</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="d-none d-md-flex gap-2 align-items-center">
                <a href="../LS/login.php" class="btn btn-outline-primary">Login</a>
                <a href="../LS/login.php?tab=signup" class="btn btn-primary">Sign Up</a>
                <a href="profile.php" class="profile-icon d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="View Profile">
                    <i class="bi bi-person-circle fs-4 text-primary"></i>
                </a>
            </div>
        </div>
    </nav>
    
<!-- Navbar (reuse your site’s navbar here if needed) -->
<div class="container section d-flex justify-content-center">
  <div class="glass-box p-5 text-center">
    <h2 class="section-title">About QuickyHire</h2>
    <p class="lead">At QuickyHire, we’re passionate about connecting job seekers with great opportunities and helping companies find top talent—quickly and effectively.</p>
  </div>
</div>

<div class="container section">
  <div class="row g-4">
    <div class="col-md-6 col-lg-3">
      <div class="icon-box text-center">
        <i class="bi bi-bullseye"></i>
        <h5 class="fw-semibold mt-3">Our Mission</h5>
        <p>To streamline the hiring process by offering a platform that's fast, user-friendly, and reliable for both job seekers and employers.</p>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="icon-box text-center">
        <i class="bi bi-heart-fill"></i>
        <h5 class="fw-semibold mt-3">Our Values</h5>
        <p>Integrity, innovation, and inclusion guide everything we do. We believe in building a diverse and supportive job community.</p>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="icon-box text-center">
        <i class="bi bi-people-fill"></i>
        <h5 class="fw-semibold mt-3">Our Team</h5>
        <p>We’re a dynamic group of developers, designers, and career experts committed to making job hunting a smoother experience.</p>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="icon-box text-center">
        <i class="bi bi-lightbulb-fill"></i>
        <h5 class="fw-semibold mt-3">Why QuickyHire?</h5>
        <p>Because your time matters. Whether you're hiring or looking for a job, we make the process as efficient and rewarding as possible.</p>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 mb-4 mb-lg-0">
                      <div class="d-flex align-items-center mb-3">
                          <img src="images/logo.jpg" alt="Logo" class="logo" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 5px;">
                          <span class="fw-bold ms-2 fs-4">QuickyHire</span>
                      </div>
                      <p>Connecting talented professionals with their dream careers since 2023.</p>
                  </div>
                  <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                      <h5 class="mb-3">For Job Seekers</h5>
                      <ul class="list-unstyled">
                          <li class="mb-2"><a href="#" class="text-white text-decoration-none">Browse Jobs</a></li>
                          <li class="mb-2"><a href="#" class="text-white text-decoration-none">Create Profile</a></li>
                          <li class="mb-2"><a href="#" class="text-white text-decoration-none">Job Alerts</a></li>
                          <li><a href="#" class="text-white text-decoration-none">Career Advice</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                      <h5 class="mb-3">For Employers</h5>
                      <ul class="list-unstyled">
                          <li class="mb-2"><a href="#" class="text-white text-decoration-none">Post a Job</a></li>
                          <li class="mb-2"><a href="#" class="text-white text-decoration-none">Browse Candidates</a></li>
                          <li class="mb-2"><a href="#" class="text-white text-decoration-none">Pricing Plans</a></li>
                          <li><a href="#" class="text-white text-decoration-none">Recruitment Tools</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-4 col-md-4">
                      <h5 class="mb-3">Subscribe to Our Newsletter</h5>
                      <p>Get the latest job listings and career advice delivered to your inbox.</p>
                      <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="Your email address">
                          <button class="btn btn-light" type="button">Subscribe</button>
                      </div>
                  </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="row align-items-center">
                  <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                      <p class="mb-0">&copy; 2023 QuickyHire. All rights reserved.</p>
                  </div>
                  <div class="col-md-6 text-center text-md-end">
                      <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                      <a href="#" class="text-white text-decoration-none me-3">Terms of Service</a>
                      <a href="contact.php" class="text-white text-decoration-none">Contact Us</a>
                  </div>
              </div>
          </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/about.js"></script>
</body>
</html>
