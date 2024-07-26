<?php

// What is class and instance

require_once "Person.php";
require_once "Student.php";

$student = new Student("Brad", "Traversy", "1234");
echo '<pre>';
var_dump($student);
echo '</pre>';

// $p = new Person("Brad", "Traversy");
// $p->setAge(30);

// echo '<pre>';
// var_dump($p);
// echo '</pre>';
// echo $p->getAge();

// //
// $p2 = new Person('John', 'Smith');

// echo '<pre>';
// var_dump($p2);
// echo '</pre>';

// //
// echo Person::getCounter();

// Create Person class in Person.php (Done)

// Create instance of Person (Done)

// Using setter and getter (Done)