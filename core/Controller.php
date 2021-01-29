<?php
class Controller
{
  public function view($viewName, $datas = array())
  {
    extract($datas);
    require_once "views/" . $viewName . ".php";
  }

  public function render($viewName, $title = null, $datas = array())
  {
    require_once "views/template.php";
  }

  public function renderAdmin($viewName, $title, $datas = array())
  {
    require_once "views/templateAdmin.php";
  }
}
