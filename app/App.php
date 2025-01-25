<?php

declare(strict_types = 1);

// Your Code
function getfiletransaction(): array
{
    $files = [];
    foreach(scandir(FILES_PATH) as $file){
        if(is_dir($file)){
            continue;
        }
        $files[] = $file;
    }
    return $files;
}

function getTransactions(string $file): array
{
    if(!file_exists(FILES_PATH . $file)){
        trigger_error("File not found", E_USER_ERROR);
    }
    $file = fopen($file, 'r');
    fgetcsv($file);
    $transactions = [];
    while(!feof($file)){
        $transactions[] = fgetcsv($file);
    }
    fclose($file);
    return $transactions;
}