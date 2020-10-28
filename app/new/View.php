<?php

class ViewNew extends View
{
    public function __construct($model, $controller)
    {
        $this->model = $model;
        $this->controller = $controller;

        $this->controller_tpl_dir = Config::getControllerTemplates(CONTROLLER);
        $this->main_tpl = 'form.tpl.php';
    }

    public function makeContent($data = [], $tpl = 'form.tpl.php')
    {
        $tpl = $this->controller_tpl_dir.'/'.$tpl;
        return $this->plugTemplate($tpl, $data);
    }

    public function drawContent($data)
    {
        print $this->plugTemplate(TEMPLATES_PATH.'/'.TEMPLATE, $data);
    }
}