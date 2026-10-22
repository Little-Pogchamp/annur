<?php
require_once 'config.php';

// Ambil 3 berita terbaru dari database
$query_berita = "SELECT b.*, u.nama_lengkap FROM berita b LEFT JOIN users u ON b.penulis_id = u.id ORDER BY b.created_at DESC LIMIT 3";
$result_berita = $conn->query($query_berita);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan An-Nur Dukuhdalem | Pondok Pesantren Annur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-50 text-gray-800">

    <!-- Header Navigation -->
    <header class="bg-[#062356] text-white sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center font-bold text-[#062356]">AN</div>
                <span class="font-bold text-lg tracking-wide uppercase">Yayasan An-Nur Dukuhdalem</span>
            </div>
            <nav class="hidden md:flex space-x-8 font-medium">
                <a href="#beranda" class="hover:text-yellow-400 transition">Beranda</a>
                <a href="#tentang" class="hover:text-yellow-400 transition">Tentang Kami</a>
                <a href="#pendidikan" class="hover:text-yellow-400 transition">Satuan Pendidikan</a>
                <a href="#berita" class="hover:text-yellow-400 transition">Berita</a>
                <a href="#kontak" class="hover:text-yellow-400 transition">Kontak</a>
            </nav>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                <a href="admin/tambah-berita.php" class="bg-yellow-500 text-[#062356] px-4 py-2 rounded-md font-bold text-sm">Dashboard Admin</a>
            <?php else: ?>
                <a href="login.php" class="text-sm border border-white/30 px-3 py-1.5 rounded hover:bg-white/10">Login Admin</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="bg-[#062356] text-white py-20 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">AN-NUR YANG TANGGUH DAN BERINTEGRITAS</h1>
                <p class="text-gray-300 text-lg mb-8">Mempersiapkan generasi muda yang tangguh dan siap menghadapi masa depan melalui pendidikan berkualitas yang berlandaskan nilai-nilai keagamaan.</p>
                <a href="#tentang" class="inline-block bg-[#EAB308] text-[#062356] font-bold px-6 py-3 rounded-md hover:bg-yellow-400 transition">Informasi Lebih Tentang Kami</a>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=800&q=80" alt="Pesantren Annur" class="w-full h-80 object-cover">
            </div>
        </div>
        
        <!-- Poin Keunggulan Badge -->
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-4 mt-16 pt-8 border-t border-white/10 text-sm">
            <div class="flex items-center space-x-3"><i class="fas fa-shield-alt text-yellow-400 text-xl"></i><span>Solid, Berkualitas & Profesional</span></div>
            <div class="flex items-center space-x-3"><i class="fas fa-[#EAB308] fa-th-large text-yellow-400 text-xl"></i><span>Mandiri Menuju Harapan Baru</span></div>
            <div class="flex items-center space-x-3"><i class="fas fa-hands-helping text-yellow-400 text-xl"></i><span>Komitmen Kemajuan Bangsa</span></div>
            <div class="flex items-center space-x-3"><i class="fas fa-graduation-cap text-yellow-400 text-xl"></i><span>Berorientasi Pendidikan Global</span></div>
        </div>
    </section>

    <!-- Satuan Pendidikan -->
    <section id="pendidikan" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-[#062356] mb-12">Satuan Pendidikan</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card Ponpes -->
                <div class="bg-slate-50 border rounded-xl p-6 text-center shadow-sm hover:shadow-md transition">
                    <div class="w-16 h-16 bg-[#062356] text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold"><i class="fas fa-mosque"></i></div>
                    <h3 class="font-bold text-xl text-[#062356] mb-2">Pondok Pesantren Annur</h3>
                    <p class="text-gray-600 text-sm">Didirikan pada 31 Agustus 2002 oleh Drs. KH Yoyon Sufyan di Desa Dukuhdalem, Ciawigebang, Kuningan.</p>
                </div>
                <!-- Card SMP IT -->
                <div class="bg-slate-50 border rounded-xl p-6 text-center shadow-sm hover:shadow-md transition">
                    <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold"><i class="fas fa-[#EAB308] fa-school"></i></div>
                    <h3 class="font-bold text-xl text-[#062356] mb-2">SMP IT Annur</h3>
                    <p class="text-gray-600 text-sm mb-2">Kepala Sekolah: Teti Suhesti, S.Pd</p>
                    <span class="inline-block bg-green-100 text-green-800 font-semibold px-3 py-1 text-xs rounded-full">Terakreditasi B</span>
                </div>
                <!-- Card SMA IT -->
                <div class="bg-slate-50 border rounded-xl p-6 text-center shadow-sm hover:shadow-md transition">
                    <div class="w-16 h-16 bg-red-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold"><i class="fas fa-university"></i></div>
                    <h3 class="font-bold text-xl text-[#062356] mb-2">SMA IT Annur</h3>
                    <p class="text-gray-600 text-sm mb-2">Kepala Sekolah: Jajang Husni Mubarok, S.H., M.Pd.</p>
                    <span class="inline-block bg-green-100 text-green-800 font-semibold px-3 py-1 text-xs rounded-full">Terakreditasi A (Estd. 2016)</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Ucapan -->
    <section class="bg-[#062356] text-white py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <span class="text-yellow-400 font-medium">Salam Sejahtera,</span>
                <h3 class="text-2xl font-bold">Selamat datang di website resmi Yayasan An-Nur Dukuhdalem</h3>
            </div>
            <a href="#tentang" class="bg-yellow-500 text-[#062356] font-bold px-5 py-2.5 rounded hover:bg-yellow-400">Selengkapnya</a>
        </div>
    </section>

    <!-- Grid Visi Misi -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">
            <div class="bg-yellow-500 text-[#062356] p-8 rounded-xl">
                <span class="text-5xl font-extrabold opacity-30 block mb-2">01</span>
                <h3 class="text-2xl font-bold mb-3">Visi "BANGKIT"</h3>
                <p class="font-medium">Mencetak kader muslim berkarakter agamis, kreatif, inovatif, global, dan terdepan.</p>
            </div>
            <div class="bg-[#062356] text-white p-8 rounded-xl">
                <span class="text-5xl font-extrabold opacity-30 block mb-2">02</span>
                <h3 class="text-2xl font-bold mb-3">Misi Integration</h3>
                <p class="text-gray-300">Mengintegrasikan nilai-nilai keagamaan Islam dengan perkembangan ilmu pengetahuan dan teknologi.</p>
            </div>
            <div class="bg-red-600 text-white p-8 rounded-xl">
                <span class="text-5xl font-extrabold opacity-30 block mb-2">03</span>
                <h3 class="text-2xl font-bold mb-3">Nilai-Nilai</h3>
                <p class="text-gray-100">Pembentukan karakter islami, kedisiplinan, integritas, serta penguasaan teknologi terdepan.</p>
            </div>
        </div>
    </section>

    <!-- Berita Terkini (Dinamis dari Database PHP) -->
    <section id="berita" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold text-[#062356]">Berita Terkini</h2>
                <a href="#" class="bg-yellow-500 text-[#062356] font-bold px-4 py-2 rounded text-sm hover:bg-yellow-400">Lihat Selengkapnya</a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <?php if ($result_berita && $result_berita->num_rows > 0): ?>
                    <?php while($row = $result_berita->fetch_assoc()): ?>
                        <article class="bg-white border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                            <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="Header Berita" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider"><?= htmlspecialchars($row['kategori']) ?></span>
                                <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug"><?= htmlspecialchars($row['judul']) ?></h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3"><?= htmlspecialchars($row['ringkasan']) ?></p>
                                <span class="text-xs text-gray-400 block mb-4"><?= date('d M Y', strtotime($row['created_at'])) ?></span>
                                <a href="detail.php?id=<?= $row['id'] ?>" class="inline-block bg-yellow-500 text-[#062356] font-bold px-4 py-2 rounded text-xs hover:bg-yellow-400">Selengkapnya</a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-gray-500 col-span-3 text-center py-8">Belum ada berita yang diterbitkan.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-[#062356] text-white pt-16 pb-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12 mb-12">
            <div>
                <h4 class="font-bold text-lg mb-4">Yayasan An-Nur Dukuhdalem</h4>
                <p class="text-gray-300 text-sm leading-relaxed mb-4">Membentuk generasi penerus berakhlak mulia, berilmu, dan siap memberikan kontribusi terbaik bagi masyarakat.</p>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Struktur Pengurus</h4>
                <ul class="text-sm text-gray-300 space-y-2">
                    <li><strong class="text-white">Ketua Yayasan:</strong> Drs. KH Yoyon Sufyan</li>
                    <li><strong class="text-white">Sekretaris:</strong> Muhammad Agil Munawar</li>
                    <li><strong class="text-white">Bendahara:</strong> N. Sumiati, S.Ag</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Informasi Kontak</h4>
                <p class="text-sm text-gray-300 mb-2"><i class="fas fa-map-marker-alt mr-2 text-yellow-400"></i> Desa Dukuhdalem, Kec. Ciawigebang, Kab. Kuningan</p>
                <p class="text-sm text-gray-300"><i class="fas fa-envelope mr-2 text-yellow-400"></i> info@yayasanannur.sch.id</p>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 border-t border-white/10 pt-6">
            &copy; <?= date('Y') ?> Yayasan An-Nur Dukuhdalem. All rights reserved.
        </div>
    </footer>

</body>
</html>