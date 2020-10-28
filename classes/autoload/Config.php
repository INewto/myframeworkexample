<?php

/*
 * конфигурационные значения, которые могут подвергаться изменению (в отличии от констант в conf.php)
 */

class Config
{
    private static $config = false;
   
    private static function setConfig()
    {
        if(!self::$config)
        {
            self::$config = [
                                "index_section_id"   => 4,
                                "error_404_template" => TEMPLATES_PATH."/404.tpl.php",
                                //"controller_tpl_dir" => self::getControllerTemplates(CONTROLLER),
                                "error_no_index_section" => "no index section found",
                                "error_empty_data" => "empty data",
                                "error_form_data_required" => "Нужно заполнить все, что нужно :)"
                                
            ];
       
            foreach(self::$config as $option => $value)
            {
                $_SESSION['config'][$option] = $value;
            }
        }
       
        return self::$config;
    }
   
   public static function getConfig()
   {
       self::setConfig();
       return $_SESSION['config'];
   }
   
   public static function getControllerTemplates($controller)
   {
       return CONTROLLERS_PATH."/{$controller}/templates";
   }
}
