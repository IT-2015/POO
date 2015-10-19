# [POO (Programmation Orientée Objet)](http://php.net/manual/fr/language.oop5.php)
![Nuage POO PHP](https://github.com/IT-2015/POO/blob/master/img/Nuage_POO.jpg)

Elaboré début des années 1960 et poursuivi dans les années 70.

Il consiste en la définition et l'interaction de briques logicielles appelées objets ; un objet représente un concept, une idée ou toute entité du monde physique, comme une voiture, une personne ou encore une page d'un livre.

Il possède une structure interne et un comportement, et il sait interagir avec ses pairs.

## Syntaxe de base

```php
<?php
  class SimpleClass
  {
      // déclaration d'une propriété
      public $var = 'une valeur par défaut';
  
      // déclaration des méthodes
      public function displayVar() {
          echo $this->var;
      }
  }
  
  $obj = new SimpleClass();
  
  $obj->displayVar(); // Affiche : une valeur par défaut
?>
```


## Propriétés

Les variables au sein d'une classe sont appelées "propriétés".
Elles sont définies en utilisant un des mots-clés public, protected, ou private, suivi d'une déclaration classique de variable.

Cette déclaration peut comprendre une initialisation, mais celle-ci doit être une valeur constante, c'est à dire qu'elle doit pouvoir être évaluée pendant la compilation du code, et qu'elle ne peut pas dépendre d'informations déterminées lors de l'exécution de celui-ci pour pouvoir être évaluée. 

## Héritage

  - extends
  - parent

L'héritage est un des grands principes de la programmation orientée objet, et PHP l'implémente dans son modèle objet. Ce principe va affecter la manière dont de nombreuses classes sont en relation les unes avec les autres. 

Par exemple, lorsque vous étendez une classe, la classe fille hérite de toutes les méthodes publiques et protégées de la classe parente. Tant qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine. 

## Visibilité

  - public
  - protected
  - private

La visibilité d'une propriété ou d'une méthode peut être définie en préfixant sa déclaration avec un mot-clé : public, protected, ou private. Les éléments déclarés comme publics peuvent être utilisés par n'importe quelle partie du programme. L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent, et à ses classes parentes. L'accès aux éléments privés est uniquement réservé à la classe qui les a défini. 

## Constante

  - const
  - :: (opérateur de résolution de portée)

Il est possible de définir des valeurs constantes à l'intérieur d'une classe, qui ne seront pas modifiables. Les constantes diffèrent des variables normales du fait que l'on n'utilise pas le symbole `$` pour les déclarer ou les utiliser.

La valeur doit être une expression constante, pas (par exemple) une variable, une propriété, le résultat d'une opération mathématique, ou un appel de fonction. 

*Par convention les constantes sont défini en MAJUSCULE*

> Exception : Une constante peut être déclaré dans une interface mais ne pourra pas être modifié par la classe qui l'implemente.

## Auto-chargement de classes

De nombreux développeurs qui écrivent des applications orientées objet créent un fichier source par définition de classe. 
Un des plus gros inconvénients de cette méthode est d'avoir à écrire une longue liste d'inclusions de fichier de classes au début de chaque script : une inclusion par classe.

Deux façons de mettre en place un système d'auto-chargement de classe : 
 - Vous pouvez définir une fonction `__autoload()` qui sera automatiquement appelée si vous essayez d'utiliser une classe ou interface qui n'est pas encore définie.  **(Ceci est déprécié)**
 - Vous pouvez utiliser la fonction `spl_autoload_register()` qui permet le chargement automatique de classes.

Grâce à elle, vous avez une dernière chance pour inclure une définition de classe, avant que PHP n'échoue avec une erreur.

### Exemple d'autoloader

```php
function my_autoloader($className) {
    include 'classes/' . $className . '.class.php';
}
spl_autoload_register('my_autoloader');
```

## Statique

  - static
  - :: (opérateur de résolution de portée)
  - self

Le fait de déclarer des propriétés ou des méthodes comme statiques vous permet d'y accéder sans avoir besoin d'instancier la classe. On ne peut accéder à une propriété déclarée comme statique avec l'objet instancié d'une classe (bien que ce soit possible pour une méthode statique). 

Comme les méthodes statiques peuvent être appelées sans qu'une instance d'objet n'ai été créée, la pseudo-variable `$this` n'est pas disponible dans les méthodes déclarées comme statiques. 

On ne peut pas accéder à des propriétés statiques à travers l'objet en utilisant l'opérateur `->`. 

Les propriétés statiques sont considérées comme n'importe quelle autre propriété, les propriétés statiques ne peuvent être initialisées qu'en utilisant un littéral ou une constante.



## Constructeurs et destructeurs

Se représente via les méthodes magiques `__construct` et `__destruct`.

### Constructeur 

`void __construct ([ mixed $args = "" [, $... ]] )`

PHP permet aux développeurs de déclarer des constructeurs pour les classes. Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet (`new`), ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé. 

Pour des raisons de compatibilité ascendante, si PHP ne peut pas trouver une fonction `__construct()` pour une classe donnée, et que la classe n'en hérite pas de la classe parent, il cherchera une fonction constructeur représentée, comme dans l'ancien style (PHP < 5), par le __nom de la classe__. 

> Note : Les constructeurs parents ne sont pas appelés implicitement si la classe enfant définit un constructeur. Si vous voulez utiliser un constructeur parent, il sera nécessaire de faire appel à `parent::__construct()` depuis le constructeur enfant. Si l'enfant ne définit pas un constructeur alors il peut être hérité de la classe parent, exactement de la même façon qu'une méthode le serait (si elle n'a pas été déclarée comme privée). 


### Destructeur

`void __destruct  ( void )`

PHP 5 introduit un concept de destructeur similaire à celui d'autres langages orientés objet, comme le C++. La méthode destructeur est appelée dès qu'il n'y a plus de référence sur un objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt. 

> Note : Tout comme le constructeur, le destructeur parent ne sera pas appelé implicitement par le moteur. Pour exécuter le destructeur parent, vous devez appeler explicitement la fonction parent::__destruct dans le corps du destructeur. Tout comme les constructeurs, une classe enfant peut hériter du destructeur du parent s'il n'en implémente pas un lui même. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/destruct.php)

## Méthodes magiques

Les noms de méthodes `__construct()`, `__destruct()`, `__call()`, `__callStatic()`, `__get()`, `__set()`, `__isset()`, `__unset()`, `__sleep()`, `__wakeup()`, `__toString()`, `__invoke()`, `__set_state()`, `__clone()` et `__debugInfo()` sont magiques dans les classes PHP. Vous ne pouvez pas utiliser ces noms de méthodes dans vos classes, sauf si vous voulez implémenter le comportement associé à ces méthodes magiques. 

### __toString()

`public string __toString ( void )`

La méthode `__toString()` détermine comment l'objet doit réagir lorsqu'il est traité comme une chaîne de caractères. Par exemple, ce que `echo $obj;` affichera. Cette méthode doit retourner une chaîne, sinon une erreur `E_RECOVERABLE_ERROR` sera levée.

[Example](https://github.com/IT-2015/POO/blob/master/Example/toString.php)


### __sleep() et __wakeup()

`public array __sleep ( void )`

La fonction `serialize()` vérifie si votre classe a une méthode avec le nom magique `__sleep()`. Si c'est le cas, cette méthode sera exécutée avant toute linéarisation. Elle peut nettoyer l'objet, et elle est supposée retourner un tableau avec les noms de toutes les variables de l'objet qui doivent être linéarisées. Si la méthode ne retourne rien, alors `NULL` sera linéarisé, et une alerte de type `E_NOTICE` sera émise. 

`void __wakeup ( void )`

Réciproquement, la fonction `unserialize()` vérifie la présence d'une méthode dont le nom est le nom magique `__wakeup()`. Si elle est présente, cette fonction peut reconstruire toute ressource que l'objet pourrait possèder. 



[Example](https://github.com/IT-2015/POO/blob/master/Example/sleep-wakeup.php)


### Surcharge de propriétés

Une __propriété inaccessible__ est une propriété qui ne permet pas l'accès à ses données ou l'affectation de valeur car elle est bloquée par sa visibilité (protected, private) et son contexte (code global, ou classe fille) ou tout simplement parce qu'elle n'est pas définie.


`public void __set ( string $name , mixed $value )`

`__set()` est sollicitée lors de l'écriture de données vers des propriétés inaccessibles. 

`public mixed __get ( string $name )`

`__get()` est appelée pour lire des données depuis des propriétés inaccessibles. 

`public bool __isset ( string $name )`

`__isset()` est sollicitée lorsque `isset()` ou la fonction `empty()` sont appelées sur des propriétés inaccessibles. 

`public void __unset ( string $name )`

`__unset()` est invoquée lorsque `unset()` est appelée sur des propriétés inaccessibles. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/surchagePropriete.php)

### Surcharge de méthodes

`public mixed __call ( string $name , array $arguments )`

`__call()` est appelée lorsque l'on invoque des méthodes inaccessibles dans un contexte objet.

`public static mixed __callStatic ( string $name , array $arguments )`

`__callStatic()` est lancée lorsque l'on invoque des méthodes inaccessibles dans un contexte statique. 

L'argument `$name` est le nom de la méthode appelée. L'argument `$arguments` est un tableau contenant les paramètres passés à la méthode `$name`. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/surchargeMethode.php)


## __debugInfo() (PHP 5.6+)

`array __debugInfo ( void )`

Cette méthode est appelée par `var_dump()` lors du traitement d'un objet pour récupérer les propriétés qui doivent être affichées. Si la méthode n'est pas définie dans un objet, alors toutes les propriétés publiques, protégées et privées seront affichées. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/debugInfo.php)

