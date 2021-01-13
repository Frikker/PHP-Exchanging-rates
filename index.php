
<?php
include 'Classes/RealConvertor.php';
if ($argv[4] == '') {
    $convertor = new RealConvertor(date('m-d-Y'));
} else {
    $convertor = new RealConvertor($argv[4]);
}
if ($argv[4] == null) {
    echo "\nCurrent exchange rate: \n \t USD to: \n";
} else {
    echo "\nExchange rate on date ${argv[4]}: \n \t USD to: \n";
}
foreach ($convertor->getCurrencies() as $currency => $value) {
    echo $currency . ' = ' . $value . "\n";
};
echo "\n\n";
echo ("$argv[3] $argv[1] = " . $convertor->convert($argv[1], $argv[2], $argv[3]) . " $argv[2]");
