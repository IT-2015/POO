#[POO (Programation Orienté Objet)](http://php.net/manual/fr/language.oop5.php)
![Nuage POO PHP](https://github.com/IT-2015/POO/blob/master/img/Nuage_POO.jpg)

Elaboré début des années 1960 et poursuivi dans les années 70.

Il consiste en la définition et l'interaction de briques logicielles appelées objets ; un objet représente un concept, une idée ou toute entité du monde physique, comme une voiture, une personne ou encore une page d'un livre.

Il possède une structure interne et un comportement, et il sait interagir avec ses pairs.

##Syntaxe de base

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


##Propriétés

Les variables au sein d'une classe sont appelées "propriétés".
Elles sont définies en utilisant un des mots-clés public, protected, ou private, suivi d'une déclaration classique de variable.

Cette déclaration peut comprendre une initialisation, mais celle-ci doit être une valeur constante, c'est à dire qu'elle doit pouvoir être évaluée pendant la compilation du code, et qu'elle ne peut pas dépendre d'informations déterminées lors de l'exécution de celui-ci pour pouvoir être évaluée. 

##Héritage

  - extends
  - parent

L'héritage est un des grands principes de la programmation orientée objet, et PHP l'implémente dans son modèle objet. Ce principe va affecter la manière dont de nombreuses classes sont en relation les unes avec les autres. 

Par exemple, lorsque vous étendez une classe, la classe fille hérite de toutes les méthodes publiques et protégées de la classe parente. Tant qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine. 

##Visibilité

  - public
  - protected
  - private

La visibilité d'une propriété ou d'une méthode peut être définie en préfixant sa déclaration avec un mot-clé : public, protected, ou private. Les éléments déclarés comme publics peuvent être utilisés par n'importe quelle partie du programme. L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent, et à ses classes parentes. L'accès aux éléments privés est uniquement réservé à la classe qui les a défini. 

##Constante

Il est possible de définir des valeurs constantes à l'intérieur d'une classe, qui ne seront pas modifiables. Les constantes diffèrent des variables normales du fait que l'on n'utilise pas le symbole `$` pour les déclarer ou les utiliser.

La valeur doit être une expression constante, pas (par exemple) une variable, une propriété, le résultat d'une opération mathématique, ou un appel de fonction. 

##Auto-chargement de classes

De nombreux développeurs qui écrivent des applications orientées objet créent un fichier source par définition de classe. 
Un des plus gros inconvénients de cette méthode est d'avoir à écrire une longue liste d'inclusions de fichier de classes au début de chaque script : une inclusion par classe.

Vous pouvez définir une fonction `my_autoload()` qui sera automatiquement appelée si vous essayez d'utiliser une classe ou interface qui n'est pas encore définie. Grâce à elle, vous avez une dernière chance pour inclure une définition de classe, avant que PHP n'échoue avec une erreur.

La fonction `spl_autoload_register()` fournit une alternative plus flexible pour le chargement automatique de classes.

###Exemple d'autoload

```php
function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');
```

##Statique




##Abstraction



##

##Keywords

- class
- new
- clone
- ->
- public
- protected
- private
- $this
- extends
- parent
- self
- static






