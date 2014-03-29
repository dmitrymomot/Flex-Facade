<?php

namespace Facade;

/*
|-------------------------
| Facade
|-------------------------
|
| Here is our Hello Facade.
| This is where our alias will
| point, and it will return the index
| of the "Hello" class in the container.
|
*/

class Hello extends \Flex\Facade
{
	public static function service()
	{
		return 'hello';
	}
}