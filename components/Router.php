<?php
    class Router
    {
        private $routes;

        public function __construct(){
            $this ->routes = include(ROOT . '/config/routes.php');
        }
        private  function getUri(){
            if(!empty($_SERVER['REQUEST_URI'])){
                $uri = $_SERVER['REQUEST_URI'];
                $uri = strtok($uri, '?');
                return trim($uri, "/");
            }
        }

        private function executeAction($segments){
            $controllerName = ucfirst(array_shift($segments) . "Controller");
            $actionName = 'action' . ucfirst(array_shift($segments));
            $parameters = $segments;
            $controllerFile = ROOT .'/controllers/' . $controllerName . '.php';
            if(file_exists($controllerFile)){
                include_once($controllerFile);
                $controllerObj = new $controllerName;
                call_user_func_array([$controllerObj , $actionName], $parameters);
            }
            return;
        }

        public function run()
        {
            $uri = $this->getUri();
            if($uri ==="") {
                require_once(ROOT . '/controllers/MainController.php');
                $controller = new MainController();
                $controller->actionList();
                return;
            }

            foreach ($this->routes as $pattern=>$path)
            {
                if(preg_match("~$pattern~", $uri)){
                    $internalRoute =preg_replace("~$pattern~", $path, $uri);
                    $segments = explode('/', $internalRoute);
                        $this->executeAction($segments);
                }
            }
        }
    }