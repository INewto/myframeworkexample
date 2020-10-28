<?php

class Errors
{
    public static function noIndexPage()
    {
        die(Config::getConfig()['error_no_index_section']);
    }
    
    public static function notFound()
    {
        $template = Config::getConfig()['error_404_template'];
        require($template);//<-- $content
        
        header("HTTP/1.0 404 Not Found");
        die($content);
    }
    
    public static function formDataRequired(){
        return Config::getConfig()['error_form_data_required'];
    }
}
