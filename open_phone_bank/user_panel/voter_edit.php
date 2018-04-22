<?php include '../view/header.php'; ?>
<main>
    <h1>Call: <?php echo $voter['phone']; ?></h1>
    <h2>If there is an answer:</h2>
    <p>Hello <?php echo $voter['firstName']; ?> <?php echo $voter['lastName']; ?>.</p>
    <p>My name is <?php echo $_SESSION['userName']; ?>.</p>
    <p><?php echo get_script_message(1); ?></p>
    <br>
    <h2>Other information:</h2>
    <p>Voter lives in <?php echo $voter['city']; ?>.</p> 
    <p>Voter is a member of the <?php echo $voter['party']; ?> party.</p>
    <br>
    <h2>After the call:</h2>
    <p>Change status to "Contacted" if you reach the voter.</p>
    <p>Keep status "Call" if voter does not answer.</p>
    <p>Change status to "Remove" if voter requests removal from the list.</p>
    
    <form action="index.php" method="post" id="edit_voter_form">
        <input type="hidden" name="action" value="edit_voter">

        <label>Status:</label>
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
        
        <!-- Hidden can enable later if any field is needed. -->
        <input type="hidden" name="voter_id" value="<?php echo $voter['voterID']; ?>">
        <input type="hidden" name="firstName" value="<?php echo $voter['firstName']; ?>">
        <input type="hidden" name="lastName" value="<?php echo $voter['lastName']; ?>">
        <input type="hidden" name="phone" value="<?php echo $voter['phone']; ?>">
        <input type="hidden" name="city" value="<?php echo $voter['city']; ?>">
        <input type="hidden" name="party" value="<?php echo $voter['party']; ?>">
        <input type="submit" value="Update" />
        <button type="submit" formaction="../user_panel/">Return to User Panel</button>
    </form>
</main>
<?php include '../view/footer.php'; ?>