<?php 
session_start();

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header('Location: /proker/list');
    exit;
}

// Initialize variables
$error = '';
$success = '';
$username = '';
$email = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validation
    if (empty($username)) {
        $error = 'Username tidak boleh kosong';
    } elseif (strlen($username) < 3) {
        $error = 'Username minimal 3 karakter';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $error = 'Username hanya boleh mengandung huruf, angka, dan underscore';
    } elseif (empty($email)) {
        $error = 'Email tidak boleh kosong';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid';
    } elseif (empty($password)) {
        $error = 'Password tidak boleh kosong';
    } elseif (strlen($password) < 6) {
        $error = 'Password minimal 6 karakter';
    } elseif ($password !== $confirm_password) {
        $error = 'Konfirmasi password tidak cocok';
    } else {
        // Here you would typically check if username/email already exists
        // and create the user account
        
        // For demo purposes, we'll show success
        $success = 'Registrasi berhasil! Silakan login.';
        
        // Reset form fields on success
        $username = '';
        $email = '';
    }
}

$title = 'Register Akun';
?>

<div class="min-h-[70vh] flex items-center justify-center px-4">
  <div class="w-full max-w-4xl">
    <!-- Register Card -->
    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 grid lg:grid-cols-2 gap-0 overflow-hidden">
      
      <!-- Left Section - Welcome -->
      <div class="hidden lg:flex flex-col justify-center items-center p-12 bg-gradient-to-br from-green-500/20 to-blue-600/20 border-r border-white/20">
        <div class="text-center">
          <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
          </div>
          <h2 class="text-4xl font-bold text-white mb-4">Join Our Community</h2>
          <p class="text-white/80 text-lg mb-6">Create your account and start your journey with us today</p>
          <div class="space-y-3">
            <div class="flex items-center text-white/70">
              <svg class="w-5 h-5 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Free account setup</span>
            </div>
            <div class="flex items-center text-white/70">
              <svg class="w-5 h-5 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Access to all features</span>
            </div>
            <div class="flex items-center text-white/70">
              <svg class="w-5 h-5 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>24/7 customer support</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Section - Form -->
      <div class="p-8">
        <!-- Mobile Header -->
        <div class="text-center mb-8 lg:hidden">
          <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
          </div>
          <h2 class="text-3xl font-bold text-white mb-2">Create Account</h2>
          <p class="text-white/70">Join us today and get started</p>
        </div>
        
        <!-- Desktop Header -->
        <div class="hidden lg:block text-center mb-8">
          <h2 class="text-2xl font-bold text-white mb-2">Create Account</h2>
          <p class="text-white/70">Fill in your details below</p>
        </div>

      <!-- Error Message -->
      <?php if (!empty($error)): ?>
        <div class="mb-6 backdrop-blur-lg bg-red-500/20 border border-red-400/30 rounded-xl p-4 animate-pulse">
          <div class="flex items-center">
            <svg class="w-5 h-5 text-red-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-red-200 font-medium"><?= htmlspecialchars($error) ?></p>
          </div>
        </div>
      <?php endif; ?>

      <!-- Success Message -->
      <?php if (!empty($success)): ?>
        <div class="mb-6 backdrop-blur-lg bg-green-500/20 border border-green-400/30 rounded-xl p-4 animate-pulse">
          <div class="flex items-center">
            <svg class="w-5 h-5 text-green-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-green-200 font-medium"><?= htmlspecialchars($success) ?></p>
          </div>
        </div>
      <?php endif; ?>

      <!-- Register Form -->
      <form method="POST" class="space-y-4">
        
        <!-- Username and Email Row -->
        <div class="grid md:grid-cols-2 gap-4">
          <!-- Username Field -->
          <div class="space-y-2">
            <label class="block text-white/90 font-medium text-sm">Username</label>
            <div class="relative group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-white/50 group-focus-within:text-white/80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <input 
                type="text" 
                name="username" 
                value="<?= htmlspecialchars($username) ?>"
                placeholder="Enter username" 
                required 
                class="w-full pl-10 pr-4 py-3 backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-green-400/50 focus:border-green-400/50 transition-all duration-300 hover:bg-white/15 focus:bg-white/15"
              >
            </div>
          </div>

          <!-- Email Field -->
          <div class="space-y-2">
            <label class="block text-white/90 font-medium text-sm">Email</label>
            <div class="relative group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-white/50 group-focus-within:text-white/80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                </svg>
              </div>
              <input 
                type="email" 
                name="email" 
                value="<?= htmlspecialchars($email) ?>"
                placeholder="Enter email" 
                required 
                class="w-full pl-10 pr-4 py-3 backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-green-400/50 focus:border-green-400/50 transition-all duration-300 hover:bg-white/15 focus:bg-white/15"
              >
            </div>
          </div>
        </div>

        <!-- Password and Confirm Password Row -->
        <div class="grid md:grid-cols-2 gap-4">
          <!-- Password Field -->
          <div class="space-y-2">
            <label class="block text-white/90 font-medium text-sm">Password</label>
            <div class="relative group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-white/50 group-focus-within:text-white/80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
              </div>
              <input 
                type="password" 
                name="password" 
                placeholder="Create password" 
                required 
                class="w-full pl-10 pr-4 py-3 backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-green-400/50 focus:border-green-400/50 transition-all duration-300 hover:bg-white/15 focus:bg-white/15"
              >
            </div>
          </div>

          <!-- Confirm Password Field -->
          <div class="space-y-2">
            <label class="block text-white/90 font-medium text-sm">Konfirmasi Password</label>
            <div class="relative group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-white/50 group-focus-within:text-white/80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <input 
                type="password" 
                name="confirm_password" 
                placeholder="Confirm password" 
                required 
                class="w-full pl-10 pr-4 py-3 backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-green-400/50 focus:border-green-400/50 transition-all duration-300 hover:bg-white/15 focus:bg-white/15"
              >
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit" 
          class="w-full bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-400/50 focus:ring-offset-2 focus:ring-offset-transparent"
        >
          <span class="flex items-center justify-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Create Account
          </span>
        </button>
      </form>

      <!-- Divider -->
      <div class="my-8 flex items-center">
        <div class="flex-1 border-t border-white/20"></div>
        <span class="px-4 text-white/50 text-sm">or</span>
        <div class="flex-1 border-t border-white/20"></div>
      </div>

      <!-- Sign In Link -->
      <div class="mt-8 text-center">
        <p class="text-white/70 text-sm">
          Already have an account? 
          <a href="/auth/login" class="text-green-300 hover:text-green-200 font-medium transition-colors duration-300 hover:underline">
            Sign in here
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

