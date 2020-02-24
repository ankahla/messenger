<?php

class Kernel
{
    public function run()
    {
        $route = $this->getCurrentRoute();

        if (!empty($route)) {
            $this->loadController($route);
        } else {
            $this->loadController(ROUTES['/notfound']);
        }
    }

    public function getCurrentRoute(): array
    {
        $uri = $_SERVER['REQUEST_URI'];
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        foreach (ROUTES as $route => $params) {
            if (false !== strpos($uri, $route)) {
                if (in_array($httpMethod, $params['methods'])) {
                    return $params;
                }

                break;
            }
        }

        return [];
    }

    public function loadController(array $params): void
    {
        $controller = $params['controller'];
        $action = $params['action'];

        if (class_exists($controller)) {
            $instance = (new $controller());

            if (method_exists($instance, $action)) {
                $instance->$action();
                exit;
            }
        }

        throw new Exception("Controller $controller::$action does not exist", 1);
    }
}
