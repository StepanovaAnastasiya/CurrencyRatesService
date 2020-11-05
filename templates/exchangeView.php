<?php include "templates/include/header.php" ?>

<form action="" method="post">
    <p><b>Сума:</b><br>
        <input type="text" name="amount" value="100" size="40">
    </p>
    <p>Валюта</p>
    <select name="fromCurrency">
        <option value='UAH' selected >UAH Українська гривня</option>;
        <?php foreach ($currencies as $k => $currency) {            
            echo '<option value='.$k.'>'. $currency.'</option>';
        } ?>
    </select>
    <p>Конвертувати у</p>
    <select name="toCurrency">
        <option value='UAH' selected >UAH Українська гривня</option>;
        <?php foreach ($currencies as $k => $currency) { 
            echo '<option value='.$k.'>'. $currency.'</option>';
        } ?>
    </select>
    <input type="submit" value="Розрахувати" name ="submit"/>
</form>

<?php if (isset($results)) { ?>
    <div class="">
        <p>Дата розрахунку: <?php echo $results['date'] ?></p>
        <p><?php echo $results['amount']." ".$results['fromCurrency']." = ".$results['result']." ".$results['toCurrency'] ?></p>    
    </div>
<?php }?>

<?php include "templates/include/footer.php" ?>
