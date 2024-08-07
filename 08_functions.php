<?php

// Function which prints "Hello I am Zura"
// function hello() {
//     echo "Hello I am Zura <br>";
// }
// hello();
// hello();
// hello();

// Function with argument
function hello($name) {
    return "Hello I am $name <br>";
}
echo hello("Zura");
echo hello("Brad");

// Create sum of two functions
// function sum($a, $b) {
//     return $a + $b;
// }
// echo sum(4, 5);

// Create function to sum all numbers using ...$nums
// function sum(...$nums) {
//     $sum = 0;
//     foreach ($nums as $n) {
//         $sum += $n;
//     }
//     return $sum;
// }
// echo sum(1, 2, 3, 4, 5, 6);

// Arrow functions
function sum(...$nums) {
    return array_reduce($nums, fn($carry, $n) => $carry + $n);
}
echo sum(1, 2, 3, 4, 5, 6);