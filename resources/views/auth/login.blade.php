<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HRM System | Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #2575fc;
      --secondary-color: #6a11cb;
      --accent-color: #2dce89;
      --text-dark: #2d3748;
      --text-light: #718096;
      --light-bg: #f8f9fa;
      --white: #ffffff;
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Segoe UI', 'Inter', 'Roboto', sans-serif;
      background-color: #f7fafc;
      min-height: 100vh;
      display: flex;
      overflow-x: hidden;
    }
    
    .container-fluid {
      padding: 0;
      height: 100vh;
    }
    
    .row {
      height: 100%;
      margin: 0;
    }
    
    /* Left Side - Background Image with Overlay */
    .image-section {
      background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      position: relative;
      overflow: hidden;
    }
    
    .image-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(37, 117, 252, 0.85), rgba(106, 17, 203, 0.85));
      z-index: 1;
    }
    
    .image-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 40px;
      max-width: 700px;
      width: 100%;
      backdrop-filter: blur(2px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    
    .hrm-logo {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
    }
    
    .hrm-logo i {
      margin-right: 15px;
      background: rgba(255, 255, 255, 0.2);
      padding: 15px;
      border-radius: 12px;
      backdrop-filter: blur(5px);
       margin-left: 160px;
    }
    
    .image-title {
      font-size: 2.4rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      line-height: 1.3;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 100%;
      margin-left: 160px;
    }
    
    .image-subtitle {
      font-size: 1.2rem;
      opacity: 0.95;
      line-height: 1.6;
      margin-bottom: 2.5rem;
      font-weight: 300;
      max-width: 600px;
      text-align: center;
      text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
      width: 100%;
      margin-left: 160px;
    }
    
    .features-container {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      padding: 30px;
      margin-top: 2rem;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      text-align: center;
      max-width: 700px;
      width: 100%;
      margin-left: 200px;
    }
    
    .features-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
      color: white;
      width: 100%;
    }
    
    .feature-item {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      width: 100%;
      text-align: left;
    }
    
    .feature-item:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }
    
    .feature-icon {
      background: rgba(255, 255, 255, 0.2);
      padding: 12px;
      border-radius: 12px;
      margin-right: 18px;
      min-width: 56px;
      height: 56px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      flex-shrink: 0;
    }
    
    .feature-content {
      flex: 1;
      text-align: left;
    }
    
    .feature-content h5 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 5px;
      color: white;
    }
    
    .feature-content p {
      font-size: 1rem;
      opacity: 0.9;
      line-height: 1.5;
      font-weight: 300;
    }
    
    /* Right Side - Login Form */
    .login-section {
      display: flex;
      justify-content: center;
      align-items: center;
      
      padding: 40px;
      
    }
    
    .login-container {
      max-width: 420px;
      width: 100%;
      padding: 50px 40px;
      background: var(--white);
      border-radius: 20px;
      box-shadow: var(--shadow);
      animation: fadeIn 0.8s ease-in-out;
      border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }
    
    .login-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 8px;
    }
    
    .login-subtitle {
      color: var(--text-light);
      font-size: 0.95rem;
    }
    
    /* Form Styles */
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .form-label {
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 8px;
      font-size: 0.95rem;
      display: flex;
      align-items: center;
    }
    
    .form-label i {
      margin-right: 8px;
      color: var(--primary-color);
    }
    
    .input-group {
      position: relative;
    }
    
    .form-control {
      border-radius: 12px;
      padding: 14px 18px;
      border: 1.5px solid #e2e8f0;
      font-size: 1rem;
      transition: var(--transition);
      height: auto;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.15);
    }
    
    .input-group-append {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
    }
    
    .toggle-password {
      background: none;
      border: none;
      color: var(--text-light);
      cursor: pointer;
      font-size: 1.1rem;
    }
    
    .toggle-password:hover {
      color: var(--primary-color);
    }
    
    /* Button Styles */
    .btn-login {
      border-radius: 12px;
      padding: 14px;
      background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
      border: none;
      font-size: 1rem;
      font-weight: 600;
      transition: var(--transition);
      width: 100%;
      margin-top: 10px;
      letter-spacing: 0.5px;
      color: white;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(37, 117, 252, 0.25);
      color: white;
    }
    
    .btn-login:active {
      transform: translateY(0);
    }
    
    /* Additional Links */
    .login-footer {
      text-align: center;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #e2e8f0;
    }
    
    .forgot-password {
      color: var(--primary-color);
      font-weight: 500;
      text-decoration: none;
      font-size: 0.95rem;
      display: inline-flex;
      align-items: center;
    }
    
    .forgot-password:hover {
      text-decoration: underline;
      color: var(--secondary-color);
    }
    
    .forgot-password i {
      margin-right: 6px;
    }
    
    /* Alert Styles */
    .alert {
      border-radius: 12px;
      padding: 14px 18px;
      margin-bottom: 25px;
      border: none;
      font-size: 0.95rem;
      animation: slideIn 0.5s ease;
    }
    
    .alert-danger {
      background-color: #fff5f5;
      color: #c53030;
      border-left: 4px solid #f56565;
    }
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideIn {
      from { opacity: 0; transform: translateX(-20px); }
      to { opacity: 1; transform: translateX(0); }
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
      .image-section {
        display: none;
      }
      
      .login-section {
        padding: 20px;
        background: linear-gradient(135deg, rgba(106, 17, 203, 0.05), rgba(37, 117, 252, 0.05));
      }
      
      .login-container {
        padding: 40px 30px;
      }
    }
    
    @media (max-width: 576px) {
      .login-container {
        padding: 30px 25px;
        box-shadow: none;
        border: none;
        background: transparent;
      }
      
      .login-section {
        padding: 15px;
      }
    }
    
    /* Custom Checkbox */
    .form-check {
      margin-top: 10px;
    }
    
    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .form-check-label {
      color: var(--text-light);
      font-size: 0.9rem;
    }
    
    /* Logo in mobile view */
    .mobile-logo {
      display: none;
      text-align: center;
      margin-bottom: 25px;
      color: var(--primary-color);
      font-size: 1.8rem;
      font-weight: 700;
    }
    
    @media (max-width: 992px) {
      .mobile-logo {
        display: block;
      }
    }
    
    /* Copyright text in image section */
    .image-copyright {
      position: absolute;
      bottom: 20px;
      right: 20px;
      z-index: 2;
      font-size: 0.8rem;
      opacity: 0.7;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Left Side - Background Image with Overlay -->
      <div class="col-lg-7 col-md-6 d-none d-md-block image-section">
        <div class="image-content">
          <div class="hrm-logo">
            <i class="fas fa-users-cog"></i>
            HRM System
          </div>
          <h1 class="image-title">Human Resource Management Platform</h1>
          <p class="image-subtitle">
            Streamline your HR processes with our comprehensive solution.  
            Manage employees, payroll, attendance, and performance all in one place.
          </p>
          
          <div class="features-container">
            <h3 class="features-title">Key Features</h3>
            
            <div class="feature-item">
              <div class="feature-icon">
                <i class="fas fa-user-check"></i>
              </div>
              <div class="feature-content">
                <h5>Employee Management</h5>
                <p>Centralized employee database and records</p>
              </div>
            </div>
            
            <div class="feature-item">
              <div class="feature-icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <div class="feature-content">
                <h5>Performance Analytics</h5>
                <p>Track and analyze employee performance metrics</p>
              </div>
            </div>
            
            <div class="feature-item">
              <div class="feature-icon">
                <i class="fas fa-shield-alt"></i>
              </div>
              <div class="feature-content">
                <h5>Secure & Compliant</h5>
                <p>Enterprise-grade security with data protection</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="image-copyright">
          <i class="fas fa-camera me-1"></i> HRM Workspace Image
        </div>
      </div>
      
      <!-- Right Side - Login Form -->
      <div class="col-lg-5 col-md-6 col-sm-12 login-section">
        <div class="login-container">
          <!-- Mobile Logo -->
          <div class="mobile-logo">
            <i class="fas fa-users-cog"></i> HRM System
          </div>
          
          <!-- Login Header -->
          <div class="login-header">
            <h2 class="login-title">Welcome Back</h2>
            <p class="login-subtitle">Sign in to your HRM account</p>
          </div>
          
          <!-- Show error message -->
          <div id="alert-container">
            <!-- Error messages will be displayed here dynamically -->
            <!-- For demo purposes, we'll show a sample error message -->
            <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error-alert">
              <i class="fas fa-exclamation-circle me-2"></i>
              <span id="error-message">Invalid email or password. Please try again.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          
          <!-- Login Form -->
          <form id="login-form" method="POST" action="#">
            <!-- Email Field -->
            <div class="form-group">
              <label for="email" class="form-label">
                <i class="fas fa-envelope"></i> Email Address
              </label>
              <div class="input-group">
                <input type="email" class="form-control" name="email" id="email" 
                       placeholder="Enter your email address" required>
                <div class="input-group-append">
                  <span class="input-group-text bg-transparent border-0">
                    <i class="fas fa-user text-muted"></i>
                  </span>
                </div>
              </div>
            </div>
            
            <!-- Password Field -->
            <div class="form-group">
              <label for="password" class="form-label">
                <i class="fas fa-lock"></i> Password
              </label>
              <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" 
                       placeholder="Enter your password" required>
                <div class="input-group-append">
                  <button type="button" class="toggle-password" id="toggle-password">
                    <i class="far fa-eye"></i>
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
              <a href="#" class="forgot-password">
                <i class="fas fa-key"></i> Forgot Password?
              </a>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-login mt-4">
              <i class="fas fa-sign-in-alt me-2"></i> Sign In
            </button>
          </form>
          
          <!-- Login Footer -->
          <div class="login-footer">
            <p class="text-muted small mb-2">© 2023 HRM System. All rights reserved.</p>
            <p class="text-muted small">
              Need help? 
              <a href="#" class="text-primary">Contact Support</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Toggle password visibility
      const togglePassword = document.getElementById('toggle-password');
      const passwordInput = document.getElementById('password');
      const eyeIcon = togglePassword.querySelector('i');
      
      togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Toggle eye icon
        if (type === 'password') {
          eyeIcon.classList.remove('fa-eye-slash');
          eyeIcon.classList.add('fa-eye');
        } else {
          eyeIcon.classList.remove('fa-eye');
          eyeIcon.classList.add('fa-eye-slash');
        }
      });
      
      // Form submission
      const loginForm = document.getElementById('login-form');
      const errorAlert = document.getElementById('error-alert');
      const errorMessage = document.getElementById('error-message');
      
      loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        // Simple validation
        if (!email || !password) {
          showError('Please fill in all fields.');
          return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          showError('Please enter a valid email address.');
          return;
        }
        
        // For demo purposes, show success message
        // In a real application, this would be an AJAX call to the server
        if (email === "admin@hrm.com" && password === "password") {
          // Simulate successful login
          showSuccess('Login successful! Redirecting...');
          
          // Redirect after 1.5 seconds
          setTimeout(() => {
            window.location.href = '/dashboard';
          }, 1500);
        } else {
          // Show error for demo
          showError('Invalid email or password. Try admin@hrm.com / password');
        }
      });
      
      // Function to show error message
      function showError(message) {
        errorMessage.textContent = message;
        errorAlert.classList.remove('d-none');
        errorAlert.classList.add('show');
        
        // Auto hide after 5 seconds
        setTimeout(() => {
          errorAlert.classList.remove('show');
          setTimeout(() => {
            errorAlert.classList.add('d-none');
          }, 300);
        }, 5000);
      }
      
      // Function to show success message
      function showSuccess(message) {
        const successAlert = document.createElement('div');
        successAlert.className = 'alert alert-success alert-dismissible fade show';
        successAlert.innerHTML = `
          <i class="fas fa-check-circle me-2"></i>
          ${message}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        `;
        
        // Add custom styles for success alert
        successAlert.style.backgroundColor = '#f0fff4';
        successAlert.style.color = '#2f855a';
        successAlert.style.borderLeft = '4px solid #48bb78';
        
        document.getElementById('alert-container').prepend(successAlert);
        
        // Auto hide after 4 seconds
        setTimeout(() => {
          $(successAlert).alert('close');
        }, 4000);
      }
      
      // Auto-hide alerts on close
      $(document).on('close.bs.alert', '.alert', function() {
        $(this).fadeOut(300, function() {
          $(this).remove();
        });
      });
    });
  </script>
</body>
</html>