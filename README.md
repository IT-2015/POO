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

Il est possible de définir des valeurs constantes à l'intérieur d'une classe, qui ne seront pas modifiables. Les constantes diffèrent des variables normales du fait que l'on n'utilise pas le symbole `$` pour les déclarer ou les utiliser.

La valeur doit être une expression constante, pas (par exemple) une variable, une propriété, le résultat d'une opération mathématique, ou un appel de fonction. 

## Auto-chargement de classes

De nombreux développeurs qui écrivent des applications orientées objet créent un fichier source par définition de classe. 
Un des plus gros inconvénients de cette méthode est d'avoir à écrire une longue liste d'inclusions de fichier de classes au début de chaque script : une inclusion par classe.

Deux façons de mettre en place un système d'auto-chargement de classe : 
 - Vous pouvez définir une fonction `__autoload()` qui sera automatiquement appelée si vous essayez d'utiliser une classe ou interface qui n'est pas encore définie.  **(Ceci est déprécié)**
 - Vous pouvez utilisé la fonction `spl_autoload_register()` qui permet le chargement automatique de classes.

Grâce à elle, vous avez une dernière chance pour inclure une définition de classe, avant que PHP n'échoue avec une erreur.

### Exemple d'autoloader

```php
function my_autoloader($className) {
    include 'classes/' . $className . '.class.php';
}
spl_autoload_register('my_autoloader');
```

## Statique




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

Une __propriété inaccessible__ c'est une propriété qui ne permet pas l'accès aux données ou son affectation car celle-ci se voit bloquer via sa visibilité et le contexte ou l'on se trouve (code global, ou classe fille) ou tout simplement parcequ'elle n'est pas définie.


`public void __set ( string $name , mixed $value )`

`__set()` est sollicitée lors de l'écriture de données vers des propriétés inaccessibles. 

`public mixed __get ( string $name )`

`__get()` est appelée pour lire des données depuis des propriétés inaccessibles. 

`public bool __isset ( string $name )`

`__isset()` est sollicitée lorsque `isset()` ou la fonction `empty()` sont appelées sur des propriétés inaccessibles. 

`public void __unset ( string $name )`

`__unset()` est invoquée lorsque `unset()` est appelée sur des propriétés inaccessibles. 

[Example](https://github.com/IT-2015/POO/blob/master/Example/surchagePropriete.php)

## Interface


