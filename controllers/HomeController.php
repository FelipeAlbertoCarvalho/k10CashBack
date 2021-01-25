<?php
class HomeController extends Controller
{
  public function index()
  {

    $datas = array(
      "title" => "Login"
);

    $this->render("home", $datas);
  }
  
}
