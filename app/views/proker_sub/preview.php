<style>

        .container {
            max-width: 210mm;
            margin: auto;
            padding: 20mm;
            background: white;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .header .subtitle {
            font-size: 14pt;
            color: #555;
            margin-bottom: 15px;
        }

        .header-info {
            display: flex;
            justify-content: space-between;
            font-size: 11pt;
            margin-top: 15px;
        }

        /* Section Headers */
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .section-title {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #333;
            text-transform: uppercase;
        }

        /* Content Styling */
        .content-box {
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }

        .description {
            text-align: justify;
            line-height: 1.8;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .table-striped tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Timeline specific */
        .timeline-item {
            margin-bottom: 10px;
            padding: 10px;
            border-left: 3px solid #333;
            background: #f9f9f9;
        }

        .timeline-date {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .timeline-activity {
            margin-bottom: 3px;
        }

        .timeline-status {
            font-size: 10pt;
            color: #666;
            font-style: italic;
        }

        /* Print specific styles */
        @media print {
            body {
                font-size: 11pt;
            }
            
            .container {
                padding: 15mm;
            }
            
            .section {
                page-break-inside: avoid;
            }
            
            .no-print {
                display: none;
            }
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10pt;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .signature-section {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            text-align: center;
            width: 200px;
        }

        .signature-line {
            border-bottom: 1px solid #333;
            height: 60px;
            margin-bottom: 5px;
        }

        /* Status badge */
        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border: 1px solid #333;
            background: #f0f0f0;
            font-size: 10pt;
            font-weight: bold;
        }
    </style>

    <div class="container">
        <!-- Container untuk print -->
        <div class="container-print">
            <!-- Header -->
            <div class="header">
                <h1>Laporan Program Kerja</h1>
                <div class="subtitle"><?= htmlspecialchars($proker['nama']) ?></div>
                <div class="header-info">
                    <div>
                        <strong>Dibuat oleh:</strong> <?= htmlspecialchars($proker['created_by_name'] ?? 'N/A') ?>
                    </div>
                    <div>
                        <strong>Status:</strong> 
                        <span class="status-badge"><?= strtoupper($proker['status']) ?></span>
                    </div>
                    <div>
                        <strong>Tanggal Cetak:</strong> <?= date('d/m/Y H:i') ?>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Program Kerja -->
            <div class="section">
                <h2 class="section-title">1. Deskripsi Program Kerja</h2>
                <div class="content-box">
                    <div class="description">
                        <?= nl2br(htmlspecialchars($proker['deskripsi'])) ?>
                    </div>
                </div>
            </div>

            <!-- Detail Program Kerja -->
            <div class="section">
                <h2 class="section-title">2. Detail Program Kerja</h2>
                <?php if (!empty($details)): ?>
                    <table class="table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th>Deskripsi Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($details as $index => $d): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($d['deskripsi']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="content-box">
                        <em>Belum ada detail program kerja yang ditambahkan.</em>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Susunan Anggota Tim -->
            <div class="section">
                <h2 class="section-title">3. Susunan Anggota Tim</h2>
                <?php if (!empty($anggota)): ?>
                    <table class="table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th>Nama Anggota</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($anggota as $index => $a): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($a['anggota']) ?></td>
                                    <td><?= htmlspecialchars($a['jabatan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="content-box">
                        <em>Belum ada anggota tim yang ditambahkan.</em>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Timeline Kegiatan -->
            <div class="section">
                <h2 class="section-title">4. Timeline Kegiatan</h2>
                <?php if (!empty($timeline)): ?>
                    <?php foreach ($timeline as $index => $t): ?>
                        <div class="timeline-item">
                            <div class="timeline-date"><?= htmlspecialchars($t['tanggal']) ?></div>
                            <div class="timeline-activity"><?= htmlspecialchars($t['kegiatan']) ?></div>
                            <div class="timeline-status">Status: <?= ucfirst($t['status']) ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="content-box">
                        <em>Belum ada timeline kegiatan yang ditambahkan.</em>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tanda Tangan -->
            <div class="signature-section">
                <div class="signature-box">
                    <div>Mengetahui,</div>
                    <div style="margin-bottom: 10px;"><strong>Ketua Organisasi</strong></div>
                    <div class="signature-line"></div>
                    <div>(.......................)</div>
                </div>
                <div class="signature-box">
                    <div>Yogyakarta, <?= date('d F Y') ?></div>
                    <div style="margin-bottom: 10px;"><strong>Penanggung Jawab</strong></div>
                    <div class="signature-line"></div>
                    <div>(<?= htmlspecialchars($proker['created_by_name'] ?? '.....................') ?>)</div>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div>Dokumen ini digenerate secara otomatis oleh Sistem Manajemen Program Kerja</div>
                <div>Organisasi Kemahasiswaan - Universitas</div>
            </div>
        </div>

        <!-- Print Button (hidden when printing) -->
        <div class="no-print" style="text-align: center; margin-top: 30px;">
            <button onclick="printReport()" style="padding: 10px 20px; font-size: 14pt; background: #333; color: white; border: none; cursor: pointer; border-radius: 5px;">
                🖨️ Cetak PDF
            </button>
            <button onclick="history.back()" style="padding: 10px 20px; font-size: 14pt; background: #666; color: white; border: none; cursor: pointer; border-radius: 5px; margin-left: 10px;">
                ← Kembali
            </button>
        </div>
    </div>

    <script>
        function printReport() {
            // Ambil konten yang akan dicetak
            const printContent = document.querySelector('.container-print').innerHTML;
            
            // Ambil styles dari dokumen saat ini
            const styles = Array.from(document.querySelectorAll('style')).map(style => style.outerHTML).join('');
            
            // Buat window baru untuk print
            const printWindow = window.open('', '_blank');
            
            // Tulis konten ke window baru
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Laporan Program Kerja</title>
                    <meta charset="UTF-8">
                    ${styles}
                </head>
                <body>
                    <div class="container">
                        ${printContent}
                    </div>
                </body>
                </html>
            `);
            
            // Tutup document dan print
            printWindow.document.close();
            printWindow.focus();
            
            // Tunggu sedikit untuk memastikan konten sudah dimuat
            setTimeout(() => {
                printWindow.print();
                printWindow.close();
            }, 250);
        }
    </script>