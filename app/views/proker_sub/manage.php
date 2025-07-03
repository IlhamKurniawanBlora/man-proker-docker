<?php $title = "Manajemen Detail Proker #$proker_no"; ?>

<!-- Page Header with Glassmorphism -->
<div class="mb-8">
  <div class="flex items-center space-x-4 mb-6">
    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
      </svg>
    </div>
    <div>
      <h2 class="text-3xl font-bold text-white">Detail Proker #<?= $proker_no ?></h2>
      <p class="text-white/60">Kelola detail, anggota, dan timeline program kerja</p>
    </div>
  </div>
</div>

<!-- Forms Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
  
  <!-- FORM DETAIL -->
  <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center space-x-3 mb-4">
      <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
        </svg>
      </div>
      <h3 class="text-lg font-semibold text-white">Tambah Detail</h3>
    </div>
    
    <form method="POST" action="/proker_sub/manage?no=<?= $proker_no ?>&section=detail" class="space-y-4">
      <div class="relative">
        <textarea 
          name="detail" 
          placeholder="Deskripsi detail proker..." 
          required 
          rows="4"
          class="w-full backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-transparent transition-all duration-300"
        ></textarea>
      </div>
      <button 
        type="submit" 
        class="w-full group flex items-center justify-center space-x-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium px-4 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5"
      >
        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span>Simpan Detail</span>
      </button>
    </form>
  </div>

  <!-- FORM ANGGOTA -->
  <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center space-x-3 mb-4">
      <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-pink-500 rounded-lg flex items-center justify-center">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
        </svg>
      </div>
      <h3 class="text-lg font-semibold text-white">Tambah Anggota</h3>
    </div>
    
    <form method="POST" action="/proker_sub/manage?no=<?= $proker_no ?>&section=anggota" class="space-y-4">
      <div class="space-y-3">
        <input 
          type="text" 
          name="anggota" 
          placeholder="Nama anggota" 
          required 
          class="w-full backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-transparent transition-all duration-300"
        />
        <input 
          type="text" 
          name="jabatan" 
          placeholder="Jabatan" 
          required 
          class="w-full backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-transparent transition-all duration-300"
        />
      </div>
      <button 
        type="submit" 
        class="w-full group flex items-center justify-center space-x-2 bg-gradient-to-r from-blue-500 to-pink-600 hover:from-blue-600 hover:to-pink-700 text-white font-medium px-4 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5"
      >
        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
        </svg>
        <span>Simpan Anggota</span>
      </button>
    </form>
  </div>

  <!-- FORM TIMELINE -->
  <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center space-x-3 mb-4">
      <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-500 rounded-lg flex items-center justify-center">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <h3 class="text-lg font-semibold text-white">Tambah Timeline</h3>
    </div>
    
    <form method="POST" action="/proker_sub/manage?no=<?= $proker_no ?>&section=timeline" class="space-y-4">
      <div class="space-y-3">
        <input 
          type="date" 
          name="tanggal" 
          required 
          class="w-full backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl p-3 text-white focus:outline-none focus:ring-2 focus:ring-orange-400/50 focus:border-transparent transition-all duration-300"
        />
        <input 
          type="text" 
          name="kegiatan" 
          placeholder="Nama kegiatan" 
          required 
          class="w-full backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-orange-400/50 focus:border-transparent transition-all duration-300"
        />
        <select 
          name="status" 
          required 
          class="w-full backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl p-3 text-white focus:outline-none focus:ring-2 focus:ring-orange-400/50 focus:border-transparent transition-all duration-300"
        >
          <?php foreach (['planned', 'ongoing', 'completed', 'cancelled'] as $s): ?>
            <option value="<?= $s ?>" class="bg-slate-800 text-white"><?= ucfirst($s) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button 
        type="submit" 
        class="w-full group flex items-center justify-center space-x-2 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-medium px-4 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5"
      >
        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span>Simpan Timeline</span>
      </button>
    </form>
  </div>
</div>

