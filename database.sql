CREATE DATABASE IF NOT EXISTS db_yayasan_annur;
USE db_yayasan_annur;

-- Tabel Users untuk Login & Role Management
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Berita
CREATE TABLE IF NOT EXISTS berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    ringkasan TEXT NOT NULL,
    konten LONGTEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT 'default.jpg',
    kategori VARCHAR(50) DEFAULT 'Umum',
    penulis_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (penulis_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Akun Default Admin (Password: admin123)
INSERT INTO users (username, password, nama_lengkap, role) VALUES 
('admin', '$2y$10$4pC3LqjLpL.g3V/E7W9M3u5mJqF.eD8cQ21V19/62pY0R4dJ5iH1S', 'Administrator Yayasan', 'admin');