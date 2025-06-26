<?php 
session_start();
  if (isset($_SESSION['user'])) {
    header('Location: /proker/list');
    exit;
  }
?>
<h2 class="text-xl font-semibold mb-4">Login</h2>

<?php if (!empty($error)): ?>
  <div class="bg-red-100 text-red-600 px-4 py-2 mb-3 rounded">
    <?= htmlspecialchars($error) ?>
  </div>
<?php endif; ?>

<form method="POST" class="space-y-4">
  <input type="text" name="username" placeholder="Username" required class="w-full border px-3 py-2 rounded">
  <input type="password" name="password" placeholder="Password" required class="w-full border px-3 py-2 rounded">
  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
</form>
