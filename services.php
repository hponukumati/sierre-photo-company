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
    ['id' => 7, 'image' => 'path_to_photo1.jpeg', 'photographer' => 'Jeff Diaz', 'price' => '$50'],
    // Add more products as needed
];
include('head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products & Services</title>
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
            max-width: 100%;
            max-height: 150px;
            display: block;
            margin: 0 auto;
        }

        .photographer-name,
        .photo-price {
            margin-top: 10px;
        }

        .most-visited-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="visited_product.php">
    <input type="submit" value="Visited Products" />
</form>
    <section class="product-grid">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <!-- Update the href to include the correct query parameters -->
            <a href="view_product.php?id=<?php echo htmlspecialchars($product['id']); ?>&image=<?php echo htmlspecialchars($product['image']); ?>&photographer=<?php echo htmlspecialchars($product['photographer']); ?>&price=<?php echo htmlspecialchars($product['price']); ?>">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Photo">
            </a>
            <div class="photographer-name"><?php echo htmlspecialchars($product['photographer']); ?></div>
            <div class="photo-price"><?php echo htmlspecialchars($product['price']); ?></div>
        </div>
    <?php endforeach; ?>
</section>
</body>
</html>
<?php
include('footer.php');
?>
