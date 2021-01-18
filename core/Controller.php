<?php
class Controller
{
  public function view($viewName, $datas = array())
  {
    extract($datas);
    require_once "views/" . $viewName . ".php";
  }

  public function render($viewName, $datas = array())
  {
    require_once "views/template.php";
  }
}
