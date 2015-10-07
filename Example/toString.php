<?php
// Déclaration d'une classe simple
class ClasseTest
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString()
    {
        return $this->foo;
    }
}

$class = new ClasseTest('Bonjour');
echo $class;
?>
