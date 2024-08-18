<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Genstore";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hashing passwords
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// // Inserting sellers
// $sellers = [
//     ['profile_pic' => 'https://via.placeholder.com/150?text=Seller1', 'username' => 'seller1', 'email' => 'seller1@example.com', 'password' => 'password123', 'h_password' => hashPassword('password123'), 'phone' => '1234567890', 'address' => '123 Seller St', 'bio' => 'Top seller', 'cni' => 'CNI123456'],
//     ['profile_pic' => 'https://via.placeholder.com/150?text=Seller2', 'username' => 'seller2', 'email' => 'seller2@example.com', 'password' => 'password456', 'h_password' => hashPassword('password456'), 'phone' => '0987654321', 'address' => '456 Seller Ave', 'bio' => 'Best seller', 'cni' => 'CNI654321'],
//     ['profile_pic' => 'https://via.placeholder.com/150?text=Seller3', 'username' => 'seller3', 'email' => 'seller3@example.com', 'password' => 'password789', 'h_password' => hashPassword('password789'), 'phone' => '0387654321', 'address' => '789 Seller Blvd', 'bio' => 'Top seller', 'cni' => 'CNI754321'],
//     ['profile_pic' => 'https://via.placeholder.com/150?text=Seller4', 'username' => 'seller4', 'email' => 'seller4@example.com', 'password' => 'password012', 'h_password' => hashPassword('password012'), 'phone' => '0487654321', 'address' => '101 Seller Rd', 'bio' => 'Best seller', 'cni' => 'CNI854321'],
//     ['profile_pic' => 'https://via.placeholder.com/150?text=Seller5', 'username' => 'seller5', 'email' => 'seller5@example.com', 'password' => 'password345', 'h_password' => hashPassword('password345'), 'phone' => '5556667777', 'address' => '202 Seller Ln', 'bio' => 'Top-rated seller', 'cni' => 'CNI954321'],
//     // Add more sellers as needed
// ];

// foreach ($sellers as $seller) {
//     $stmt = $conn->prepare("INSERT INTO seller (profile_pic, username, email, password, h_password, phone, address, bio, cni) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssssssss", $seller['profile_pic'], $seller['username'], $seller['email'], $seller['password'], $seller['h_password'], $seller['phone'], $seller['address'], $seller['bio'], $seller['cni']);
//     $stmt->execute();
// }

// echo "Sellers inserted successfully<br>";

// // Inserting users
// $users = [
//     ['username' => 'user1', 'email' => 'user1@example.com', 'password' => 'password123', 'h_password' => hashPassword('password123'), 'address' => '789 User Rd', 'profile_pic' => 'https://via.placeholder.com/150?text=User1', 'phone' => '1112223333'],
//     ['username' => 'user2', 'email' => 'user2@example.com', 'password' => 'password456', 'h_password' => hashPassword('password456'), 'address' => '101 User Blvd', 'profile_pic' => 'https://via.placeholder.com/150?text=User2', 'phone' => '4445556666'],
//     ['username' => 'user3', 'email' => 'user3@example.com', 'password' => 'password789', 'h_password' => hashPassword('password789'), 'address' => '202 User Ln', 'profile_pic' => 'https://via.placeholder.com/150?text=User3', 'phone' => '7778889999'],
//     // Add more users as needed
// ];

// foreach ($users as $user) {
//     $stmt = $conn->prepare("INSERT INTO users (username, email, password, h_password, address, profile_pic, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssssss", $user['username'], $user['email'], $user['password'], $user['h_password'], $user['address'], $user['profile_pic'], $user['phone']);
//     $stmt->execute();
// }

// echo "Users inserted successfully<br>";

