<?php
/**
 * Created by PhpStorm.
 * User: umar
 * Date: 12/27/2015
 * Time: 7:16 PM
 */

function grab_page($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST ,"GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    return curl_exec ($ch);
    curl_close ($ch);
}

$response = grab_page('https://demo2697834.mockable.io/movies');

print_r($response);
$response = json_decode($response);
print_r($response);