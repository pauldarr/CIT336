<?php
function get_voters_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM voters
              WHERE voters.categoryID = :category_id
              ORDER BY voterID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $voters = $statement->fetchAll();
    $statement->closeCursor();
    return $voters;
}

function get_voter($voter_id) {
    global $db;
    $query = 'SELECT * FROM voters
              WHERE voterID = :voter_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":voter_id", $voter_id);
    $statement->execute();
    $voter = $statement->fetch();
    $statement->closeCursor();
    return $voter;
}

function delete_voter($voter_id) {
    global $db;
    $query = 'DELETE FROM voters
              WHERE voterID = :voter_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':voter_id', $voter_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_voter($category_id, $voter_id, $firstName, $lastName, $phone, $city, $party) {
    global $db;
    $query = 'INSERT INTO voters
                 (categoryID, voterID, firstName, lastName, phone, city, party)
              VALUES
                 (:category_id, :voter_id, :firstName, :lastName, :phone, :city, :party)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':voter_id', $voter_id);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':party', $party);
    $statement->execute();
    $statement->closeCursor();
}

function update_voter($voter_id, $category_id, $firstName, $lastName, $phone, $city, $party) {
    global $db;
    $query = 'UPDATE 
                voters
            SET 
                categoryID = :category_id, 
                firstName = :firstName, 
                lastName = :lastName, 
                phone = :phone, 
                city = :city, 
                party = :party
              WHERE 
                voterID = :voter_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':voter_id', $voter_id);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':party', $party);
    $statement->execute();
    $statement->closeCursor();
}

?>