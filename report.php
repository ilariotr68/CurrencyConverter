<?php 

require("../models/Customer.php");
$customer = new Customer();

require("../models/CurrencyConverter.php");
$CurrencyConverter = new CurrencyConverter();

//TODO print formatted report

$id_customer = $_GET["id"];

foreach ($customer->getTransactions() as $transaction) {
	if ($id_customer == $transaction[0]) {
	    echo $transaction[0]." ".$transaction[1]." ".$transaction[2]." ";
	    $fromCurrency = rand(1, 3);
	    switch ($fromCurrency) {
	    	case 1: $trCurrency = "eur"; break;
	    	case 2: $trCurrency = "usd"; break;
	    	case 3: $trCurrency = "gbp"; break;
	    }
	    $amount = substr($transaction[2], 1);
	    $valueConverted = $CurrencyConverter->convert($trCurrency, $amount);
	    echo " to € ".$valueConverted;
	    echo "<br />";
	}
}
