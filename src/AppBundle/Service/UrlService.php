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
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
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

    /**
     * generate new url
     */
    public function generateShortUrl()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pass = array();
        $charsLength = strlen($chars) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $charsLength);
            $pass[] = $chars[$n];
        }

//        $shortUrl = 'http://url_shorter.local/' . implode($pass);
        $shortUrl = implode($pass);

        return $shortUrl;
    }

//    public function saveUrl($webModel)
//    {
//
//        $em = $this->getDoctrine()->getMahager;
//        $url = new Url();
//
//        $url->setOriginalUrl("www.google.com");
//        $url->setShortUrl("mysite.local/abcdef");
//        $url->setNumberOfUsage(0);
//
//        $em->persist($url);
//
//        $em->flush();
//
//        return $this->render('test.html.twig');
//    }
}