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

//fizz buzz
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


function age ($bdate) {
    $date = new DateTime($bdate);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
 }
 
 function isDate($dob) {
    $date_arr  = explode('-', $dob);
    return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
 }
 
 function bmi ($ft, $in, $weight) {
    return $weight/pow(($ft * 12 + $in),2) * 703;
 }
 
 function bmiDescription ($bmi) {
    // you will need to write
 }

?>