<?php
    namespace App;

    class Environment {
        public function __construct() {
          $dotenv = \Dotenv::create(__DIR__ . "/../");
            $dotenv->load();
        }
    }
