<?php
include_once("conf.php");
include_once("models/Fandom.class.php");
include_once("views/Fandom.view.php");
include_once("views/FormFandom.view.php");

class FandomController {
  private $fandom;

  function __construct(){
    $this->fandom = new Fandom(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->fandom->open();
    $this->fandom->getFandom();
    $data = array();
    while($row = $this->fandom->getResult()){
      array_push($data, $row);
    }

    $this->fandom->close();

    $view = new FandomView();
    $view->render($data);
  }

  
  function add($data){
    $this->fandom->open();
    $this->fandom->add($data);
    $this->fandom->close();
    
    header("location:fandom.php");
  }

  function edit($id, $data){
    $this->fandom->open();
    $this->fandom->edit($id, $data);
    $this->fandom->close();
    
    header("location:fandom.php");
  }

  function delete($id){
    $this->fandom->open();
    $this->fandom->delete($id);
    $this->fandom->close();
    
    header("location:fandom.php");
  }

  function formAdd() 
  {
    $view = new FormFandomView();
    $view->render();
  }

  function formEdit($id) 
  {
    $this->fandom->open();
    $this->fandom->getFandomById($id);
     
    $data = array();
    while ($row = $this->fandom->getResult()) {
      array_push($data, $row);
    }
    
    $this->fandom->close();

    $view = new FormFandomView();
    $view->render1($data);
  }


}