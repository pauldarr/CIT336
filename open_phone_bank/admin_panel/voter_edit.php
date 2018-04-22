<?php include '../view/header.php'; ?>
<main>
    <h1>Edit voter information</h1>
    <form action="index.php" method="post" id="edit_voter_form">
        <input type="hidden" name="action" value="edit_voter">

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
        
        <label>Voter ID:</label>
        <input type="text" name="voter_id" pattern="[+-]?[0-9]{1,10}" title="Format: 1" value="<?php echo $voter['voterID']; ?>">
        <br>
        
        <label>First Name:</label>
        <input type="text" name="firstName" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Oliver" value="<?php echo $voter['firstName']; ?>">
        <br>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Queen" value="<?php echo $voter['lastName']; ?>">
        <br>

        <label>Phone Number:</label>
        <input type="text" name="phone" pattern="^[1-9]\d{2}-\d{3}-\d{4}" title="Format: 111-111-1111" value="<?php echo $voter['phone']; ?>">
        <br>

        <label>City:</label>
        <input type="text" name="city" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" title="Format: Star City or Gotham" value="<?php echo $voter['city']; ?>">
        <br>
        
        <label>Party:</label>
        <input type="text" name="party" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Party" value="<?php echo $voter['party']; ?>">
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Update" />
        <button type="submit" formaction="../admin_panel/">Return to Admin Panel</button>
    </form>
</main>
<?php include '../view/footer.php'; ?>