<!-- Data Lists Section -->
<div class="space-y-8">

  <!-- LIST DETAIL -->
  <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-6 shadow-xl">
    <div class="flex items-center space-x-3 mb-6">
      <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-white">Detail Saat Ini</h3>
    </div>
    
    <div class="space-y-3">
      <?php if (empty($details)): ?>
        <div class="text-center py-8 text-white/60">
          <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          <p>Belum ada detail yang ditambahkan</p>
        </div>
      <?php else: ?>
        <?php foreach ($details as $d): ?>
          <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <?php if ($_GET['action'] ?? '' === 'edit' && $_GET['section'] === 'detail' && $_GET['id'] == $d['no']): ?>
              <form method="POST" action="?no=<?= $proker_no ?>&section=detail&action=edit&id=<?= $d['no'] ?>" class="flex gap-3">
                <input 
                  type="text" 
                  name="detail_edit" 
                  value="<?= htmlspecialchars($d['deskripsi']) ?>" 
                  class="flex-1 backdrop-blur-sm bg-white/10 border border-white/20 rounded-lg p-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400/50" 
                  required
                >
                <button 
                  type="submit" 
                  class="px-4 py-2 bg-green-500/20 hover:bg-green-500/30 border border-green-400/30 text-green-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                >
                  Simpan
                </button>
                <a 
                  href="?no=<?= $proker_no ?>" 
                  class="px-4 py-2 bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                >
                  Batal
                </a>
              </form>
            <?php else: ?>
              <div class="flex items-center justify-between">
                <span class="text-white/90"><?= htmlspecialchars($d['deskripsi']) ?></span>
                <div class="flex space-x-2">
                  <a 
                    href="?no=<?= $proker_no ?>&section=detail&action=edit&id=<?= $d['no'] ?>" 
                    class="group flex items-center space-x-1 px-3 py-1 bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/30 text-blue-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span class="text-xs">Edit</span>
                  </a>
                  <a 
                    href="?no=<?= $proker_no ?>&section=detail&action=delete&id=<?= $d['no'] ?>" 
                    onclick="return confirm('Yakin hapus?')" 
                    class="group flex items-center space-x-1 px-3 py-1 bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span class="text-xs">Hapus</span>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- LIST ANGGOTA -->
  <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-6 shadow-xl">
    <div class="flex items-center space-x-3 mb-6">
      <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-pink-500 rounded-lg flex items-center justify-center">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-white">Anggota Saat Ini</h3>
    </div>
    
    <div class="space-y-3">
      <?php if (empty($anggota)): ?>
        <div class="text-center py-8 text-white/60">
          <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
          </svg>
          <p>Belum ada anggota yang ditambahkan</p>
        </div>
      <?php else: ?>
        <?php foreach ($anggota as $a): ?>
          <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <?php if ($_GET['action'] ?? '' === 'edit' && $_GET['section'] === 'anggota' && $_GET['id'] == $a['no']): ?>
              <form method="POST" action="?no=<?= $proker_no ?>&section=anggota&action=edit&id=<?= $a['no'] ?>" class="flex gap-3">
                <input 
                  type="text" 
                  name="anggota_edit" 
                  value="<?= htmlspecialchars($a['anggota']) ?>" 
                  class="flex-1 backdrop-blur-sm bg-white/10 border border-white/20 rounded-lg p-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400/50" 
                  required
                >
                <input 
                  type="text" 
                  name="jabatan_edit" 
                  value="<?= htmlspecialchars($a['jabatan']) ?>" 
                  class="flex-1 backdrop-blur-sm bg-white/10 border border-white/20 rounded-lg p-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400/50" 
                  required
                >
                <button 
                  type="submit" 
                  class="px-4 py-2 bg-green-500/20 hover:bg-green-500/30 border border-green-400/30 text-green-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                >
                  Simpan
                </button>
                <a 
                  href="?no=<?= $proker_no ?>" 
                  class="px-4 py-2 bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                >
                  Batal
                </a>
              </form>
            <?php else: ?>
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-pink-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">
                      <?= strtoupper(substr($a['anggota'], 0, 1)) ?>
                    </span>
                  </div>
                  <div>
                    <span class="text-white/90 font-medium"><?= htmlspecialchars($a['anggota']) ?></span>
                    <p class="text-white/60 text-sm"><?= htmlspecialchars($a['jabatan']) ?></p>
                  </div>
                </div>
                <div class="flex space-x-2">
                  <a 
                    href="?no=<?= $proker_no ?>&section=anggota&action=edit&id=<?= $a['no'] ?>" 
                    class="group flex items-center space-x-1 px-3 py-1 bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/30 text-blue-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span class="text-xs">Edit</span>
                  </a>
                  <a 
                    href="?no=<?= $proker_no ?>&section=anggota&action=delete&id=<?= $a['no'] ?>" 
                    onclick="return confirm('Yakin hapus?')" 
                    class="group flex items-center space-x-1 px-3 py-1 bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span class="text-xs">Hapus</span>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- LIST TIMELINE -->
  <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-6 shadow-xl">
    <div class="flex items-center space-x-3 mb-6">
      <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-500 rounded-lg flex items-center justify-center">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-white">Timeline Saat Ini</h3>
    </div>
    
    <div class="space-y-3">
      <?php if (empty($timeline)): ?>
        <div class="text-center py-8 text-white/60">
          <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <p>Belum ada timeline yang ditambahkan</p>
        </div>
      <?php else: ?>
        <?php foreach ($timeline as $t): ?>
          <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
            <?php if ($_GET['action'] ?? '' === 'edit' && $_GET['section'] === 'timeline' && $_GET['id'] == $t['no']): ?>
              <form method="POST" action="?no=<?= $proker_no ?>&section=timeline&action=edit&id=<?= $t['no'] ?>" class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <input 
                  type="date" 
                  name="tanggal_edit" 
                  value="<?= $t['tanggal'] ?>" 
                  class="backdrop-blur-sm bg-white/10 border border-white/20 rounded-lg p-2 text-white focus:outline-none focus:ring-2 focus:ring-orange-400/50" 
                  required
                >
                <input 
                  type="text" 
                  name="kegiatan_edit" 
                  value="<?= htmlspecialchars($t['kegiatan']) ?>" 
                  class="backdrop-blur-sm bg-white/10 border border-white/20 rounded-lg p-2 text-white focus:outline-none focus:ring-2 focus:ring-orange-400/50" 
                  required
                >
                <select 
                  name="status_edit" 
                  class="backdrop-blur-sm bg-white/10 border border-white/20 rounded-lg p-2 text-white focus:outline-none focus:ring-2 focus:ring-orange-400/50" 
                  required
                >
                  <?php foreach (['planned', 'ongoing', 'completed', 'cancelled'] as $s): ?>
                    <option value="<?= $s ?>" <?= $t['status'] === $s ? 'selected' : '' ?> class="bg-slate-800 text-white">
                      <?= ucfirst($s) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div class="flex items-center gap-2">
                  <button 
                    type="submit" 
                    class="px-4 py-2 bg-green-500/20 hover:bg-green-500/30 border border-green-400/30 text-green-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    Simpan
                  </button>
                  <a 
                    href="?no=<?= $proker_no ?>" 
                    class="px-4 py-2 bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    Batal
                  </a>
                </div>
              </form>
            <?php else: ?>
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                  <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 rounded-full <?php 
                      switch($t['status']) {
                        case 'planned': echo 'bg-blue-400'; break;
                        case 'ongoing': echo 'bg-yellow-400'; break;
                        case 'completed': echo 'bg-green-400'; break;
                        case 'cancelled': echo 'bg-red-400'; break;
                        default: echo 'bg-gray-400';
                      }
                    ?>"></div>
                    <span class="text-white/70 text-sm font-mono"><?= $t['tanggal'] ?></span>
                  </div>
                  <div>
                    <span class="text-white/90 font-medium"><?= htmlspecialchars($t['kegiatan']) ?></span>
                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php 
                      switch($t['status']) {
                        case 'planned': echo 'bg-blue-500/20 text-blue-100 border border-blue-400/30'; break;
                        case 'ongoing': echo 'bg-yellow-500/20 text-yellow-100 border border-yellow-400/30'; break;
                        case 'completed': echo 'bg-green-500/20 text-green-100 border border-green-400/30'; break;
                        case 'cancelled': echo 'bg-red-500/20 text-red-100 border border-red-400/30'; break;
                        default: echo 'bg-gray-500/20 text-gray-100 border border-gray-400/30';
                      }
                    ?>">
                      <?= ucfirst($t['status']) ?>
                    </span>
                  </div>
                </div>
                <div class="flex space-x-2">
                  <a 
                    href="?no=<?= $proker_no ?>&section=timeline&action=edit&id=<?= $t['no'] ?>" 
                    class="group flex items-center space-x-1 px-3 py-1 bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/30 text-blue-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span class="text-xs">Edit</span>
                  </a>
                  <a 
                    href="?no=<?= $proker_no ?>&section=timeline&action=delete&id=<?= $t['no'] ?>" 
                    onclick="return confirm('Yakin hapus?')" 
                    class="group flex items-center space-x-1 px-3 py-1 bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 rounded-lg transition-all duration-300 hover:shadow-lg"
                  >
                    <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span class="text-xs">Hapus</span>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Back Navigation -->
<div class="mt-8 text-center">
  <a 
    href="/proker/list" 
    class="group inline-flex items-center space-x-3 backdrop-blur-lg bg-white/10 hover:bg-white/20 border border-white/20 text-white px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5"
  >
    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    <span class="font-medium">Kembali ke Daftar Proker</span>
  </a>
</div>

<style>
/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.3);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: rgba(255, 255, 255, 0.5);
}

/* Custom focus styles for better accessibility */
input:focus, textarea:focus, select:focus {
  transform: translateY(-1px);
}

/* Smooth animations */
* {
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Status indicator animations */
.status-indicator {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: .8;
  }
}
</style>