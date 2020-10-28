<?php

class Router
{    
    public static function route()
    {
        if(($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false)
        {
            $route = substr($_SERVER['REQUEST_URI'], 0, $pos);
        }

        if(!isset($route)) $route = $_SERVER['REQUEST_URI'];
        $route = explode('/', $route);
        
        array_shift($route);
        
        $route = array_filter($route, function($arr){ if(!empty($arr)) return true; });
        
        return $route;
    }    
    
    public static function getSection($parent = 0, $counter = 0)
    {
        $route = self::route();
                
        $url = $route[$counter];
        $s = "SELECT `id`, `url`, `parent` from `sections` WHERE `url`='{$url}' AND `parent`='{$parent}'";
        $r = Dbase :: getQueryResult($s);
		
		if(!$r) Errors::notFound();
            
        $section_id = $r[0]['id'];
        
        if(empty($section_id)) return false;
                        
        $counter++;
                        
        if($counter == sizeof($route))
        {
            return $section_id;
        }
        else
        {
            return self::getSection($section_id, $counter);
        }
    }
    
	function getSectionInfo($section_id)
	{
		$s = "
            SELECT 
                `modules`.`controller`,
                `templates`.`file`,
                `sections`.*  
            from 
                `sections` 
            LEFT JOIN 
                `templates` 
            ON 
                `sections`.`template`=`templates`.`id`
            LEFT JOIN 
                `modules`
            ON
                `sections`.`module`=`modules`.`id`
            WHERE 
                `sections`.`id`='{$section_id}'
        ";
	    $r = Dbase::getQueryResult($s);

		return $r[0];
	}
}