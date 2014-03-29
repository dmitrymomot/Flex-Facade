<?php

namespace Flex;

class Facade
{
	/**
	* __callStatic()
	* this will handle the static calls 
	* for pretty syntax.
	* It will look for the service provider 
	* name, and call the method with the arguments on that
	*/
	public static function __callStatic($name, $arguments)
	{
		global $app;
		$service_name = static::service();

		switch (count($arguments)) {
			case 0:
				return $app[$service_name]->$name();
			case 1:
				return $app[$service_name]->$name($arguments[0]);
			case 2:
				return $app[$service_name]->$name($arguments[0],$arguments[1]);
			case 3:
				return $app[$service_name]->$name($arguments[0], $arguments[1], $arguments[2]);
			case 4:
				return $app[$service_name]->$name($arguments[0], $arguments[1], $arguments[2], $arguments[3]);
			default:
				call_user_func_array($app[$service_name]->$name, $arguments);
		}
	}
}