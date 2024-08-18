<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Genstore";

// Créer la connexion
$conn = new mysqli($servername, $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Créer la base de données si elle n'existe pas
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Se connecter à la base de données
$conn->select_db($dbname);

// Créer la table category
$sql = "
    CREATE TABLE IF NOT EXISTS category (
    id_c INT AUTO_INCREMENT PRIMARY KEY,
    image TEXT default 'assets/img/categorie/cat-2.jpg',
    description Text default 'Lorem ipsum dolor sit amet consectetur adipisicing elit. more info (blog).'
    name TEXT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table category created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Créer la table seller (vendeur)
$sql = "
    CREATE TABLE IF NOT EXISTS seller (
    id_s INT AUTO_INCREMENT PRIMARY KEY,
    profile_pic VARCHAR(255) DEFAULT 'assets/img/author/default.png',
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    h_password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) DEFAULT NULL,
    address TEXT DEFAULT NULL,
    bio TEXT,
    cni VARCHAR(10)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table seller created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Créer la table users
$sql = "
    CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    h_password VARCHAR(255) NOT NULL,
    address TEXT DEFAULT NULL,
    profile_pic VARCHAR(255) DEFAULT 'assets/img/author/default.png',
    phone VARCHAR(20) DEFAULT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Créer la table products
$sql = "
    CREATE TABLE IF NOT EXISTS products (
    id_p INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_url1 VARCHAR(255) DEFAULT 'assets/img/product/default.png',
    image_url2 VARCHAR(255) DEFAULT 'assets/img/product/default.png',
    image_url3 VARCHAR(255) DEFAULT 'assets/img/product/default.png',
    stock INT DEFAULT 0,
    sells INT DEFAULT 0,
    rate DECIMAL(2, 1) DEFAULT 0 CHECK (rate >= 0 AND rate <= 5),
    id_c INT,
    id_s INT,
    discount INT DEFAULT 0,
    FOREIGN KEY (id_c) REFERENCES category(id_c),
    FOREIGN KEY (id_s) REFERENCES seller(id_s)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Créer la table wishlist
$sql = "
    CREATE TABLE IF NOT EXISTS wishlist (
    id_p INT,
    id_user INT,
    PRIMARY KEY(id_p, id_user),
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_p) REFERENCES products(id_p)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table wishlist created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Insérer des catégories
$sql = "
    INSERT IGNORE INTO category (name ,image) VALUES
    ('Computers' , 'assets/img/categorie/cat-1.jpg'),
    ('Phones & Tablets' , 'assets/img/categorie/cat-2.jpg'),
    ('Electronics & Digital' , 'assets/img/categorie/cat-3.jpg'),
    ('Fashion & Clothings' , 'assets/img/categorie/cat-4.jpg'),
    ('Jewelry & Watches' , 'assets/img/categorie/cat-5.jpg'),
    ('Health & Beauty' , 'assets/img/categorie/cat-6.jpg'),
    ('Sports & Outdoors' , 'assets/img/categorie/cat-3.jpg')
";
if ($conn->query($sql) === TRUE) {
    echo "Categories inserted successfully<br>";
} else {
    die("Error inserting categories: " . $conn->error);
}

// Insérer des catégories
$sql = "
        -- Phones & Tablets
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('InfinityPhone X1', 'Latest smartphone with cutting-edge technology.', 799.99, 'assets/img/product/phones/phone1.png', 'assets/img/product/phones/phone2.png', 'assets/img/product/phones/phone3.png', 20, 2, 1),
('ZenithTab Pro 11', 'High-resolution tablet with powerful performance.', 499.99, 'assets/img/product/phones/tablet1.png', 'assets/img/product/phones/tablet2.png', 'assets/img/product/phones/tablet3.png', 15, 2, 1),
('EchoPhone Z8', 'Affordable smartphone with great features and long battery life.', 349.99, 'assets/img/product/phones/phone4.png', 'assets/img/product/phones/phone5.png', 'assets/img/product/phones/phone6.png', 25, 2, 1),
('FusionTab Mini 8', 'Compact tablet perfect for reading and browsing.', 299.99, 'assets/img/product/phones/tablet4.png', 'assets/img/product/phones/tablet5.png', 'assets/img/product/phones/tablet6.png', 10, 2, 1),
('UltraPhone S20', 'Smartphone with excellent camera quality and fast performance.', 899.99, 'assets/img/product/phones/phone7.png', 'assets/img/product/phones/phone8.png', 'assets/img/product/phones/phone9.png', 18, 2, 1);

-- Electronics & Digital
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('HyperVision 4K TV', 'Ultra-high-definition 4K television.', 649.99, 'assets/img/product/electronics/tv1.png', 'assets/img/product/electronics/tv2.png', 'assets/img/product/electronics/tv3.png', 12, 3, 2),
('ZenithSmart Home Hub', 'Smart home hub for seamless integration.', 299.99, 'assets/img/product/electronics/hub1.png', 'assets/img/product/electronics/hub2.png', 'assets/img/product/electronics/hub3.png', 25, 3, 2),
('UltraSound Bluetooth Speaker', 'Portable Bluetooth speaker with high-quality sound.', 89.99, 'assets/img/product/electronics/speaker1.png', 'assets/img/product/electronics/speaker2.png', 'assets/img/product/electronics/speaker3.png', 40, 3, 2),
('SmartWatch Pro 5', 'Feature-rich smartwatch with fitness tracking capabilities.', 199.99, 'assets/img/product/electronics/smartwatch1.png', 'assets/img/product/electronics/smartwatch2.png', 'assets/img/product/electronics/smartwatch3.png', 18, 3, 2);

-- Fashion & Clothings
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('UrbanTrend Denim Jacket', 'Stylish denim jacket for casual wear.', 89.99, 'assets/img/product/fashion/jacket1.png', 'assets/img/product/fashion/jacket2.png', 'assets/img/product/fashion/jacket3.png', 30, 4, 3),
('ClassicElegance Silk Dress', 'Elegant silk dress for special occasions.', 149.99, 'assets/img/product/fashion/dress1.png', 'assets/img/product/fashion/dress2.png', 'assets/img/product/fashion/dress3.png', 20, 4, 3),
('TrendySport Hoodie', 'Comfortable hoodie for a casual look.', 69.99, 'assets/img/product/fashion/hoodie1.png', 'assets/img/product/fashion/hoodie2.png', 'assets/img/product/fashion/hoodie3.png', 25, 4, 3),
('ChicLeather Handbag', 'Stylish leather handbag with ample space.', 129.99, 'assets/img/product/fashion/handbag1.png', 'assets/img/product/fashion/handbag2.png', 'assets/img/product/fashion/handbag3.png', 15, 4, 3);

-- Jewelry & Watches
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('RadiantGold Necklace', 'Beautiful gold necklace with intricate design.', 399.99, 'assets/img/product/jewelry/necklace1.png', 'assets/img/product/jewelry/necklace2.png', 'assets/img/product/jewelry/necklace3.png', 15, 5, 4),
('LuxeDiamond Earrings', 'Elegant diamond earrings with high brilliance.', 799.99, 'assets/img/product/jewelry/earrings1.png', 'assets/img/product/jewelry/earrings2.png', 'assets/img/product/jewelry/earrings3.png', 10, 5, 4),
('PlatinumElite Watch', 'Luxury watch with platinum finish and precision timekeeping.', 1299.99, 'assets/img/product/jewelry/watch1.png', 'assets/img/product/jewelry/watch2.png', 'assets/img/product/jewelry/watch3.png', 8, 5, 4),
('EmeraldBracelet', 'Stunning bracelet with emerald gemstones.', 499.99, 'assets/img/product/jewelry/bracelet1.png', 'assets/img/product/jewelry/bracelet2.png', 'assets/img/product/jewelry/bracelet3.png', 12, 5, 4);

-- Health & Beauty
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('RadiantGlow Serum', 'Serum for glowing and youthful skin.', 45.99, 'assets/img/product/beauty/serum1.png', 'assets/img/product/beauty/serum2.png', 'assets/img/product/beauty/serum3.png', 50, 6, 5),
('ZenSkin Moisturizer', 'Moisturizer for smooth and hydrated skin.', 29.99, 'assets/img/product/beauty/moisturizer1.png', 'assets/img/product/beauty/moisturizer2.png', 'assets/img/product/beauty/moisturizer3.png', 60, 6, 5),
('NourishHair Shampoo', 'Shampoo for healthy and shiny hair.', 19.99, 'assets/img/product/beauty/shampoo1.png', 'assets/img/product/beauty/shampoo2.png', 'assets/img/product/beauty/shampoo3.png', 40, 6, 5),
('ReviveSkin Facial Mask', 'Facial mask for rejuvenating and refreshing your skin.', 24.99, 'assets/img/product/beauty/facialmask1.png', 'assets/img/product/beauty/facialmask2.png', 'assets/img/product/beauty/facialmask3.png', 35, 6, 5);

-- Sports & Outdoors
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('ApexTrail Hiking Boots', 'Durable hiking boots for all terrains.', 129.99, 'assets/img/product/sports/boots1.png', 'assets/img/product/sports/boots2.png', 'assets/img/product/sports/boots3.png', 25, 7, 6),
('TitanSport Running Shoes', 'Comfortable running shoes for athletic performance.', 99.99, 'assets/img/product/sports/shoes1.png', 'assets/img/product/sports/shoes2.png', 'assets/img/product/sports/shoes3.png', 30, 7, 6),
('PowerFit Yoga Mat', 'High-quality yoga mat with extra cushioning.', 39.99, 'assets/img/product/sports/yogamat1.png', 'assets/img/product/sports/yogamat2.png', 'assets/img/product/sports/yogamat3.png', 50, 7, 6),
('EnduranceCycle Helmet', 'Safety helmet for cycling with adjustable fit.', 59.99, 'assets/img/product/sports/helmet1.png', 'assets/img/product/sports/helmet2.png', 'assets/img/product/sports/helmet3.png', 22, 7, 6);

-- Computers
INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s) VALUES
('UltraPro Gaming Laptop', 'High-performance gaming laptop with advanced graphics.', 1200.00, 'assets/img/product/computers/laptop1.png', 'assets/img/product/computers/laptop2.png', 'assets/img/product/computers/laptop3.png', 10, 1, 1),
('Zenith Desktop PC', 'Powerful desktop PC for professional use.', 950.00, 'assets/img/product/computers/desktop1.png', 'assets/img/product/computers/desktop2.png', 'assets/img/product/computers/desktop3.png', 8, 1, 1),
('NanoBook Ultra Slim', 'Compact and lightweight ultrabook for on-the-go productivity.', 800.00, 'assets/img/product/computers/ultrabook1.png', 'assets/img/product/computers/ultrabook2.png', 'assets/img/product/computers/ultrabook3.png', 15, 1, 1),
('Xtreme Gaming Monitor', '27-inch monitor with 144Hz refresh rate and 1ms response time.', 350.00, 'assets/img/product/computers/monitor1.png', 'assets/img/product/computers/monitor2.png', 'assets/img/product/computers/monitor3.png', 20, 1, 1),
('Elite Wireless Mouse', 'Ergonomic wireless mouse with customizable buttons.', 50.00, 'assets/img/product/computers/mouse1.png', 'assets/img/product/computers/mouse2.png', 'assets/img/product/computers/mouse3.png', 30, 1, 1);

";
if ($conn->query($sql) === TRUE) {
    echo "Products inserted successfully<br>";
} else {
    die("Error inserting products: " . $conn->error);
}

// Créer la table basket
$sql = "
    CREATE TABLE IF NOT EXISTS basket (
    id_p INT,
    id_user INT,
    Quantity INT,
    PRIMARY KEY(id_p, id_user),
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_p) REFERENCES products(id_p)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table basket created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

$sql = "
    CREATE or replace TABLE orders (
    id_o INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    shipping_cost DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);
";
if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

$sql = "

    CREATE or replace TABLE order_items (
    id_oi INT AUTO_INCREMENT PRIMARY KEY,
    id_o INT NOT NULL,
    id_p INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_o) REFERENCES orders(id_o) ON DELETE CASCADE,
    FOREIGN KEY (id_p) REFERENCES products(id_p) ON DELETE CASCADE

)";
if ($conn->query($sql) === TRUE) {
    echo "Table order_items created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

$sql = '
    CREATE or replace TABLE tracking_user_cat (
    id_f INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT ,
    id_cat1 INT ,
    id_cat2 INT ,
    id_cat3 INT ,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_cat1) REFERENCES categories(id_cat),
    FOREIGN KEY (id_cat2) REFERENCES categories(id_cat),
    FOREIGN KEY (id_cat3) REFERENCES categories(id_cat)
    );
';
$conn->close();
?>
