<?php

//data dump
function dd($data){

    echo '<pre>';

    die(var_dump($data));

    //echo '</pre>';
    
}

//age of entry
function entry($age){
    if ($age >= 21) {
        echo 'Come on in!';
    }
    else {
        echo 'You are not old enough!';
    }
}

//fizz uzz
function fizzBuzz($num) 
{
    if ($num % 2 == 0 && $num % 3 == 0){
        echo $num, ' Fizz Buzz<br>';
    }
    elseif ($num % 2 == 0) {
        echo $num, ' Fizz<br>';
    }
    elseif ($num % 3 == 0) {
        echo $num, ' Buzz<br>';
    }
}

?>