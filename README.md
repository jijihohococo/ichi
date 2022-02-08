# ICHI PHP FRAMEWORK

ICHI PHP FRAMEWORK is the fast and secure MVC PHP framework.

## License

This framework is Open Source According to [MIT license](LICENSE.md)


## Table Of Contents

* [Installation](#installation)
* [Setup](#setup)
* [Using](#using)
	* [Route](#route)
	* [Middleware](#middleware)
	* [Model](#model)
	* [Controller](#controller)
	* [View](#view)
	* [Validation](#validation)


## Installation

```php

composer create-project jijihohococo/ichi:dev-master your_project

```

## Setup

First, You must create .env file under your project folder. And then you must declare your real database name, database username and password in this .env file.

<b>You can see how to set the data in .env.example under your project folder.</b>

<i>In your .env file</i>

```txt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user_name
DB_PASSWORD=your_database_password
```

You can run the app from public path

```txt

your_project/public > php -S localhost:8000

```

## Using

### Route

You can add your route in 'web' function of "routes/web.php".

If you want to add another route file, create new route file under "routes" folder.
And then you must add new function like 'web.php'.

```php

function new_routes($route){

}

```

Then you must use your new route file in 'app/Kernel.php';

```php

namespace App;

use JiJiHoHoCoCo\IchiRoute\Router\Route;

require_once __DIR__ . '/../routes/new_routes.php';

class Kernel{


	public function run(){
		$route=new Route;
		new_routes($route);
		$route->run();
	}



}

```
<b>Above code is highlighting the things in adding new route file.</b>

You can use <a href="https://github.com/jijihohococo/ichi-route/blob/master/README.md">this docuementation</a> for the route functions in detail.

### Middleware

You can create middleware for routes in command line.

```php

php ichi make:middleware NewMiddleware

```

The Middleware Class will be created under 'app/Middleware' folder.

You can use <a href="https://github.com/jijihohococo/ichi-route#middleware">this documentation</a> for the middleware functions in detail.


### Model

You can add another database connection in "app/Kernel.php" as shown as <a href="https://github.com/jijihohococo/ichi-orm/blob/master/README.md#set-up-database-connection"> this documention </a>.

You can create model in command line.

```php

php ichi make:model NewModel

```

The Model Class will be created under 'app/Models' folder.

You can use <a href="https://github.com/jijihohococo/ichi-orm/blob/master/README.md"></a> to use Model in detail

### Controller

You can create Controller in command line.

```php

php ichi make:controller NewController

```

The Controller Class will be created under 'app/Controllers' folder.

For more detail, use <a href="https://github.com/jijihohococo/ichi-route/blob/master/README.md#creating-controller"> this documentation </a>.

### View

You can create View Component Class in command line.

```php

php ichi make:component 

```
The View Component Class will be created under 'app/Components' folder


You can return view in the route or controller's function

<i>Without Controller</i>
```php

$route->get('/welcome',function(){
	return view('welcome.php');
});

```

<i>With Controller</i>
```php

$route->get('/welcome','HomeController@welcome');

```

```php

namespace App\Controllers;


class HomeController{


	public function welcome(){
		return view('welcome.php');
	}


}
```

For more detail, use <a href="https://github.com/jijihohococo/ichi-template/blob/master/README.md"> this documentation</a>.


### Validation

You can validate the input data in your controller class


```php

namespace App\Controllers;


use JiJiHoHoCoCo\IchiValidation\Validator;
class TestController{


	public function test(){

		$validator=new Validator();
		if(!$validator->validate($_REQUEST,[
			'name' => 'required' ,
			'age' => 'required|integer' ,
			'email' => ['required','email']
		])){
			setErrors($validator->getErrors());
			return view('test.php');
		}

	}


}

```
You can call your validation error messages in your view php file

```

<?php if(isset($errors['name'])); ?>
<?php echo $errors['name']; ?>
<?php endif; ?>

```

For more detail, use <a href="https://github.com/jijihohococo/ichi-validation/blob/master/README.md"> this documentation</a>.