<?php include 'view/header.php'; ?>

<h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>  
    <form action="." method="post">
        <input type="hidden" value="calculate" name="action"/>
        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
            value="<?php echo $investment; ?>"/><br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                       value="<?php echo $interest_rate; ?>"/><br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                       value="<?php echo $years; ?>"/><br>
            
            <label>Compound Interest Monthly</label>
            <input type="checkbox" name="compound" 
                       value="on"><br>
            
        </div>
        
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>
    </form>

<?php include 'view/footer.php'; ?>