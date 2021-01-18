<?php
class NotFoundController extends Controller
{
  public function index()
  {
    $datas = array();
    $this->view("404", $datas);
  }
}
