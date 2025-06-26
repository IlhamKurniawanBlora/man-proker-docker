<?php
namespace core;

use config\Database;

class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::connect();
    }
}
