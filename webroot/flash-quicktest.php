<?php
    
include "../src/CFlash.php";

$flash = new CFlash();

$flash->success('Hello world!');
$flash->notice('Hola mundo!');
$flash->warning('Bonjour monde!');
$flash->error('Hallo Welt!');
    
echo "
<!doctype html>
<meta charset=utf8>
<title>Test Flash message</title>
<h1>Test Flash message</h1>
{$flash->output()}
    ";