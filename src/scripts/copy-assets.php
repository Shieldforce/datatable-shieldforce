<?php

$source = $_SERVER["PWD"].'/assests';
$destination = $_SERVER["PWD"].'/public/teste';
try {
    copy($source, $destination);
}catch (Throwable $exception) {
    echo "<pre>";
    print_r($exception);
    echo "</pre>";
    die;
}
