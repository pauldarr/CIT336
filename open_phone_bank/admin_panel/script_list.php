<?php include '../view/header.php'; ?>

<main>
    <div class="script">
    <h2>Messages to be used by volunteers.</h2>
    <div class="table">
    <table>
        <tr>
            <th>Script ID</th>
            <th>Message</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($scripts as $script) : ?>
        <tr>
            <td><?php echo $script['scriptID']; ?></td>
            <td><?php echo $script['message'];; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_script" />
                    <input type="hidden" name="script_id"
                           value="<?php echo $script['scriptID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
        
    <h2>Add message</h2>
    <form id="add_script_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_script" />
        <label>Script ID:</label>
        <br>
        <input type="text" name="script_id" pattern="[+-]?[0-9]{1,2}" title="Maximum 2 digit number." />
        <br><br>
        <label>Message:</label>
        <br>
        <input type="text" name="message" size="50" maxlength="500" title="Maximum 500 characters" />
        <input type="submit" value="Add"/>
        <br>
    </form>
        
<!--    <h2>Edit message</h2>
    <form id="edit_script_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="edit_script" />
        
        <label>Script ID:</label>
        <br>
        <input type="text" name="scriptID" pattern="[+-]?[0-9]{1,10}" title="Format: 1" value="<?php echo $script['scriptID']; ?>" />
        <br><br>
        <label>Message:</label>
        <br>
        <input type="text" name="message" size="50" maxlength="500" title="Maximum 500 characters" value="<?php echo $script['message']; ?>" />
        <input type="submit" value="Update"/>
    </form>
        <br><br>
    <form method="post" action="../admin_panel/">
        <button type="submit">Return to Admin Panel</button>
    </form> -->
    </div>   
</main>