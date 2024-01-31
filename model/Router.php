<?php
namespace model;
// class Router{
//   private $uri;
//   private $routes;

//   public function __construct($uri, $routes) {
//       $this->uri = $uri;
//       $this->routes = $routes;
//       $this->route();
//   }

//   private function route() {
//       if (array_key_exists($this->uri, $this->routes)) {
//           // Truyền biến vào tệp tin view
//           require_once $this->routes[$this->uri];
//       } else {
//           require_once 'view/404.php';
//       }
//   }

class Router
{
    private static $routes = [];

    public static function register(string $method, string $uri, $callback): void
    {
        self::$routes[$method][$uri] = $callback;
    }

    public static function get(string $uri, $callback): void
    {
        self::register('GET', $uri, $callback);
    }

    public static function post(string $uri, $callback): void
    {
        self::register('POST', $uri, $callback);
    }
    public static function redirect(string $uri, string $target): void
    {
        self::register('GET', $uri, function () use ($target) {
            header("Location: $target");
            exit;
        });
    }

    // Thêm các phương thức HTTP khác nếu cần

    public static function resolve(string $requestUrl, string $requestMethod): void
    {
        $route = explode('?', $requestUrl)[0];
        $action = self::$routes[$requestMethod][$route] ?? null;
        // echo var_dump($action);
        if (!$action) {
            // Xử lý khi không tìm thấy route
            throw new RouteNotFoundException();
        }

        if (is_array($action) && is_string($action[0])) {
            $action[0] = new $action[0](); // Tạo đối tượng từ tên class
        }

        if (is_callable($action)) {
            call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            if (method_exists($class, $method)) {
                call_user_func_array([$class, $method], []);
            }
        }
    }
}