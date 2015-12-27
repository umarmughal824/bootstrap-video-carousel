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
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST ,"GET");
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    //ob_start();
    //return curl_exec ($ch);
    //ob_end_clean();
    //curl_close ($ch);





    /*$ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    //curl_setopt($ch, CURLOPT_URL, $site);
    //for https websites



    curl_setopt($ch, CURLOPT_URL, $site);
    *///if($referer != "") {
    //curl_setopt($ch, CURLOPT_REFERER, $referer);
    //}
    //curl_setopt($ch, CURLOPT_USERAGENT, $agent);

    //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    //curl_setopt($ch, CURLOPT_VERBOSE, true);
    //curl_setopt($ch,CURLOPT_COOKIE, "cookie.txt");
    //curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    //if ($method == 'POST') {
    //    curl_setopt($ch, CURLOPT_POST, 1);
    //    curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    //}
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //curl_setopt($ch, CURLOPT_NOBODY, 1);
    //if (substr($site, 0, 5) == "https") {
    //curl_setopt($ch, CURLOPT_CERTINFO, true);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //curl_setopt($ch, CURLOPT_CAINFO, getcwd() .  "VeriSignClass3PublicPrimaryCertificationAuthority-G5.pem");
    //}
    //curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "/CAcerts/BuiltinObjectToken-EquifaxSecureCA.crt");




    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}

$response = grab_page('https://demo2697834.mockable.io/movies');

print_r($response);
$response = json_decode($response);
print_r($response);