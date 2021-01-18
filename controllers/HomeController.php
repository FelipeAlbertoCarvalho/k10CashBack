<?php
class HomeController extends Controller
{
  public function index()
  {
    $datas = array(
      "title" => "",
    );

    $this->render("home", $datas);
  }
}
