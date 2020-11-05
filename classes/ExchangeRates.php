<?php

class ExchangeRates {

    public static function getData() {
        $json = file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json");
        $data = json_decode($json, true);
        return $data;
    }

    public static function getCurrencies() {        
        $data = self::getData();
        $currencies = [];
        if (!is_null($data)) {
            foreach ($data as $v) {
                $currencies[$v['cc']] = $v['cc'] . " " . $v['txt'];
            }
        }
        return $currencies;
    }

    public static function getExchangeRates() {
        $data = self::getData();
        $exchangeRates = [];
        if (!is_null($data)) {
            foreach ($data as $v) {
                $exchangeRates[$v['cc']] = $v['rate'];
            }
        }
        return $exchangeRates;
    }

}
