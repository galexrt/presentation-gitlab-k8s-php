<?php

require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Acme\HelloWorld;

$who = 'World';
if ($_REQUEST['who'] != "") {
    $who = htmlspecialchars(strip_tags($_REQUEST['who']));
}

echo Acme\HelloWorld::fromString($who);
