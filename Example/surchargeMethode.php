<?php
class MethodTest
{
    public function __call($name, $arguments)
    {
        // Note : la valeur de $name est sensible à la casse.
        echo "Appel de la méthode '$name' "
             . implode(', ', $arguments). "\n";
    }

    /**  Depuis PHP 5.3.0  */
    public static function __callStatic($name, $arguments)
    {
        // Note : la valeur de $name est sensible à la casse.
        echo "Appel de la méthode statique '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('dans un contexte objet');

MethodTest::runTest('dans un contexte static');  // Depuis PHP 5.3.0
?>
