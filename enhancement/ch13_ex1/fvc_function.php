<?php

namespace murach\fvc {

    // 1st function future value monthly and yearly
    function compoundInterest($investment, $interest_rate, $years, $compound) {
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
    $future_value_f = '$'.number_format($future_value, 2);
    return $future_value_f;   
    } 

    // 2nd function currency formating
    function formatInvestment($investment, $decimals = 2) {
    $investment_f = '$'.number_format($investment, $decimals);
    return $investment_f;
    }
    
    // 3rd function yearly rate formating percent
    function formatRate($interest_rate) {
    $yearly_rate_f = $interest_rate.'%';
    return $yearly_rate_f;
    }
}
?>