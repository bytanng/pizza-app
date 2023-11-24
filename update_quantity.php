<?php
session_start();

if (isset($_POST['item_name']) && isset($_POST['new_quantity'])) {
    $item_name = $_POST['item_name'];
    $new_quantity = $_POST['new_quantity'];

    // Update the quantity for the item in the session cart
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] === $item_name) {
                $item['quantity'] = $new_quantity;
                break;
            }
        }
    }
    // Redirect back to the cart page
    header('Location: cart.php');
    exit();
}
