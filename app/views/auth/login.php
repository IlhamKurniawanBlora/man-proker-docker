<?php 
session_start();
  if (isset($_SESSION['user'])) {
    header('Location: /proker/list');
    exit;
  }
?>

<div class="min-h-[70vh] flex items-center justify-center px-4">
  <div class="w-full max-w-4xl">
    <!-- Login Card -->
    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 grid lg:grid-cols-2 gap-0 overflow-hidden">
      
      <!-- Left Section - Welcome -->
      <div class="hidden lg:flex flex-col justify-center items-center p-12 bg-gradient-to-br from-blue-500/20 to-blue-600/20 border-r border-white/20">
        <div class="text-center">
          <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-xl">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div>
          <h2 class="text-4xl font-bold text-white mb-4">KAMABA LOGIN!</h2>
          <p class="text-white/80 text-lg mb-6">We're so excited to see you again!</p>
          <div class="space-y-3">
            <div class="flex items-center text-white/70">
              <svg class="w-5 h-5 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span>Secure login process</span>
            </div>
            <div class="flex items-center text-white/70">
              <svg class="w-5 h-5 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span>Access your dashboard</span>
            </div>
            <div class="flex items-center text-white/70">
              <svg class="w-5 h-5 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span>Continue your journey</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Section - Form -->
      <div class="p-8">
        <!-- Mobile Header -->
        <div class="text-center mb-8 lg:hidden">
          <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div>
          <h2 class="text-3xl font-bold text-white mb-2">KAMABA LOGIN</h2>
          <p class="text-white/70">Sign in to your account</p>
        </div>
        
        <!-- Desktop Header -->
        <div class="hidden lg:block text-center mb-8">
          <h2 class="text-2xl font-bold text-white mb-2">Sign In</h2>
          <p class="text-white/70">Enter your credentials below</p>
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

        <!-- Login Form -->
        <form method="POST" class="space-y-6">
          
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
                placeholder="Enter your username" 
                required 
                class="w-full pl-10 pr-4 py-3 backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 transition-all duration-300 hover:bg-white/15 focus:bg-white/15"
              >
            </div>
          </div>

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
                placeholder="Enter your password" 
                required 
                class="w-full pl-10 pr-4 py-3 backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 transition-all duration-300 hover:bg-white/15 focus:bg-white/15"
              >
            </div>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit" 
            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:ring-offset-2 focus:ring-offset-transparent"
          >
            <span class="flex items-center justify-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
              </svg>
              Sign In
            </span>
          </button>
        </form>

        <!-- Divider -->
      

        <!-- Sign Up Link -->
        
      </div>
    </div>
  </div>
</div>

<script>

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
      Signing in...
    </span>
  `;
  
  submitButton.disabled = true;
  
  // Reset after 3 seconds if no response (for demo purposes)
  setTimeout(() => {
    submitButton.innerHTML = originalContent;
    submitButton.disabled = false;
  }, 3000);
});
</script>