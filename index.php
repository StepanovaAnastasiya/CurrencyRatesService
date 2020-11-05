<?php
ini_set( "display_errors", true );

require( "config.php" );
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
    case 'history':
        viewHistory();
        break;
    case 'settings':
        viewSettings();
        break;
    default:
        viewExchange();
}

function viewExchange() {
    $currencies = ExchangeRates::getCurrencies();
    if(isset($_SESSION['settingsCurrencies'])){
        $allCurrencies = ExchangeRates::getCurrencies();
        $currencies = [];
        foreach ($_SESSION['settingsCurrencies'] as $key => $value) {
            if ($key == 'submit') {
                continue;
            }
            $currencies[$key] = $allCurrencies [$key];
        }
    }
    if (isset($_POST['submit'])) {
        $exchangeRates = ExchangeRates::getExchangeRates();
        $exchangeRates['UAH'] = 1;
        $results = [];
        $results['amount'] = (float) htmlspecialchars($_POST['amount']);
        $results['fromCurrency'] = htmlspecialchars($_POST['fromCurrency']);
        $results['toCurrency'] = htmlspecialchars($_POST['toCurrency']);
        $results['date'] = date("Y-m-d", time());
        $results['datetime'] = time();
        $fromCurrencyRate = $exchangeRates[$results['fromCurrency']];
        $toCurrencyRate = $exchangeRates[$results['toCurrency']];

        function getResult($amount, $fromCurrencyRate, $toCurrencyRate) {
            return $amount * $fromCurrencyRate / $toCurrencyRate;
        }

        $results['result'] = getResult($results['amount'], $fromCurrencyRate, $toCurrencyRate);
        $historyData = new History($results);
        $historyData->saveResults();
    }
    require( "templates/exchangeView.php" );
}

function viewHistory() {
    $historyItems = History::getList();
    require( "templates/historyView.php" );
}

function viewSettings() {
    $currencies = ExchangeRates::getCurrencies();    
     if (isset($_POST['submit'])) {       
     $_SESSION['settingsCurrencies'] = $_POST;    
    }    
    
    require( "templates/settingsView.php" );
}
