<?php

const DB_FILE = "db.txt";

function dbRead(): array
{
    $file = fopen(DB_FILE, 'r');
    $tasks = array();

    if($file) {
        while(!feof($file)) { 
            $line = rtrim(fgets($file));
            if(strlen($line) > 0) {
                $tasks[] = $line;
            }
        }
        fclose($file);
    }
    
    return $tasks;
}

function dbInclude($task) {
    $file = fopen(DB_FILE, 'a');

    if($file) {
        fwrite($file, "\n" .$task);

        fclose($file);
    }
}

function dbRewrite(array $data) {
    $file = fopen(DB_FILE, 'w');

    if($file) {
        $total_items = count($data);

        if($total_items > 0) {
            $i = 0;
            foreach($data as $line) {
                fwrite($file, $line);
                
                if($i < ($total_items - 1)){
                    fwrite($file, "\n");    
                }

                $i++;
            }
        }

        fclose($file);
    }
}