<?php
class Convertor
{
    protected $currencies = [
        'usd' => 74.03,
        'eur' => 89.98,
        'chf' => 83.20,
        'rub' => 1,
    ];

    public function convert($from, $to, $amount)
    {
        return round($amount * $this->currencies[$to] / $this->currencies[$from], 2);
    }

    public function getCurrencies()
    {
        return $this->currencies;
    }

    public function setCurrencies($data)
    {
        $this->currencies = $data;
    }
}
