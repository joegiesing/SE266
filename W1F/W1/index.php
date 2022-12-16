<?php

require 'functions.php';


function entry($age){
    if ($age >= 21) {
        echo 'Come on in!';
    }
    else {
        echo 'You are not old enough!';
    }
}

entry(24);

entry(17);


require 'index.view.php';