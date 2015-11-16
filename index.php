<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/vendor/autoload.php';

$_GET['var'] = '123';
$request = Request::createFromGlobals();

echo $request->query->get('var', 'NONE');
// 123

$_GET['var'] = 'abcde';

echo $request->query->get('var', 'NONE');
// 123

echo $_GET['var'];
// abcde

