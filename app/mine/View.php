<?php

class ViewMine extends View
{
    public function __construct($model, $controller)
    {
        $this->model = $model;
        $this->controller = $controller;
    }
    
    public function makeContent($data = false, $tpl = false)
    {        
		return $this->plugTemplate(TEMPLATES_PATH.'/'.TEMPLATE, $data);
    }
    
    public function drawContent($content)
    {	
		print $content;
    }
}