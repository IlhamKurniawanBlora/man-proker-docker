<?php $title = "Preview Proker: " . htmlspecialchars($proker['nama']); ?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow space-y-6">

  <h2 class="text-2xl font-bold text-gray-800">Preview Proker: <?= htmlspecialchars($proker['nama']) ?></h2>

  <div class="text-gray-700 space-y-1">
    <p><strong>Dibuat oleh:</strong> <?= htmlspecialchars($proker['created_by_name'] ?? 'N/A') ?></p>
    <p><strong>Status:</strong> <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800 text-sm"><?= ucfirst($proker['status']) ?></span></p>
    <p><strong>Deskripsi:</strong> <br><span class="whitespace-pre-line"><?= htmlspecialchars($proker['deskripsi']) ?></span></p>
  </div>

  <hr class="my-4">

  <div>
    <h3 class="text-lg font-semibold mb-2">Detail Proker</h3>
    <ul class="list-disc pl-5 text-gray-700 space-y-1">
      <?php foreach ($details as $d): ?>
        <li><?= htmlspecialchars($d['deskripsi']) ?></li>
      <?php endforeach; ?>
      <?php if (empty($details)): ?>
        <li class="text-gray-400 italic">Belum ada detail.</li>
      <?php endif; ?>
    </ul>
  </div>

  <div>
    <h3 class="text-lg font-semibold mt-6 mb-2">Anggota</h3>
    <ul class="list-disc pl-5 text-gray-700 space-y-1">
      <?php foreach ($anggota as $a): ?>
        <li><?= htmlspecialchars($a['anggota']) ?> - <span class="italic"><?= htmlspecialchars($a['jabatan']) ?></span></li>
      <?php endforeach; ?>
      <?php if (empty($anggota)): ?>
        <li class="text-gray-400 italic">Belum ada anggota.</li>
      <?php endif; ?>
    </ul>
  </div>

  <div>
    <h3 class="text-lg font-semibold mt-6 mb-2">Timeline</h3>
    <ul class="list-disc pl-5 text-gray-700 space-y-1">
      <?php foreach ($timeline as $t): ?>
        <li><?= $t['tanggal'] ?> - <?= htmlspecialchars($t['kegiatan']) ?> 
          <span class="text-sm bg-gray-100 px-2 py-0.5 rounded text-gray-600 ml-2">(<?= ucfirst($t['status']) ?>)</span>
        </li>
      <?php endforeach; ?>
      <?php if (empty($timeline)): ?>
        <li class="text-gray-400 italic">Belum ada timeline.</li>
      <?php endif; ?>
    </ul>
  </div>

  <div class="text-center mt-8">
    <a href="/proker/list" class="text-blue-600 hover:underline">&larr; Kembali ke Daftar Proker</a>
  </div>
</div>
