<?php
require_once '../config.php';
checkAdmin(); // Memastikan pengguna adalah Admin

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul    = trim($_POST['judul']);
    $ringkasan = trim($_POST['ringkasan']);
    $konten   = trim($_POST['konten']);
    $kategori = $_POST['kategori'];
    $slug     = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Upload Gambar
    $gambar_name = 'default.jpg';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar_name = time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/' . $gambar_name);
    }

    $stmt = $conn->prepare("INSERT INTO berita (judul, slug, ringkasan, konten, gambar, kategori, penulis_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $penulis_id = $_SESSION['user']['id'];
    $stmt->bind_param("ssssssi", $judul, $slug, $ringkasan, $konten, $gambar_name, $kategori, $penulis_id);

    if ($stmt->execute()) {
        $success = "Berita berhasil diterbitkan!";
    } else {
        $error = "Gagal menerbitkan berita: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Post Berita Baru - Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#062356] text-white min-h-screen p-6">
        <h1 class="text-xl font-bold mb-8">Admin An-Nur</h1>
        <nav class="space-y-3">
            <a href="tambah-berita.php" class="block bg-blue-800 p-2.5 rounded font-medium">Post Berita</a>
            <a href="../index.php" class="block hover:bg-blue-900 p-2.5 rounded">Lihat Website</a>
            <a href="../logout.php" class="block hover:bg-red-700 p-2.5 rounded text-red-300 mt-10">Logout</a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Berita Baru</h2>

            <?php if($success): ?>
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6"><?= $success ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="space-y-5">
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="judul" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full border rounded-lg p-2.5 outline-none">
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Pengumuman">Pengumuman</option>
                            <option value="Prestasi">Prestasi</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Gambar Header</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-1.5 outline-none">
                    </div>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Ringkasan Singkat</label>
                    <textarea name="ringkasan" rows="2" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Isi Berita Lengkap</label>
                    <textarea name="konten" rows="8" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                </div>
                <button type="submit" class="bg-[#EAB308] text-[#062356] font-bold px-6 py-3 rounded-lg hover:bg-yellow-400 transition">Terbitkan Berita</button>
            </form>
        </div>
    </main>
</body>
</html>