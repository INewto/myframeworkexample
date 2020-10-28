<?php

class ControllerCollection extends Controller
{
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view  = $view;
    }
    
    public function actionDefault()
    {   
        $meta = $this->model->getMeta();
        
        if(isset($_GET['id'])) 
        {
            $data = $this->model->getExhibitData();
            $data['adder'] = $this->model->getAdder();
            $data['title'] = $meta['title'].' — '.$data['live'];
            
            $content = $this->view->makeContent($data, 'exhibit_page.tpl.php');
			
			$data['content'] = $content;
            
            $this->view->drawContent($data);
        } 
        else 
        {
            $data = $this->model->getCollection();
            $content = $this->view->makeContent($data, 'exhibit_div.tpl.php');
            
            $this->view->drawContent(['content' => $content, 'title' => $meta['title']]);
        }
    }
}