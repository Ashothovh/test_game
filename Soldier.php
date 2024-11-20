<?php

#TODO - use autoloading system, namespaces, and 'use' instead of includes 
include_once("StringGenerator.php");
include_once("Player.php");

class B extends Player
{
    public function __construct()
    {
        parent::__construct("B", 70, 50, 120, 15);
    }
}