<?php

class ViewCollection extends View
{
    public function __construct($model, $controller)
    {
        $this->model = $model;
        $this->controller = $controller;
        
        $this->controller_tpl_dir = __DIR__.'/templates';
        
        if(isset($_GET['id']))
        {
            $this->template = TEMPLATES_PATH.'/exhibit.tpl.php';
        }
        else
        {
            $this->template = TEMPLATES_PATH.'/collection.tpl.php';
        }
    }
    
    public function makeContent($data, $tpl)
    {        
        if(sizeof($data) == 0 || !$data){ return $_SESSION['config']['empty_data']; }
        
        ob_start();
        if($tpl == 'exhibit_div.tpl.php')
        {
            $bgcolors = ['#eff3f7', '#ffe8bf', '#ffbfbf', '#d5ffd8', '#f2e1ff', '#e1e5ff', '#fcffd5', '#cfffe6'];
            ob_start();
            foreach($data as $info)
            {
                $key             = array_rand($bgcolors);
                $info['bgcolor'] = $bgcolors[$key];
                $info['exhibit'] = mb_strtolower($info['exhibit'], 'utf-8');
                
                print $this->plugTemplate($this->controller_tpl_dir.'/'.$tpl, $info);
            }
            $collection = ob_get_clean();
            
            print $this->plugTemplate($this->controller_tpl_dir.'/collection.tpl.php', ['collection'=>$collection]);
        }
        else
        {
			$data['exhibit'] = mb_ucfirst($data['exhibit']);
			$data['live']    = mb_ucfirst($data['live']);
			
			$comment = false;
            if ($data['comment']) {
                $data['comment'] = $this->plugTemplate($this->controller_tpl_dir.'/comment.tpl.php', $data);
            }
			
            $meaning = false;
            if ($data['meaning']) {
                $data['meaning'] = $this->plugTemplate($this->controller_tpl_dir.'/meaning.tpl.php', $data);
            }
            
            $other_meaning = false;
            if ($data['other_meaning']) {
                $data['other_meaning'] = $this->plugTemplate($this->controller_tpl_dir.'/other_meaning.tpl.php', $data);
            }
            print $this->plugTemplate($this->controller_tpl_dir.'/'.$tpl, $data);
        }
        return ob_get_clean();
    }
    
    
    public function drawContent($data)
    {
        print $this->plugTemplate($this->template, $data);
    }
}