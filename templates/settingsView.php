<?php include "templates/include/header.php" ?>

<p>Оберіть максимальну кількість останніх запитів для відображення в Історії:</p>
<form action="index.php?action=settings" method="post">
    <select name="limit">
        <option value='2' >2</option>;
        <option value='4' selected >4</option>;
        <option value='6'>6</option>;
        <option value='8'>8</option>;
        <option value='10'>10</option>; 
    </select>
    <p><input type="submit" name="submitLimit" value="Обрати"></p>
</form>
<p>Оберіть валюти для відображення:</p>   

<form action="index.php?action=settings" method="post">
    
        <?php
        foreach ($currencies as $k => $currency) {
            $checked = "checked";
            if (isset($_SESSION['settingsCurrencies']) && ($_SESSION['settingsCurrencies'][$k] == NULL)) {
                $checked = "";
            }
            echo '<p><input type="checkbox" name=' . $k . ' value="1"' . $checked . '>' . $currency .'</p>';
        }
        ?>       
        <p><input type="submit" name="submit" value="Обрати"></p>
    </form>

    <?php include "templates/include/footer.php" ?>