<script>
// Add interactive checkbox functionality
// Add form validation and loading state
document.querySelector('form').addEventListener('submit', function(e) {
  const submitButton = this.querySelector('button[type="submit"]');
  const originalContent = submitButton.innerHTML;
  
  submitButton.innerHTML = `
    <span class="flex items-center justify-center">
      <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      Creating Account...
    </span>
  `;
  
  submitButton.disabled = true;
  
  // Reset after 3 seconds if no response (for demo purposes)
  setTimeout(() => {
    submitButton.innerHTML = originalContent;
    submitButton.disabled = false;
  }, 3000);
});

// Password strength indicator
document.querySelector('input[name="password"]').addEventListener('input', function() {
  const password = this.value;
  const strengthIndicator = document.getElementById('password-strength');
  
  if (!strengthIndicator) {
    // Create strength indicator if it doesn't exist
    const indicator = document.createElement('div');
    indicator.id = 'password-strength';
    indicator.className = 'mt-1 text-xs';
    this.parentNode.parentNode.appendChild(indicator);
  }
  
  const strength = getPasswordStrength(password);
  const indicator = document.getElementById('password-strength');
  
  switch(strength) {
    case 'weak':
      indicator.innerHTML = '<span class="text-red-300">Weak password</span>';
      break;
    case 'medium':
      indicator.innerHTML = '<span class="text-yellow-300">Medium strength</span>';
      break;
    case 'strong':
      indicator.innerHTML = '<span class="text-green-300">Strong password</span>';
      break;
    default:
      indicator.innerHTML = '';
  }
});

function getPasswordStrength(password) {
  if (password.length < 6) return '';
  if (password.length < 8) return 'weak';
  
  let score = 0;
  if (password.match(/[a-z]/)) score++;
  if (password.match(/[A-Z]/)) score++;
  if (password.match(/[0-9]/)) score++;
  if (password.match(/[^a-zA-Z0-9]/)) score++;
  
  if (score < 3) return 'weak';
  if (score < 4) return 'medium';
  return 'strong';
}
</script>