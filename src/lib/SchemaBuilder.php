<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace lib;

/**
 * Class SchemaBuilder
 * @package lib
 */
abstract class SchemaBuilder
{
    //default type of column
    const INT = 'int';
    const TINYINT = 'tinyint';
    const SMALLINT = 'smallint';
    const MEDIUMINT = 'mediumint';
    const BIGINT = 'bigint';
    const FLOAT = 'float';
    const DOUBLE = 'double';
    const DECIMAL = 'decimal';
    const DATE = 'date';
    const DATETIME = 'datetime';
    const TIMESTAMP = 'timestamp';
    const TIME = 'time';
    const YEAR = 'year';
    const CHAR = 'char';
    const VARCHAR = 'varchar';
    const TEXT = 'text';
    const TINYTEXT = 'tinytext';
    const MEDIUMTEXT = 'mediumtext';
    const LONGTEXT = 'longtext';
    const ENUM = 'enum';

    abstract function convert($type, $length, $decimals);

    /**
     * Function connect and check adapter Schema for db
     *
     * @param string $type type of column
     * @param null $length length of column
     * @param null $decimals
     * @param string $adapterClass path(namespace) for Schema
     *
     * @return mixed
     * @throws \Exception if method convert not exist
     */
    public static function getSchema($type, $length = null, $decimals=null, $adapterClass = 'adapters\mysql\Schema'){
        $adapterClass = new $adapterClass();
        return $adapterClass->convert($type, $length, $decimals);
    }
}