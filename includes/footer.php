<footer id="kontak" class="bg-navy-900 text-gray-400 border-t border-navy-800 py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm">&copy; <?= date('Y'); ?> <?= htmlspecialchars($data['yayasan']['nama']); ?>. All Rights Reserved.</p>
        <p class="text-xs text-gray-500 mt-2"><?= htmlspecialchars($data['yayasan']['alamat']); ?></p>
    </div>
</footer>
</body>
</html>