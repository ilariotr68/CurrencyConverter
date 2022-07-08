<?php

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{
    
    public function convert($from, $amount)
    {
        $url = "http://www.floatrates.com/daily/eur.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $arr_result = json_decode($response);
        $val_usd = $arr_result->usd->inverseRate;
        $val_gbp = $arr_result->gbp->inverseRate;
        switch ($from) {
            case 'eur': $converted = $amount; break;
            case 'gbp': $converted = $amount * $val_gbp; break;
            case 'usd': $converted = $amount * $val_usd; break;
        }
        return round($converted, 2);
    }
}