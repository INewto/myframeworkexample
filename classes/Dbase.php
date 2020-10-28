<?php

class Dbase
{  
    private static $mysqli = false;

    public static function connect()
    {
        if(!self::$mysqli)
        {
            self::$mysqli = new mysqli(DBASE_HOST, DBASE_USER, DBASE_PASSWORD, DBASE_NAME); 

            if(mysqli_connect_errno())
            { 
                die("Db error: ".mysqli_connect_error()); 
            }       
        }
        
        return self::$mysqli;
    }
    
    public static function dbQuery($s)
    {
        $mysqli = self::connect();
        
        $mysqli->query($s);
        
        if($mysqli->error)
        {
            die($mysqli->error.' => '.$s);
        }
        
        return $mysqli;
    }
    
    public static function getQueryResult($s)
    {
        $mysqli = self::connect();
    
		$q = $mysqli->query($s) or die($mysqli->error);
        
        if(!$q)
        {
            die($mysqli->error.' => '.$s);
        }
        
        $result_array = [];
               
		while($r = $q->fetch_assoc())
        {
			foreach($r as $col => $val)
            {
				$r[$col] = stripslashes($val);
			}

			array_push($result_array, $r);
		}

		return $result_array;
	}
    
    public static function getRecord($s, $fields = 1)
    {
        $mysqli = self::connect();
        
        $q = $mysqli->query($s);
        
        if(!$q)
        {
            die($mysqli->error.' => '.$s);
        }       
        
        $r = $q->fetch_array();

        if($fields == 1)
        {
            return stripslashes($r[0]);
        }
        else
        {
            foreach($r as $col => $val)
            {
                $result_arr[$col] = stripslashes($val);
			}

			return $result_arr;
        }
    }
	
    public static function getRecordBySql($s, $cols = 1)
	{
		$result = self::getQueryResult($s);
        if ($cols == 1) {
           foreach($result[0] as $key => $val) { return $result[0][$key]; }
        } else {
            return $result;
        }
        
        return false;
	}
}