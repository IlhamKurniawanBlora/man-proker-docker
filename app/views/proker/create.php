<?php $title = 'Tambah Program Kerja'; ?>

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah Proker</h2>

    <form method="POST" action="" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Nama Proker</label>
            <input type="text" name="nama" required class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="draft">Draft</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="flex justify-between items-center">
            <a href="/proker/list" class="text-blue-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan
            </button>
        </div>
    </form>
</div>
