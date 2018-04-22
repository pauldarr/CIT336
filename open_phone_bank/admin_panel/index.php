<?php
require('../model/database.php');
require('../model/voters_db.php');
require('../model/category_db.php');
require('../model/script_db.php');

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
    
// Delete voter - Admin Panel Only 
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
    
// Add voter - Admin Panel Only   
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('voter_add.php');    
} else if ($action == 'add_voter') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $voterID = filter_input(INPUT_POST, 'voterID');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $city = filter_input(INPUT_POST, 'city');
    $party = filter_input(INPUT_POST, 'party');
    if ($category_id == NULL || $category_id == FALSE || $voterID == NULL ||
        $firstName == NULL || $lastName == NULL || $phone == NULL || $city == NULL || $party == NULL) {
        $error = "Invalid voter data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_voter($category_id, $voterID, $firstName, $lastName, $phone, $city, $party);
        header("Location: .?category_id=$category_id");
    }

// Edit Voter - Edit Voter Info
} else if ($action == 'show_edit_form') {
    $voter_id = filter_input(INPUT_POST, 'voter_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $categories = get_categories();
    
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
    
// List and add categories
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

// Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');
    }

// List ascript id and messages
    if ($action == 'list_script') {
    $scripts = get_scripts();
    include('script_list.php');
// Add message
} else if ($action == 'add_script') {
    $script_id = filter_input(INPUT_POST, 'script_id',
            FILTER_VALIDATE_INT); 
    $message = filter_input(INPUT_POST, 'message');
    if ($script_id == NULL || $script_id == FALSE || $message == NULL) {
        $error = "Invalid message. Message must contain text.";
        include('../errors/error.php');
    } else {
        add_script($script_id, $message);
        header('Location: .?action=list_script');
   }
// Delete message    
} else if ($action == 'delete_script') {
    $script_id = filter_input(INPUT_POST, 'script_id', 
            FILTER_VALIDATE_INT);
    delete_script($script_id);
    header('Location: .?action=list_script');
    }

?>