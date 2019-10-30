<?php


namespace Http;


abstract class HttpAbstracts
{
    protected function redirect(string $url)
    {
        header('Location: '.$url);
        exit;
    }
}