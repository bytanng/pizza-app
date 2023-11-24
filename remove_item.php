<?php
session_start();

if (isset($_POST['remove_item']) && isset($_POST['item_name'])) {
    $item_name = $_POST['item_name'];

    // Check if the item exists in the cart
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['name'] === $item_name) {
                // Remove the item from the cart
                unset($_SESSION['cart'][$key]);
                // Reindex the array to avoid gaps
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break; // No need to continue looping
            }
        }
    }
}

// Redirect back to the cart page or any other page you prefer
header("Location: cart.php");
exit();
?>
