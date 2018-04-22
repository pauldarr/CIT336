<?php include '../view/header.php'; ?>
<main>
    <h1>Add Voter</h1>
    <form action="index.php" method="post" id="add_voter_form">
        <input type="hidden" name="action" value="add_voter">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        
        <label>Voter ID:</label>
        <input type="text" name="voterID" pattern="[+-]?[0-9]{1,10}" title="Format: 1" />
        <br>
        
        <label>First Name:</label>
        <input type="text" name="firstName" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Oliver" />
        <br>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Queen" />
        <br>

        <label>Phone Number:</label>
        <input type="text" name="phone" pattern="^[1-9]\d{2}-\d{3}-\d{4}" title="Format: 111-111-1111" />
        <br>

        <label>City:</label>
        <input type="text" name="city" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" title="Format: Star City or Gotham" />
        <br>
        
        <label>Party:</label>
        <input type="text" name="party" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Party" />
        <br>
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="Add voter" />
        <input type="reset">
    </form>
    <br>
    <form method="post" action="../admin_panel/">
        <button type="submit">Return to Admin Panel</button>
    </form>
</main>
<?php include '../view/footer.php'; ?>