<?php
declare(strict_types=1);

namespace app\core\classes;

use app\core\App;
use app\core\interfaces\MiddlewareInterface;

class Route
{

    protected static array $routes = [];
    protected static ?MiddlewareInterface $middle = null;

    public  function load(): void
    {
        require_once App::$config["APP_ROOT"] . DIRECTORY_SEPARATOR . "routes.php";
    }

    public static function middleware($middleware, $callback): void
    {
        self::$middle = new $middleware;
        \call_user_func($callback);
        self::$middle = null;
    }

    public static function get(string $path, array $callback): void
    {
        self::$routes["GET"][$path]["callback"] = $callback;
        self::$routes["GET"][$path]["middleware"] = self::$middle;
    }

    public static function post(string $path, array $callback): void
    {
        self::$routes["POST"][$path]["callback"] = $callback;
        self::$routes["POST"][$path]["middleware"] = self::$middle;
    }

    /**
     * @throws \Exception
     */
    public  function serve(Request $request, Response $response):mixed
    {
        try {
            $callback = self::$routes[$request->getMethod()][$request->getPath()]["callback"] ?? false;
            $middleware = self::$routes[$request->getMethod()][$request->getPath()]["middleware"] ?? false;
            if ($callback === false) { //current route not exist in routes_list
                throw new \Exception("Page Not Found 404 ! ");
            } elseif (isset($callback[0]) && isset($callback[1])) { //get the controller and method
                if ($middleware && $middleware instanceof MiddlewareInterface) {
                    $middleware->handle();
                }
                $controller = new $callback[0];
                //$controller->{$callback[1]}();
                return  call_user_func_array(array($controller, $callback[1]), [$request,$response]);
            } else {
            }
        } catch (\Exception $ex) {
           die($ex->getMessage());
        }
    }

}