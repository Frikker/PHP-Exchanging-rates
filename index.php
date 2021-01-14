<?php 
include 'Classes/RealConvertor.php';
$date = $_GET['date'];
if($date = NAN){
    $convertor = new RealConvertor(date("m-d-Y"));
}else{
    $convertor = new RealConvertor($date);
}
$amount = $_GET['amount'];
$from = $_GET['from'];
$to = $_GET['to'];?>
<form action="index.php">
    <input type="text" name="amount">
    <select name="from" id="from">
        <?php foreach ($convertor->getCurrencies() as $currency => $value): ?> 
            <option value="<?=$currency?>"><?=$currency?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">=</button>
    
    <select name="to" id="from">
        <?php foreach ($convertor->getCurrencies() as $currency => $value): ?> 
            <option value="<?=$currency?>"><?=$currency?></option>
        <?php endforeach; ?>
    </select>
</form>
<?php 
echo ("$amount $from = " . $convertor->convert($from, $to, $amount) . " $to");
if ($date == null) {
    echo "\nCurrent exchange rate: \n \t USD to: \n";
} else {
    echo "\nExchange rate on date $date: \n \t USD to: \n";
}
foreach ($convertor->getCurrencies() as $currency => $value) {
    echo $currency . ' = ' . $value . ";\n";
};