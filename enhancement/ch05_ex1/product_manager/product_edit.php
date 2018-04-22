<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="edit_product_form">
        <input type="hidden" name="action" value="edit_product">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option
                    <?php if ($category['categoryID'] == $category_id) {
                        echo 'selected';
                } ?>
                value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $product['productCode']; ?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['productName']; ?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $product['listPrice']; ?>"><br>
        
            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">

            <label>&nbsp;</label>
            <input type="submit" value="Save Changes"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>

</main>
<?php include '../view/footer.php'; ?>