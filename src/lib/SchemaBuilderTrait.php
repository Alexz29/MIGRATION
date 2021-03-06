<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace lib;

/**
 * Class SchemaBuilderTrait
 * @package lib
 */
trait SchemaBuilderTrait {

    /**
     *  INT − A normal-sized integer that can be signed or unsigned.
     * If signed, the allowable range is from -2147483648 to 2147483647.
     * If unsigned, the allowable range is from 0 to 4294967295.
     * You can specify a width of up to 11 digits.
     *
     * @param null $length
     */
    public function int($length = null){
        return $this->getSchema(SchemaBuilder::INT, $length);
    }

    /**
     * TINYINT − A very small integer that can be signed or unsigned.
     * If signed, the allowable range is from -128 to 127.
     * If unsigned, the allowable range is from 0 to 255.
     * You can specify a width of up to 4 digits.
     *
     * @param null $length
     */
    public function tinyint($length = null){
        return $this->getSchema(SchemaBuilder::TINYINT, $length);
    }

    /**
     * SMALLINT − A small integer that can be signed or unsigned.
     * If signed, the allowable range is from -32768 to 32767.
     * If unsigned, the allowable range is from 0 to 65535.
     * You can specify a width of up to 5 digits.
     *
     * @param null $length
     */
    public function smallint($length = null){
        return $this->getSchema(SchemaBuilder::SMALLINT, $length);
    }

    /**
     * MEDIUMINT − A medium-sized integer that can be signed or unsigned.
     * If signed, the allowable range is from -8388608 to 8388607.
     * If unsigned, the allowable range is from 0 to 16777215.
     * You can specify a width of up to 9 digits.
     *
     * @param null $length
     */
    public function mediumint($length = null){
        return $this->getSchema(SchemaBuilder::MEDIUMINT, $length);
    }

    /**
     * BIGINT − A large integer that can be signed or unsigned.
     * If signed, the allowable range is from -9223372036854775808 to 9223372036854775807.
     * If unsigned, the allowable range is from 0 to 18446744073709551615.
     * You can specify a width of up to 20 digits.
     *
     * @param null $length
     */
    public function bigint($length = null){
        return $this->getSchema(SchemaBuilder::BIGINT, $length);
    }

    /**
     * * FLOAT(M,D) − A floating-point number that cannot be unsigned.
     * You can define the display length (M) and the number of decimals (D).
     * This is not required and will default to 10,2, where 2 is the number of decimals
     * and 10 is the total number of digits (including decimals).
     * Decimal precision can go to 24 places for a FLOAT.
     *
     * @param null $length
     * @param null $decimals
     */
    public function float($length=null, $decimals = null){
        return $this->getSchema(SchemaBuilder::FLOAT, $length, $decimals);
    }

    /**
     * DOUBLE(M,D) − A double precision floating-point number that cannot be unsigned.
     * You can define the display length (M) and the number of decimals (D).
     * This is not required and will default to 16,4, where 4 is the number of decimals.
     * Decimal precision can go to 53 places for a DOUBLE. REAL is a synonym for DOUBLE.
     *
     * @param null $length
     * @param null $decimals
     */
    public function double($length=null , $decimals=null){
        return $this->getSchema(SchemaBuilder::DOUBLE, $length, $decimals);
    }

    /**
     * DECIMAL(M,D) − An unpacked floating-point number that cannot be unsigned.
     * In the unpacked decimals, each decimal corresponds to one byte.
     * Defining the display length (M) and the number of decimals (D) is required.
     * NUMERIC is a synonym for DECIMAL.
     *
     * @param null $length
     * @param null $decimals
     */
    public function decimal($length = null, $decimals = null){
        return $this->getSchema(SchemaBuilder::DECIMAL, $length, $decimals);
    }

    /**
     * DATE − A date in YYYY-MM-DD format, between 1000-01-01 and 9999-12-31.
     * For example, December 30th, 1973 would be stored as 1973-12-30.
     *
     * @param null $precision
     */
    public function date($precision = null){
        return $this->getSchema(SchemaBuilder::DATE, $precision);
    }

