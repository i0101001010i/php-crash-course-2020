<?php

// Create simple string
$name = 'Zura';
$string = 'Hello I am $name. I am 28';
$string2 = "Hello I am $name. I am 28";

echo $string.'<br>';
echo $string2.'<br>';

// String concatenation
echo "hello" . " world" . "<br>";

// String functions

// Multiline text and line breaks
$longtext = "
    Hello, my name is Zura
    I am 27
";
echo $longtext."<br>";
echo nl2br($longtext)."<br>";

// Multiline text and reserve html tags
$longtext = "
    Hello, my name is <b>Zura</b>
    I am <b>27</b>
";
echo $longtext."<br>";
echo nl2br($longtext)."<br>";
echo htmlentities($longtext)."<br>";

// https://www.php.net/manual/en/ref.strings.php