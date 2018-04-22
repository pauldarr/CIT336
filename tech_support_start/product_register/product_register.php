<?php include('../view/header.php'); ?>

<main>
    <form action='.' method='post'>
                <label>Customer: </label>
                <?php echo $customers['firstName'] . ' ' . $customers['lastName']; ?>
                <br><br>
                <label>Product:</label>
                <?php $_SESSION['customerID'] = $customers['customerID']; ?>
                <select name='productCode'>
                    <?php foreach($products as $product) : ?>
                    <option value='<?php echo $product['productCode']; ?>'>
                    <?php echo $product['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br><br>
        <input type='hidden' name='action' value='register_product' />
        <input type='submit' value='Register Product' />
        <br>
    </form>

<?php include('../view/footer.php'); ?>