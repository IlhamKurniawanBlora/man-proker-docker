<?php $title = 'Daftar Program Kerja' ?>

<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Daftar Program Kerja</h1>
    <a href="/proker/create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Tambah Proker
    </a>
</div>

<form method="GET" action="/proker/list" class="mb-4">
    <label class="mr-2 font-medium">Filter Status:</label>
    <select name="status" onchange="this.form.submit()" class="border px-2 py-1 rounded">
        <?php foreach (['all', 'draft', 'active', 'completed', 'cancelled'] as $s): ?>
            <option value="<?= $s ?>" <?= $status === $s ? 'selected' : '' ?>>
                <?= ucfirst($s) ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama Proker</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Pembuat</th>
                <th class="border px-4 py-2">Waktu Dibuat</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($prokers)): ?>
                <tr>
                    <td colspan="6" class="text-center py-4">Belum ada proker.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($prokers as $index => $proker): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2"><?= $index + 1 ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($proker['nama']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($proker['status']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($proker['creator']) ?></td>
                        <td class="border px-4 py-2"><?= $proker['created_at'] ?></td>
                        <td class="border px-4 py-2 text-center space-x-2">
                            <a href="/proker/edit?no=<?= $proker['no'] ?>" title="Edit">
                                ✏️
                            </a>
                            <a href="/proker/delete?no=<?= $proker['no'] ?>" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                ❌
                            </a>
                            <a href="/proker_sub/manage?no=<?= $proker['no'] ?>" title="Detail">
                                ⚙️
                            </a>
                            <a href="/proker_sub/preview?no=<?= $proker['no'] ?>" target="_blank" title="Preview">
                                👁️
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<p class="mt-6">
    <a href="/auth/logout" class="text-blue-600 hover:underline">Logout</a>
</p>
