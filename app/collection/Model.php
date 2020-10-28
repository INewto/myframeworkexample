<?php

class ModelCollection extends Model
{ 
    public function getCollection()
    {
        $s = "SELECT `id`, `exhibit` from `collection` ORDER by RAND()";
        $r = Dbase::getQueryResult($s);
        
        return $r;
    }
    
    public function getExhibitData()
    {
        $id = (int)$_GET['id'];
        
        $s = "SELECT `id` from `collection` WHERE `id`='{$id}'";
        $r = Dbase::getRecordBySql($s);
        
        if(!$r) Errors::notFound();
        
        $s = "SELECT * from `collection` WHERE `id`='{$id}'";
        $r = Dbase::getQueryResult($s);
        
        return $r[0];
    }
    
    public function getAdder()
    {
        $id = (int)$_GET['id'];
        
        $s     = "SELECT `name` from `collection` WHERE `id`='{$id}'";
        $adder = Dbase::getRecordBySql($s);
        
        if(!$adder) return "Мама Грамма";
        return $adder;
    }
}