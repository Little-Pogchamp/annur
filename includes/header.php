<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['yayasan']['nama']); ?> - Portal Resmi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: { 900: '#0a1c38', 800: '#11284b', 700: '#1a3866' },
                        gold: { 500: '#e09d00', 600: '#c78b00' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

<div class="bg-navy-900 text-gray-300 text-xs py-2 border-b border-navy-800">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <div><i class="fas fa-map-marker-alt text-gold-500 mr-2"></i><?= $data['yayasan']['alamat']; ?></div>
        <div><i class="fas fa-calendar-alt text-gold-500 mr-2"></i>Berdiri Sejak: <?= $data['yayasan']['berdiri']; ?></div>
    </div>
</div>

<nav class="bg-navy-900 text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-20">
        <a href="#" class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gold-500 rounded-full flex items-center justify-center font-bold text-navy-900 text-xl">A</div>
            <div>
                <span class="block font-bold text-lg tracking-wide uppercase"><?= $data['yayasan']['nama']; ?></span>
                <span class="block text-xs text-gold-500 tracking-wider"><?= $data['yayasan']['pesantren']; ?></span>
            </div>
        </a>
        <div class="hidden md:flex space-x-8 text-sm font-semibold">
            <a href="#beranda" class="hover:text-gold-500 transition">Beranda</a>
            <a href="#lembaga" class="hover:text-gold-500 transition">Satuan Pendidikan</a>
            <a href="#pengurus" class="hover:text-gold-500 transition">Pengurus</a>
            <a href="#galeri" class="hover:text-gold-500 transition">Galeri Foto</a>
            <a href="#kontak" class="hover:text-gold-500 transition">Kontak</a>
        </div>
    </div>
</nav>