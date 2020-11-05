<?php include "templates/include/header.php" ?>

<p>Оберіть валюти для відображення:</p>   

<form action="index.php?action=settings" method="post">

    <form method="post" action="input5.php">
        <?php

        foreach ($currencies as $k => $currency) {
            $checked = "";
            if (isset($_SESSION['settingsCurrencies']) && ($_SESSION['settingsCurrencies'][$k] == 1)) {
                $checked = "checked";
            }
            echo '<input type="checkbox" name='. $k .' value="1"'.$checked.'>'.$currency.'<Br>';
        }
        ?>       
        <p><input type="submit" name="submit" value="Обрати"></p>
    </form>

<?php include "templates/include/footer.php" ?>
