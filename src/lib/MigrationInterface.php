<?php

namespace lib;

/**
 * Interface MigrationInterface
 * @package lib
 */
interface MigrationInterface {

    /**
     * @return mixed
     */
    public function up();

    /**
     * @return mixed
     */
    public function down();

}