<?php include '../view/header.php'; ?>
<main>
    <div class="category">
    <h2>Voter status list</h2>
    <div class="table">
    <table>
        <tr>
            <th>Status</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <h2>Add status</h2>
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_category" />

        <label>Name:</label>
        <input type="text" name="name" pattern="[A-Z]{1}[a-z]{1,30}" title="Format: Status" />
        <input type="submit" value="Add"/>
    </form>

    <form method="post" action="../admin_panel/">
        <button type="submit">Return to Admin Panel</button>
    </form>
    </div>   
</main>
<?php include '../view/footer.php'; ?>