<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST['Add_To_Cart'])) {
        $itemName = $_POST['Item_Name'];
        $itemPrice = $_POST['Price'];
        $quantity = $_POST['quantity_shoes'];

       
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        
        $itemFound = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['Item_Name'] == $itemName) {
                $item['Quantity']++; 
                $item['PricePP'] = $item['Price'] * $item['Quantity'];
                $itemFound = true;
                break;
            }
        }

       
        if (!$itemFound) {
            $_SESSION['cart'][] = ['Item_Name' => $itemName, 'Price' => $itemPrice, 'Quantity' => $quantity, 'PricePP' => $itemPrice * $quantity];
        }
        echo "<script>alert('Item added to cart');</script>";

        header("Location: shop.php");
        exit;
    }
}
?>
