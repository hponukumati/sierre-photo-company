<?php
session_start();

$products = [
    // Your products with 'id' for simplicity
    ['id' => 1, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'John Doe', 'price' => '$50'],
    ['id' => 2, 'image' => 'path_to_photo2.jpeg', 'photographer' => 'Jane Smith', 'price' => '$70'],
    ['id' => 3, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jake Peralta', 'price' => '$50'],
    ['id' => 4, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jaten Kade', 'price' => '$50'],
    ['id' => 5, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50'],
    ['id' => 6, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50'],
    ['id' => 7, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50']
    // Add more products as needed
];

// Check if the 'id' GET parameter is set and is a number
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $productId = (int)$_GET['id'];
    // Search for the product in the array
    $product = array_filter($products, function ($product) use ($productId) {
        return $product['id'] === $productId;
    });

    // If product exists, extract it, else redirect back to products page
    if (count($product) > 0) {
        $product = array_shift($product); // Get the first matching product details
    } else {
        header('Location: services.php');
        exit;
    }
} else {
    header('Location: services.php');
    exit;
}
$visitedProducts = isset($_COOKIE['visited_products']) ? json_decode($_COOKIE['visited_products'], true) : [];
    if (!in_array($productId, $visitedProducts)) {
        array_unshift($visitedProducts, $productId); // Add to the beginning of the array
        setcookie('visited_products', json_encode($visitedProducts), time() + 3600); // Set cookie for 1 hour
    }
    
include('head.php'); // Assuming this contains common <head> elements
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        .product-detail {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-detail img {
            max-width: 100%;
            height: auto; /* Ensure the whole picture is visible */
            margin-bottom: 20px;
        }

        .product-info {
            text-align: center;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="product-detail">
        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Photo by <?php echo htmlspecialchars($product['photographer']); ?>">
        <div class="product-info">
            <h2>Photographer: <?php echo htmlspecialchars($product['photographer']); ?></h2>
            <p>Price: <?php echo htmlspecialchars($product['price']); ?></p>
        </div>
        <a href="services.php" class="back-link">Back to Products</a>
    </div>
</body>
</html>
<php

/>