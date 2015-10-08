<?php
//http://php.net/manual/fr/class.countable.php
class My_Iterator implements Countable, Iterator
{
  public  $data = array();
  private $position = 0;
  private $array = array(
    "premierelement",
    "secondelement",
    "dernierelement",
  ); 
  
  public function count() {
    return count($this->data);
  }
  
  public function __set($name, $value) {
    $this->data[$name] = $value;
  }
  
  public function __get($name) {
    if(isset($this->data[$name])) {
      return $this->data[$name];
    }
  }
  
  public function rewind() {
    var_dump(__METHOD__);
    reset($this->data);
    //$this->position = 0;
  }
  
  public function current() {
    var_dump(__METHOD__);
    return current($this->data);
    //return $this->array[$this->position];
  }
  
  public function key() {
    var_dump(__METHOD__);
    return key($this->data);
    //return $this->position;
  }
  
  public function next() {
    var_dump(__METHOD__);
    next($this->data);
    //++$this->position;
  }
  
  public function valid() {
    var_dump(__METHOD__);
    return key($this->data) !== null;
    //return isset($this->array[$this->position]);
  }
}

$my_iterator = new My_Iterator();
$my_iterator->key1 = "value_1";
$my_iterator->key2 = "value_2";
$my_iterator->key3 = "value_3";
$my_iterator->key4 = "value_4";

echo "Countable : " . count($my_iterator) . " <br>";
$i = 0;
foreach ($my_iterator as $key => $value){
  echo "Iteration : ". ++$i . " <br>";
  echo "Position : " . $key . " <br>";
  echo "Valeur : " . $value . " <br>";
}


