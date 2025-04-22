<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickyHire - Login</title>
    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
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
            <a class="navbar-brand d-flex align-items-center" href="../homepage.php">
                <img src="../images/logo.jpg" alt="Logo" class="logo" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 5px;">
                <span class="fw-bold">Quicky</span><span class="fw-bold" style="color: darkblue;">Hire</span>
            </a>
        </div>
            <!-- Categories / Filter Menu (Collapsible Sidebar) -->
            <div id="filterSidebar" class="filter-sidebar">
                <div>
                    <!-- Top part: Navigation links -->
                    <div class="list-group">
                        <a href="../homepage.php" class="list-group-item list-group-item-action d-flex align-items-center">🏠 Home</a>
                        <a href="../index.php" id="browseJobs" class="list-group-item list-group-item-action d-flex align-items-center">🌐 Browse Jobs</a>
                        <a href="../about.php" class="list-group-item list-group-item-action d-flex align-items-center">ℹ️ About </a>
                        <a href="../contact.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2">✉️ Contact </a>
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
                <a class="btn btn-primary" onclick="switchToSignUpTab()">Sign Up</a>
                <a href="profile.php" class="profile-icon d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="View Profile">
                    <i class="bi bi-person-circle fs-4 text-primary"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="container job-portal-container">
        <div class="row auth-card g-0">
            <div class="col-lg-5 d-none d-lg-block">
                <div class="auth-sidebar">
                    <div class="job-portal-logo">
                        <img src="../images/logo.jpg" alt="logo" style="height:50px" id="logo"><span class="text-white">Quicky<span class="text-primary">Hire</span></span>
                    </div>

                    <h2 class="mb-4">Accelerate Your Career Journey</h2>
                    <p class="mb-4">Connect with thousands of employers and find the perfect job opportunity that matches your skills and aspirations.</p>
                    
                    <ul class="features-list">
                        <li><i class="fas fa-check-circle"></i> Access to thousands of job listings</li>
                        <li><i class="fas fa-check-circle"></i> Create a professional profile</li>
                        <li><i class="fas fa-check-circle"></i> Get noticed by top employers</li>
                        <li><i class="fas fa-check-circle"></i> Track your job applications</li>
                        <li><i class="fas fa-check-circle"></i> Receive job recommendations</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="auth-content">
                    <ul class="nav nav-tabs" id="authTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">Sign Up</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="authTabsContent">
                        <!-- Login Form -->
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <h3 class="mb-4">Welcome back</h3>
                            <p class="text-muted mb-4">Please enter your credentials to access your account</p>
                            
                            <form id="loginForm">
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="loginEmail" placeholder="name@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <div class="password-toggle">
                                        <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                                        <span class="toggle-icon" onclick="togglePasswordVisibility('loginPassword', 'loginToggleIcon')">
                                            <i id="loginToggleIcon" class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <a href="#" class="text-decoration-none text-primary">Forgot password?</a>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            
                            <div class="auth-divider">
                                <span>Or continue with</span>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-google" style="color: #EA4335;"></i>
                                        Google
                                    </a>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-linkedin" style="color: #0A66C2;"></i>
                                        LinkedIn
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sign Up Form -->
                        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                            <h3 class="mb-4">Create an account</h3>
                            
                            <div class="user-type-selector mb-4">
                                <div class="user-type-option active" data-type="jobseeker" onclick="switchUserType('jobseeker')">
                                    <i class="fas fa-user me-2"></i> Job Seeker
                                </div>
                                <div class="user-type-option" data-type="employer" onclick="switchUserType('employer')">
                                    <i class="fas fa-building me-2"></i> Employer
                                </div>
                            </div>
                            
                            <form id="signupForm">
                                <input type="hidden" id="userType" value="jobseeker">
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="John" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Doe" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="signupEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="signupEmail" placeholder="name@example.com" required>
                                </div>
                                
                                <!-- Company field (only visible for employers) -->
                                <div class="mb-3 employer-field" style="display: none;">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" placeholder="Your company name">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="signupPassword" class="form-label">Password</label>
                                    <div class="password-toggle">
                                        <input type="password" class="form-control" id="signupPassword" placeholder="Create a password (min. 8 characters)" required>
                                        <span class="toggle-icon" onclick="togglePasswordVisibility('signupPassword', 'signupToggleIcon')">
                                            <i id="signupToggleIcon" class="far fa-eye"></i>
                                        </span>
                                    </div>
                                    <div class="password-strength mt-2" id="passwordStrength"></div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="password-toggle">
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
                                        <span class="toggle-icon" onclick="togglePasswordVisibility('confirmPassword', 'confirmToggleIcon')">
                                            <i id="confirmToggleIcon" class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCheck" required>
                                    <label class="form-check-label" for="termsCheck">
                                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Create Account</button>
                                </div>
                            </form>
                            
                            <div class="auth-divider">
                                <span>Or sign up with</span>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-google" style="color: #EA4335;"></i>
                                        Google
                                    </a>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-linkedin" style="color: #0A66C2;"></i>
                                        LinkedIn
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../js/login.js"></script>
</body>
</body>
</html>