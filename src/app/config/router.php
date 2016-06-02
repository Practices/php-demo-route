<?php
namespace App\Config;
use AltoRouter;
class Router
{
  protected $router;

    function __construct()
    {
        $this->router = new AltoRouter();

        $this->router->map('get', '/home', function() {
            $this->routingController('HomeController', 'index');
        });

        $this->router->map('get', '/home/[i:id]', function($id) {
            $this->routingController('HomeController', 'get', $id);
        });

        $this->router->map('get', '/about', function() {
            $this->routingController('AboutController', 'index');
        });
    }

    public function routing()
    {
        $match = $this->router->match();
        $target = $match['target'];
        $param = $match['params'];

        if($match && is_callable( $match['target'])) {
            call_user_func_array( $match['target'], $match['params'] );
        } else {
            // no route was matched
            $this->NotFound();
        }
    }

  public function routingController($controllerName, $action, $param = null)
  {
      $controllerName = "App\\Controller\\".$controllerName;
      $controller = new $controllerName;
      if (method_exists($controller, $action)) {
          if (is_null($param)) {
              $controller->$action();
          }  else {
              $controller->$action($param);
          }
      } else {
          $this->NotFound();
      }
  }

  public function NotFound()
  {
      header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');
  }
}