// // Inserting products
// $products = [
//     ['name' => 'Laptop', 'description' => 'High performance laptop', 'price' => 999.99, 'image_url1' => 'https://example.com/images/laptop1.jpg', 'stock' => 10, 'sells' => 5, 'id_c' => 1, 'id_s' => 1, 'discount' => 10],
//     ['name' => 'Smartphone', 'description' => 'Latest model smartphone', 'price' => 499.99, 'image_url1' => 'https://example.com/images/smartphone1.jpg', 'stock' => 20, 'sells' => 15, 'id_c' => 2, 'id_s' => 2, 'discount' => 5],
//     ['name' => 'Apple 6s', 'description' => 'High quality smartphone', 'price' => 1499.99, 'image_url1' => 'https://example.com/images/apple6s.jpg', 'stock' => 5, 'sells' => 0, 'id_c' => 2, 'id_s' => 3, 'discount' => 5],
//     ['name' => 'Apple 6s Pro Max', 'description' => 'High quality smartphone with maximum features', 'price' => 2499.99, 'image_url1' => 'https://example.com/images/apple6spro.jpg', 'stock' => 5, 'sells' => 2, 'id_c' => 2, 'id_s' => 4, 'discount' => 15],
//     ['name' => 'Wireless Earbuds', 'description' => 'High quality wireless earbuds with noise cancellation', 'price' => 199.99, 'image_url1' => 'https://example.com/images/earbuds.jpg', 'stock' => 30, 'sells' => 25, 'id_c' => 3, 'id_s' => 5, 'discount' => 10],
//     ['name' => 'Smartwatch', 'description' => 'Smartwatch with health tracking features', 'price' => 299.99, 'image_url1' => 'https://example.com/images/smartwatch.jpg', 'stock' => 15, 'sells' => 10, 'id_c' => 3, 'id_s' => 6, 'discount' => 12],
//     ['name' => '4K Television', 'description' => 'Ultra HD 4K television with smart features', 'price' => 799.99, 'image_url1' => 'https://example.com/images/tv4k.jpg', 'stock' => 8, 'sells' => 3, 'id_c' => 4, 'id_s' => 7, 'discount' => 20],
//     // Add more products as needed
// ];

// foreach ($products as $product) {
//     $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url1, stock, sells, id_c, id_s, discount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssdsdiiii", $product['name'], $product['description'], $product['price'], $product['image_url1'], $product['stock'], $product['sells'], $product['id_c'], $product['id_s'], $product['discount']);
//     $stmt->execute();
// }

// echo "Products inserted successfully<br>";

// // Inserting wishlist items
// $wishlists = [
//     ['id_p' => 1, 'id_user' => 1],
//     ['id_p' => 2, 'id_user' => 2],
//     ['id_p' => 3, 'id_user' => 3],
//     // Add more wishlist items as needed
// ];

// foreach ($wishlists as $wishlist) {
//     $stmt = $conn->prepare("INSERT INTO wishlist (id_p, id_user) VALUES (?, ?)");
//     $stmt->bind_param("ii", $wishlist['id_p'], $wishlist['id_user']);
//     $stmt->execute();
// }

// echo "Wishlist items inserted successfully<br>";

// // Inserting basket items
// $baskets = [
//     ['id_p' => 1, 'id_user' => 1, 'Quantity' => 2],
//     ['id_p' => 2, 'id_user' => 2, 'Quantity' => 1],
//     ['id_p' => 3, 'id_user' => 3, 'Quantity' => 3],
//     // Add more basket items as needed
// ];

// foreach ($baskets as $basket) {
//     $stmt = $conn->prepare("INSERT INTO basket (id_p, id_user, Quantity) VALUES (?, ?, ?)");
//     $stmt->bind_param("iii", $basket['id_p'], $basket['id_user'], $basket['Quantity']);
//     $stmt->execute();
// }

// echo "Basket items inserted successfully<br>";





// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Create table categories
// $sql = "INSERT INTO category (name) VALUES
// ('Computers'),
// ('Phones & Tablets'),
// ('Electronics & Digital'),
// ('Fashion & Clothings'),
// ('Jewelry & Watches'),
// ('Health & Beauty'),
// ('Sports & Outdoors'),
// ('Home & Kitchen'),
// ('Gadgets'),
// ('Baby & Kids'),
// ('Pet Supplies')";
// if ($conn->query($sql) === TRUE) {
//     echo "Categories inserted successfully<br>";
// } else {
//     die("Error inserting categories: " . $conn->error);
// }

// // Create table seller
// $sql = "INSERT INTO seller (username, email, password, h_password, phone, address, bio, cni) VALUES
// ('johnDoe', 'john.doe@example.com', 'password123', 'hashed_password', '1234567890', '123 Main St', 'Software Engineer', 'I love coding!'),
// ('janeDoe22', 'jane.doe@example.com', 'password123', 'hashed_password', '9876543210', '456 Elm St', 'Marketing Manager', 'I love marketing!'),
// ('adminUser', 'admin@example.com', 'password123', 'hashed_password', '5555555555', '789 Oak St', 'Administrator', 'System administrator')";
// if ($conn->query($sql) === TRUE) {
//     echo "Seller inserted successfully<br>";
// } else {
//     die("Error inserting seller: " . $conn->error);
// }

// // Create table users
// $sql = "INSERT INTO seller (profile_pic, username, email, password, h_password, phone, address, bio, cni) VALUES
//     ('assets/img/author/seller1.png', 'seller1', 'seller1@example.com', 'password1', 'hashedpassword1', '123-456-7890', '123 Main St, City, Country', 'Seller bio 1', 'CNI12345'),
//     ('assets/img/author/seller2.png', 'seller2', 'seller2@example.com', 'password2', 'hashedpassword2', '234-567-8901', '456 Elm St, City, Country', 'Seller bio 2', 'CNI67890'),
//     ('assets/img/author/seller3.png', 'seller3', 'seller3@example.com', 'password3', 'hashedpassword3', '345-678-9012', '789 Oak St, City, Country', 'Seller bio 3', 'CNI11223'),
//     ('assets/img/author/seller4.png', 'seller4', 'seller4@example.com', 'password4', 'hashedpassword4', '456-789-0123', '101 Pine St, City, Country', 'Seller bio 4', 'CNI44556'),
//     ('assets/img/author/seller5.png', 'seller5', 'seller5@example.com', 'password5', 'hashedpassword5', '567-890-1234', '202 Maple St, City, Country', 'Seller bio 5', 'CNI77889');
// ";
// if ($conn->query($sql) === TRUE) {
//     echo "Users inserted successfully<br>";
// } else {
//     die("Error inserting users: " . $conn->error);
// }

