<?php
require_once __DIR__ . '/../src/Autoloader.php';
use lib\Migration;

class m170927_162100_create_test_table extends Migration {

    public function up(){

        $this->createTable('test',[
            'id'=>$this->int(12)->addForeignKey('test2', 'test3'),
            'test'=>$this->tinyint(32),
            'test2'=>$this->timestamp()->addForeignKey('tbl', 'tbl_id'),
        ]);

    }

    public function down(){

    }
}


$n=new m170927_162100_create_test_table();
$n->up();