<?php
namespace lib;

class Migration  extends SchemaBuilder implements MigrationInterface{

    /**
     * @var object db driver;
     */
    public static $driver;

    use SchemaBuilderTrait;

    public function __construct($driverClass='adapters\mysql\Driver'){
        self::$driver = new $driverClass();
    }

    function convert($type, $length, $decimals){
        parent::convert($type, $length, $decimals);
    }

    public function up(){

    }

    public function down(){
    }

    public function safeUp(){

    }

    public function safeDown()
    {

    }

    /**
     * Метод создания таблиц, использует адаптер
     * синтаксис запроса генерируется в зависимости от того к какой бд мы сейчас подключены
     *
     * @param string $tableName имя таблицы
     * @param array $fields массив полей с типами
     *
     * например:
     *
     * $this->createTable('test',[
     *      'id'->$this->pk(),
     *      'name'->$this->text(),
     *      'count'->$this->integer(),
     *      'timestamp'->$this->timestamp()
     * ])
     */
    public function createTable(string $tableName, array $fields)
    {

        foreach ($fields as $key=>$schema){
            $schema->setColumnName($key);
        }
        exit;

        var_dump(self::$driver->createTable($tableName, $fields));

        return self::$driver->exec(
            self::$driver->createTable($tableName, $fields)
        );
    }

    /**
     * Метод для удалени таблицы из базы по имени
     *
     * @param string $tableName название таблицы в бд
     */
    public function dropTable(string $tableName)
    {

        var_dump(self::$driver->dropTable($tableName));

        return self::$driver->exec(
            self::$driver->dropTable($tableName)
        );
    }

    /**
     * Метод для добавление колонки к таблице
     *
     * @param string $tableName название таблицы
     * @param string $fieldName название колонки
     * @param Migration $fieldType тип котонки из схемы
     */
    public function addColumn(string $tableName, string $fieldName, Migration $fieldType)
    {

        var_dump(self::$driver->addColumn($tableName, $fieldName, $fieldType));

        return self::$driver->exec(
            self::$driver->addColumn($tableName, $fieldName, $fieldType)
        );
    }

    /**
     * Метод для удаления колонки из таблицы
     *
     * @param string $tableName
     * @param string $fieldName
     */
    public function dropColumn(string $tableName, string $fieldName)
    {

        var_dump(self::$driver->dropColumn($tableName, $fieldName));

        return self::$driver->exec(
            self::$driver->dropColumn($tableName, $fieldName)
        );
    }


}