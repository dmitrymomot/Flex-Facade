<?php

include 'vendor/autoload.php';

include 'bootstrap.php';
/*
|-------------------------
| App Container
|-------------------------
|
| This is the variable that will define
| the container.  This variable does not 
| have to be called $app, but if you change
| it, you must also change it in the 
| flex/src/Flex/Facade/Facade.php
|
*/

$app = new \Flex\Container;

$app->register('hello', function()
{
	return new Classes\Hello;
});

$app->alias('Hello', 'Facade\Hello');

Hello::say();