<?php include 'view/header.php'; ?>

        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo murach\fvc\formatInvestment($investment, 2); ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo murach\fvc\formatRate($interest_rate); ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo murach\fvc\compoundInterest($investment, $interest_rate, $years, $compound); ?></span><br>
        
        <label>Compound Monthly:</label>
        <span><?php
            if ($compound == 'on') {
                    echo 'Yes';
            } else {
                    echo 'No';
            }
                ?></span><br>

<?php include 'view/footer.php'; ?>