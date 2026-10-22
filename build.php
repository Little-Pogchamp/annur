<?php
echo "=== Memulai Build PHP SSG untuk Vercel ===\n";

$data = require __DIR__ . '/config/data.php';

$distDir = __DIR__ . '/dist';
if (!file_exists($distDir)) {
    mkdir($distDir, 0777, true);
}

ob_start();
require __DIR__ . '/templates/layout.php';
$htmlOutput = ob_get_clean();

file_put_contents($distDir . '/index.html', $htmlOutput);

echo "BERHASIL: File 'dist/index.html' telah dibuat!\n";