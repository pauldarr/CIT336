<?php 
    //set default value of variables for initial page load
    if (!isset($years)) { $years = '5'; } 

$action = filter_input (INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');

    if ($action == null) {
        $action = 'show_form';
    }
}

if ($action == 'show_form') {
    include('calculator_form.php');
} else if ($action == 'calculate') {
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', 
            FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', 
            FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', 
            FILTER_VALIDATE_INT);
    $compound = filter_input(INPUT_POST, 'compound');

    // validate investment
    if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; 
    
    // validate interest rate
    } else if ( $interest_rate === FALSE )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 ) {
        $error_message = 'Interest rate must be greater than zero.'; 
    
    // validate years
    } else if ( $years === FALSE ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
        
    // set error message to empty string if no invalid entries
    } else {
        $error_message = ''; 
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('calculator_form.php');
        exit();
    }

   // Check if checkbox is selected and future value monthly
    $future_value = $investment;
    if ($compound == 'on')  {
        for ($i = 1; $i <= $years * 12; $i++) {
            $future_value = ($future_value + ($future_value * $interest_rate *(.01/12)));
        }
    }
    
    else {
    $future_value = $investment;
        for ($i = 1; $i <= $years; $i++) {
            $future_value = ($future_value + ($future_value * $interest_rate *.01));
        }
    }
    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
    
    include('display_results.php');
        
}     
?>