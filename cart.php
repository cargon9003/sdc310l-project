<?php
// Initialize cart (static for now, will use session/DB later)
$cartItems = [];
$total = 0;
$tax = 0; // 5%
$shipping = 0; // 10%
$orderTotal = 0;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $id = $_GET['id'] ?? 'Not Provided';
    $name = $_GET['name'] ?? 'Not Provided';
    $cost = $_GET['cost'] ?? 0;
    $quantity = $_GET['quantity'] ?? 0;
    $action = $_GET['action'];

    if ($action === 'Add' && $quantity > 0) {
        $cartItems[] = ['id' => $id, 'name' => $name, 'cost' => $cost, 'quantity' => $quantity];
    }
    // Remove logic is placeholder—will clear on checkout later
    // For now, it just shows the last added item
}

foreach ($cartItems as $item) {
    $total += $item['cost'] * $item['quantity'];
}
$tax = $total * 0.05;
$shipping = $total * 0.10;
$orderTotal = $total + $tax + $shipping;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Shopping Cart</h1>
    <a href="index.php">Continue Shopping</a>
    <?php if (empty($cartItems)): ?>
        <p>Cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cartItems as $item): ?>
            <li>
                ID: <?php echo $item['id']; ?> | 
                Name: <?php echo $item['name']; ?> | 
                Qty: <?php echo $item['quantity']; ?> | 
                Cost: $<?php echo $item['cost']; ?> | 
                Total: $<?php echo $item['quantity'] * $item['cost']; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <p>Total Items: $<?php echo $total; ?></p>
        <p>Tax (5%): $<?php echo $tax; ?></p>
        <p>Shipping (10%): $<?php echo $shipping; ?></p>
        <p>Order Total: $<?php echo $orderTotal; ?></p>
    <?php endif; ?>
    <form method="post"><button type="submit" name="checkout">Check Out</button></form>
</body>
</html>