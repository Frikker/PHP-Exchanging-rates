
<?php
include 'Classes/RealConvertor.php';
$date = $_GET['date'];
if ($date == null) {
    $convertor = new RealConvertor(date('m-d-Y'));
    echo "\nCurrent exchange rate: \n \t USD to: \n";
} else {
    $convertor = new RealConvertor($date);
    echo "\nExchange rate on date $date: \n \t USD to: \n";
}
foreach ($convertor->getCurrencies() as $currency => $value) {
    echo $currency . ' = ' . $value . "\n";
};
echo "\n\n";
$amount = $_GET['amount'];
$from = $_GET['from'];
$to = $_GET['to'];
echo ("$amount $from = " . $convertor->convert($from, $to, $amount) . " $to");
