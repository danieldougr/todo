<?php

const DB_FILE = "db.txt";

// json_decode - texto -> objeto
// json_encode - objeto -> texto json

function dbRead(): array
{
    $file = fopen(DB_FILE, 'r');
    $tasks = array();

    if($file) {
        while(!feof($file)) { 
            $line = rtrim(fgets($file));
            if(strlen($line) > 0) {
                $tasks[] = json_decode($line);
            }
        }
        fclose($file);
    }
    
    return $tasks;
}

function dbInclude(array $task) {
    $file = fopen(DB_FILE, 'a');

    if($file) {
        fwrite($file, "\n".json_encode($task));

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
                fwrite($file, json_encode($line));
                
                if($i < ($total_items - 1)){
                    fwrite($file, "\n");    
                }

                $i++;
            }
        }

        fclose($file);
    }
}