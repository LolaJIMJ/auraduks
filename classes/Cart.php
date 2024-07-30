<?php

class Cart {

    public function add($id) {
        if (isset($_SESSION['product'])) {
            array_push($_SESSION['product'], $id);
        } else {
            $_SESSION['product'] = [];
            array_push($_SESSION['product'], $id);
        }
    }

    public function addToCart($id) {
        if (isset($_SESSION['product'])) {
            if (array_key_exists($id, $_SESSION['product'])) {
                // This particular product has been added to the cart before
                $existing_qty = $_SESSION['product'][$id];
                $_SESSION['product'][$id] = $existing_qty + 1;
            } else {
                // This particular product has not been added to the cart before
                $_SESSION['product'][$id] = 1;
            }
        } else {
            $_SESSION['product'][$id] = 1;
        }
    }

    public function removeFromCart($id) {
        if (isset($_SESSION['product']) && array_key_exists($id, $_SESSION['product'])) {
            unset($_SESSION['product'][$id]);
        }
    }
}
?>





