<?php $title = "Manajemen Detail Proker #$proker_no"; ?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow space-y-10">

  <h2 class="text-2xl font-bold text-gray-700">Manajemen Detail Proker #<?= $proker_no ?></h2>

  <!-- FORM DETAIL -->
  <form method="POST" action="/proker_sub/manage?no=<?= $proker_no ?>&section=detail" class="space-y-2">
    <h3 class="font-semibold">Tambah Detail Proker</h3>
    <textarea name="detail" placeholder="Deskripsi detail..." required class="w-full border p-2 rounded"></textarea>
    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Simpan Detail</button>
  </form>

  <!-- FORM ANGGOTA -->
  <form method="POST" action="/proker_sub/manage?no=<?= $proker_no ?>&section=anggota" class="space-y-2">
    <h3 class="font-semibold">Tambah Anggota</h3>
    <div class="flex gap-2">
      <input type="text" name="anggota" placeholder="Nama anggota" required class="flex-1 border p-2 rounded" />
      <input type="text" name="jabatan" placeholder="Jabatan" required class="flex-1 border p-2 rounded" />
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Simpan Anggota</button>
  </form>

  <!-- FORM TIMELINE -->
  <form method="POST" action="/proker_sub/manage?no=<?= $proker_no ?>&section=timeline" class="space-y-2">
    <h3 class="font-semibold">Tambah Timeline</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      <input type="date" name="tanggal" required class="border p-2 rounded" />
      <input type="text" name="kegiatan" placeholder="Nama kegiatan" required class="border p-2 rounded" />
      <select name="status" required class="border p-2 rounded">
        <?php foreach (['planned', 'ongoing', 'completed', 'cancelled'] as $s): ?>
          <option value="<?= $s ?>"><?= ucfirst($s) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Simpan Timeline</button>
  </form>

  <!-- LIST DETAIL -->
  <div>
    <h3 class="font-semibold mb-2">Detail Saat Ini</h3>
    <ul class="space-y-1">
    <?php foreach ($details as $d): ?>
      <li class="flex items-center justify-between border-b py-1">
        <?php if ($_GET['action'] ?? '' === 'edit' && $_GET['section'] === 'detail' && $_GET['id'] == $d['no']): ?>
          <form method="POST" action="?no=<?= $proker_no ?>&section=detail&action=edit&id=<?= $d['no'] ?>" class="flex gap-2 flex-1">
            <input type="text" name="detail_edit" value="<?= htmlspecialchars($d['deskripsi']) ?>" class="flex-1 border p-1 rounded" required>
            <button type="submit" class="text-green-600 hover:underline">Simpan</button>
            <a href="?no=<?= $proker_no ?>" class="text-red-500 hover:underline">Batal</a>
          </form>
        <?php else: ?>
          <span><?= htmlspecialchars($d['deskripsi']) ?></span>
          <div class="text-sm space-x-2">
            <a href="?no=<?= $proker_no ?>&section=detail&action=edit&id=<?= $d['no'] ?>" class="text-blue-600 hover:underline">Edit</a>
            <a href="?no=<?= $proker_no ?>&section=detail&action=delete&id=<?= $d['no'] ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</a>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>

  <!-- LIST ANGGOTA -->
  <div>
    <h3 class="font-semibold mb-2">Anggota Saat Ini</h3>
    <ul class="space-y-1">
    <?php foreach ($anggota as $a): ?>
      <li class="flex items-center justify-between border-b py-1">
        <?php if ($_GET['action'] ?? '' === 'edit' && $_GET['section'] === 'anggota' && $_GET['id'] == $a['no']): ?>
          <form method="POST" action="?no=<?= $proker_no ?>&section=anggota&action=edit&id=<?= $a['no'] ?>" class="flex gap-2 flex-1">
            <input type="text" name="anggota_edit" value="<?= htmlspecialchars($a['anggota']) ?>" class="flex-1 border p-1 rounded" required>
            <input type="text" name="jabatan_edit" value="<?= htmlspecialchars($a['jabatan']) ?>" class="flex-1 border p-1 rounded" required>
            <button type="submit" class="text-green-600 hover:underline">Simpan</button>
            <a href="?no=<?= $proker_no ?>" class="text-red-500 hover:underline">Batal</a>
          </form>
        <?php else: ?>
          <span><?= htmlspecialchars($a['anggota']) ?> - <?= htmlspecialchars($a['jabatan']) ?></span>
          <div class="text-sm space-x-2">
            <a href="?no=<?= $proker_no ?>&section=anggota&action=edit&id=<?= $a['no'] ?>" class="text-blue-600 hover:underline">Edit</a>
            <a href="?no=<?= $proker_no ?>&section=anggota&action=delete&id=<?= $a['no'] ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</a>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>

  <!-- LIST TIMELINE -->
  <div>
    <h3 class="font-semibold mb-2">Timeline Saat Ini</h3>
    <ul class="space-y-1">
    <?php foreach ($timeline as $t): ?>
      <li class="flex items-center justify-between border-b py-1">
        <?php if ($_GET['action'] ?? '' === 'edit' && $_GET['section'] === 'timeline' && $_GET['id'] == $t['no']): ?>
          <form method="POST" action="?no=<?= $proker_no ?>&section=timeline&action=edit&id=<?= $t['no'] ?>" class="grid grid-cols-4 gap-2 flex-1">
            <input type="date" name="tanggal_edit" value="<?= $t['tanggal'] ?>" class="border p-1 rounded" required>
            <input type="text" name="kegiatan_edit" value="<?= htmlspecialchars($t['kegiatan']) ?>" class="border p-1 rounded" required>
            <select name="status_edit" class="border p-1 rounded" required>
              <?php foreach (['planned', 'ongoing', 'completed', 'cancelled'] as $s): ?>
                <option value="<?= $s ?>" <?= $t['status'] === $s ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
              <?php endforeach; ?>
            </select>
            <div class="flex items-center gap-2">
              <button type="submit" class="text-green-600 hover:underline">Simpan</button>
              <a href="?no=<?= $proker_no ?>" class="text-red-500 hover:underline">Batal</a>
            </div>
          </form>
        <?php else: ?>
          <span><?= $t['tanggal'] ?> - <?= htmlspecialchars($t['kegiatan']) ?> (<?= $t['status'] ?>)</span>
          <div class="text-sm space-x-2">
            <a href="?no=<?= $proker_no ?>&section=timeline&action=edit&id=<?= $t['no'] ?>" class="text-blue-600 hover:underline">Edit</a>
            <a href="?no=<?= $proker_no ?>&section=timeline&action=delete&id=<?= $t['no'] ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</a>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>

  <div class="text-center">
    <a href="/proker/list" class="text-blue-600 hover:underline">← Kembali ke Daftar Proker</a>
  </div>
</div>
