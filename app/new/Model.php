<?php

class ModelNew extends Model
{
    public function addSuggestion()
    {
        foreach ($_POST as $key => $val) {
            $$key = userpost($val);
        }
                    
        $s = "INSERT into `suggestions` SET `exhibit`='{$exhibit}', `live`='{$live}', `comment`='{$comment}', `name`='{$name}', `email`='{$email}'";
        Dbase::dbQuery($s);
    }
}