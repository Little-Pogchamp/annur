<?php require_once __DIR__ . '/../includes/header.php'; ?>

<!-- Hero Section -->
<section id="beranda" class="relative bg-navy-900 text-white py-20 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block px-3 py-1 bg-gold-500/20 text-gold-500 rounded-full text-xs font-semibold mb-4">PONDOK PESANTREN ANNUR</span>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">Membentuk Generasi Tangguh & Berkarakter</h1>
            <p class="text-gray-300 text-lg mb-8"><?= $data['yayasan']['visi_singkat']; ?></p>
            <a href="#lembaga" class="bg-gold-500 text-navy-900 font-bold px-6 py-3 rounded hover:bg-gold-600 transition inline-block">Lihat Satuan Pendidikan</a>
        </div>
        <div class="bg-navy-800 p-8 rounded-lg border border-gold-500/20 shadow-2xl">
            <h3 class="text-2xl font-bold text-gold-500 mb-4">Visi Utama: <?= $data['yayasan']['visi_utama']; ?></h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                Mengintegrasikan nilai-nilai keagamaan dengan ilmu pengetahuan dan teknologi untuk melahirkan kader muslim yang kreatif, inovatif, dan berdaya saing global.
            </p>
        </div>
    </div>
</section>

<!-- Satuan Pendidikan -->
<section id="lembaga" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-navy-900">Satuan Pendidikan</h2>
            <p class="text-gray-600 mt-2">Lembaga pendidikan di bawah naungan <?= $data['yayasan']['nama']; ?></p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($data['lembaga'] as $sch): ?>
                <div class="bg-white rounded-lg p-8 shadow-md border-t-4 border-gold-500 hover:shadow-xl transition">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-2xl font-bold text-navy-900"><?= $sch['nama']; ?></h3>
                        <span class="bg-emerald-600 text-white text-xs font-bold px-3 py-1 rounded">Akreditasi <?= $sch['akreditasi']; ?></span>
                    </div>
                    <p class="text-gray-600 text-sm mb-6"><?= $sch['deskripsi']; ?></p>
                    <div class="pt-4 border-t border-gray-200 text-xs text-gray-500 space-y-1">
                        <p><strong>Kepala Sekolah:</strong> <?= $sch['kepala_sekolah']; ?></p>
                        <?php if (isset($sch['berdiri'])): ?>
                            <p><strong>Tahun Berdiri:</strong> <?= $sch['berdiri']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Structure Pengurus -->
<section id="pengurus" class="py-20 bg-navy-900 text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-white">Struktur Pengurus Yayasan</h2>
            <p class="text-gold-500 mt-2">Kepemimpinan Yayasan Ponpes Annur</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div class="bg-navy-800 p-6 rounded-lg border border-gold-500/20">
                <i class="fas fa-user-tie text-3xl text-gold-500 mb-3"></i>
                <h4 class="text-lg font-bold"><?= $data['pengurus']['ketua']; ?></h4>
                <p class="text-xs text-gray-400">Ketua Yayasan</p>
            </div>
            <div class="bg-navy-800 p-6 rounded-lg border border-gold-500/20">
                <i class="fas fa-user-pen text-3xl text-gold-500 mb-3"></i>
                <h4 class="text-lg font-bold"><?= $data['pengurus']['sekretaris']; ?></h4>
                <p class="text-xs text-gray-400">Sekretaris</p>
            </div>
            <div class="bg-navy-800 p-6 rounded-lg border border-gold-500/20">
                <i class="fas fa-wallet text-3xl text-gold-500 mb-3"></i>
                <h4 class="text-lg font-bold"><?= $data['pengurus']['bendahara']; ?></h4>
                <p class="text-xs text-gray-400">Bendahara</p>
            </div>
        </div>
    </div>
</section>

<!-- Galeri Foto (Google Drive Integration) -->
<section id="galeri" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-navy-900">Galeri Kegiatan</h2>
            <p class="text-gray-600 mt-2">Dokumentasi foto terkini dari Google Drive</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($data['galeri'] as $g): ?>
                <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200 shadow hover:shadow-lg transition">
                    <img src="<?= $g['foto']; ?>" alt="<?= $g['judul']; ?>" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/600x400?text=Foto+Google+Drive'">
                    <div class="p-4">
                        <span class="inline-block px-2 py-1 bg-gold-500/10 text-gold-600 text-xs font-semibold rounded mb-2"><?= $g['kategori']; ?></span>
                        <h4 class="font-bold text-navy-900"><?= $g['judul']; ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>