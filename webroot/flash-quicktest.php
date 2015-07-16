<?php
    
include "../src/CFlash.php";

$flash = new \Joah\FLash\CFlash();

$flash->success('Hello world!');
$flash->notice('Hola mundo!');
$flash->warning('Bonjour monde!');
$flash->error('Hallo Welt!');
    
echo "
<!doctype html>
<meta charset=utf8>
<link rel='stylesheet' type='text/css' href='css/flash.css'>
<title>Test Flash message</title>
<h1>Test Flash message</h1>
{$flash->output()}
    ";