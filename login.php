<?php
require_once 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'nama' => $user['nama_lengkap'],
                'role' => $user['role']
            ];
            header("Location: admin/tambah-berita.php");
            exit;
        }
    }
    $error = "Username atau password salah!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Yayasan An-Nur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-[#062356] text-center mb-6">Login Panel Admin</h2>
        <?php if($error): ?>
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Username</label>
                <input type="text" name="username" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" name="password" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-[#062356] text-white py-2.5 rounded-lg font-semibold hover:bg-blue-900 transition">Masuk</button>
        </form>
    </div>
</body>
</html>