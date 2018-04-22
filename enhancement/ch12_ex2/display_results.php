<?php include 'view/header.php'; ?>

        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
        
        <label>Compound Monthly:</label>
        <span><?php
            if ($compound == 'on') {
                    echo 'Yes';
            } else {
                    echo 'No';
            }
                ?></span><br>

<?php include 'view/footer.php'; ?>
