<?php

class History {

    public $id = null;
    public $datetime = null;
    public $amount = null;
    public $fromCurrency = null;
    public $toCurrency = null;
    public $result = null;
    public $datetimeUnix = null;

    public function __construct($data = []) {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['datetime'])) {
            $this->datetime = $data['datetime'];
        }
        if (isset($data['amount'])) {
            $this->amount = $data['amount'];
        }
        if (isset($data['fromCurrency'])) {
            $this->fromCurrency = $data['fromCurrency'];
        }
        if (isset($data['toCurrency'])) {
            $this->toCurrency = $data['toCurrency'];
        }
        if (isset($data['result'])) {
            $this->result = $data['result'];
        }
        if (isset($data['datetimeUnix'])) {
            $this->datetimeUnix = $data['datetimeUnix'];
        }
    }

    public function saveResults() {
        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "INSERT INTO history ( id, datetime, amount, fromCurrency, toCurrency, result ) VALUES (NULL, FROM_UNIXTIME(:datetime), :amount, :fromCurrency, :toCurrency, :result )";
        $st = $connection->prepare($sql);
        $st->bindValue(":datetime", $this->datetime);
        $st->bindValue(":amount", $this->amount);
        $st->bindValue(":fromCurrency", $this->fromCurrency);
        $st->bindValue(":toCurrency", $this->toCurrency);
        $st->bindValue(":result", $this->result);
        $st->execute();
        $connection = null;
    }

    public static function getList() {          
        $limit = "4";
        if(isset($_SESSION['limit'])){
        $limit = $_SESSION['limit'];
        }
        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT *, UNIX_TIMESTAMP(datetime) AS datetimeUnix FROM history ORDER BY datetimeUnix DESC LIMIT ".$limit;
        $st = $connection->prepare($sql);
        $st->execute();
        $list = [];
        while ($row = $st->fetch()) {
            $item = new History($row);
            $list[] = $item;
        }
        $connection = null;
        return $list;
    }

}
