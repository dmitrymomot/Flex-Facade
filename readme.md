# Flex Facade Container

To install, all you need to do 
is run the following command

```
sudo composer create-project projectname flex/facade -s dev
```

Then. run `sudo composer install` and the 
Flex Facade Container will be installed!

All of your classes/facade classes must be 
autoloaded.  
Inside `classes/` and
 `facades/` your classes will
  automatically be autoloaded.

## Usage

### Initiate the Container

```php
$app = new Flex\Container;
```
initiates the container class. Because Flex\Container implements ArrayAccess,
we can now access any classes we put in here by doing `$app['classname']` 

### Creating the Class

Let's create a class that we want to later put in our container.  

```php
class Hello
{
	public function say(){
		echo 'Hello, World!';
	}
}
```

### Register a Class in the Container

Let's say you want to register class "Hello", so you can just do `$app['hello']` to get an instance.  (I am assuming Hello is inside a namespace 'Classes'.  This way we can use 'Hello' as an alias)

```php
$app->register('hello', function()
{
	return new Classes\Hello;
});
```

This registers the `Classes\Hello` class inside the `$app['hello']` container accessor.  Now, if we run the following:
```php
$app['hello']->say();
```
you should see our `Hello, World!` message.

### Creating the Facade

Now, we want to create a facade class, so we can access `$app['hello']` by using an Alias.

```php
namespace Facade;

class Hello extends \Flex\Facade
{
	public static function service(){
		return 'hello';
	}
}
```

This class, when called, will return `$app['hello']`, as defined in the service method we just created.

### Creating the Alias

We are almost done!  Now, we just want to create an alias for the  'Facade\Hello' class for simple/elegant access.

```php
$app->alias('Hello', 'Facade\Hello');
```

Now, we can just call our Hello class using 
```php
Hello::say();
```

and you should see 
```
Hello, World!
```
Congratulations, now you can access your classes with elegant syntax!  Feel free to expand on this.  Stay tuned for the Flex PHP Framework.
