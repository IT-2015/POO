<?php
class MyDestructableClass {
    function __construct() {
        print "In constructor\n";
        $this->name = "MyDestructableClass";
    }

    function __destruct() {
        print "Destruction de " . $this->name . "\n";
    }
}

$obj = new MyDestructableClass();
?>
