<?php
require('database.php');

// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Get products
$queryProducts = 'SELECT * FROM products
                  WHERE productID = :product_id';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':product_id', $product_id);
$statement3->execute();
$products = $statement3->fetch();
$statement3->closeCursor();
?>

// Get categories
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="edit_product.php" method="post"
              id="edit_product_form">

            <label>Category:</label>
            <!--<input type="text" name="category_id" value="<?php echo $category_id" /> -->
            
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option 
                    <?php if ($category['categoryID'] == $category_id) {
                        echo ' selected ';
                    } ?>
                    value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $products['productCode']; ?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $products['productName']; ?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $products['listPrice']; ?>"><br>
    
            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">

            <label>&nbsp;</label>
            <input type="submit" value="Save Changes"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc. | <a href="http://cit336.darr.org">Exercise Page</a></p>
    </footer>
</body>
</html>