<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */
namespace src;
/**
 * Class Autoloader
 */
class Autoloader
{
    /**
     * @param $class
     * @throws \Exception
     */
    public static  function load($class){
        $class = str_replace('\\','/', $class);
        require __DIR__.'/'.$class . '.php';
    }
}
spl_autoload_register('src\Autoloader::load');