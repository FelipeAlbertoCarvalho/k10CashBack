<?php
class AdminController extends Controller
{
  public function index()
  {

    $datas = array(
      "title" => "Login Admin"
    );

    $this->render("adminLogin", $datas);
  }
  
}