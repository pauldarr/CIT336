<?php
require('../model/database.php');
require('../model/voters_db.php');
require('../model/script_db.php');
require('../model/category_db.php');

// start the session with a persistent cookie of 2 weeks
$lifetime = 60 * 60 * 24 * 14;             // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_voters';
    }
}

// List voters
if ($action == 'list_voters') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $voters = get_voters_by_category($category_id);
    include('voter_list.php');
} else if ($action == 'delete_voter') {
    $voter_id = filter_input(INPUT_POST, 'voter_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $voter_id == NULL || $voter_id == FALSE) {
        $error = "Missing or incorrect voter id or category id.";
        include('../errors/error.php');
    } else { 
        delete_voter($voter_id);
        header("Location: .?category_id=$category_id");
    }

// Edit Voter - Edit Voter Info
} else if ($action == 'show_edit_form') {
    $voter_id = filter_input(INPUT_POST, 'voter_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $categories = get_categories();
    $message = get_script_message();
    
    if ($voter_id == NULL || $voter_id == FALSE ||
        $category_id == NULL || $category_id == FALSE) {
        $error = "Missing or incorrect voter id.";
        include('../errors/error.php');
    } else { 
        $voter = get_voter($voter_id);
        include('voter_edit.php');
    }
    
} else if ($action == 'edit_voter') {
    $voter_id = filter_input(INPUT_POST, 'voter_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $city = filter_input(INPUT_POST, 'city');
    $party = filter_input(INPUT_POST, 'party');
    if ($voter_id == NULL || $voter_id == FALSE ||
            $category_id == NULL || $category_id == FALSE || $lastName == NULL || $phone == NULL || $city == NULL || $party == NULL) {
        $error = "Invalid voter data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_voter($voter_id, $category_id, $firstName, $lastName, $phone, $city, $party);
        header("Location: .?category_id=$category_id");
    }
    
}

//User Name
if (isset($_POST['Submit_Name'])) { 
 $_SESSION['userName'] = $_POST['userName'];
 }

?>