    /**
     * DATETIME − A date and time combination in YYYY-MM-DD HH:MM:SS format,
     * between 1000-01-01 00:00:00 and 9999-12-31 23:59:59.
     * For example, 3:30 in the afternoon on December 30th, 1973 would be stored as 1973-12-30 15:30:00.
     *
     * @param null $precision
     */
    public function datetime($precision = null){
        return $this->getSchema(SchemaBuilder::DATETIME, $precision);
    }

    /**
     * TIMESTAMP − A timestamp between midnight, January 1st, 1970 and sometime in 2037.
     * This looks like the previous DATETIME format, only without the hyphens between numbers;
     * 3:30 in the afternoon on December 30th, 1973 would be stored as 19731230153000 ( YYYYMMDDHHMMSS ).
     *
     * @param null $precision
     */
    public function timestamp($precision = null){
        return $this->getSchema(SchemaBuilder::TIMESTAMP, $precision);
    }

    /**
     * TIME − Stores the time in a HH:MM:SS format.
     *
     * @param null $precision
     */
    public function time($precision = null){
        return $this->getSchema(SchemaBuilder::TIME, $precision);
    }

    /**
     * YEAR(M) − Stores a year in a 2-digit or a 4-digit format.
     * If the length is specified as 2 (for example YEAR(2)),
     * YEAR can be between 1970 to 2069 (70 to 69).
     * If the length is specified as 4, then YEAR can be 1901 to 2155. The default length is 4.
     *
     * @param null $precision
     */
    public function year($precision = null){
        return $this->getSchema(SchemaBuilder::YEAR, $precision);
    }

    /**
     * CHAR(M) − A fixed-length string between 1 and 255 characters in length (for example CHAR(5)),
     * right-padded with spaces to the specified length when stored.
     * Defining a length is not required, but the default is 1.
     *
     * @param null $length
     */
    public function char($length = null){
        return $this->getSchema(SchemaBuilder::CHAR, $length);
    }

    /**
     * VARCHAR(M) − A variable-length string between 1 and 255 characters in length.
     * For example, VARCHAR(25). You must define a length when creating a VARCHAR field.
     *
     * @param null $length
     */
    public function varchar($length = null){
        return $this->getSchema(SchemaBuilder::VARCHAR, $length);
    }

    /**
     * BLOB or TEXT − A field with a maximum length of 65535 characters.
     * BLOBs are "Binary Large Objects" and are used to store large amounts of binary data,
     * such as images or other types of files.
     * Fields defined as TEXT also hold large amounts of data.
     * The difference between the two is that the sorts and comparisons on the stored
     * data are case sensitive on BLOBs and are not case sensitive in TEXT fields.
     * You do not specify a length with BLOB or TEXT.
     *
     * @param null $length
     */
    public function text($length = null){
        return $this->getSchema(SchemaBuilder::TEXT, $length);
    }

    /**
     * TINYBLOB or TINYTEXT − A BLOB or TEXT column with a maximum length of 255 characters.
     * You do not specify a length with TINYBLOB or TINYTEXT.
     *
     * @param null $length
     */
    public function tinytext($length = null){
        return $this->getSchema(SchemaBuilder::TINYTEXT, $length);
    }

    /**
     * MEDIUMBLOB or MEDIUMTEXT − A BLOB or TEXT column with a maximum length of 16777215 characters.
     * You do not specify a length with MEDIUMBLOB or MEDIUMTEXT.
     *
     * @param null $length
     */
    public function mediumtext($length = null){
        return $this->getSchema(SchemaBuilder::MEDIUMTEXT, $length);
    }

    /**
     * LONGBLOB or LONGTEXT − A BLOB or TEXT column with a maximum length of 4294967295 characters.
     * You do not specify a length with LONGBLOB or LONGTEXT.
     *
     * @param null $length
     */
    public function longtext($length = null){
        return $this->getSchema(SchemaBuilder::LONGTEXT, $length);
    }

    /**
     * NUM − An enumeration, which is a fancy term for list.
     * When defining an ENUM, you are creating a list of items from which the value
     * must be selected (or it can be NULL). For example,
     * if you wanted your field to contain "A" or "B" or "C",
     * you would define your ENUM as ENUM ('A', 'B', 'C')
     * and only those values (or NULL) could ever populate that field.
     */
    public function enum(){
        return $this->getSchema(SchemaBuilder::ENUM);
    }

}