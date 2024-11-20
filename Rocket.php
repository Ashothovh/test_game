<?php

#TODO - use autoloading system, namespaces, and 'use' instead of includes 
include_once("StringGenerator.php");
include_once("Player.php");

class C extends Player
{
    public function __construct()
    {
        parent::__construct("C", 90, 40, 90, 20);
    }
}