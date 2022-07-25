<?php

function dbRead(): array
{
    $file = fopen('db.txt', 'r');
    $tasks = array();

    if($file) {
        while(!feof($file)) { 
            $line = rtrim(fgets($file));
            if(strlen($line) > 0) {
                $tasks[] = $line;
            }
        }
    }
    
    return $tasks;
}

function dbInclude() {

}

function dbRewrite() {

}
