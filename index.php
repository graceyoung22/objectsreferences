<?php

//Visiblity of a property or method can be definded by prefixing the
	//declaration with the keywords public, protected or private

/**
* Define MyClass
*/
class MyClass
{
	public $public = 'Public';
	protected $protected = 'Protected';
	private $private = 'Private';

	function printHello()
	{
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}	
}

$obj = new MyClass()
echo $obj->public; //Works
echo $obj->protected; //Fatal Error
echo $obj->private; //Fatal Error
$obj->printHello() //Shows Public, Protected, and Public

//Class Abstraction- declare the method's signature- they cannot define
	//the implementation. All methods marked abstract in the parent's
	//class declaration must be defined by the child and defined
	//with the same visiblity

abstract class AbstractClass
{
//Our abstract method only needs to define the required arguements
	abstract protected function prefixName($name);
}
class ConcreteClass extends AbstractClass
{
//Our child class many define optional arguments not in the parent's signature
	public function prefixName($name, $separator = ".") {
		if ($name == "Pacman") {
			$prefix = "Mr";
		} elseif ($name == "Pacwoman") {
			$prefix = "Mrs";
		} else {
			$prefix = "";
		}
		return "{$prefix}{$separator} {$name}";
	}
}

$class = new ConcreteClass;
echo $class->prefixName("Pacman"), "\n";
echo $class->prefixName("Pacwoman"), "\n";

//Final Keyword- prevents child classes from overriding a method by prefixing
	//the definition with final. If class itself is being defined
	//final then it cannot be extened

class BaseClass {
	public function test() {
		echo "BaseClass::test() called\n";
	}
	final public function moreTesting() {
		echo "BaseClass::moreTesting() called\n";
	}
}
class ChildClass extends BaseClass {
	public function moreTesting() {
		echo "ChildClass::moreTesting() called\n";
	}
}
//Results in Fatal error: Cannot override final method BaseClass::moreTesting()

//Object interfaces- allows you to create code with specifies which methods a 
	//class must implement, without having to define how these methods
	//are handled

//Declare the interface 'iTemplate'
interface iTemplate
{
	public function setVariable($name, $var);
	public function getHTML($template);
}
//Implement the interface
//This will work
class Template implements iTemplate
{
	private $vars = array();
	public function setVariable($name, $var)
	{
		$this->vars[$name] = $var;
	}
	public function getHTML($template)
	{
		foreach($this->vars as $name => $value) {
			$template = str_replace('{' . $name . '}', $value, $template);
		}
	return $template;
	}
}
//This will not work
//Fatal error: Class BadTemplate contains 1 abstract methods and must therfore
	//be declared abstract (iTemplate::getHTML)
class BadTemplate implements iTemplate
{
	private $vars = array();
	public function setVariable($name, $var)
	{
		$this->vars[$name} = $var;
	}
}	

//Object Cloning- a shallow copy of all of the object's properties. Any properties 
	//that are references to other variables will remain references

class SubObject
{
	static $instances = 0;
	public $instance;

	public function __construct() {
		this->instance = ++self::$instances;
	}
	public function __clone() {
		this->instance = ++self::$instances;
	}
}
class MyCloneable
{
	public $object1;
	public $object2;

	function __clone()
	{
	//Force a copy of this->object, otherwise it will point to the same object
		$this->object1 = cone $this->object1;
	}
}
$obj = new MyClonable();
$obj->object1 = new SubObject();
$obj->object2 = new SubObject();
$obj2 = clone $obj;
print("Original Object:\n");
print_r($obj);
print("Cloned Object:\n");
print_r($obj2);


//Reflection Example
	//reflection API that adds the ability to reverse-engineer classes, 
	//interfaces, functions, methods, and extenstion. Also offers ways
	//to retrieve doc comments from functions, classes and methods

// Manager.php
require_once './Editor.php';
require_once './Nettus.php';
class Manager {
	function doJobFor(DateTime $date) {
		if ((new DateTime())->getTimestanp() > $date->getTimestamp()) {
			$editor = new Editor('John Doe');
			$nettuts = new Nettuts()
			$nettuts->publishNextArticle($editor);
		}
	}
}


//Pass by reference vs. Pass by value

function pass_by_value($param) {
	push_array($param, 4, 5);
}
$ar = array(1, 2, 3);
pass_by_value($ar);
foreach ($ar as $elem) {
	print "<br>$elem";
}
//The code above prints 1, 2, 3. This is because the array is passed as value
function pass_by_reference(&$param) {
        push_array($param, 4, 5);
}
$ar = array(1, 2, 3);
pass_by_value($ar);
foreach ($ar as $elem) {
        print "<br>$elem";
}
//The code above prints 1, 2, 3, 4, 5. This is because the array is passed as 
	//reference, meaning the function doesn't manipulate a copy of the 
	//variable passed, but the actual variable itself

//In order to make a variable be passed by reference, it must be declared
	//with a receeding ampersand (&) in the function's declaration










?>
