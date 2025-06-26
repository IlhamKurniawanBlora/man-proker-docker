<?php $title = 'Edit Program Kerja'; ?>

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Proker</h2>

    <form method="POST" action="" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Nama Proker</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($proker['nama']) ?>" required
                class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border px-3 py-2 rounded"><?= htmlspecialchars($proker['deskripsi']) ?></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <?php foreach (['draft', 'active', 'completed', 'cancelled'] as $status): ?>
                    <option value="<?= $status ?>" <?= $proker['status'] === $status ? 'selected' : '' ?>>
                        <?= ucfirst($status) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex justify-between items-center">
            <a href="/proker/list" class="text-blue-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