// Create table products
$sql = "INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, sells, rate, id_c, id_s, discount) VALUES
    ('Laptop XYZ', 'High performance laptop.', 999.99, 'assets/img/product/laptop1.png', 'assets/img/product/laptop2.png', 'assets/img/product/laptop3.png', 10, 5, 4.5, 1, 1, 10),
    ('Smartphone ABC', 'Latest model smartphone.', 799.99, 'assets/img/product/phone1.png', 'assets/img/product/phone2.png', 'assets/img/product/phone3.png', 20, 15, 4.0, 2, 2, 5),
    ('Digital Camera DEF', 'High resolution camera.', 499.99, 'assets/img/product/camera1.png', 'assets/img/product/camera2.png', 'assets/img/product/camera3.png', 15, 8, 4.2, 3, 3, 0),
    ('Running Shoes', 'Comfortable running shoes.', 89.99, 'assets/img/product/shoes1.png', 'assets/img/product/shoes2.png', 'assets/img/product/shoes3.png', 25, 20, 4.7, 4, 4, 15),
    ('Gold Necklace', 'Elegant gold necklace.', 199.99, 'assets/img/product/necklace1.png', 'assets/img/product/necklace2.png', 'assets/img/product/necklace3.png', 30, 12, 4.8, 5, 5, 25),
    ('Fitness Tracker', 'Track your fitness goals.', 129.99, 'assets/img/product/tracker1.png', 'assets/img/product/tracker2.png', 'assets/img/product/tracker3.png', 40, 18, 4.6, 6, 6, 10),
    ('Tablet XYZ', 'Portable tablet for all needs.', 399.99, 'assets/img/product/tablet1.png', 'assets/img/product/tablet2.png', 'assets/img/product/tablet3.png', 12, 7, 4.1, 2, 2, 5),
    ('Smartwatch', 'Feature-packed smartwatch.', 159.99, 'assets/img/product/smartwatch1.png', 'assets/img/product/smartwatch2.png', 'assets/img/product/smartwatch3.png', 22, 13, 4.4, 6, 3, 0),
    ('Bluetooth Speaker', 'Wireless Bluetooth speaker.', 79.99, 'assets/img/product/speaker1.png', 'assets/img/product/speaker2.png', 'assets/img/product/speaker3.png', 35, 25, 4.3, 3, 4, 20),
    ('Makeup Kit', 'Complete makeup kit for beauty.', 49.99, 'assets/img/product/makeup1.png', 'assets/img/product/makeup2.png', 'assets/img/product/makeup3.png', 50, 30, 4.5, 7, 5, 30),
    -- Add more products as needed
    ('Product 11', 'Description for product 11.', 123.45, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 10, 5, 4.2, 1, 1, 5),
    ('Product 12', 'Description for product 12.', 67.89, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 15, 10, 3.9, 2, 2, 10),
    ('Product 13', 'Description for product 13.', 234.56, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 20, 12, 4.1, 3, 3, 0),
    ('Product 14', 'Description for product 14.', 89.90, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 25, 15, 4.3, 4, 4, 20),
    ('Product 15', 'Description for product 15.', 199.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 30, 18, 4.4, 5, 1, 15),
    ('Product 16', 'Description for product 16.', 54.32, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 12, 7, 4.0, 6, 4, 25),
    ('Product 17', 'Description for product 17.', 89.50, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 18, 9, 4.2, 1, 6, 10),
    ('Product 18', 'Description for product 18.', 149.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 22, 11, 4.3, 2, 5, 5),
    ('Product 19', 'Description for product 19.', 199.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 25, 14, 4.1, 3, 1, 0),
    ('Product 20', 'Description for product 20.', 299.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 30, 16, 4.5, 4, 1, 15),
    ('Product 21', 'Description for product 21.', 39.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 35, 20, 4.6, 5, 3, 20),
    ('Product 22', 'Description for product 22.', 89.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 40, 22, 4.7, 6, 2, 10),
    ('Product 23', 'Description for product 23.', 59.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 15, 8, 4.0, 1, 1, 5),
    ('Product 24', 'Description for product 24.', 129.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 20, 12, 4.2, 2, 4, 30),
    ('Product 25', 'Description for product 25.', 219.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 25, 15, 4.4, 3, 3, 10),
    ('Product 26', 'Description for product 26.', 89.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 30, 17, 4.1, 4, 6, 5),
    ('Product 27', 'Description for product 27.', 69.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 12, 6, 4.3, 5, 5, 15),
    ('Product 28', 'Description for product 28.', 159.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 18, 8, 4.5, 6, 4, 20),
    ('Product 29', 'Description for product 29.', 249.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 20, 10, 4.4, 1, 2, 0),
    ('Product 30', 'Description for product 30.', 139.99, 'assets/img/product/default.png', 'assets/img/product/default.png', 'assets/img/product/default.png', 25, 13, 4.6, 2, 3, 25);

";
if ($conn->query($sql) === TRUE) {
    echo "Products inserted successfully<br>";
} else {
    die("Error inserting products: " . $conn->error);
}

// Close the connection
$conn->close();

?>
```

<!-- Please note that this is just an example and you should adjust the values according to your specific requirements. -->
