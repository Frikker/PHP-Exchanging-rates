<?php
include 'Convertor.php';

const MAX_CURRENCIES_FILES = 1;

class RealConvertor extends Convertor
{

    public function __construct($date)
    {
        $this->loadCurrencies($date);
    }

    public function loadCurrencies($date)
    {
        $dir = '.\\currencies\\';
        $filename = $dir . $date . '.json';
        if (file_exists($filename)) {
            $currenciesJSON = file_get_contents($filename);
        } elseif ($date < date('m-d-Y')) {
            throw new ErrorException("No exchanging rate on $date.");
        } else {
            $catalog = scandir($dir);
            if (count($catalog) - 2 >= MAX_CURRENCIES_FILES) {
                $file_to_delete = $catalog[0];
                foreach ($catalog as $file) {
                    if ($file == '.' || $file == '..' || $file > $file_to_delete) continue;
                    $file_to_delete = $file;
                }
                unlink($dir . $file_to_delete);
            }
            $currenciesJSON = file_get_contents("https://api.exchangeratesapi.io/latest?base=USD");
            file_put_contents($filename, $currenciesJSON);
        }
        $this->setCurrencies(json_decode($currenciesJSON, true)['rates']);
    }
}
