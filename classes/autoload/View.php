<?php

abstract class View
{
    abstract function makeContent($data, $tpl);
    abstract function drawContent($content);
    
    public function plugTemplate($tpl_file, array $variables = [], $type = 1)
	{
        foreach ($variables as $variable => $val) {
            $$variable = $val;
        }
        
        require($tpl_file); // <-- $content here
        
        return $content;
    }
}