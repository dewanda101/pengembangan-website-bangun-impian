-- Database: bangun_impian
-- Created for BangunImpian Laravel Project

-- ===== PORTFOLIOS TABLE =====
CREATE TABLE IF NOT EXISTS portfolios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    image_url VARCHAR(500),
    before_image_url VARCHAR(500),
    after_image_url VARCHAR(500),
    location VARCHAR(255),
    completion_date DATE,
    budget DECIMAL(15, 2),
    duration_months INT,
    status ENUM('planning', 'ongoing', 'completed', 'archived') DEFAULT 'completed',
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===== PROJECTS TABLE =====
CREATE TABLE IF NOT EXISTS projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    type VARCHAR(100) NOT NULL,
    status ENUM('draft', 'published', 'archived') DEFAULT 'published',
    content LONGTEXT,
    featured BOOLEAN DEFAULT FALSE,
    order_priority INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===== SERVICES TABLE =====
CREATE TABLE IF NOT EXISTS services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(100),
    image_url VARCHAR(500),
    features LONGTEXT,
    order_priority INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===== TESTIMONIALS TABLE =====
CREATE TABLE IF NOT EXISTS testimonials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_name VARCHAR(255) NOT NULL,
    client_phone VARCHAR(20),
    client_email VARCHAR(255),
    project_type VARCHAR(100),
    message TEXT NOT NULL,
    rating INT DEFAULT 5,
    image_url VARCHAR(500),
    is_approved BOOLEAN DEFAULT FALSE,
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===== CONTACTS TABLE =====
CREATE TABLE IF NOT EXISTS contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===== USERS TABLE =====
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===== SAMPLE DATA =====

-- Insert Services
INSERT INTO services (name, description, icon, order_priority, is_active) VALUES
('Desain Arsitektur', 'Desain custom sesuai keinginan Anda dengan mempertimbangkan fungsi, estetika, dan efisiensi energi terbaik.', '📐', 1, TRUE),
('Konstruksi', 'Pelaksanaan pembangunan dengan standar kualitas tinggi, material terbaik, dan timeline terjamin.', '🏗️', 2, TRUE),
('Interior Design', 'Desain interior yang nyaman, fungsional, dan mencerminkan kepribadian Anda dengan furniture modern.', '🎨', 3, TRUE),
('Renovasi', 'Layanan renovasi rumah, kantor, dan toko dengan hasil memuaskan dan sesuai dengan budget Anda.', '🔨', 4, TRUE),
('Desain Komersial', 'Desain swalayan, café, dan toko yang menarik untuk meningkatkan daya tarik bisnis Anda.', '🏢', 5, TRUE),
('Proyek Spesial', 'Pembangunan masjid, gedung, dan bangunan khusus dengan detail dan presisi tinggi yang sempurna.', '🕌', 6, TRUE);

-- Insert Sample Portfolios
INSERT INTO portfolios (title, description, category, image_url, location, completion_date, budget, duration_months, status, featured) VALUES
('Rumah Minimalis Modern', 'Desain minimalis dengan sentuhan modern yang elegan dan fungsional untuk keluarga muda.', 'residential', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop', 'Surabaya', '2024-06-15', 500000000, 8, 'completed', TRUE),
('Masjid Megah', 'Arsitektur islami modern yang kokoh dan nyaman untuk jemaah dalam melaksanakan ibadah.', 'religious', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=600&fit=crop', 'Sidoarjo', '2024-09-20', 2000000000, 12, 'completed', TRUE),
('Café Cozy', 'Interior café yang nyaman dan modern dengan konsep minimalis yang sempurna untuk bersantai.', 'commercial', 'https://images.unsplash.com/photo-1554707148-bab9c5263d0d?w=800&h=600&fit=crop', 'Surabaya', '2024-03-10', 300000000, 4, 'completed', TRUE);

-- Insert Sample Testimonials
INSERT INTO testimonials (client_name, client_phone, client_email, project_type, message, rating, is_approved, featured) VALUES
('Budi Santoso', '+6281234567890', 'budi@email.com', 'residential', 'Layanan BangunImpian luar biasa! Rumah impian saya menjadi kenyataan dengan hasil yang melebihi ekspektasi. Terima kasih tim profesional dan berdedikasi!', 5, TRUE, TRUE),
('Siti Nurhaliza', '+6282345678901', 'siti@email.com', 'commercial', 'Café kami selesai tepat waktu dan hasilnya sangat memuaskan. Tim BangunImpian sangat responsif dan detail dalam pekerjaan mereka.', 5, TRUE, TRUE),
('Eko Wibowo', '+6283456789012', 'eko@email.com', 'religious', 'Masjid yang dibangun BangunImpian menjadi landmark di area kami. Kualitas konstruksi sangat baik dan arsitektur yang indah.', 5, TRUE, TRUE);

-- Create Admin User (password: admin123)
INSERT INTO users (name, email, password, role, email_verified_at) VALUES
('Administrator', 'admin@bangunimpian.com', '$2y$12$EixZaYVK1fsbw1ZfbX3OzeIvMYvChLxwXjlhbVeVj5dHxnqVqKfxm', 'admin', NOW());

-- Indexes untuk Performance
CREATE INDEX idx_portfolios_status ON portfolios(status);
CREATE INDEX idx_portfolios_category ON portfolios(category);
CREATE INDEX idx_services_order ON services(order_priority);
CREATE INDEX idx_contacts_status ON contacts(status);
CREATE INDEX idx_testimonials_approved ON testimonials(is_approved);
