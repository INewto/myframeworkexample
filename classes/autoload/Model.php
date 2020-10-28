<?php

abstract class Model
{
    public function getMeta()
    {
        $sid = SECTION_ID;
        
        $s = "SELECT `title` from `sections` WHERE `id`='{$sid}'";
        return Dbase::getQueryResult($s)[0];
    }
}