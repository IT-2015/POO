
<?php
class SubObject 
{
  static $instances = 0;
  public $instance;

  public function __construct() {
    $this->instance = ++self::$instances;
  }

  public function __clone() {
    $this->instance = ++self::$instances;
  }
}

class MyCloneable 
{
  public $objet1;
  public $objet2;

  function __clone() 
  {    
    // Force la copie de this->object, sinon
    // il pointera vers le même objet.
    $this->object1 = clone $this->object1;
  }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Objet original :\n");
print_r($obj);

print("Objet cloné :\n");
print_r($obj2);

?>
