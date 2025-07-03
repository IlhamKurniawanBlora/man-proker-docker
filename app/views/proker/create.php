<?php $title = 'Tambah Program Kerja'; ?>

<!-- Header Section -->
<div class="mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-white">Tambah Program Kerja</h1>
            <p class="text-white/60">Buat program kerja baru untuk organisasi Anda</p>
        </div>
    </div>
    
    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-sm">
        <a href="/proker/list" class="text-white/60 hover:text-white transition-colors duration-200">Daftar Proker</a>
        <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-white/80 font-medium">Tambah Proker</span>
    </nav>
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
                    ></textarea>
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
                            <option value="draft" class="bg-slate-800 text-white">Draft</option>
                            <option value="active" class="bg-slate-800 text-white">Aktif</option>
                            <option value="completed" class="bg-slate-800 text-white">Selesai</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
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
                            class="group flex items-center space-x-2 backdrop-blur-lg bg-gradient-to-r from-green-500/20 to-emerald-500/20 hover:from-green-500/30 hover:to-emerald-500/30 border border-green-400/30 text-green-100 hover:text-white px-8 py-3 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 font-semibold"
                        >
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Simpan Proker</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>