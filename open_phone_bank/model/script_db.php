<?php
function get_scripts() {
    global $db;
    $query = 'SELECT * FROM script
              ORDER BY scriptID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_script_message($script_id) {
    global $db;
    $query = 'SELECT * FROM script
              WHERE scriptID = :script_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':script_id', $script_id);
    $statement->execute();    
    $script = $statement->fetch();
    $statement->closeCursor();    
    $script_message = $script['message'];
    return $script_message;
}

function add_script($script_id, $message) {
    global $db;
    $query = 'INSERT INTO script
                (scriptID, message)
              VALUES 
                (:script_id, :message)';
    $statement = $db->prepare($query);
    $statement->bindValue(':script_id', $script_id);
    $statement->bindValue(':message', $message);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_script($script_id) {
    global $db;
    $query = 'DELETE FROM script
              WHERE scriptID = :script_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':script_id', $script_id);
    $statement->execute();
    $statement->closeCursor();
}

function update_script($script_id, $message) {
    global $db;
    $query = 'UPDATE 
                script
            SET 
                scriptID = :script_id, 
                message = :message 
              WHERE 
                scriptID = :script_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':script_id', $script_id);
    $statement->bindValue(':message', $message);
    $statement->execute();
    $statement->closeCursor();
}

?>