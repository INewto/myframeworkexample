<?php

class Headers
{
    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
    }
    
    public static function redirect($url, $code=301)
    {
        header("Location: {$url}", TRUE, $code);
    }
}


