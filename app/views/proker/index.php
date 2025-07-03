<?php $title = 'Daftar Program Kerja' ?>

<!-- Header Section -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2">Daftar Program Kerja</h1>
        <p class="text-white/60">Kelola dan pantau semua program kerja organisasi</p>
    </div>
    <a href="/proker/create" class="group flex items-center space-x-2 backdrop-blur-lg bg-gradient-to-r from-green-500/20 to-emerald-500/20 hover:from-green-500/30 hover:to-emerald-500/30 border border-green-400/30 text-green-100 hover:text-white px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span class="font-semibold">Tambah Proker</span>
    </a>
</div>

<!-- Filter Section -->
<div class="backdrop-blur-lg bg-white/5 border border-white/10 rounded-2xl p-6 mb-8 shadow-xl">
    <form method="GET" action="/proker/list" class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
        <label class="text-white font-medium flex items-center space-x-2">
            <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
            </svg>
            <span>Filter Status:</span>
        </label>
        <select name="status" onchange="this.form.submit()" class="backdrop-blur-lg bg-white/10 border border-white/20 text-white rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 transition-all duration-300">
            <?php foreach (['all' => 'Semua', 'draft' => 'Draft', 'active' => 'Aktif', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $value => $label): ?>
                <option value="<?= $value ?>" <?= $status === $value ? 'selected' : '' ?> class="bg-slate-800 text-white">
                    <?= $label ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<!-- Table Section -->
<div class="backdrop-blur-lg bg-white/5 border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="backdrop-blur-lg bg-white/10 border-b border-white/10">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white/80 uppercase tracking-wider border-r border-white/10">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white/80 uppercase tracking-wider border-r border-white/10">Nama Proker</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white/80 uppercase tracking-wider border-r border-white/10">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white/80 uppercase tracking-wider border-r border-white/10">Pembuat</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white/80 uppercase tracking-wider border-r border-white/10">Waktu Dibuat</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-white/80 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                <?php if (empty($prokers)): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center space-y-4">
                                <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white/60 text-lg font-medium">Belum ada program kerja</p>
                                    <p class="text-white/40 text-sm mt-1">Mulai dengan menambahkan proker pertama Anda</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($prokers as $index => $proker): ?>
                        <tr class="hover:bg-white/5 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-white/80 font-medium border-r border-white/5">
                                <?= $index + 1 ?>
                            </td>
                            <td class="px-6 py-4 border-r border-white/5">
                                <div class="text-white font-medium"><?= htmlspecialchars($proker['nama']) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white/5">
                                <?php
                                $statusColors = [
                                    'draft' => 'bg-yellow-500/20 text-yellow-100 border-yellow-400/30',
                                    'active' => 'bg-green-500/20 text-green-100 border-green-400/30',
                                    'completed' => 'bg-blue-500/20 text-blue-100 border-blue-400/30',
                                    'cancelled' => 'bg-red-500/20 text-red-100 border-red-400/30'
                                ];
                                $statusLabels = [
                                    'draft' => 'Draft',
                                    'active' => 'Aktif',
                                    'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan'
                                ];
                                $statusClass = $statusColors[$proker['status']] ?? 'bg-gray-500/20 text-gray-100 border-gray-400/30';
                                $statusLabel = $statusLabels[$proker['status']] ?? ucfirst($proker['status']);
                                ?>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border <?= $statusClass ?>">
                                    <?= $statusLabel ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white/80 border-r border-white/5">
                                <?= htmlspecialchars($proker['creator']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white/60 text-sm border-r border-white/5">
                                <?= $proker['created_at'] ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="/proker/edit?no=<?= $proker['no'] ?>" 
                                       title="Edit"
                                       class="group p-2 backdrop-blur-lg bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/30 text-blue-100 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <a href="/proker_sub/manage?no=<?= $proker['no'] ?>" 
                                       title="Kelola Detail"
                                       class="group p-2 backdrop-blur-lg bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/30 text-blue-100 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </a>
                                    <a href="/proker_sub/preview?no=<?= $proker['no'] ?>" 
                                       target="_blank" 
                                       title="Preview"
                                       class="group p-2 backdrop-blur-lg bg-green-500/20 hover:bg-green-500/30 border border-green-400/30 text-green-100 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="/proker/delete?no=<?= $proker['no'] ?>" 
                                       onclick="return confirm('Yakin ingin menghapus proker ini?')" 
                                       title="Hapus"
                                       class="group p-2 backdrop-blur-lg bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Statistics Section (Optional Enhancement) -->
<?php if (!empty($prokers)): ?>
<div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
    <?php
    $stats = [];
    foreach ($prokers as $proker) {
        $stats[$proker['status']] = ($stats[$proker['status']] ?? 0) + 1;
    }
    
    $statConfigs = [
        'draft' => ['label' => 'Draft', 'color' => 'yellow', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
        'active' => ['label' => 'Aktif', 'color' => 'green', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
        'completed' => ['label' => 'Selesai', 'color' => 'blue', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
        'cancelled' => ['label' => 'Dibatalkan', 'color' => 'red', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z']
    ];
    ?>
    
    <?php foreach ($statConfigs as $status => $config): ?>
        <div class="backdrop-blur-lg bg-<?= $config['color'] ?>-500/10 border border-<?= $config['color'] ?>-400/20 rounded-2xl p-6 hover:bg-<?= $config['color'] ?>-500/15 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-<?= $config['color'] ?>-100 text-sm font-medium"><?= $config['label'] ?></p>
                    <p class="text-2xl font-bold text-white mt-1"><?= $stats[$status] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-<?= $config['color'] ?>-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-<?= $config['color'] ?>-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $config['icon'] ?>"></path>
                    </svg>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>