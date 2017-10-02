<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 02.10.17
 * Time: 2:51
 */

namespace AppBundle\Service;

class UrlService
{
    /**
     * @param $url
     * @return bool
     *
     * validation of original url
     */
    public function urlValidation($url)
    {
//        if (filter_var($url, FILTER_VALIDATE_URL)) {
//            $urlvalid = "URL is valid";
//        }
//        else {
//            $urlvalid = "URL is invalid";
//        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); // we follow redirections
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpcode == "200") {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}