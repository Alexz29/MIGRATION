<?php

namespace adapters\sqlite;
class Driver
{

    public $connection;

    public function __construct(){
        $this->connection = sqlite_open('combadd.sqlite');
    }

    public function __destruct(){
        sqlite_close($this->connection);
    }

    /**
     * @param $string
     * @return bool|\mysqli_result
     */
    public function exec($string){
        if(!sqlite_exec($this->connection, $string)){
            var_dump($string);
            var_dump(sqlite_error_string($this->connection));
            return false;
        }else{
            return true;
        }

    }




    public function createTable($tableName, $fields)
    {
        $foreignKey=[];

        $query = "CREATE TABLE " . $tableName ;

        var_dump($fields);
        exit;

//        foreach ($fields as $key => $value) {
//            var_dump($)
//
//        }

//        return $query.implode(",",$foreignKey).")";
    }

    public function dropTable($tableName)
    {
        $query = "DROP TABLE " . $tableName ;
        return $query;
    }

}

