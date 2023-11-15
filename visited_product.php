<?php
session_start();
include('head.php');
$products = [
    // Your products with 'id' for simplicity
    ['id' => 1, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'John Doe', 'price' => '$50'],
    ['id' => 2, 'image' => 'path_to_photo2.jpeg', 'photographer' => 'Jane Smith', 'price' => '$70'],
    ['id' => 3, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jake Peralta', 'price' => '$50'],
    ['id' => 4, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jaten Kade', 'price' => '$50'],
    ['id' => 5, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50'],
    ['id' => 6, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50'],
    ['id' => 7, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50'],
    // Add more products as needed
];

// Function to find a product by ID
function findProductById($products, $id) {
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

if (isset($_COOKIE['visited_products'])) {
    $visitedProducts = json_decode($_COOKIE['visited_products'], true);
    $displayProducts = array_slice($visitedProducts, 0, 5);
    echo '<h2>Last Five Visited Products</h2>';
    echo '<ul>';
    foreach ($displayProducts as $productId) {
        $product = findProductById($products, $productId);
        if ($product) {
            echo '<li>';
            echo '<a href="view_product.php?id=' . htmlspecialchars($product['id']) . '">';
            echo '<img src="' . htmlspecialchars($product['image']) . '" alt="Photo" style="width:100px; height:auto;"> ';
            echo htmlspecialchars($product['photographer']) . ' - ' . htmlspecialchars($product['price']);
            echo '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
} else {
    echo 'No products have been visited yet.';
    echo $visitedProducts;
}
?>
