<?php
// Needed: a function to get a customer by their email address
function get_customers() {
    global $db;
    $query = "SELECT * FROM customers
              ORDER BY lastName";
    $customers = $db->query($query);
    return $customers;
}

function search_by_email($email) {
    global $db;
    $query = "SELECT * FROM customers
              WHERE email='$email'
              ORDER BY firstName";
    $customers = $db->query($query);
    $customer = $customers->fetch();
    return $customer;
}
?>