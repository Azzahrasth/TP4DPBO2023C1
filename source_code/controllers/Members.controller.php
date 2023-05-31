<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Fandom.class.php");
include_once("views/Members.view.php");
include_once("views/FormMembers.view.php");

class MembersController {
  private $members;
  private $fandom;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->fandom = new Fandom(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  function index() {
    $this->members->open();
    $this->members->getMembers();

    $dataMembers = array();
    while($row = $this->members->getResult()){
      array_push($dataMembers, $row);
    }

    $this->members->close();
    
    $view = new MembersView();
    $view->render($dataMembers);
  }
  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id, $data){
    $this->members->open();
    $this->members->edit($id, $data);
    $this->members->close();
    
    header("location:index.php");
  }
  
  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }
  
    function formAdd()
    {
      $this->fandom->open();
      $this->fandom->getFandom();
  
      $dataFandom = array();
      while($row = $this->fandom->getResult()){
        array_push($dataFandom, $row);
      }
  
      $this->fandom->close();
  
      $view = new FormMembersView();
      $view->renderAdd($dataFandom);
    }
  
    function formEdit($id) {
      $this->members->open();
      $this->fandom->open();
      $this->members->getMembersById($id);
      $this->fandom->getFandom();
  
      $dataMembers = array();
      while($row = $this->members->getResult()){
        array_push($dataMembers, $row);
      }
  
      $dataFandom = array();
      while($row = $this->fandom->getResult()){
        array_push($dataFandom, $row);
      }
  
      $this->members->close();
      $this->fandom->close();
  
      $view = new FormMembersView();
      $view->renderEdit($dataMembers, $dataFandom);
    }
}