<?php
$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name && $email && $subject && $message) {
        $successMessage = "Thank you, $name! Your message has been received.";
    } else {
        $errorMessage = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - QuickyHire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
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
        .contact-card { transition: all 0.3s ease; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08); }
        .contact-card:hover { transform: translateY(-5px); }
        .icon-box, .social-icon {
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
        }
        .icon-box {
            width: 60px; height: 60px;
            background-color: rgba(13, 110, 253, 0.1);
            margin-bottom: 1rem;
        }
        .icon-box i { font-size: 1.5rem; color: #0d6efd; }
        .social-icon {
            width: 40px; height: 40px;
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            transition: all 0.3s ease;
        }
        .social-icon:hover { background-color: #0d6efd; color: white; }
        .demo-badge {
            background-color: rgba(0, 0, 0, 0.2); color: white;
            border-radius: 4px; padding: 2px 8px;
            font-size: 12px; font-weight: 500; margin-left: 8px;
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
</div>

<main>
    <section class="py-5 mt-n5">
        <div class="container">
            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <div class="card-body">
                            <h2 class="h4 mb-4 d-flex align-items-center">Send Us a Message</h2>

                            <?php if ($successMessage): ?>
                                <div class="alert alert-success"><?php echo $successMessage; ?></div>
                            <?php elseif ($errorMessage): ?>
                                <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                            <?php endif; ?>

                            <form method="POST" action="contact.php">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="card contact-card mb-4 text-center">
                        <div class="card-body">
                            <div class="icon-box mx-auto"><i class="bi bi-telephone"></i></div>
                            <h3 class="h5">Phone</h3>
                            <p class="text-muted mb-0">+1 (555) 123-4567</p>
                            <p class="text-muted">Mon-Fri from 8am to 6pm</p>
                        </div>
                    </div>

                    <div class="card contact-card mb-4 text-center">
                        <div class="card-body">
                            <div class="icon-box mx-auto"><i class="bi bi-envelope"></i></div>
                            <h3 class="h5">Email</h3>
                            <p class="text-muted mb-0">info@quickyhire.com</p>
                            <p class="text-muted">We'll respond as soon as possible</p>
                        </div>
                    </div>

                    <div class="card contact-card mb-4 text-center">
                        <div class="card-body">
                            <div class="icon-box mx-auto"><i class="bi bi-geo-alt"></i></div>
                            <h3 class="h5">Office</h3>
                            <p class="text-muted mb-0">123 Business Avenue</p>
                            <p class="text-muted">San Francisco, CA 94107</p>
                        </div>
                    </div>

                    <div class="card contact-card text-center">
                        <div class="card-body">
                            <h3 class="h5 mb-3">Follow Us</h3>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
</main>
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


<script src="../js/contact.js"></script>

</body>
</html>
