<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Aplikasi Proker' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-4">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <span class="font-semibold">Manajemen Proker</span>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="/auth/logout" class="text-blue-600 hover:underline">Logout</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        <?= $content ?>
    </main>

</body>
</html>
