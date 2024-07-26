<?php

$age = 20;
$salary = 300000;

// Sample if
if($age === 20) {
    echo "1";
}

// Without circle braces
if($age === 20) echo "1";

// Sample if-else
if($age > 20) {
    echo "1";
}
else {
    echo "2";
}

echo "<br>";
// Difference between == and ===
$age == 20; // true
$age == '20'; // true
$age === 20; // true
$age ==='20'; // false

echo "<br>";
// if AND
if($age == 20 && $salary == 300000) {
    echo "Do something";
}

echo "<br>";
// if OR
if($age > 20 || $salary == 300000) {
    echo "Do something2";
}

echo "<br>";
// Ternary if
echo $age < 22 ? "Young" : "Old";

// Short ternary
$myAge = $age ?: 18;

echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator
$myName = isset($name) ? $name : 'John';
$myName = $name ?? 'John';
// --> 2 câu này y như nhau

// switch
$userRole = 'admin';

switch ($userRole) {
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    case 'user':
        echo 'user';
        break;
    
    default:
        echo 'invalid role';
        break;
}
