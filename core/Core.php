<?php
class Core
{
  public function run()
  {
    $params = array();
    $url = "/";
    $url .= (!empty($_GET["url"])) ? $_GET["url"] : "";
    if (!empty($url) && $url != "/") {
      $url = explode("/", $url);
      array_shift($url);
      $currentController = $url[0] . "Controller";
      array_shift($url);
      if (isset($url[0]) && !empty($url[0])) {
        $currentAction = $url[0];
        array_shift($url);
      } else {
        $currentAction = "index";
      }
      if (count($url) > 0) $params = $url;
    } else {
      $currentController = "HomeController";
      $currentAction = "index";
    }
    if (!file_exists("controllers/" . $currentController . ".php")) {
      $currentController = "notFoundController";
      $currentAction = "index";
    }
    $current = new $currentController();
    if (method_exists($current, $currentAction)) $currentAction = "index";
    call_user_func_array(array($current, $currentAction), $params);
  }
}
