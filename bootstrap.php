<?php

/*
|-------------------------
| Boostrapper
|-------------------------
|
| This is the bootstrapper for your 
| classes and facades.  If you have a common
| namespace, feel free to autoload them via the 
| composer.json file.
|
*/

foreach (glob("classes/*.php") as $file)
{
	include $file;
}

foreach (glob("facades/*.php") as $file)
{
	include $file;
}