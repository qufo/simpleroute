# SimpleRoute
SimpleRoute for restful dispatch

# Install 
add 
```
"qufo/simpleroute":"dev-master"
```
to your composer.json, and composer update.

add
```
$app->register(Qufo\SimpleRoute\Provider\LumenServiceProvider::class);
```
to your bootstrap/app.php.

# How to use

require autoload with composer.then add 

```
$route  = new Qufo\Simpleroute\Route();
$route->get('/','HelloController@welcome');
$route->post('/users','UserController@store');
...

$route->run();
```

enjoy.
