<?php

class App
{
  protected $controller = "home_Controller";
  protected $method = "index";
  protected $params = [];

  public function __construct()
  {
    //controller
    $url = $this->parseURL();
    if (isset($url[0])) {
      if ($url[0] == "customer") {
        unset($url[0]);
        if (isset($url[1])) {
          if (file_exists('../app/controllers/customer/' . $url[1] . '_Controller.php')) {
            $this->controller = $url[1] . '_Controller';
            unset($url[1]);
            require_once '../app/controllers/customer/' . $this->controller . '.php';
            $this->controller = new $this->controller;
          } else {
            require_once '../app/controllers/customer/' . $this->controller . '.php';
            $this->controller = new $this->controller;
          }
        } else {
          require_once '../app/controllers/customer/' . $this->controller . '.php';
          $this->controller = new $this->controller;
        }
      } else if ($url[0] == "admin") {
        unset($url[0]);
        $this->controller = "dashboard_Controller";
        if (isset($url[1])) {
          if (file_exists('../app/controllers/admin/' . $url[1] . '_Controller.php')) {
            $this->controller = $url[1] . '_Controller';
            unset($url[1]);
            require_once '../app/controllers/admin/' . $this->controller . '.php';
            $this->controller = new $this->controller;
          } else {
            require_once '../app/controllers/admin/' . $this->controller . '.php';
            $this->controller = new $this->controller;
          }
        } else {
          require_once '../app/controllers/admin/' . $this->controller . '.php';
          $this->controller = new $this->controller;
        }
      } else {
        require_once '../app/controllers/customer/' . $this->controller . '.php';
        $this->controller = new $this->controller;
      }
    } else {
      require_once '../app/controllers/customer/' . $this->controller . '.php';
      $this->controller = new $this->controller;
    }

    //method
    if (isset($url[2])) {
      if (method_exists($this->controller, $url[2])) {
        $this->method = $url[2];
        unset($url[2]);
      }
    }

    //params
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    //jalankan controller & method, serta kirimkan params jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
