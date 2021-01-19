<?php

const DICTIONARY_FILE_NAME = 'dictionary_5.txt';
const ARCHIVE_FILE_NAME = 'archive.rar';
const EXTRACT_DIRECTORY_NAME = __DIR__ . DIRECTORY_SEPARATOR . 'extracted_data';

// Достаем пароли из файла.

$passwords = [];

$handle = fopen(DICTIONARY_FILE_NAME, 'r');

while (!feof($handle)) {
    array_push($passwords, trim(fgets($handle, 4096)));
}

fclose($handle);

// Пытаемся открыть архив с паролем.

foreach ($passwords as $password) {
    $archive = RarArchive::open(ARCHIVE_FILE_NAME, $password);
    $elements = $archive->getEntries();

    if (@$elements[0]->extract(EXTRACT_DIRECTORY_NAME) !== false) {
        echo 'TRUE password:' . $password . PHP_EOL;
        exit;
    }

    $archive->close();

    echo $password . ' [ERROR]' . PHP_EOL;
}

echo 'ALL PASSWORDS IS ERRORS.' . PHP_EOL;
