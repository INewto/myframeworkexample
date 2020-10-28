<?php

class PlugController extends Router
{
    private $route;
    
    public function __construct()
    {
        $this->route = $this->route();
    }
    
    public function plug()
    {
        if(sizeof($this->route) == 0)
        {         
            $section_id   = Config::getConfig()['index_section_id'];
            $section_info = $this->getSectionInfo($section_id);
			$template     = $section_info['file'];
			$controller   = $section_info['controller'];

            if(!$section_id) {
                Errors::noIndexPage();
            }
        }
        else
        { 
            $section_id   = $this->getSection();
            $section_info = $this->getSectionInfo($section_id);
			$template     = $section_info['file'];
			$controller   = $section_info['controller'];
        }
                
        if(!file_exists(CONTROLLERS_PATH."/{$controller}/Controller.php"))
        {
				Errors::notFound();
        }

        define("SECTION_ID", $section_id);
        define("CONTROLLER", $controller);
        define("TEMPLATE",   $template);

        require_once(CONTROLLERS_PATH."/{$controller}/Controller.php");
        require_once(CONTROLLERS_PATH."/{$controller}/Model.php");
        require_once(CONTROLLERS_PATH."/{$controller}/View.php");

        $controller_name = 'Controller'.ucfirst($controller);
        $model_name      = 'Model'.ucfirst($controller);
        $view_name       = 'View'.ucfirst($controller);

        $model      = new $model_name;
        $view       = new $view_name($model, $controller);
        $controller = new $controller_name($model, $view);

        return $controller->actionDefault();
    }   
}