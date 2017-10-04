<?php

namespace adapters\mysql;
class Driver
{

    public $connection;

    public function __construct(){

        $this->connection = mysqli_connect('localhost', 'root', 'annushka000');

        if (!$this->connection) {
            die('Ошибка соединения: ' . mysqli_error());
        }

        mysqli_select_db($this->connection, 'test');
    }

    public function __destruct(){
        mysqli_close($this->connection);
    }

    /**
     * @param $string
     * @return bool|\mysqli_result
     */
    public function exec($string){
        if(!mysqli_query($this->connection, $string)){
            var_dump(mysqli_error($this->connection));
            return false;
        }else{
            return true;
        }
    }



    public static function fieldsBuilder(array $fields):string {

        $length='';
        $foreignKey=[];
        $_fields=[];

        foreach ($fields as $field){

            if($field->length){
                $length="($field->length)";
            }

            if($field->foreignKey){
                $foreignKey[]=$field->foreignKey;
            }

            $_fields[]=$field->columnName." ".$field->types.$length;
        }

         return "(".implode(",",$_fields).", ".implode(",",$foreignKey).")";
    }

    /**
     * @param $tableName
     * @param $fields
     * @return string
     */
    public function createTable(string $tableName, array $fields):string
    {
        $secondPartQuery = self::fieldsBuilder($fields);

        return "CREATE TABLE " . $tableName .$secondPartQuery;
    }

    public function dropTable($tableName)
    {
        $query = "DROP TABLE " . $tableName ;
        return $query;
    }

}

