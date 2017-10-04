<?php

namespace adapters\mysql;
use lib\SchemaBuilder;

class Schema extends SchemaBuilder
{
    /**
     * @var array data type of this db
     */
    public $types=[
        'int'=>'INT',
        'tinyint'=>'TINYINT',
        'smallint'=>'SMALLINT',
        'mediumint'=>'MEDIUMINT',
        'bigint'=>'BIGINT',
        'float'=>'FLOAT',
        'double'=>'DOUBLE',
        'decimal'=>'DECIMAL',
        'date'=>'DATE',
        'datetime'=>'DATETIME',
        'timestamp'=>'TIMESTAMP',
        'time'=>'TIME',
        'year'=>'YEAR',
        'char'=>'CHAR',
        'varchar'=>'VARCHAR',
        'text'=>'TEXT',
        'tinytext'=>'TINYTEXT',
        'mediumtext'=>'MEDIUMTEXT',
        'longtext'=>'LONGTEXT',
        'enum'=>'ENUM',
    ];

    /**
     * @var boolean column NULL
     */
    public $null;

    /**
     * @var boolean column NOT NULL
     */
    public $notNull;

    /**
     * @var null | string default value of column
     */
    public $default;

    /**
     * @var string comment for column
     */
    public $comment;

    /**
     * @var integer length of column
     */
    public $length;

    /**
     * @var
     */
    public $decline;

    /**
     * @var string this column name
     */
    public  $columnName;


    public $foreignKey;


    public function convert($type, $length=null, $decline=null) : Schema{
        $instance = new Schema();
        $instance->types=$this->types[$type];
        $instance->length=$length;
        $instance->decline = $decline;
        return $instance;
    }

    public function setColumnName($columnName){
        $this->columnName=$columnName;
    }

    public function null(){
        $this->null='NULL';
        return $this;
    }

    public function notNull(){
        $this->null='NOT NULL';
        return $this;
    }

    public function default(string  $value=null){
        $this->default=$value;
        return $this;
    }

    public function addForeignKey($tableName, $indexColumnName){

        var_dump($this);
        exit;
        $this->foreignKey="FOREIGN KEY (".$this->columnName.") REFERENCES $tableName($indexColumnName) ";
        return $this;
    }
}