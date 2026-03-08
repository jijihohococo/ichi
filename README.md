# ICHI PHP FRAMEWORK

ICHI PHP FRAMEWORK is a fast and secure MVC PHP framework.

## License

This framework is open source under the [MIT license](LICENSE.md).

## Table of Contents

- [ICHI PHP FRAMEWORK](#ichi-php-framework)
	- [License](#license)
	- [Table of Contents](#table-of-contents)
	- [Installation](#installation)
	- [Setup](#setup)
	- [Using](#using)
		- [Route](#route)
		- [Middleware](#middleware)
		- [Model](#model)
		- [Controller](#controller)
		- [View](#view)
		- [Validation](#validation)

## Installation

```php
composer create-project jijihohococo/ichi your_project
```

## Setup

First, you must create a `.env` file in your project folder. Then declare your actual database name, database username, and password in that file.

<b>You can see the required format in `.env.example` under your project folder.</b>

<i>In your `.env` file</i>

```txt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user_name
DB_PASSWORD=your_database_password
```

You can run the app from the public path:

```txt
your_project/public > php -S localhost:8000
```

## Using

### Route

You can add routes in the `web` function of `routes/web.php`.

If you want to add another route file, create a new file under the `routes` folder.
Then add a new function similar to `web.php`.

```php
function new_routes($route)
{

}
```

Then include your new route file in `app/Kernel.php`:

```php
namespace App;

use JiJiHoHoCoCo\IchiRoute\Router\Route;

require_once __DIR__ . '/../routes/new_routes.php';

class Kernel
{
	public function run()
	{
		$route = new Route;
		new_routes($route);
		$route->run();
	}
}
```

<b>The code above highlights what is needed to add a new route file.</b>

You can use <a href="https://github.com/jijihohococo/ichi-route/blob/master/README.md">this documentation</a> for route functions in detail.

### Middleware

You can create middleware for routes from the command line.

```php
php ichi make:middleware NewMiddleware
```

The middleware class will be created under the `app/Middleware` folder.

You can use <a href="https://github.com/jijihohococo/ichi-route#middleware">this documentation</a> for middleware functions in detail.

### Model

You can add another database connection in `app/Kernel.php`, as shown in <a href="https://github.com/jijihohococo/ichi-orm/blob/master/README.md#set-up-database-connection">this documentation</a>.

You can create a model from the command line.

```php
php ichi make:model NewModel
```

The model class will be created under the `app/Models` folder.

<i>Example model</i>

```php
namespace App\Models;

use JiJiHoHoCoCo\IchiORM\Database\Model;

class NewModel extends Model
{
	public $id , $name , $created_at , $updated_at , $deleted_at ;
}
```

You can use <a href="https://github.com/jijihohococo/ichi-orm/blob/master/README.md">this documentation</a> for model usage details.

### Controller

You can create a controller from the command line.

```php
php ichi make:controller NewController
```

The controller class will be created under the `app/Controllers` folder.

For more details, use <a href="https://github.com/jijihohococo/ichi-route/blob/master/README.md#creating-controller">this documentation</a>.

### View

You can create a view component class from the command line.

```php
php ichi make:component ViewComponent
```

The view component class will be created under the `app/Components` folder.

You can return a view in a route callback or in a controller method.

<i>Without controller</i>

```php
$route->get('/welcome',function(){
	return view('welcome.php');
});
```

<i>With controller</i>

```php
$route->get('/welcome','HomeController@welcome');
```

```php
namespace App\Controllers;

class HomeController
{
	public function welcome()
	{
		return view('welcome.php');
	}
}
```

You must create view PHP files under the `resources/views` folder.

For more details, use <a href="https://github.com/jijihohococo/ichi-template/blob/master/README.md">this documentation</a>.

### Validation

You can validate input data in your controller class.

```php
namespace App\Controllers;

use JiJiHoHoCoCo\IchiValidation\Validator;

class TestController
{
	public function test()
	{
		$validator = new Validator();
		if(!$validator->validate($_REQUEST,[
			'name' => 'required' ,
			'age' => 'required|integer' ,
			'email' => ['required','email']
		])) {
			setErrors($validator->getErrors());
			return view('test.php');
		}
	}
}
```

You can display validation error messages in your view PHP file:

```php
<?php if(isset($errors['name'])): ?>
<?php echo $errors['name']; ?>
<?php endif; ?>
```

For more details, use <a href="https://github.com/jijihohococo/ichi-validation/blob/master/README.md">this documentation</a>.