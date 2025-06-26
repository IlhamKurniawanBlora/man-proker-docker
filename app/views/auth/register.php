<?php 
session_start();
  if (isset($_SESSION['user'])) {
    header('Location: /proker/list');
    exit;
  }
?>
<?php $title = 'Register Akun' ?>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Form Register</h1>

    <?php if (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Username</label>
            <input type="text" name="username" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Konfirmasi Password</label>
            <input type="password" name="confirm_password" required class="w-full border px-3 py-2 rounded">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
            Register
        </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
        Sudah punya akun? <a href="/auth/login" class="text-blue-600 hover:underline">Login</a>
    </p>
</div>