## __clone()

`void __clone ( void )`

Une fois le clonage effectué, si une méthode `__clone()` est définie, la méthode `__clone()` du nouvel objet sera appelée, pour permettre à chaque propriété qui doit l'être d'être modifiée. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/clone.php)

## __set_state()

`static object __set_state ( array $properties )`

 Cette méthode statique est appelée pour les classes exportées par la fonction `var_export()` depuis PHP 5.1.0.

Le seul paramètre de cette méthode est un tableau contenant les propriétés exportées sous la forme `array('propriété' => valeur, ...)`. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/set_state.php)

## __invoke()

`mixed __invoke ([ $... ] )`

La méthode `__invoke()` est appelée lorsqu'un script tente d'appeler un objet comme une fonction. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/invoke.php)


## Interface

  - interface
  - implements
  - const

Les interfaces objet vous permettent de créer du code qui spécifie quelles méthodes une classe doit implémenter, sans avoir à définir comment ces méthodes fonctionneront. 

Les interfaces sont définies en utilisant le mot-clé `interface`, de la même façon que pour une classe standard, mais sans qu'aucune des méthodes n'ait son contenu de spécifié. 

De par la nature même d'une interface, toutes les méthodes déclarées dans une interface doivent être __publiques__.

Pour implémenter une interface, l'opérateur `implements` est utilisé. Toutes les méthodes de l'interface doivent être implémentées dans une classe ; si ce n'est pas le cas, une erreur fatale sera émise. Les classes peuvent implémenter plus d'une interface, en séparant chaque interface par une virgule.


Une interface, avec le typage, fournit une bonne façon de vous assurer qu'un objet particulier contient des méthodes particulières. Reportez-vous à l'opérateur `instanceof` et au `typage`. 


### Les constantes

Les interfaces peuvent contenir des constantes. Les constantes d'interfaces fonctionnent exactement comme les constantes de classe, mis à part le fait qu'elles ne peuvent pas être écrasées par une classe ou une interface qui en hérite. 

## Abstraction de classe



