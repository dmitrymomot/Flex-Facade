<?php

namespace Flex;

class Container implements \ArrayAccess
{
	private $container = array();

	public function offsetSet($offset, $value)
	{
		if (is_null($offset)) {
			$this->container[] = $value;
		} else {
			$this->container[$offset] = $value;
		}
	}

	public function offsetExists($offset) {
		return isset($this->container[$offset]);
	}
	public function offsetUnset($offset) {
		return isset($this->container[$offset]);
	}
	public function offsetGet($offset) {
		return isset($this->container[$offset]) ? $this->container[$offset] : null;
	}
	/**
	* register() method
	* 
	* This method adds a class to the IoC container
	* @param 1 - string for index in the container
	* @param 2 - new instance of class you want at index
	* @return null
	*/
	public function register($index, $instance)
	{
		if (is_callable($instance))
		{
			$instance = call_user_func($instance);
		}
		$this->container[$index] = $instance;
	}

	/**
	* registerProviders() method
	* 
	* This method registers the providers 
	* in an associative array.  The key of the array 
	* must be the key in the container you want to store
	* it as, and the value is the instance of the new Class
	* @param array 
	*/

	public function registerProviders(array $providers)
	{
		foreach($providers as $key=>$class)
		{
			$this->container[$key] = new $class;
		}
	}
	/**
	* createAlias() method
	*
	* This method will create the aliases for the 
	* given alias=>class array
	* @param array
	*/

	public function createAlias(array $aliases)
	{
		foreach ($aliases as $alias=>$class)
		{
			class_alias($class, $alias);
		}
	}

	/**
	* alias() method
	* This method will take one single alias and class
	* and make an alias for it
	* @param 1 - string alias name 
	* @param 2 - sring class name
	*/

	public function alias($alias, $class)
	{
		class_alias($class, $alias);
	}


}