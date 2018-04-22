<?php include 'view/header.php'; ?>

<h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>  
    <form action="." method="post">
        <input type="hidden" value="calculate" name="action"/>
        <div id="data">
            <label>Investment Amount:</label>
            <select name="investment">
            <?php for ($v = 10000; $v <= 50000; $v += 5000) : ?>
                <option value="<?php echo $v; ?>" >
                    <?php echo $v; ?>
                </option>
            <?php endfor; ?>
            </select><br>

            <label>Yearly Interest Rate:</label>
            <select name="interest_rate">
            <?php for ($v = 4; $v <= 12; $v += .5) : ?>
                <option value="<?php echo $v; ?>" ><?php echo $v; ?>
                </option>
            <?php endfor; ?>
            </select><br>

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