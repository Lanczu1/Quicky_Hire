<?php include 'jobs-2.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickyHire</title>
    <link rel="stylesheet" href="css/home.css">
        
    
    
    <style>
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
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Find Your Dream Job Today</h1>
            <p class="lead mb-4">Browse thousands of job listings and find the perfect match for your skills and experience.</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Job title, keywords, or company">
                        <button class="btn btn-primary btn-lg" type="button" style="color:white">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Job Cards -->
<main class="container my-5">
  <div class="row g-4">
    <?php foreach ($jobs as $index => $job): ?>
      <div class="col-md-4">
      <a href="job_description.php?id=<?php echo $index; ?>" class="job-card-link job-card-wrapper job-card-js not-clickable">
          <div class="card shadow-sm h-100">
            <img src="images/<?php echo htmlspecialchars($job['logo']); ?>" alt="Company Logo" class="card-img-top p-3" style="height: 140px; object-fit: contain;background-color:#e0f7fa;">
            <div class="card-body" style="background-color:#e0f7fa">
              <h5 class="card-title"><?php echo htmlspecialchars($job['title']); ?></h5>
              <p class="card-text mb-2">
                <i class="bi bi-building"></i> <strong>Company:</strong> <?php echo htmlspecialchars($job['company']); ?>
              </p>
              <p class="card-text mb-2">
                <i class="bi bi-geo-alt"></i> <strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?>
              </p>
              <p class="card-text mb-2">
                <i class="bi bi-briefcase"></i> <strong>Type:</strong> <?php echo htmlspecialchars($job['type']); ?>
              </p>
              <p class="card-text mb-2">
                <i class="bi bi-cash-stack"></i> <strong>Salary:</strong> <?php echo htmlspecialchars($job['salary']); ?>
              </p>
              <p class="card-text mb-2">
                <i class="bi bi-calendar-check"></i> <strong>Posted:</strong> <?php echo htmlspecialchars($job['posted']); ?>
              </p>
              <p class="card-text mb-2">
                <i class="bi bi-hourglass-split"></i> <strong>Deadline:</strong> <?php echo htmlspecialchars($job['deadline']); ?>
              </p>
              <span class="badge bg-primary"><?php echo htmlspecialchars($job['level']); ?></span>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>


    <!-- Why Choose Us Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose QuickyHire</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="p-3">
                        <div class="bg-white rounded-circle d-inline-flex p-3 mb-3 shadow-sm">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12H18L15 21L9 3L6 12H2" stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4>Fast Application Process</h4>
                        <p>Apply to multiple jobs with just a few clicks using our streamlined application system.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-3">
                        <div class="bg-white rounded-circle d-inline-flex p-3 mb-3 shadow-sm">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4>Verified Employers</h4>
                        <p>All companies on our platform are thoroughly vetted to ensure legitimate opportunities.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-3">
                        <div class="bg-white rounded-circle d-inline-flex p-3 mb-3 shadow-sm">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 16V12" stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 8H12.01" stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4>Career Resources</h4>
                        <p>Access resume tips, interview guides, and career advice to help you succeed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    

    <script src="js/home.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>