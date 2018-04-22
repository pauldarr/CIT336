<?php

// Get all the products for the registration dropdown list
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY productCode';
    $products = $db->query($query);
    return $products;
}
?>