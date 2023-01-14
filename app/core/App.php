<?php
declare(strict_types=1);

namespace app\core;

use app\core\classes\Request;
use app\core\classes\Response;
use app\core\classes\Route;

class App
{
    private Route $route;
    private Request $request;
    private Response $response;
    public static array $config;

    public function __construct($config)
    {
        $this->route = new Route();
        $this->request = new Request();
        $this->response = new Response();
        self::$config = $config;
    }

    public function run()
    {
        $this->route->load();
        echo  $this->route->serve($this->request, $this->response);
    }
}