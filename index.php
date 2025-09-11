<?php
// Placeholder for DB connection (Week 3)
$products = [  // Static for now; replace with DB query later
    ['id' => 1, 'name' => 'iPhone 12', 'description' => 'Latest smartphone with 5G', 'cost' => 999.99, 'quantity' => 0],
    ['id' => 2, 'name' => 'Laptop Pro', 'description' => 'High-end laptop for work', 'cost' => 1299.99, 'quantity' => 0],
    // Add the other 4 from your DB
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SDC310L Online Store - Catalog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Product Catalog (Under Construction)</h1>
    <a href="cart.php">View Cart</a>
    <ul>
        <?php foreach ($products as $product): ?>
        <li>
            ID: <?php echo $product['id']; ?> | 
            Name: <?php echo $product['name']; ?> | 
            Desc: <?php echo $product['description']; ?> | 
            Cost: $<?php echo $product['cost']; ?> | 
            Qty: <?php echo $product['quantity']; ?> 
            <!-- Buttons: Add/Remove/Adjust (placeholders) -->
            <button>Add to Cart</button> <button>Remove</button> 
            <input type="number" value="0" min="0">
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>