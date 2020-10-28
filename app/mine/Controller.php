<?php

class ControllerMine extends Controller
{
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view  = $view;
    }
    
    public function actionDefault()
    {
        $data['title'] = $this->model->getMeta()['title'];
        $content = $this->view->makeContent($data);
        
        $this->view->drawContent($content);
    }
}