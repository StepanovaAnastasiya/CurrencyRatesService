<?php include "templates/include/header.php" ?>

      <h1>Історія конвертувань</h1>

      <table>
        <tr>
          <th>Дата та час розрахунку</th>
          <th>Початкова сума</th>
          <th>Початкова валюта</th>
          <th>Цільова валюта</th>
          <th>Сума в цільовій валюті</th>
        </tr>

<?php foreach ( $historyItems as $item ) { ?>

        <tr>
          <td>
              <p><?php echo date('d-m-Y H:i:s',$item->datetimeUnix);?></p>
          </td>
          <td>
            <p><?php echo $item->amount;?></p>
          </td>
          <td>
            <p><?php echo $item->fromCurrency;?></p>
          </td>
          <td>
            <p><?php echo $item->toCurrency;?></p>
          </td>
          <td>
            <p><?php echo $item->result;?></p>
          </td>          
        </tr>

<?php } ?>

      </table>    

<?php include "templates/include/footer.php" ?>
