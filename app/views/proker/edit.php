<?php $title = 'Edit Program Kerja'; ?>

<!-- Header Section -->
<div class="mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-white">Edit Program Kerja</h1>
            <p class="text-white/60">Perbarui informasi program kerja Anda</p>
        </div>
    </div>
    
    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-sm">
        <a href="/proker/list" class="text-white/60 hover:text-white transition-colors duration-200">Daftar Proker</a>
        <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-white/80 font-medium">Edit: <?= htmlspecialchars($proker['nama'] ?? 'Proker') ?></span>
    </nav>
</div>

<!-- Current Status Badge -->
<div class="max-w-2xl mx-auto mb-6">
    <div class="flex items-center justify-between backdrop-blur-lg bg-white/5 border border-white/10 rounded-2xl p-4">
        <div class="flex items-center space-x-3">
            <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-white/80 text-sm">Status saat ini:</span>
        </div>
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
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border <?= $statusClass ?>">
            <?= $statusLabel ?>
        </span>
    </div>
</div>

<!-- Form Section -->
<div class="max-w-2xl mx-auto">
    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl overflow-hidden">
        <div class="p-8">
            <form method="POST" action="" class="space-y-8">
                <!-- Nama Proker -->
                <div class="space-y-2">
                    <label class="flex items-center space-x-2 text-white font-medium">
                        <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Nama Program Kerja</span>
                        <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="nama" 
                        value="<?= htmlspecialchars($proker['nama']) ?>" 
                        required 
                        placeholder="Masukkan nama program kerja..."
                        class="w-full backdrop-blur-lg bg-white/10 border border-white/20 text-white placeholder-white/50 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 transition-all duration-300 hover:bg-white/15"
                    />
                </div>

                <!-- Deskripsi -->
                <div class="space-y-2">
                    <label class="flex items-center space-x-2 text-white font-medium">
                        <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        <span>Deskripsi</span>
                    </label>
                    <textarea 
                        name="deskripsi" 
                        rows="4"
                        placeholder="Jelaskan detail program kerja ini..."
                        class="w-full backdrop-blur-lg bg-white/10 border border-white/20 text-white placeholder-white/50 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 transition-all duration-300 hover:bg-white/15 resize-none"
                    ><?= htmlspecialchars($proker['deskripsi']) ?></textarea>
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label class="flex items-center space-x-2 text-white font-medium">
                        <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Status</span>
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <select 
                            name="status" 
                            class="w-full backdrop-blur-lg bg-white/10 border border-white/20 text-white px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 transition-all duration-300 hover:bg-white/15 appearance-none cursor-pointer"
                        >
                            <?php 
                            $statusOptions = [
                                'draft' => 'Draft',
                                'active' => 'Aktif', 
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan'
                            ];
                            foreach ($statusOptions as $value => $label): 
                            ?>
                                <option value="<?= $value ?>" <?= $proker['status'] === $value ? 'selected' : '' ?> class="bg-slate-800 text-white">
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Metadata Info -->
                <div class="backdrop-blur-lg bg-white/5 border border-white/10 rounded-2xl p-4 space-y-2">
                    <h3 class="text-white font-medium text-sm mb-3 flex items-center space-x-2">
                        <svg class="w-4 h-4 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Informasi Proker</span>
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-white/60">Dibuat oleh:</span>
                            <span class="text-white/90 font-medium ml-2"><?= htmlspecialchars($proker['created_by'] ?? 'N/A') ?></span>
                        </div>
                        <div>
                            <span class="text-white/60">Waktu dibuat:</span>
                            <span class="text-white/90 font-medium ml-2"><?= $proker['created_at'] ?? 'N/A' ?></span>
                        </div>
                        <?php if (isset($proker['updated_at'])): ?>
                        <div class="sm:col-span-2">
                            <span class="text-white/60">Terakhir diupdate:</span>
                            <span class="text-white/90 font-medium ml-2"><?= $proker['updated_at'] ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-white/10">
                    <a href="/proker/list" class="group flex items-center space-x-2 backdrop-blur-lg bg-white/10 hover:bg-white/15 border border-white/20 text-white/80 hover:text-white px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Kembali</span>
                    </a>
                    
                    <div class="flex items-center space-x-3">
                        <button 
                            type="reset" 
                            class="group flex items-center space-x-2 backdrop-blur-lg bg-red-500/20 hover:bg-red-500/30 border border-red-400/30 text-red-100 hover:text-white px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5"
                        >
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span>Reset</span>
                        </button>
                        
                        <button 
                            type="submit" 
                            class="group flex items-center space-x-2 backdrop-blur-lg bg-gradient-to-r from-blue-500/20 to-blue-500/20 hover:from-blue-500/30 hover:to-blue-500/30 border border-blue-400/30 text-blue-100 hover:text-white px-8 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 font-semibold"
                        >
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-8 flex flex-col sm:flex-row gap-4">
        <a href="/proker_sub/manage?no=<?= $proker['no'] ?>" class="group flex items-center space-x-2 backdrop-blur-lg bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/30 text-blue-100 hover:text-white px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span>Kelola Detail</span>
        </a>
        
        <a href="/proker_sub/preview?no=<?= $proker['no'] ?>" target="_blank" class="group flex items-center space-x-2 backdrop-blur-lg bg-green-500/20 hover:bg-green-500/30 border border-green-400/30 text-green-100 hover:text-white px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            <span>Preview</span>
        </a>
    </div>
</div>