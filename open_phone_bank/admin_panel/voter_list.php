<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h2>Status</h2>
        <?php include '../view/category_nav.php'; ?> 
    </aside>
    <section>
        <h1>Voter List</h1>
        <div class="table">
        <table>
            <tr>
                <th>Voter ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>City</th>
                <th>Party</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php foreach ($voters as $voter) : ?>
            <tr>
                <td><?php echo $voter['voterID']; ?></td>
                <td><?php echo $voter['firstName']; ?></td>
                <td><?php echo $voter['lastName']; ?></td>
                <td><?php echo $voter['phone']; ?></td>
                <td><?php echo $voter['city']; ?></td>
                <td><?php echo $voter['party']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_voter">
                    <input type="hidden" name="voter_id"
                           value="<?php echo $voter['voterID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $voter['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="voter_id"
                           value="<?php echo $voter['voterID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $voter['categoryID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <form method="post" action="?action=show_add_form">
            <button type="submit">Add voter</button>
            <button type="submit" formaction="?action=list_categories">Add/Delete Status</button>
            <button type="submit" formaction="?action=list_script">Edit Script</button>
        </form>       
    </section>
</main>
<?php include '../view/footer.php'; ?>