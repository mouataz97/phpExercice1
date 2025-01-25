<?php

declare(strict_types = 1);

// Your Code
function getTransactionFiles(string $dirpath): array
{
    $files = [];

    foreach(scandir($dirpath) as $file) {
        if(is_dir($file)) {
            continue;
        }
        $files[] = $dirpath . $file;
    }
    return $files;
}

function getTransactionFile(string $fileName): array
{
    if(!file_exists($fileName)) {
        trigger_error("File $fileName does not exist", E_USER_ERROR);
    }
    $file = fopen($fileName, 'r');
    fgetcsv($file);
    $transactions = [];
    while(($transaction = fgetcsv($file)) !== false) {
        $transactions[] = $transaction;
    }

    return $transactions;
}
require VIEWS_PATH . 'transactions.php';