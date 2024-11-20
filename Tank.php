<?php

#TODO - use autoloading system, namespaces, and 'use' instead of includes 
include_once("StringGenerator.php");
include_once("Player.php");

class A extends Player
{
    public function __construct()
    {
        parent::__construct("A", 80, 60, 100, 10);
    }
}